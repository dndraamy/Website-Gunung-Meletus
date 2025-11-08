<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Peta Gunung Berapi Indonesia — Zona & Jalur Evakuasi</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    :root {
      --bg: #000000ff;
      --accent: #960505ff;
      --red: #ef4444;
      --yellow: #f59e0b;
      --green: #10b981;
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
      background-color: var(--bg) !important;
      color: #042a2b
    }

    header {
      background: linear-gradient(90deg, #000000ff, #5b0a0aff);
      color: white;
      padding: 18px;
      text-align: center;
      margin-top: 50px;
    }

    h1 {
      margin: 0;
      font-weight: 800
    }

    #map {
      height: 73vh;
      border-radius: 10px;
      box-shadow: 0 8px 30px rgba(2, 6, 23, 0.08);
      margin: 18px;
    }

    .volcano-icon {
      font-size: 56px;
      animation: pulse 1.8s infinite;
      transform: translate(-50%, -50%);
      cursor: pointer
    }

    @keyframes pulse {
      0% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1
      }

      50% {
        transform: translate(-50%, -50%) scale(1.12);
        opacity: 0.9
      }

      100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1
      }
    }

    .gunung-label {
      position: absolute;
      transform: translate(-50%, -120%);
      font-weight: 800;
      text-shadow: 0 0 6px rgba(255, 255, 255, 0.92);
      padding: 4px 10px;
      border-radius: 10px;
      font-size: 13px
    }

    .info-box {
      position: fixed;
      right: 18px;
      top: 110px;
      width: 380px;
      max-height: 74vh;
      overflow: auto;
      background: white;
      border-radius: 12px;
      padding: 14px;
      box-shadow: 0 10px 30px rgba(2, 6, 23, 0.12);
      display: none;
      z-index: 1200
    }

    .badge {
      display: inline-block;
      padding: 6px 10px;
      border-radius: 999px;
      font-weight: 700;
      font-size: 12px
    }

    .badge.red {
      background: var(--red);
      color: white
    }

    .badge.yellow {
      background: var(--yellow);
      color: #1f2937
    }

    .badge.green {
      background: var(--green);
      color: white
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 8px
    }

    th,
    td {
      padding: 8px;
      border-bottom: 1px solid #eef6f0;
      text-align: left
    }

    th {
      background: linear-gradient(90deg, #510000ff, #000000ff);
      color: white;
    }

    .step {
      background: #fff7f7ff;
      border-left: 4px solid var(--accent);
      padding: 10px;
      border-radius: 8px;
      margin-top: 8px
    }

    .controls {
      position: fixed;
      left: 40px;
      top: 560px;
      background: white;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 8px 24px rgba(2, 6, 23, 0.08);
      z-index: 1200
    }

    .control-btn {
      display: inline-block;
      padding: 8px 10px;
      border-radius: 10px;
      border: 1px solid #f6eeeeff;
      background: white;
      cursor: pointer;
      margin: 4px;
      font-weight: 700
    }

    .control-btn.active {
      background: var(--accent);
      color: white
    }

    @media (max-width:1000px) {
      .info-box {
        position: static;
        width: auto;
        margin: 10px
      }

      .controls {
        position: static;
        margin: 10px
      }

      #map {
        margin: 10px
      }
    }
  </style>
</head>

<body>
  <?php include 'navbar.html' ?>

  <header style=" ">
    <h1 class="text-2xl">Peta Gunung Berapi Indonesia — Zona & Jalur Evakuasi</h1>
  </header>

  <div class="controls">
    <button id="allBtn" class="control-btn active" data-filter="Semua">Semua</button>
    <button id="redBtn" class="control-btn" data-filter="Merah">Merah</button>
    <button id="yellowBtn" class="control-btn" data-filter="Kuning">Kuning</button>
    <button id="greenBtn" class="control-btn" data-filter="Hijau">Hijau</button>
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

    <div style="margin-top:10px"><strong>Jalur Evakuasi (naratif)</strong>
      <div id="infoRoute" class="step"></div>
    </div>

    <div style="margin-top:10px"><strong>Rute Tersedia</strong>
      <div id="routesList" style="margin-top:8px"></div>
    </div>
  </div>

  <script>
    const map = L.map('map', {
      zoomControl: true
    }).setView([-2.2, 118], 5);

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


    function makeIcon(name, status) {
      const color = status === 'Merah' ? '#ef4444' : status === 'Kuning' ? '#f59e0b' : '#10b981';
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


    const volcanoes = {
      "Merapi": {
        coords: [-7.5426, 110.4463],
        status: "Merah",
        zones: {
          Merah: ["Kinahrejo", "Balerante", "Tlogolele", "Ngeposan", "Srunen", "Glagaharjo"],
          Kuning: ["Selo", "Pulen", "Purwobinangun", "Kalinom", "Pakem"],
          Hijau: ["Cangkringan", "Pakem Lor"]
        },
        musterPoints: ["Lapangan Umbulharjo", "Balai Desa Cangkringan", "Gedung Serbaguna Pakem"],
        routeNarrative: "Jika Anda di Zona MERAH: Segera bergerak diwaktu tercepat. Langkah: (1) Bawa tas darurat, anak & lansia diutamakan; (2) Dari posko desa, ambil jalan utama ke selatan ±2 km sampai SPBU, belok kanan; (3) Lanjutkan 1.2 km melewati jembatan kecil; (4) Sampai di Lapangan Umbulharjo lapor ke posko. Jangan melewati alur sungai/lubuk.",
        routes: [{
          id: "M1",
          name: "Kinahrejo → Lapangan Umbulharjo",
          steps: [{
              order: 1,
              desc: "Dari Balai Desa Kinahrejo berjalan ke selatan 800 m sampai SPBU kecil",
              distance_m: 800,
              landmark: "SPBU Kinahrejo"
            },
            {
              order: 2,
              desc: "Belok kanan di pertigaan besar dan terus 600 m",
              distance_m: 600,
              landmark: "Pertigaan (Warung Pak Agus)"
            },
            {
              order: 3,
              desc: "Ikuti jalan kampung turun 1.2 km hingga Lapangan Umbulharjo",
              distance_m: 1200,
              landmark: "Jembatan kayu"
            }
          ]
        }]
      },

      "Semeru": {
        coords: [-8.1083, 112.9220],
        status: "Kuning",
        zones: {
          Merah: ["Curah Kobokan", "Sumberwuluh"],
          Kuning: ["Candipuro", "Senduro", "Pasirian"],
          Hijau: ["Lumajang", "Pronojiwo"]
        },
        musterPoints: ["Balai Desa Supiturang", "Lapangan Pasirian"],
        routeNarrative: "Di Zona MERAH: Segera evakuasi mengikuti rambu kuning; bila abu menebal, gunakan kain basah sebagai masker. Di Zona KUNING: siaga, siapkan barang penting dan kendaraan.",
        routes: [{
          id: "SE1",
          name: "Curah Kobokan → Balai Supiturang",
          steps: [{
            order: 1,
            desc: "Dari posko Curah Kobokan ambil jalan aspal ke utara 600 m",
            distance_m: 600,
            landmark: "Persimpangan besar"
          }, {
            order: 2,
            desc: "Belok kanan dan lanjut 900 m ke Balai Desa",
            distance_m: 900,
            landmark: "Balai Desa Supiturang"
          }]
        }]
      },

      "Sinabung": {
        coords: [3.17, 98.392],
        status: "Hijau",
        zones: {
          Merah: ["Desa Gamber", "Desa Perbaji"],
          Kuning: ["Tiga Pancur", "Sukanalu"],
          Hijau: ["Kabanjahe", "Merek"]
        },
        musterPoints: ["Lapangan Kutarakyat", "Gedung Serbaguna Kabanjahe"],
        routeNarrative: "Jika abu datang: segera evakuasi ke Lapangan Kutarakyat, ikuti jalan desa ke barat 500 m lalu naik ke lapangan.",
        routes: []
      },

      "Agung": {
        coords: [-8.3426, 115.5085],
        status: "Kuning",
        zones: {
          Merah: ["Besakih", "Banjar"],
          Kuning: ["Selat", "Muncan"],
          Hijau: ["Rendang", "Sideman"]
        },
        musterPoints: ["Lapangan Rendang", "Balai Desa Selat"],
        routeNarrative: "Jika di Zona MERAH: gunakan jalur utama ke Lapangan Rendang, ikuti petunjuk petugas dan rambu kuning, hindari jalan kecil yang rawan longsor.",
        routes: []
      },

      "Krakatau": {
        coords: [-6.1020, 105.4230],
        status: "Merah",
        zones: {
          Merah: ["Pulau Anak Krakatau", "Rakata"],
          Kuning: ["Sebesi", "Sebuku"],
          Hijau: ["Anyer", "Carita"]
        },
        musterPoints: ["Dermaga Sebesi", "Lapangan Anyer"],
        routeNarrative: "Evakuasi via laut ke Dermaga Sebesi dengan kapal evakuasi resmi. Jangan coba jalan darat, ikuti instruksi petugas pantai.",
        routes: [{
          id: "KR1",
          name: "Evakuasi Laut → Sebesi",
          steps: [{
            order: 1,
            desc: "Menuju dermaga terdekat sesuai arahan posko",
            distance_m: 0,
            landmark: "Dermaga"
          }, {
            order: 2,
            desc: "Naik kapal evakuasi resmi",
            distance_m: 0,
            landmark: "Kapal evakuasi"
          }]
        }]
      },

      "Rinjani": {
        coords: [-8.411, 116.457],
        status: "Hijau",
        zones: {
          Merah: ["Sembalun Lawang"],
          Kuning: ["Senaru"],
          Hijau: ["Bayan", "Aikmel"]
        },
        musterPoints: ["Lapangan Sembalun", "Balai Desa Senaru"],
        routeNarrative: "Jika situasi meningkat: evakuasi ke Lapangan Sembalun. Gunakan kendaraan bila memungkinkan, utamakan keluarga rentan.",
        routes: []
      },

      "Bromo": {
        coords: [-7.942, 112.953],
        status: "Hijau",
        zones: {
          Merah: ["Ngadisari"],
          Kuning: ["Ngadas"],
          Hijau: ["Cemoro Lawang"]
        },
        musterPoints: ["Balai Desa Ngadisari", "Lapangan Cemoro Lawang"],
        routeNarrative: "Evakuasi menuju Balai Desa Ngadisari; hindari area Laut Pasir jika ada aliran wedus gembel (abu tebal).",
        routes: []
      },

      "Kerinci": {
        coords: [-1.70, 101.26],
        status: "Kuning",
        zones: {
          Merah: ["Gunung Tujuh"],
          Kuning: ["Sungai Penuh", "Kayu Aro"],
          Hijau: ["Solok"]
        },
        musterPoints: ["Lapangan Kersik Tuo", "Balai Desa Kayu Aro"],
        routeNarrative: "Di Zona MERAH segera turun ke lapangan terbuka terdekat dan ikuti arahan BPBD setempat.",
        routes: []
      },

      "Lewotobi": {
        coords: [-8.53, 122.77],
        status: "Merah",
        zones: {
          Merah: ["Borutodan", "Lambu"],
          Kuning: ["Larantuka"],
          Hijau: ["Wolowaru"]
        },
        musterPoints: ["Lapangan Borutodan", "Balai Desa Larantuka"],
        routeNarrative: "Evakuasi wajib; cepat bergerak menuju Lapangan Borutodan. Ikuti rambu evakuasi yang dipasang oleh petugas lokal.",
        routes: []
      },

      "Lewotolok": {
        coords: [-8.35, 123.49],
        status: "Kuning",
        zones: {
          Merah: ["Ile Mandiri"],
          Kuning: ["Nubatukan"],
          Hijau: ["Tanjung Puca"]
        },
        musterPoints: ["Lapangan Nubatukan"],
        routeNarrative: "Jika sinyal darurat naik, bersiap evakuasi via jalur darat ke titik kumpul desa.",
        routes: []
      },

      "Karangetang": {
        coords: [2.78, 125.39],
        status: "Merah",
        zones: {
          Merah: ["Batubulan", "Meleweka"],
          Kuning: ["Siau"],
          Hijau: ["Tagulandang"]
        },
        musterPoints: ["Lapangan Ondong", "Pelabuhan Siau"],
        routeNarrative: "Segera evakuasi ke titik kumpul terdekat; bila perlu evakuasi laut koordinasikan dengan SAR.",
        routes: []
      },

      "Dukono": {
        coords: [1.68, 127.88],
        status: "Kuning",
        zones: {
          Merah: ["Halmahera Utara area"],
          Kuning: ["Ternate"],
          Hijau: ["Tidore"]
        },
        musterPoints: ["Pelabuhan Ternate"],
        routeNarrative: "Di zona KUNING hindari kegiatan laut dekat kawah; bila aktivitas meningkat, segera ke pelabuhan terdekat.",
        routes: []
      },

      "Ibu": {
        coords: [1.47, 127.63],
        status: "Kuning",
        zones: {
          Merah: ["Ibu area"],
          Kuning: ["Tidore area"],
          Hijau: ["Ternate"]
        },
        musterPoints: ["Pelabuhan Tidore"],
        routeNarrative: "Siaga: pantau PVMBG, bila ada perintah evakuasi ikuti arahan petugas pelabuhan.",
        routes: []
      },

      "Gamalama": {
        coords: [0.8, 127.365],
        status: "Hijau",
        zones: {
          Merah: ["Ternate Selatan"],
          Kuning: ["Sierra"],
          Hijau: ["Ternate Utara"]
        },
        musterPoints: ["Lapangan Gamalama", "Pelabuhan Ternate"],
        routeNarrative: "Jika alarm berbunyi, segera ke titik kumpul terdekat.",
        routes: []
      },

      "Lokon": {
        coords: [1.43, 124.88],
        status: "Kuning",
        zones: {
          Merah: ["Tomohon"],
          Kuning: ["Tondano"],
          Hijau: ["Manado"]
        },
        musterPoints: ["Lapangan Tomohon", "Balai Desa Tondano"],
        routeNarrative: "Siaga; bila terjadi peningkatan segera bergerak ke lapangan terbuka terdekat.",
        routes: []
      },

      "Soputan": {
        coords: [1.11, 124.73],
        status: "Merah",
        zones: {
          Merah: ["Tombatu", "Kakas"],
          Kuning: ["Ratahan"],
          Hijau: ["Minsen"]
        },
        musterPoints: ["Lapangan Tombatu"],
        routeNarrative: "Evakuasi terorganisir ke Lapangan Tombatu; ikuti rambu merah dan petugas.",
        routes: []
      },

      "Marapi": {
        coords: [-0.40, 100.35],
        status: "Kuning",
        zones: {
          Merah: ["Tandikat"],
          Kuning: ["Bukittinggi"],
          Hijau: ["Agam"]
        },
        musterPoints: ["Lapangan Tandikat"],
        routeNarrative: "Jika tanda bahaya meningkat, evakuasi ke Lapangan Tandikat dan laporkan di posko setempat.",
        routes: []
      },

      "Slamet": {
        coords: [-7.32, 109.22],
        status: "Kuning",
        zones: {
          Merah: ["Baturaden"],
          Kuning: ["Banyumas"],
          Hijau: ["Kebumen"]
        },
        musterPoints: ["Lapangan Baturaden"],
        routeNarrative: "Siaga; bila perintah evakuasi keluar, ikuti jalur utama ke titik kumpul.",
        routes: []
      },

      "Ijen": {
        coords: [-8.058, 114.242],
        status: "Hijau",
        zones: {
          Merah: ["Licin"],
          Kuning: ["Banyupahit"],
          Hijau: ["Bondowoso"]
        },
        musterPoints: ["Lapangan Licin"],
        routeNarrative: "Ikuti jalur turun ke Desa Licin kemudian ke Lapangan Banyuwangi saat diperintahkan.",
        routes: []
      },

      "KarangN": {
        coords: [-6.3, 129.9],
        status: "Hijau",
        zones: {
          Merah: ["Pulau Banda"],
          Kuning: ["Pulau Pulau kecil"],
          Hijau: ["Ambon"]
        },
        musterPoints: ["Dermaga Banda"],
        routeNarrative: "Evakuasi laut bila diperlukan, ikuti instruksi petugas pelabuhan.",
        routes: []
      }
    };


    const markerLayer = L.layerGroup().addTo(map);
    const radiusLayer = L.layerGroup().addTo(map);
    const polyLayer = L.layerGroup().addTo(map);

    function renderMarkers(filter = 'Semua') {
      markerLayer.clearLayers();
      radiusLayer.clearLayers();
      polyLayer.clearLayers();

      const keys = Object.keys(volcanoes);
      const added = [];

      keys.forEach(name => {
        const v = volcanoes[name];
        if (filter !== 'Semua' && v.status !== filter) return;

        const marker = L.marker(v.coords, {
          icon: makeIcon(name, v.status)
        }).addTo(markerLayer);
        marker.on('click', () => showInfo(name));

        const rRed = (v.radius && v.radius.merah) ? v.radius.merah : 5000;
        const rY = (v.radius && v.radius.kuning) ? v.radius.kuning : rRed * 2;
        const rG = (v.radius && v.radius.hijau) ? v.radius.hijau : rRed * 3;
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
      }
    }


    function showInfo(name) {
      const v = volcanoes[name];
      document.getElementById('info').style.display = 'block';
      document.getElementById('infoName').innerText = name;
      document.getElementById('infoStatus').innerHTML = `Status: <span class="badge ${v.status==='Merah'?'red':v.status==='Kuning'?'yellow':'green'}">${v.status}</span>`;


      const tbody = document.querySelector('#tblZones tbody');
      tbody.innerHTML = '';
      ['Merah', 'Kuning', 'Hijau'].forEach(z => {
        if (v.zones[z]) {
          v.zones[z].forEach(place => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td><span class="badge ${z==='Merah'?'red':z==='Kuning'?'yellow':'green'}">${z}</span></td><td>${place}</td><td>${(v.musterPoints && v.musterPoints.length) ? v.musterPoints.join(' • ') : '-'}</td>`;
            tbody.appendChild(tr);
          });
        }
      });


      document.getElementById('infoRoute').innerText = v.routeNarrative || 'Ikuti arahan petugas setempat dan rambu evakuasi. Persiapkan barang penting dan utamakan anak & lansia.';


      const rl = document.getElementById('routesList');
      rl.innerHTML = '';
      if (v.routes && v.routes.length) {
        v.routes.forEach(r => {
          const div = document.createElement('div');
          div.style.marginBottom = '8px';
          div.innerHTML = `<div style="font-weight:800">${r.name} → ${r.to}</div><div style="margin-top:6px"><button class="control-btn" onclick="openRouteSteps('${name}','${r.id}')">Panduan Langkah</button></div>`;
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

      const box = document.createElement('div');
      box.className = 'step';
      box.innerHTML = `<strong>Panduan Rute: ${r.name}</strong>`;
      r.steps.forEach(s => {
        const p = document.createElement('div');
        p.style.marginTop = '8px';
        p.innerHTML = `<strong>Langkah ${s.order}:</strong> ${s.desc} <div class="small">Landmark: ${s.landmark || '-'} · ≈${s.distance_m || '-'} m</div>`;
        box.appendChild(p);
      });

      const infoRouteContainer = document.getElementById('infoRoute');

      document.getElementById('info').appendChild(box);
      map.setView(v.coords, 12);
    }


    document.getElementById('closeInfo').addEventListener('click', () => document.getElementById('info').style.display = 'none');


    function setActiveBtn(el) {
      document.querySelectorAll('.control-btn').forEach(b => b.classList.remove('active'));
      el.classList.add('active');
    }
    document.getElementById('allBtn').addEventListener('click', function() {
      setActiveBtn(this);
      renderMarkers('Semua');
    });
    document.getElementById('redBtn').addEventListener('click', function() {
      setActiveBtn(this);
      renderMarkers('Merah');
    });
    document.getElementById('yellowBtn').addEventListener('click', function() {
      setActiveBtn(this);
      renderMarkers('Kuning');
    });
    document.getElementById('greenBtn').addEventListener('click', function() {
      setActiveBtn(this);
      renderMarkers('Hijau');
    });


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