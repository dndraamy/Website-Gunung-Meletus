<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: info_gunung.php");
    exit();
}

$query = "SELECT * FROM data_gunung WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$gunung = mysqli_fetch_assoc($result);

if (!$gunung) {
    header("Location: info_gunung.php");
    exit();
}

$status_class = 'tag-normal';
$status_icon = 'fas fa-check-circle';
$status_text = 'Normal';
$status_color = '#059669';
$status_bg = 'rgba(5, 150, 105, 0.1)';

if (strpos(strtolower($gunung['status']), 'waspada') !== false) {
    $status_class = 'tag-waspada';
    $status_icon = 'fas fa-exclamation-triangle';
    $status_text = 'Waspada';
    $status_color = '#e7a90cff';
    $status_bg = 'rgba(217, 119, 6, 0.1)';
} elseif (strpos(strtolower($gunung['status']), 'siaga') !== false) {
    $status_class = 'tag-siaga';
    $status_icon = 'fas fa-fire';
    $status_text = 'Siaga';
    $status_color = '#dc6c26ff';
    $status_bg = 'rgba(220, 38, 38, 0.1)';
} elseif (strpos(strtolower($gunung['status']), 'awas') !== false) {
    $status_class = 'tag-awas';
    $status_icon = 'fas fa-fire';
    $status_text = 'Awas';
    $status_color = '#b82121ff';
    $status_bg = 'rgba(220, 38, 38, 0.1)';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $gunung['nama_gunung']; ?> - LavaLink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles_css/detail_gunung.css">
</head>

<body style="background-color: black;">

    <header>
        <?php include 'navbar.html' ?>
    </header>

    <section class="detail-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <a href="info_gunung.php" class="btn-back" style="color: white;">
                        <i class="fas fa-arrow-left"></i>Kembali ke Daftar Gunung
                    </a>
                    <h1 class="display-4 fw-bold mb-3" style="color: white; padding-bottom: 15px"><?php echo $gunung['nama_gunung']; ?></h1>
                    <span class="alert" style="
                        background: <?php echo $status_bg; ?>;
                        color: <?php echo $status_color; ?>;
                        border: 2px solid <?php echo $status_color ?>; padding: 10px 30px; border-radius: 100px;
                    ">
                        <i class="<?php echo $status_icon; ?>"></i> Status: <?php echo $gunung['status']; ?>
                    </span>
                    <p style="color: white; font-size: 20px;"><br><?php echo $gunung['lokasi']; ?></p>
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
                    <img src="image/<?php echo $gunung['gambar']; ?>" class="volcano-image" alt="<?php echo $gunung['nama_gunung']; ?>" onerror="this.onerror=null; this.src='https://placehold.co/600x350/7f1d1d/ffffff?text=GUNUNG+API'">
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section>
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
                        <div class="info-value"><?php echo $gunung['letusan_terakhir']; ?></div>
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
        </section>

        <section>
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
                        <p class="mb-0"><i>Peningkatan aktivitas vulkanik dengan beberapa kali letusan kecil dan emisi gas.</i></p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">2006-2010</div>
                        <div class="fw-bold">Periode Letusan Besar</div>
                        <p class="mb-0"><i>Serangkaian letusan signifikan yang mempengaruhi wilayah sekitarnya.</i></p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">1990-2005</div>
                        <div class="fw-bold">Masa Tenang</div>
                        <p class="mb-0"><i>Periode dengan aktivitas vulkanik yang relatif rendah.</i></p>
                    </div>
                </div>
            </div>
        </section>

        <section>
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
                            Suhu Magma: <?php echo ($gunung['suhu_magma']); ?>
                        </div>
                        <div class="stat-badge">
                            <i class="fas fa-layer-group"></i>
                            Tipe Batuan: <?php echo ($gunung['tipe_batuan']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stat-badge">
                            <i class="fas fa-gem"></i>
                            Mineral Dominan: <?php echo ($gunung['mineral_dominan']); ?>
                        </div>
                        <div class="stat-badge">
                            <i class="fas fa-mountain"></i>
                            Bentuk: <?php echo ($gunung['bentuk_gunung']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
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

                <div class="alert-box" style="
                    background: <?php echo $status_bg; ?>;
                    border: 2px solid <?php echo $status_color; ?>;
                ">
                    <div class="alert-title" style="color: <?php echo $status_color; ?>;">
                        <i class="<?php echo $status_icon; ?>"></i>
                        STATUS <?php echo strtoupper($status_text); ?> - PERINGATAN
                    </div>
                    <p class="mb-0" style="color:white">
                        <?php if ($status_class == 'tag-siaga'): ?>
                            Status Siaga menunjukkan adanya peningkatan aktivitas vulkanik yang nyata. Masyarakat di wilayah terdampak harus meningkatkan kewaspadaan, berada di luar radius bahaya yang ditetapkan, dan mengikuti instruksi evakuasi dari pemerintah daerah.
                        <?php elseif ($status_class == 'tag-waspada'): ?>
                            Status Waspada menandakan mulai terjadinya peningkatan aktivitas di atas normal. Masyarakat di sekitar gunung diimbau untuk tetap tenang, tidak mendekati area kawah, dan selalu memantau perkembangan informasi resmi.
                        <?php elseif ($status_class == 'tag-awas'): ?>
                            Status Awas adalah tingkat peringatan tertinggi dan mengindikasikan bahwa letusan besar kemungkinan akan terjadi dalam waktu dekat. Seluruh masyarakat di area rawan bencana (KRB) wajib segera mengevakuasi diri ke lokasi aman.
                        <?php else: ?>
                            Status Normal menunjukkan tidak ada perubahan aktivitas yang signifikan. Meskipun demikian, masyarakat dan pengunjung tetap dilarang mendekati kawah/puncak untuk menghindari bahaya gas beracun.
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </section>
    </div>


    <footer>
        <?php include 'footer.html' ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>