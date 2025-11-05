<?php
// index.php
include_once 'config.php';

$db = new Database();
$conn = $db->getConnection();

// Ambil data gunung api
$query_gunung = "SELECT * FROM gunung_api ORDER BY 
                FIELD(status, 'Awas', 'Siaga', 'Waspada', 'Normal'), 
                nama ASC";
$stmt_gunung = $conn->prepare($query_gunung);
$stmt_gunung->execute();
$gunung_api = $stmt_gunung->fetchAll(PDO::FETCH_ASSOC);

// Tambahkan Gunung Anak Krakatau jika belum ada di database
$anak_krakatau_exists = false;
foreach ($gunung_api as $gunung) {
    if (strpos(strtolower($gunung['nama']), 'krakatau') !== false) {
        $anak_krakatau_exists = true;
        break;
    }
}

if (!$anak_krakatau_exists) {
    // Data Gunung Anak Krakatau
    $anak_krakatau = [
        'id' => count($gunung_api) + 1,
        'nama' => 'Gunung Anak Krakatau',
        'lokasi' => 'Selat Sunda, Lampung',
        'ketinggian' => 157,
        'status' => 'Siaga',
        'last_update' => date('Y-m-d H:i:s'),
        'deskripsi' => 'Gunung api aktif di Selat Sunda, terbentuk pasca letusan Krakatau 1883',
        'latitude' => -6.102,
        'longitude' => 105.423
    ];
    array_unshift($gunung_api, $anak_krakatau); // Tambahkan di awal array
}

// Ambil data pengumuman
$query_pengumuman = "SELECT * FROM pengumuman ORDER BY tanggal DESC LIMIT 3";
$stmt_pengumuman = $conn->prepare($query_pengumuman);
$stmt_pengumuman->execute();
$pengumuman = $stmt_pengumuman->fetchAll(PDO::FETCH_ASSOC);

// Hitung statistik
$total_gunung = count($gunung_api);
$status_awas = count(array_filter($gunung_api, function($g) { return $g['status'] == 'Awas'; }));
$status_siaga = count(array_filter($gunung_api, function($g) { return $g['status'] == 'Siaga'; }));
$status_waspada = count(array_filter($gunung_api, function($g) { return $g['status'] == 'Waspada'; }));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Gunung Api - PVMBG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        :root {
            --normal: #10b981;
            --waspada: #f59e0b;
            --siaga: #f97316;
            --awas: #ef4444;
            --primary: #1e293b;
            --primary-dark: #0f172a;
            --secondary: #334155;
            --accent: #dc2626;
            --light: #f8fafc;
            --dark: #1e293b;
            --text: #334155;
            --text-light: #64748b;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --radius: 8px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Admin Panel */
        .admin-panel {
            background: var(--primary-dark);
            color: white;
            padding: 0.7rem;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: var(--shadow);
        }
        
        .admin-panel a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin: 0 0.8rem;
            transition: var(--transition);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            background: rgba(255,255,255,0.1);
        }
        
        .admin-panel a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }
        
        /* Alert Banner */
        .alert-banner {
            background: linear-gradient(135deg, #ef4444 0%, #f97316 100%);
            color: white;
            padding: 0.8rem;
            text-align: center;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .alert-banner.warning {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.8; }
            100% { opacity: 1; }
        }
        
        /* Header */
        header {
            background: var(--primary);
            color: white;
            padding: 1rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo-icon {
            width: 45px;
            height: 45px;
            background: var(--accent);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        
        .logo h1 {
            font-size: 1.4rem;
            font-weight: 600;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 0;
            position: relative;
            font-size: 0.95rem;
        }
        
        nav a:hover, nav a.active {
            color: #fbbf24;
        }
        
        nav a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #fbbf24;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(30, 41, 59, 0.9), rgba(30, 41, 59, 0.95)), url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 4rem 0;
            text-align: center;
        }
        
        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            opacity: 0.9;
        }
        
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .stat-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: var(--radius);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-width: 150px;
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        /* Main Content */
        .main-content {
            padding: 3rem 0;
        }
        
        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-weight: 600;
        }
        
        /* Features Grid - DIKECILKAN */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .feature-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            border: 1px solid var(--border);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--accent);
        }
        
        .feature-icon {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: var(--primary);
            line-height: 1.3;
        }
        
        .feature-desc {
            color: var(--text-light);
            margin-bottom: 1.2rem;
            line-height: 1.5;
            font-size: 0.9rem;
            flex-grow: 1;
        }
        
        .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            font-size: 0.9rem;
        }
        
        .feature-link:hover {
            gap: 0.8rem;
        }
        
        /* Quick Actions */
        .quick-actions {
            margin-bottom: 3rem;
        }
        
        .action-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .action-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.8rem 1.2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            text-decoration: none;
            color: var(--text);
            border: 1px solid var(--border);
        }
        
        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--accent);
        }
        
        .action-icon {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .action-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .action-desc {
            font-size: 0.85rem;
            color: var(--text-light);
        }
        
        /* Status Section */
        .status-section {
            margin-bottom: 3rem;
        }
        
        .status-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .status-card {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--normal);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }
        
        .status-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }
        
        .status-card.waspada {
            border-left-color: var(--waspada);
        }
        
        .status-card.siaga {
            border-left-color: var(--siaga);
        }
        
        .status-card.awas {
            border-left-color: var(--awas);
        }
        
        .status-card.highlight {
            border: 2px solid #ef4444;
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }
        
        .status-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .status-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
        }
        
        .status-level {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .level-normal {
            background-color: var(--normal);
        }
        
        .level-waspada {
            background-color: var(--waspada);
        }
        
        .level-siaga {
            background-color: var(--siaga);
        }
        
        .level-awas {
            background-color: var(--awas);
        }
        
        .status-update {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-details {
            margin-top: auto;
        }
        
        .status-details p {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
        }
        
        .status-details strong {
            min-width: 100px;
            display: inline-block;
            color: var(--primary);
        }
        
        .warning-note {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 6px;
            padding: 0.8rem;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: #dc2626;
        }
        
        .warning-note strong {
            display: block;
            margin-bottom: 0.3rem;
        }
        
        /* Map Section */
        .map-section {
            margin-bottom: 3rem;
        }
        
        .map-container {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 500px;
            position: relative;
        }
        
        #map {
            height: 100%;
            width: 100%;
        }
        
        .map-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            z-index: 1000;
        }
        
        .map-btn {
            background: white;
            border: 1px solid var(--border);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            box-shadow: var(--shadow);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .map-btn:hover {
            background: var(--primary);
            color: white;
        }
        
        /* News Section */
        .news-section {
            margin-bottom: 3rem;
        }
        
        .news-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }
        
        .news-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .news-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }
        
        .news-image {
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: cover;
            background-position: center;
        }
        
        .news-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .news-date {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .news-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary);
            line-height: 1.4;
        }
        
        .news-excerpt {
            margin-bottom: 1.5rem;
            color: var(--text);
            flex-grow: 1;
        }
        
        .read-more {
            color: var(--accent);
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: var(--transition);
            margin-top: auto;
        }
        
        .read-more:hover {
            gap: 0.5rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: white;
            font-weight: 600;
        }
        
        .footer-section p, .footer-section a {
            color: #cbd5e1;
            margin-bottom: 0.8rem;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .hero-stats {
                gap: 1rem;
            }
            
            .stat-box {
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 1.8rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .status-cards, .news-cards, .action-cards {
                grid-template-columns: 1fr;
            }
            
            .map-actions {
                flex-direction: column;
                right: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Admin Panel -->
    <div class="admin-panel">
        <a href="admin.php"><i class="fas fa-cog"></i> Admin Panel</a> | 
        <a href="map.php"><i class="fas fa-map"></i> Peta Lengkap</a>
    </div>

    <!-- Alert Banner untuk status penting -->
    <div class="alert-banner warning">
        <i class="fas fa-exclamation-triangle"></i> 
        PERINGATAN: Gunung Anak Krakatau dalam Status Siaga. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah.
    </div>
    
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h1>Sistem Informasi Gunung Api</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="#" class="active"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="lokasi_rawan.php"><i class="fas fa-map-marked-alt"></i> Lokasi Rawan</a></li>
                        <li><a href="informasi_mitigasi.php"><i class="fas fa-info-circle"></i> Informasi & Mitigasi</a></li>
                        <li><a href="data_korban.php"><i class="fas fa-chart-bar"></i> Data & Statistik</a></li>
                        <li><a href="kontak_darurat.php"><i class="fas fa-phone-alt"></i> Kontak Darurat</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Pemantauan Aktivitas Gunung Api di Indonesia</h2>
            <p>Sistem informasi terpadu untuk memantau status terkini gunung api, peta kawasan rawan bencana, dan informasi evakuasi.</p>
            
            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-number"><?php echo $total_gunung; ?></span>
                    <span class="stat-label">Gunung Api Dipantau</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?php echo $status_awas; ?></span>
                    <span class="stat-label">Status Awas</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?php echo $status_siaga; ?></span>
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
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="feature-title">Kontak Darurat & Sumber Daya</h3>
                <p class="feature-desc">Kontak darurat, posko bantuan, rumah sakit, dan sumber daya penting.</p>
                <a href="kontak_darurat.php" class="feature-link">
                    Hubungi <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="quick-actions">
            <h2 class="section-title">Akses Cepat</h2>
            <div class="action-cards">
                <a href="gunung.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="action-title">Daftar Gunung Api</div>
                    <div class="action-desc">Lihat semua gunung api yang dipantau</div>
                </a>
                <a href="map.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="action-title">Peta Interaktif</div>
                    <div class="action-desc">Eksplorasi peta KRB dan jalur evakuasi</div>
                </a>
                <a href="pengumuman.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="action-title">Pengumuman</div>
                    <div class="action-desc">Informasi terbaru dan peringatan</div>
                </a>
                <a href="kontak_darurat.php" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="action-title">Kontak Darurat</div>
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

        <!-- News Section -->
        <section class="news-section">
            <h2 class="section-title">Pengumuman Penting & Berita Terbaru</h2>
            <div class="news-cards">
                <?php if(empty($pengumuman)): ?>
                <div class="news-card">
                    <div class="news-content">
                        <p>Tidak ada pengumuman terbaru.</p>
                    </div>
                </div>
                <?php else: ?>
                <?php foreach($pengumuman as $news): ?>
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1546059621-7c0a4bd1d65f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                    <div class="news-content">
                        <p class="news-date">
                            <i class="far fa-calendar-alt"></i>
                            <?php echo date('d F Y', strtotime($news['tanggal'])); ?>
                        </p>
                        <h3 class="news-title"><?php echo htmlspecialchars($news['judul']); ?></h3>
                        <p class="news-excerpt"><?php 
                            $excerpt = strip_tags($news['isi']);
                            echo strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;
                        ?></p>
                        <a href="pengumuman_detail.php?id=<?php echo $news['id']; ?>" class="read-more">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>Sistem Informasi Gunung Api dikembangkan oleh Pusat Vulkanologi dan Mitigasi Bencana Geologi (PVMBG) untuk memberikan informasi terkini tentang aktivitas gunung api di Indonesia.</p>
                </div>
                <div class="footer-section">
                    <h3>Kontak Darurat</h3>
                    <p><i class="fas fa-phone"></i> PVMBG: (022) 7272606</p>
                    <p><i class="fas fa-ambulance"></i> BPBD: 112</p>
                    <p><i class="fas fa-hospital"></i> Rumah Sakit: 119</p>
                    <p><i class="fas fa-map-marker-alt"></i> Posko Bantuan Terdekat</p>
                </div>
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <a href="lokasi_rawan.php">Lokasi Rawan Bencana</a>
                    <a href="informasi_mitigasi.php">Informasi & Mitigasi</a>
                    <a href="data_korban.php">Data & Statistik</a>
                    <a href="kontak_darurat.php">Kontak Darurat</a>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Pusat Vulkanologi dan Mitigasi Bencana Geologi (PVMBG). Semua hak dilindungi.</p>
            </div>
        </div>
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