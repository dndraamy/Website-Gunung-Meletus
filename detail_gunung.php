<?php 
include 'koneksi.php';

// Ambil ID dari parameter URL
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: informasi_gunung.php");
    exit();
}

// Query data gunung berdasarkan ID
$query = "SELECT * FROM gunung WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$gunung = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan, redirect ke halaman utama
if (!$gunung) {
    header("Location: informasi_gunung.php");
    exit();
}

// Tentukan class dan icon berdasarkan status
$status_class = 'tag-normal';
$status_icon = 'fas fa-check-circle';
$status_text = 'Normal';
$status_color = '#059669';
$status_bg = 'rgba(5, 150, 105, 0.1)';

if (strpos(strtolower($gunung['status']), 'waspada') !== false) {
    $status_class = 'tag-waspada';
    $status_icon = 'fas fa-exclamation-triangle';
    $status_text = 'Waspada';
    $status_color = '#d97706';
    $status_bg = 'rgba(217, 119, 6, 0.1)';
} elseif (strpos(strtolower($gunung['status']), 'siaga') !== false) {
    $status_class = 'tag-siaga';
    $status_icon = 'fas fa-fire';
    $status_text = 'Siaga';
    $status_color = '#dc2626';
    $status_bg = 'rgba(220, 38, 38, 0.1)';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $gunung['nama_gunung']; ?> • VolcanoTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1e40af;
            --primary-light: #3b82f6;
            --danger: #dc2626;
            --warning: #d97706;
            --success: #059669;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --educational: #7c3aed;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #ffffff 50%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--dark);
        }
        
        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        }
        
        .brand {
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-link {
            font-weight: 600;
            color: var(--gray) !important;
            margin: 0 8px;
            padding: 10px 20px !important;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }
        
        /* Hero Section yang Lebih Rapi */
        .detail-hero {
            background: white;
            padding: 80px 0 40px;
            margin-bottom: 40px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .volcano-image {
            height: 350px;
            width: 100%;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 3px solid white;
        }
        
        .status-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1rem;
            background: <?php echo $status_bg; ?>;
            color: <?php echo $status_color; ?>;
            border: 2px solid <?php echo $status_color; ?>;
            margin-bottom: 20px;
        }
        
        /* Content Sections */
        .content-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--light);
        }
        
        .section-title i {
            color: var(--primary);
            font-size: 2rem;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .info-card {
            background: var(--light);
            padding: 25px;
            border-radius: 15px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .info-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .info-value {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.3rem;
        }
        
        /* Educational Elements */
        .edu-badge {
            background: linear-gradient(135deg, var(--educational), #8b5cf6);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 15px;
        }
        
        .fact-box {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-left: 4px solid var(--primary);
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
        }
        
        .fact-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
            margin: 25px 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary);
            border-radius: 2px;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -33px;
            top: 5px;
            width: 12px;
            height: 12px;
            background: var(--primary);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--primary);
        }
        
        .timeline-date {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 30px;
            margin-top: 80px;
        }
        
        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #94a3b8;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Back Button */
        .btn-back {
            background: var(--light);
            color: var(--dark);
            border: 2px solid var(--primary);
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        
        .btn-back:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Text Content */
        .text-content {
            line-height: 1.8;
            color: var(--dark);
            font-size: 1.1rem;
        }
        
        .text-content p {
            margin-bottom: 20px;
        }
        
        /* Alert Box */
        .alert-box {
            background: <?php echo $status_bg; ?>;
            border: 2px solid <?php echo $status_color; ?>;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }
        
        .alert-title {
            font-weight: 700;
            color: <?php echo $status_color; ?>;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
        }
        
        /* Educational Stats */
        .stat-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--light);
            padding: 10px 15px;
            border-radius: 10px;
            margin: 5px;
            font-weight: 600;
            color: var(--dark);
        }
        
        .volcano-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .feature-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand brand" href="informasi_gunung.php">
            <i class="fas fa-mountain"></i>VolcanoTrack
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="informasi_gunung.php">
                        <i class="fas fa-home me-2"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mitigasi.php">
                        <i class="fas fa-shield-alt me-2"></i>Mitigasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-map-marked-alt me-2"></i>Peta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-graduation-cap me-2"></i>Edukasi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section yang Lebih Rapi -->
<section class="detail-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <a href="informasi_gunung.php" class="btn-back">
                    <i class="fas fa-arrow-left"></i>Kembali ke Beranda
                </a>
                <h1 class="display-4 fw-bold mb-3"><?php echo $gunung['nama_gunung']; ?></h1>
                <span class="status-tag">
                    <i class="<?php echo $status_icon; ?>"></i>Status: <?php echo $gunung['status']; ?>
                </span>
                <p class="lead text-muted mb-4"><?php echo $gunung['lokasi']; ?></p>
                
                <div class="volcano-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <div class="fw-bold"><?php echo $gunung['ketinggian']; ?> mdpl</div>
                        <small class="text-muted">Ketinggian</small>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="fw-bold">Aktif</div>
                        <small class="text-muted">Tipe Gunung</small>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="fw-bold">Stratovolcano</div>
                        <small class="text-muted">Bentuk</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="image/<?php echo $gunung['gambar']; ?>" class="volcano-image" alt="<?php echo $gunung['nama_gunung']; ?>">
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container">
    <!-- Basic Information -->
    <div class="content-section">
        <h2 class="section-title">
            <i class="fas fa-info-circle"></i>Informasi Dasar
        </h2>
        
        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <div class="info-label">Lokasi Geografis</div>
                <div class="info-value"><?php echo $gunung['lokasi']; ?></div>
            </div>
            <div class="info-card">
                <i class="fas fa-mountain"></i>
                <div class="info-label">Ketinggian</div>
                <div class="info-value"><?php echo $gunung['ketinggian']; ?> mdpl</div>
            </div>
            <div class="info-card">
                <i class="fas fa-fire"></i>
                <div class="info-label">Status Aktivitas</div>
                <div class="info-value"><?php echo $gunung['status']; ?></div>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-alt"></i>
                <div class="info-label">Letusan Terakhir</div>
                <div class="info-value">Data Historis</div>
            </div>
        </div>

        <div class="fact-box">
            <div class="fact-title">
                <i class="fas fa-lightbulb"></i>
                Fakta Menarik
            </div>
            <p class="mb-0"><?php echo $gunung['nama_gunung']; ?> merupakan salah satu gunung api teraktif di Indonesia dengan karakteristik letusan yang unik dan penting untuk dipelajari.</p>
        </div>
    </div>

    <!-- Sejarah dengan Timeline -->
    <div class="content-section">
        <h2 class="section-title">
            <i class="fas fa-book"></i>Sejarah & Kronologi
        </h2>
        
        <span class="edu-badge">
            <i class="fas fa-graduation-cap"></i>Materi Edukasi
        </span>
        
        <div class="text-content">
            <?php echo nl2br($gunung['sejarah']); ?>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">2010 - Sekarang</div>
                <div class="fw-bold">Aktivitas Terkini</div>
                <p class="mb-0">Peningkatan aktivitas vulkanik dengan beberapa kali letusan kecil dan emisi gas.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">2006-2010</div>
                <div class="fw-bold">Periode Letusan Besar</div>
                <p class="mb-0">Serangkaian letusan signifikan yang mempengaruhi wilayah sekitarnya.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">1990-2005</div>
                <div class="fw-bold">Masa Tenang</div>
                <p class="mb-0">Periode dengan aktivitas vulkanik yang relatif rendah.</p>
            </div>
        </div>
    </div>

    <!-- Geologi dengan Elemen Edukatif -->
    <div class="content-section">
        <h2 class="section-title">
            <i class="fas fa-mountain"></i>Struktur Geologi
        </h2>
        
        <span class="edu-badge">
            <i class="fas fa-flask"></i>Ilmu Geologi
        </span>
        
        <div class="text-content">
            <?php echo nl2br($gunung['geologi']); ?>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="stat-badge">
                    <i class="fas fa-temperature-high"></i>
                    Suhu Magma: 800-1200°C
                </div>
                <div class="stat-badge">
                    <i class="fas fa-layer-group"></i>
                    Tipe Batuan: Andesit-Basalt
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-badge">
                    <i class="fas fa-gem"></i>
                    Mineral Dominan: Plagioklas
                </div>
                <div class="stat-badge">
                    <i class="fas fa-mountain"></i>
                    Tipe: Stratovolcano
                </div>
            </div>
        </div>
    </div>

    <!-- Rekomendasi & Mitigasi -->
    <div class="content-section">
        <h2 class="section-title">
            <i class="fas fa-shield-alt"></i>Keselamatan & Mitigasi
        </h2>
        
        <span class="edu-badge">
            <i class="fas fa-first-aid"></i>Panduan Keselamatan
        </span>
        
        <div class="text-content">
            <?php echo nl2br($gunung['rekomendasi']); ?>
        </div>
        
        <!-- Alert Box berdasarkan status -->
        <div class="alert-box">
            <div class="alert-title">
                <i class="<?php echo $status_icon; ?>"></i>
                STATUS <?php echo strtoupper($status_text); ?> - PERINGATAN
            </div>
            <p class="mb-0">
                <?php if ($status_class == 'tag-siaga'): ?>
                Status Siaga menunjukkan peningkatan aktivitas vulkanik yang signifikan. Masyarakat di zona bahaya diharap mengungsi dan mengikuti arahan evakuasi dari pihak berwenang.
                <?php elseif ($status_class == 'tag-waspada'): ?>
                Status Waspada menunjukkan adanya perubahan aktivitas vulkanik. Masyarakat diharap memantau informasi terkini dan mempersiapkan rencana evakuasi.
                <?php else: ?>
                Status Normal menunjukkan aktivitas vulkanik dalam tingkat dasar. Tetap waspada dan pantau perkembangan informasi dari PVMBG.
                <?php endif; ?>
            </p>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <h5><i class="fas fa-phone-alt text-primary"></i> Kontak Darurat</h5>
                <ul class="list-unstyled">
                    <li>📞 PVMBG: (021) 424-6318</li>
                    <li>📞 BNPB: 117</li>
                    <li>📞 Basarnas: 115</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5><i class="fas fa-download text-primary"></i> Sumber Informasi</h5>
                <ul class="list-unstyled">
                    <li>🌐 magma.esdm.go.id</li>
                    <li>🌐 bnpb.go.id</li>
                    <li>🌐 bmkg.go.id</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="content-section text-center">
        <h3 class="mb-4">Akses Cepat Informasi</h3>
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="#" class="btn btn-primary btn-lg w-100 py-3">
                    <i class="fas fa-bell me-2"></i>Notifikasi
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="#" class="btn btn-outline-primary btn-lg w-100 py-3">
                    <i class="fas fa-map me-2"></i>Peta Live
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="mitigasi.php" class="btn btn-success btn-lg w-100 py-3">
                    <i class="fas fa-shield-alt me-2"></i>Mitigasi
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="#" class="btn btn-warning btn-lg w-100 py-3">
                    <i class="fas fa-file-pdf me-2"></i>Download PDF
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-brand">
                    <i class="fas fa-mountain me-2"></i>VolcanoTrack
                </div>
                <p class="text-light">Sistem edukasi dan monitoring gunung api terintegrasi untuk keselamatan masyarakat Indonesia.</p>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mb-3">Edukasi</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Materi Vulkanologi</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Sejarah Letusan</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Mitigasi Bencana</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Video Edukasi</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mb-3">Sumber Data</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">PVMBG</a></li>
                    <li><a href="#" class="text-light text-decoration-none">BMKG</a></li>
                    <li><a href="#" class="text-light text-decoration-none">BNPB</a></li>
                    <li><a href="#" class="text-light text-decoration-none">ESDM</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-5 pt-4 border-top border-secondary">
            <p class="text-light mb-0">© 2025 VolcanoTrack • Platform Edukasi Gunung Api Indonesia</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
