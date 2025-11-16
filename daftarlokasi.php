<?php
include 'koneksi.php';

$detailed_routes = [
    "Gunung Merapi" => [
        "routes" => [
            [
                "id" => "M1",
                "name" => "Kinahrejo → Lapangan Umbulharjo",
                "to" => "Lapangan Umbulharjo",
                "steps" => [
                    ["order" => 1, "desc" => "Dari Balai Desa Kinahrejo berjalan ke selatan 800 m sampai SPBU kecil", "distance_m" => 800, "landmark" => "SPBU Kinahrejo"],
                    ["order" => 2, "desc" => "Belok kanan di pertigaan besar dan terus 600 m", "distance_m" => 600, "landmark" => "Pertigaan (Warung Pak Agus)"],
                    ["order" => 3, "desc" => "Ikuti jalan kampung turun 1.2 km hingga Lapangan Umbulharjo", "distance_m" => 1200, "landmark" => "Jembatan kayu"]
                ]
            ]
        ]
    ],
    "Gunung Semeru" => [
        "routes" => [
            [
                "id" => "SE1",
                "name" => "Curah Kobokan → Balai Supiturang",
                "to" => "Balai Supiturang",
                "steps" => [
                    ["order" => 1, "desc" => "Dari posko Curah Kobokan ambil jalan aspal ke utara 600 m", "distance_m" => 600, "landmark" => "Persimpangan besar"],
                    ["order" => 2, "desc" => "Belok kanan dan lanjut 900 m ke Balai Desa", "distance_m" => 900, "landmark" => "Balai Desa Supiturang"]
                ]
            ]
        ]
    ],
    "Gunung Krakatau" => [
        "routes" => [
            [
                "id" => "KR1",
                "name" => "Evakuasi Laut → Sebesi",
                "to" => "Sebesi",
                "steps" => [
                    ["order" => 1, "desc" => "Menuju dermaga terdekat sesuai arahan posko", "distance_m" => 0, "landmark" => "Dermaga"],
                    ["order" => 2, "desc" => "Naik kapal evakuasi resmi", "distance_m" => 0, "landmark" => "Kapal evakuasi"]
                ]
            ]
        ]
    ]
];

// Fungsi untuk memetakan status DB ke status Map (Mengembalikan status resmi: Awas/Siaga/Waspada/Normal)
function mapStatus($db_status)
{
    switch (strtolower($db_status)) {
        case 'awas':
            return 'Awas';
        case 'siaga':
            return 'Siaga';
        case 'waspada':
            return 'Waspada';
        case 'normal':
        default:
            return 'Normal';
    }
}

// Query Database: Mengambil data yang dibutuhkan untuk peta
$sql = "SELECT nama_gunung, lat, lon, status, rekomendasi, jalur_evakuasi, zona_merah, zona_kuning, zona_hijau, titik_kumpul 
        FROM data_gunung 
        WHERE lat IS NOT NULL AND lon IS NOT NULL";

$result = $conn->query($sql);
$dynamic_volcanoes = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['nama_gunung'];
        $map_status = mapStatus($row['status']);

        $zones = [
            'Merah' => array_map('trim', array_filter(explode(',', $row['zona_merah'] ?? ''))),
            'Kuning' => array_map('trim', array_filter(explode(',', $row['zona_kuning'] ?? ''))),
            'Hijau' => array_map('trim', array_filter(explode(',', $row['zona_hijau'] ?? ''))),
        ];

        $zones = array_filter($zones, function ($v) {
            return is_array($v) && count($v) > 0;
        });
        $muster_points = array_map('trim', array_filter(explode(',', $row['titik_kumpul'] ?? '')));

        $volcano_data = [
            "coords" => [(float)$row['lat'], (float)$row['lon']],
            "status" => $map_status,
            "zones" => $zones,
            "musterPoints" => $muster_points,
            "routeNarrative" => $row['jalur_evakuasi'] ?? 'Ikuti arahan petugas setempat.',
            "routes" => (isset($detailed_routes[$name])) ? $detailed_routes[$name]['routes'] : []
        ];

        $dynamic_volcanoes[$name] = $volcano_data;
    }
}
if ($result) {
    $result->free();
}

// Data gunung di-encode ke format JSON agar bisa dibaca JavaScript
$volcanoes_json = json_encode($dynamic_volcanoes, JSON_PRETTY_PRINT);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Peta Gunung Berapi Indonesia — Zona & Jalur Evakuasi</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="styles_css/map.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #f7f7f7;
        }

        #map {
            height: 75vh;
            width: 100%;
            z-index: 1;
        }

        .controls {
            position: absolute;
            top: 120px;
            left: 10px;
            z-index: 1000;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .control-btn {
            padding: 8px 12px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .control-btn:hover {
            background-color: #e5e7eb;
        }

        .control-btn.active {
            background-color: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .volcano-icon {
            font-size: 30px;
            line-height: 1;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .gunung-label {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0%);
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: bold;
            white-space: nowrap;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .info-box {
            position: absolute;
            top: 120px;
            right: 10px;
            z-index: 1000;
            width: 350px;
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-height: 80vh;
            overflow-y: auto;
            display: none;
        }

        .badge {
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            color: white;
            margin-right: 5px;
        }

        .badge.red {
            background-color: #ef4444;
        }

        .badge.orange {
            background-color: #ff8c00;
        }

        .badge.yellow {
            background-color: #f59e0b;
        }

        .badge.green {
            background-color: #10b981;
        }

        #tblZones {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 0.9rem;
        }

        #tblZones th,
        #tblZones td {
            border: 1px solid #eee;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        #tblZones th {
            background-color: #f3f4f6;
        }

        .step-detail {
            background-color: #f9f9f9;
            border-left: 3px solid #3b82f6 !important;
            margin-top: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .small {
            font-size: 0.85rem;
            color: #777;
        }

        header {
            padding: 20px 10px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>

<body>
    <?php include 'navbar.html' ?>

    <header>
        <h1 class="text-2xl"><b>Peta Gunung Berapi Indonesia — Zona & Jalur Evakuasi</b></h1>
    </header>

    <div class="controls" style="background-color: black; margin-top: 28rem; margin-left: 1rem;">
        <button id="allBtn" class="control-btn active" data-filter="Semua">Semua</button>
        <button id="awasBtn" class="control-btn" data-filter="Awas">Awas</button>
        <button id="siagaBtn" class="control-btn" data-filter="Siaga">Siaga</button>
        <button id="waspadaBtn" class="control-btn" data-filter="Waspada">Waspada</button>
        <button id="normalBtn" class="control-btn" data-filter="Normal">Normal</button>
        <button id="satBtn" class="control-btn">Satelit</button>
        <button id="centerBtn" class="control-btn">Reset View</button>
    </div>

    <div id="map"></div>


    <div id="info" class="info-box" aria-hidden="true">
        <button id="closeInfo" style="float:right;background:transparent;border:none;font-size:18px;cursor:pointer">✖</button>
        <h2 id="infoName" style="margin-top:4px;font-weight:900"></h2>
        <div id="infoStatus" style="margin-top:6px"></div>

        <div style="margin-top:10px"><strong>Daerah yang masuk KRB / Zona</strong>
            <table id="tblZones">
                <thead>
                    <tr>
                        <th>Zona</th>
                        <th>Daerah</th>
                        <th>Titik Kumpul</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div style="margin-top:10px"><strong>Jalur Evakuasi (Naratif)</strong>
            <div id="infoRoute" class="step"></div>
        </div>

        <div id="detailedRouteContainer"></div>

        <div style="margin-top:10px"><strong>Rute Tersedia</strong>
            <div id="routesList" style="margin-top:8px"></div>
        </div>
    </div>

    <script>
        const volcanoes = <?php echo $volcanoes_json; ?>;

        // Inisialisasi Peta
        const map = L.map('map', {
            zoomControl: true
        }).setView([-2.2, 118], 5.1);

        const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);
        const sat = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');

        let userMarker = null;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(p => {
                userMarker = L.circleMarker([p.coords.latitude, p.coords.longitude], {
                    radius: 8,
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.9
                }).addTo(map);
                userMarker.bindPopup('📍 Lokasi Anda').openPopup();
            }, err => {});
        }

        // Fungsi utilitas untuk mendapatkan kelas warna berdasarkan Status Resmi
        function getStatusColorClass(status) {
            if (status === 'Awas') return 'red';
            if (status === 'Siaga') return 'orange';
            if (status === 'Waspada') return 'yellow';
            return 'green'; // Normal
        }

        // Fungsi membuat icon marker custom (Diperbarui)
        function makeIcon(name, status) {
            const colorClass = getStatusColorClass(status);
            let color;

            if (colorClass === 'red') color = '#ef4444';
            else if (colorClass === 'orange') color = '#ff8c00';
            else if (colorClass === 'yellow') color = '#f59e0b';
            else color = '#10b981'; // green

            const html = `
                <div style="position:relative;text-align:center">
                    <div class="gunung-label" style="background:rgba(255,255,255,0.95); color:${color}">${name}</div>
                    <div class="volcano-icon" style="color:${color}">&#x25B2;</div>
                </div>
            `;
            return L.divIcon({
                html,
                className: '',
                iconSize: [90, 90],
                iconAnchor: [45, 65],
                popupAnchor: [0, -50]
            });
        }


        const markerLayer = L.layerGroup().addTo(map);
        const radiusLayer = L.layerGroup().addTo(map);
        const polyLayer = L.layerGroup().addTo(map);

        function renderMarkers(filter = 'Semua') {
            markerLayer.clearLayers();
            radiusLayer.clearLayers();
            polyLayer.clearLayers();
            document.getElementById('info').style.display = 'none';

            const keys = Object.keys(volcanoes);
            const added = [];

            keys.forEach(name => {
                const v = volcanoes[name];

                if (!v.coords || v.coords.length !== 2 || isNaN(v.coords[0]) || isNaN(v.coords[1])) {
                    return;
                }

                // Filter berdasarkan Status Resmi
                if (filter !== 'Semua' && v.status !== filter) return;

                const marker = L.marker(v.coords, {
                    icon: makeIcon(name, v.status)
                }).addTo(markerLayer);
                marker.on('click', () => showInfo(name));

                // Gambar lingkaran radius KRB (ilustrasi)
                const rRed = 5000;
                const rY = 10000;
                const rG = 15000;

                L.circle(v.coords, {
                    radius: rRed,
                    color: 'rgba(239,68,68,0.9)',
                    fillColor: '#ef4444',
                    fillOpacity: 0.08
                }).addTo(radiusLayer);
                L.circle(v.coords, {
                    radius: rY,
                    color: 'rgba(245,158,11,0.9)',
                    fillColor: '#f59e0b',
                    fillOpacity: 0.06
                }).addTo(radiusLayer);
                L.circle(v.coords, {
                    radius: rG,
                    color: 'rgba(16,185,129,0.9)',
                    fillColor: '#10b981',
                    fillOpacity: 0.04
                }).addTo(radiusLayer);
                added.push(marker);
            });

            if (added.length > 0) {
                const group = L.featureGroup(added);
                map.fitBounds(group.getBounds().pad(0.12));
            } else if (filter === 'Semua') {
                map.setView([-2.2, 118], 5.1);
            }
        }


        function showInfo(name) {
            const v = volcanoes[name];
            document.getElementById('info').style.display = 'block';
            document.getElementById('infoName').innerText = name;

            // Update Status badge menggunakan Status Resmi
            const statusColorClass = getStatusColorClass(v.status);
            document.getElementById('infoStatus').innerHTML = `Status: <span class="badge ${statusColorClass}">${v.status}</span>`;

            // Hapus Panduan Langkah jika ada
            document.getElementById('detailedRouteContainer').innerHTML = '';

            // Isi Tabel Zona
            const tbody = document.querySelector('#tblZones tbody');
            tbody.innerHTML = '';

            const points = v.musterPoints && v.musterPoints.length ? v.musterPoints.join(' • ') : '-';
            let hasZoneData = false;

            // Tampilkan Zona Merah, Kuning, Hijau
            ['Merah', 'Kuning', 'Hijau'].forEach(zona => {
                if (v.zones[zona] && v.zones[zona].length) {
                    v.zones[zona].forEach((place, index) => {
                        const tr = document.createElement('tr');
                        const point = (index === 0) ? points : '-';
                        const colorClass = zona === 'Merah' ? 'red' : zona === 'Kuning' ? 'yellow' : 'green';
                        tr.innerHTML = `<td><span class="badge ${colorClass}">${zona}</span></td><td>${place}</td><td>${point}</td>`;
                        tbody.appendChild(tr);
                        hasZoneData = true;
                    });
                }
            });

            if (!hasZoneData) {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td colspan="3" style="text-align:center; opacity:0.7">Data zona KRB tidak tersedia.</td>`;
                tbody.appendChild(tr);
            }

            // Isi Narasi Rute
            document.getElementById('infoRoute').innerText = v.routeNarrative || 'Ikuti arahan petugas setempat dan rambu evakuasi. Persiapkan barang penting dan utamakan anak & lansia.';

            // Isi Daftar Rute (jika ada rute detail statis)
            const rl = document.getElementById('routesList');
            rl.innerHTML = '';
            if (v.routes && v.routes.length) {
                v.routes.forEach(r => {
                    const div = document.createElement('div');
                    div.style.marginBottom = '8px';
                    const routeName = `${r.name}`;
                    div.innerHTML = `<div style="font-weight:800">${routeName}</div><div style="margin-top:6px"><button class="control-btn" onclick="openRouteSteps('${name}','${r.id}')">Panduan Langkah</button></div>`;
                    rl.appendChild(div);
                });
            } else {
                rl.innerHTML = '<div class="small">Tidak ada rute spesifik (tampilan naratif tersedia).</div>';
            }


            map.setView(v.coords, 11);
        }


        function openRouteSteps(volcanoName, routeId) {
            const v = volcanoes[volcanoName];
            if (!v || !v.routes) return;
            const r = v.routes.find(x => x.id === routeId);
            if (!r) return;

            const container = document.getElementById('detailedRouteContainer');
            container.innerHTML = ''; // Hapus panduan langkah sebelumnya

            const box = document.createElement('div');
            box.className = 'step-detail';
            box.innerHTML = `<h3 style="font-size:1.1rem; margin:0 0 10px 0;">Panduan Rute: ${r.name}</h3>`;

            r.steps.forEach(s => {
                const p = document.createElement('div');
                p.style.marginTop = '8px';
                p.innerHTML = `<strong>Langkah ${s.order}:</strong> ${s.desc} <div class="small" style="font-size:0.85rem; color:#777">Landmark: ${s.landmark || '-'} · ≈${s.distance_m || '-'} m</div>`;
                box.appendChild(p);
            });

            const closeBtn = document.createElement('button');
            closeBtn.innerText = 'Tutup Panduan Langkah';
            closeBtn.className = 'control-btn';
            closeBtn.style.marginTop = '15px';
            closeBtn.style.backgroundColor = '#7F8C8D';
            closeBtn.onclick = () => container.innerHTML = '';
            box.appendChild(closeBtn);

            container.appendChild(box);
            map.setView(v.coords, 12);
        }


        document.getElementById('closeInfo').addEventListener('click', () => {
            document.getElementById('info').style.display = 'none';
            document.getElementById('detailedRouteContainer').innerHTML = '';
        });


        function setActiveBtn(el) {
            document.querySelectorAll('.control-btn').forEach(b => b.classList.remove('active'));
            el.classList.add('active');
        }
        document.getElementById('allBtn').addEventListener('click', function() {
            setActiveBtn(this);
            renderMarkers('Semua');
        });

        // LISTENER DENGAN STATUS RESMI BARU
        document.getElementById('awasBtn').addEventListener('click', function() {
            setActiveBtn(this);
            renderMarkers('Awas');
        });
        document.getElementById('siagaBtn').addEventListener('click', function() {
            setActiveBtn(this);
            renderMarkers('Siaga');
        });
        document.getElementById('waspadaBtn').addEventListener('click', function() {
            setActiveBtn(this);
            renderMarkers('Waspada');
        });
        document.getElementById('normalBtn').addEventListener('click', function() {
            setActiveBtn(this);
            renderMarkers('Normal');
        });

        // LISTENER LAINNYA TETAP
        let satOn = false;
        document.getElementById('satBtn').addEventListener('click', function() {
            satOn = !satOn;
            if (satOn) {
                map.removeLayer(osm);
                sat.addTo(map);
                this.classList.add('active');
            } else {
                map.removeLayer(sat);
                osm.addTo(map);
                this.classList.remove('active');
            }
        });
        document.getElementById('centerBtn').addEventListener('click', () => map.setView([-2.2, 118], 5.1));

        renderMarkers('Semua');
    </script>
</body>

</html>