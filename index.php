<?php
include 'koneksi.php';

$pesan_default = 'Sistem memuat data Status Gunung Api. Selalu waspada dan ikuti arahan resmi.';

if ($conn) {
    try {
        $query_peringatan = $conn->query("SELECT isi_pesan FROM peringatan ORDER BY id DESC LIMIT 1");
        if ($query_peringatan && $row = $query_peringatan->fetch_assoc()) {
            $pesan_default = htmlspecialchars($row['isi_pesan']);
        }
    } catch (Exception $e) {
        error_log("Gagal mengambil data dari tabel peringatan: " . $e->getMessage());
    }
}

$gunung_api = [];
$query_gunung = $conn->query("
    SELECT id, nama_gunung, lokasi, ketinggian, sejarah, geologi, status, rekomendasi, gambar, tipe_gunung, update_at
    FROM data_gunung
    ORDER BY FIELD(status, 'Awas', 'Siaga', 'Waspada', 'Normal'), update_at DESC
");

if ($query_gunung) {
    while ($row = $query_gunung->fetch_assoc()) {
        $gunung_api[] = $row;
    }
}

$total_gunung = count($gunung_api);
$awas_count = 0;
$siaga_count = 0;
$waspada_count = 0;
$normal_count = 0;

$is_awas_active = false;
$gunung_awas = [];

foreach ($gunung_api as $gunung) {
    if ($gunung['status'] == 'Awas') {
        $awas_count++;
        $is_awas_active = true;
        $gunung_awas[] = $gunung;
    } elseif ($gunung['status'] == 'Siaga') {
        $siaga_count++;
    } elseif ($gunung['status'] == 'Waspada') {
        $waspada_count++;
    } elseif ($gunung['status'] == 'Normal') {
        $normal_count++;
    }
}

if ($awas_count > 0) {
    $nama_gunung_awas = array_column($gunung_awas, 'nama_gunung');

    $list_gunung = '';
    $jumlah_awas = count($nama_gunung_awas);

    if ($jumlah_awas === 1) {
        $list_gunung = $nama_gunung_awas[0];
    } elseif ($jumlah_awas > 1) {
        $last_gunung = array_pop($nama_gunung_awas);
        $list_gunung = implode(', ', $nama_gunung_awas) . ' dan ' . $last_gunung;
    }
    $pesan = 'PERINGATAN: ' . $list_gunung . ' dalam Status Awas. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah.';
} else {
    $pesan = $pesan_default;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LavaLink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="styles_css/indexx.css" />
</head>

<body style="background-color: black;">

    <!-- Alert  -->
    <div class="alert-banner warning">
        <i class="fas fa-exclamation-triangle"></i>
        <?= htmlspecialchars($pesan); ?>
    </div>

    <!-- Navbar -->
    <header>
        <?php include 'navbar.html' ?>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2 style="padding-top: 100px;">Portal Pemantauan Gunung Api</h2>
            <p>Sistem informasi terpadu untuk memantau status terkini gunung api di Indonesia, peta kawasan rawan bencana, dan informasi evakuasi.</p>
            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-number"><?= $total_gunung ?></span>
                    <span class="stat-label">Gunung Api Dipantau</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?= $normal_count ?></span>
                    <span class="stat-label">Status Normal</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?= $waspada_count ?></span>
                    <span class="stat-label">Status Waspada</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?= $siaga_count ?></span>
                    <span class="stat-label">Status Siaga</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number"><?= $awas_count ?></span>
                    <span class="stat-label">Status Awas</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <main class="container main-content">
        <h2 class="section-title">Akses Cepat</h2>
        <section class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="feature-title">Peta Interaktif & Jalur Evakuasi</h3>
                <p class="feature-desc">Jelajahi peta risiko bencana dan temukan jalur evakuasi terdekat untuk setiap gunung api.</p>
                <a href="daftarlokasi.php" class="feature-link">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mountain me-2"></i>
                </div>
                <h3 class="feature-title">Informasi Gunung Api & Mitigasi</h3>
                <p class="feature-desc">Pelajari karakteristik gunung api, sejarah letusan, dan langkah mitigasi bencana.</p>
                <a href="info_gunung.php" class="feature-link">
                    Pelajari <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="feature-title">Data Korban & Statistik</h3>
                <p class="feature-desc">Data statistik korban bencana dan analisis dampak letusan.</p>
                <a href="statistik.php" class="feature-link">
                    Lihat Data <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <section class="status-section">
            <h2 class="section-title">Status Darurat Vulkanik</h2>
            <?php if ($awas_count > 0): ?>
                <div class="status-cards">
                    <?php foreach ($gunung_awas as $gunung): ?>
                        <div class="status-card <?php echo strtolower($gunung['status']); ?> highlight">
                            <div class="status-header">
                                <h3><?php echo htmlspecialchars($gunung['nama_gunung']); ?></h3>
                                <span class="status-level level-<?php echo strtolower($gunung['status']); ?>">
                                    <?php echo $gunung['status']; ?>
                                </span>
                            </div>
                            <div class="status-details">
                                <p><strong>Lokasi:</strong> <?php echo htmlspecialchars($gunung['lokasi']); ?></p>
                                <p><strong>Ketinggian:</strong> <?php echo number_format($gunung['ketinggian'], 0); ?> mdpl</p>
                                <div class="warning-note">
                                    <strong><i class="fas fa-exclamation-triangle"></i> Peringatan Khusus:</strong>
                                    Aktivitas vulkanik meningkat. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah.
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-alert-message">
                    <p style="color: #c4c4c4ff;"><i>Seluruh gunung api yang dipantau berada pada tingkat aktivitas di bawah Level IV (Awas). Situasi umum dalam keadaan terkendali.</i></p>
                </div>
            <?php endif; ?>
        </section>

        <section class="carousel-section">
            <h2 class="section-title">Galeri Gunung Api Indonesia</h2>
            <div class="volcano-carousel-container">
                <div class="volcano-carousel" id="static-carousel">
                    <div class="carousel-static-item">
                        <img src="image/krakatau.jpg" alt="Ilustrasi Gunung 3">
                        <div class="static-caption">Gunung Krakatau</div>
                    </div>
                    <div class="carousel-static-item">
                        <img src="image/galunggung.jpg" alt="Ilustrasi Gunung 2">
                        <div class="static-caption">Gunung Galunggung</div>
                    </div>
                    <div class="carousel-static-item">
                        <img src="image/rinjani.jpg" alt="Ilustrasi Gunung 1">
                        <div class="static-caption">Gunung Rinjani</div>
                    </div>
                </div>
            </div>
            <div class="carousel-nav">
                <button class="prev-btn" onclick="moveStaticCarousel(-1)">&#10094;</button>
                <button class="next-btn" onclick="moveStaticCarousel(1)">&#10095;</button>
            </div>
            <p class="caption-info">Indonesia memiliki lebih dari <?= $total_gunung ?> gunung api aktif yang merupakan bagian dari <b>Cincin Api Pasifik (Ring of Fire)</b>.</p>
        </section>
    </main>

    <footer>
        <?php include 'footer.html' ?>
    </footer>

    <a href="login.php" class="admin-panel-btn" aria-label="Akses Panel Administrator">
        <i class="fas fa-user-shield"></i> Admin Panel
    </a>

    <script>
        const staticCarousel = document.getElementById('static-carousel');
        const staticItems = staticCarousel.querySelectorAll('.carousel-static-item');
        const totalStaticItems = staticItems.length;
        let staticIndex = 0;
        let autoSlideStaticInterval;

        function updateStaticCarousel() {
            const offset = -staticIndex * 100;
            staticCarousel.style.transform = `translateX(${offset}%)`;
        }

        function moveStaticCarousel(direction) {
            resetAutoSlideStatic();
            staticIndex += direction;
            if (staticIndex >= totalStaticItems) {
                staticIndex = 0;
            } else if (staticIndex < 0) {
                staticIndex = totalStaticItems - 1;
            }

            updateStaticCarousel();
        }

        function startAutoSlideStatic() {
            autoSlideStaticInterval = setInterval(() => {
                moveStaticCarousel(1);
            }, 4000);
        }

        function resetAutoSlideStatic() {
            clearInterval(autoSlideStaticInterval);
            startAutoSlideStatic();
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (totalStaticItems > 1) {
                startAutoSlideStatic();
            } else {
                document.querySelector('.carousel-nav').style.display = 'none';
            }
        });
    </script>
</body>

</html>