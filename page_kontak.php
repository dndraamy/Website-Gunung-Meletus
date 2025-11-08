<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $telepon = htmlspecialchars($_POST["telepon"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $jenis = htmlspecialchars($_POST["jenis"]);
    $keparahan = htmlspecialchars($_POST["keparahan"]);
    $kerusakan = htmlspecialchars($_POST["kerusakan"]);
    $korban = htmlspecialchars($_POST["korban"]);
    $kebutuhan = htmlspecialchars($_POST["kebutuhan"]);
    $setuju = isset($_POST["setuju"]) ? true : false;

    if (!$telepon || !$lokasi || !$setuju) {
        $message = '<div class="alert alert-danger mt-3">Nomor telepon, lokasi, dan persetujuan wajib diisi.</div>';
    } else {
        $message = '<div class="alert alert-success mt-3">Terima kasih sudah melaporkan kondisi. Tim kami akan segera menindaklanjuti.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Darurat & Pelaporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles_css/page_kontak.css">
</head>

<body style="background-color: black;">
    <header>
        <?php include 'navbar.html'; ?>
    </header>

    <main class="content-wrapper">
        <section class="header-section text-center p-4 rounded-4 mb-5">
            <h1 class="fw-bold display-6">Kontak Darurat & Pelaporan Cepat</h1>
            <p class="lead mx-auto" style="max-width: 700px;">
                Halaman ini menyediakan daftar kontak penting yang dapat dihubungi saat terjadi bencana gunung meletus, serta fitur untuk melaporkan kondisi di lokasi Anda.
            </p>
            <div class="alert-warning-custom mt-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Gunakan dengan bijak. Hubungi layanan darurat untuk kondisi gawat darurat.
            </div>
        </section>

        <!-- Kontak Penting -->
        <section>
            <h2 class="section-title">Daftar Kontak Penting</h2>
            <p class="section-subtitle">Ketuk nomor untuk langsung menelpon. Simpan daftar ini untuk akses cepat saat keadaan darurat.</p>
            
            <div class="contacts-grid">
                <?php
                $contacts = [
                    ["BPBD Kabupaten/Kota", "Pusat informasi & koordinasi bencana", "+621130"],
                    ["SAR / BASARNAS", "Pencarian & pertolongan", "115"],
                    ["Polisi", "Keamanan & pengaturan lalu lintas", "110"],
                    ["TNI", "Evakuasi & dukungan logistik", "021-81870"],
                    ["Ambulans / Posko Kesehatan", "Panggilan medis darurat", "118 / 119"],
                    ["PMI", "Palang Merah Indonesia", "021-42070"],
                    ["Layanan Darurat Nasional", "Darurat umum 24 jam", "+62112"]
                ];
                foreach ($contacts as $c) {
                    echo '
                    <div class="contact-card">
                        <div class="contact-left">
                            <div class="contact-icon-wrapper">
                                <i class="bi bi-telephone-fill contact-icon"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">'.$c[0].'</div>
                                <small class="text-secondary">'.$c[1].'</small>
                            </div>
                        </div>
                        <a href="tel:'.$c[2].'" class="btn-call">
                            <i class="bi bi-telephone-outbound"></i> '.$c[2].'
                        </a>
                    </div>';
                }
                ?>
            </div>
        </section>

        <!-- Form Pelaporan -->
        <section>
            <h2 class="section-title">Lapor Bencana (Pelaporan Cepat)</h2>
            <p class="section-subtitle">Laporkan kondisi terkini di lokasi Anda untuk membantu petugas melakukan penanganan.</p>
            <?= $message ?>

            <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelapor (opsional)</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Anda" value="<?= $nama ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kerusakan / Kondisi</label>
                        <textarea name="kerusakan" class="form-control" placeholder="Contoh: Jalan tertutup abu, rumah retak, dsb."><?= $kerusakan ?? '' ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon (wajib)</label>
                        <input type="text" name="telepon" class="form-control" placeholder="0812xxxxxx" required value="<?= $telepon ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Korban</label>
                        <input type="text" name="korban" class="form-control" placeholder="Contoh: 2 luka ringan" value="<?= $korban ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lokasi (Desa/Kecamatan) (wajib)</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Desa Suka Maju, Kec. X" required value="<?= $lokasi ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kebutuhan Mendesak</label>
                        <input type="text" name="kebutuhan" class="form-control" placeholder="Contoh: masker, air bersih" value="<?= $kebutuhan ?? '' ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kejadian</label>
                        <select name="jenis" class="form-select">
                            <?php
                            $opsi_jenis = ["Gunung Meletus", "Gempa", "Banjir", "Lain-lain"];
                            foreach ($opsi_jenis as $o) {
                                $sel = isset($jenis) && $jenis == $o ? "selected" : "";
                                echo "<option $sel>$o</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tingkat Keparahan</label>
                        <select name="keparahan" class="form-select">
                            <?php
                            $opsi_lvl = ["Ringan", "Sedang", "Berat"];
                            foreach ($opsi_lvl as $o) {
                                $sel = isset($keparahan) && $keparahan == $o ? "selected" : "";
                                echo "<option $sel>$o</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Unggah Foto (opsional)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-check mt-4 mb-4">
                    <input type="checkbox" name="setuju" id="setuju" class="form-check-input" <?= isset($setuju) && $setuju ? "checked" : "" ?> required>
                    <label class="form-check-label" for="setuju">
                        Saya menyetujui bahwa data laporan ini dapat dibagikan kepada pihak berwenang untuk keperluan penanganan bencana.
                    </label>
                </div>

                <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" type="submit">Kirim Laporan</button>
            </form>
        </section>
    </main>

    <footer>
        <?php include 'footer.html'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
