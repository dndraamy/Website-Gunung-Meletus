<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Gunung Api - PVMBG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="styles_css/index.css" />
</head>
<body style="background-color: black;">

    <!-- Alert Banner untuk status penting -->
    <div class="alert-banner warning">
        <i class="fas fa-exclamation-triangle"></i> 
        PERINGATAN: Gunung Anak Krakatau dalam Status Siaga. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah.
    </div>
    
    <!-- Header -->
    <header>
        <?php include 'navbar.html' ?>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2 style="padding-top: 100px;">Pemantauan Aktivitas Gunung Api di Indonesia</h2>
            <p>Sistem informasi terpadu untuk memantau status terkini gunung api, peta kawasan rawan bencana, dan informasi evakuasi.</p>
            
            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-number">160</span>
                    <span class="stat-label">Gunung Api Dipantau</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">3</span>
                    <span class="stat-label">Status Awas</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Status Siaga</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Pemantauan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container main-content">
        <!-- Features Grid - DIKECILKAN -->
        <section class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="feature-title">Lokasi Rawan Bencana & Jalur Evakuasi</h3>
                <p class="feature-desc">Akses peta detail kawasan rawan bencana dan jalur evakuasi untuk setiap gunung api.</p>
                <a href="lokasi_rawan.php" class="feature-link">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h3 class="feature-title">Informasi Gunung Api & Mitigasi</h3>
                <p class="feature-desc">Pelajari karakteristik gunung api, sejarah letusan, dan langkah mitigasi bencana.</p>
                <a href="informasi_mitigasi.php" class="feature-link">
                    Pelajari <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="feature-title">Data Korban & Statistik</h3>
                <p class="feature-desc">Data statistik korban bencana dan analisis dampak letusan terkini.</p>
                <a href="data_korban.php" class="feature-link">
                    Lihat Data <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="quick-actions">
            <h2 class="section-title">Akses Cepat</h2>
            <div class="action-cards">
                <a href="informasi_gunung.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="action-title">Daftar Gunung Api</div>
                    <div class="action-desc">Lihat semua gunung api yang dipantau</div>
                </a>
                <a href="daftarlokasi.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="action-title">Peta Interaktif</div>
                    <div class="action-desc">Eksplorasi peta KRB dan jalur evakuasi</div>
                </a>
                <a href="statistik.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="action-title">Data Korban</div>
                    <div class="action-desc">Informasi terbaru dan peringatan</div>
                </a>
                <a href="page_kontak.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="action-title">Pelaporan Cepat</div>
                    <div class="action-desc">Hubungi pihak berwenang</div>
                </a>
            </div>
        </section>

        <!-- Status Section -->
        <section class="status-section">
            <h2 class="section-title">Status Terkini Gunung Api</h2>
            <div class="status-cards">
                <?php foreach($gunung_api as $gunung): ?>
                <div class="status-card <?php echo strtolower($gunung['status']); ?> <?php echo (strpos($gunung['nama'], 'Krakatau') !== false) ? 'highlight' : ''; ?>">
                    <div class="status-header">
                        <h3><?php echo htmlspecialchars($gunung['nama']); ?></h3>
                        <span class="status-level level-<?php echo strtolower($gunung['status']); ?>">
                            <?php echo $gunung['status']; ?>
                        </span>
                    </div>
                    <p class="status-update">
                        <i class="far fa-clock"></i>
                        Diperbarui: <?php echo date('d F Y, H:i', strtotime($gunung['last_update'])); ?> WIB
                    </p>
                    <div class="status-details">
                        <p><strong>Lokasi:</strong> <?php echo htmlspecialchars($gunung['lokasi']); ?></p>
                        <p><strong>Ketinggian:</strong> <?php echo number_format($gunung['ketinggian'], 0); ?> mdpl</p>
                        <p><strong>Koordinat:</strong> <?php echo $gunung['latitude']; ?>, <?php echo $gunung['longitude']; ?></p>
                        
                        <?php if (strpos($gunung['nama'], 'Krakatau') !== false): ?>
                        <div class="warning-note">
                            <strong><i class="fas fa-exclamation-triangle"></i> Peringatan Khusus:</strong>
                            Aktivitas vulkanik meningkat. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah. Waspada potensi tsunami.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section">
            <h2 class="section-title">Peta Interaktif Gunung Api</h2>
            <div class="map-container">
                <div id="map"></div>
                <div class="map-actions">
                    <button class="map-btn" id="krb-toggle">
                        <i class="fas fa-layer-group"></i> KRB
                    </button>
                    <button class="map-btn" id="evacuation-toggle">
                        <i class="fas fa-route"></i> Evakuasi
                    </button>
                    <button class="map-btn" id="fullscreen-toggle">
                        <i class="fas fa-expand"></i> Layar Penuh
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php include 'footer.html' ?>
    </footer>

    <!-- Leaflet JS untuk Peta -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-2.5489, 118.0149], 5);
        
        // Tambahkan tile layer yang lebih clean
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '© OpenStreetMap contributors, © CartoDB',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);
        
        // Tambahkan marker untuk setiap gunung api
        <?php foreach($gunung_api as $gunung): ?>
        // Tentukan warna marker berdasarkan status
        var markerColor = '#6b7280'; // default gray
        switch('<?php echo $gunung['status']; ?>') {
            case 'Awas': markerColor = '#ef4444'; break;
            case 'Siaga': markerColor = '#f97316'; break;
            case 'Waspada': markerColor = '#f59e0b'; break;
            case 'Normal': markerColor = '#10b981'; break;
        }
        
        // Buat custom icon
        var volcanoIcon = L.divIcon({
            html: `<div style="background-color: ${markerColor}; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2);"></div>`,
            className: 'volcano-marker',
            iconSize: [16, 16],
            iconAnchor: [8, 8]
        });
        
        var marker = L.marker([<?php echo $gunung['latitude']; ?>, <?php echo $gunung['longitude']; ?>], {icon: volcanoIcon}).addTo(map);
        
        // Popup content
        var popupContent = `
            <div style="min-width: 220px; padding: 8px;">
                <h3 style="margin: 0 0 8px 0; color: #1e293b; font-size: 1.1rem;"><?php echo $gunung['nama']; ?></h3>
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                    <div style="width: 8px; height: 8px; border-radius: 50%; background: ${markerColor};"></div>
                    <span style="font-weight: 600; color: ${markerColor};"><?php echo $gunung['status']; ?></span>
                </div>
                <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Lokasi:</strong> <?php echo $gunung['lokasi']; ?></p>
                <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Ketinggian:</strong> <?php echo number_format($gunung['ketinggian'], 0); ?> mdpl</p>
                <?php if (strpos($gunung['nama'], 'Krakatau') !== false): ?>
                <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 4px; padding: 6px; margin: 8px 0; font-size: 0.8rem; color: #dc2626;">
                    <strong>⚠️ Peringatan:</strong> Radius bahaya 5 km
                </div>
                <?php endif; ?>
                <div style="margin-top: 10px; text-align: center;">
                    <a href="gunung_detail.php?id=<?php echo $gunung['id']; ?>" style="background: #1e293b; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 0.85rem; display: inline-block;">Lihat Detail</a>
                </div>
            </div>
        `;
        
        marker.bindPopup(popupContent);
        <?php endforeach; ?>
        
        // Fungsi untuk toggle KRB
        document.getElementById('krb-toggle').addEventListener('click', function() {
            alert('Fitur KRB akan ditampilkan di peta interaktif');
        });
        
        // Fungsi untuk toggle jalur evakuasi
        document.getElementById('evacuation-toggle').addEventListener('click', function() {
            alert('Fitur Jalur Evakuasi akan ditampilkan di peta interaktif');
        });
        
        // Fungsi fullscreen
        document.getElementById('fullscreen-toggle').addEventListener('click', function() {
            var elem = document.getElementById('map');
            if (!document.fullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        });
    </script>
</body>
</html>