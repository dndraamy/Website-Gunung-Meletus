<?php
include 'koneksi.php';

$message = "";
$nama = $telepon = $lokasi = $keparahan = $kerusakan = $kebutuhan = "";
$setuju = false;
$keparahan_selected = "Ringan";

// --- 1. PROSES PENGIRIMAN FORMULIR PELAPORAN ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim(htmlspecialchars($_POST["nama"] ?? ""));
    $telepon = trim(htmlspecialchars($_POST["telepon"] ?? ""));
    $lokasi = trim(htmlspecialchars($_POST["lokasi"] ?? ""));
    $keparahan = htmlspecialchars($_POST["keparahan"] ?? "Ringan");
    $kerusakan = trim(htmlspecialchars($_POST["kerusakan"] ?? ""));
    $kebutuhan = trim(htmlspecialchars($_POST["kebutuhan"] ?? ""));
    $setuju = isset($_POST["setuju"]) ? true : false;
    
    $keparahan_selected = $keparahan; 
    $foto_path = NULL; 

    if (!$telepon || !$lokasi || !$setuju) {
        $message = '<div class="alert alert-danger mt-3">Nomor telepon, lokasi, dan persetujuan wajib diisi.</div>';
    } else {
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
            $new_filename = uniqid() . "." . $file_extension;
            $target_file = $target_dir . $new_filename;

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $foto_path = $target_file;
            } else {
                $message .= '<div class="alert alert-warning mt-3">Gagal mengunggah foto.</div>';
            }
        }

        $sql = "INSERT INTO laporan (nama_pelapor, telepon, lokasi, keparahan, kerusakan, kebutuhan, foto_path, waktu_lapor) 
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nama, $telepon, $lokasi, $keparahan, $kerusakan, $kebutuhan, $foto_path);

        if ($stmt->execute()) {
            $message = '<div class="alert alert-success mt-3">Terima kasih sudah melaporkan kondisi. Tim kami akan segera menindaklanjuti.</div>';
            $nama = $telepon = $lokasi = $kerusakan = $kebutuhan = "";
            $setuju = false;
            $keparahan_selected = "Ringan"; 
        } else {
            $message = '<div class="alert alert-danger mt-3">Gagal menyimpan data laporan: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    }
}


// --- 2. AMBIL DATA KONTAK DARURAT DARI DATABASE ---
$contacts = [];
$sql_kontak = "SELECT instansi, deskripsi, nomor_telepon FROM kontak_darurat ORDER BY FIELD(kategori, 'SAR', 'Medis', 'Pusat', 'Keamanan', 'Lainnya'), instansi ASC";
$result = $conn->query($sql_kontak);

if ($result) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contacts[] = [
                $row['instansi'], 
                $row['deskripsi'], 
                $row['nomor_telepon']
            ];
        }
    } else {
        $contacts = [
             ["SAR / BASARNAS", "Pencarian & pertolongan", "115"],
             ["Layanan Darurat Nasional", "Darurat umum 24 jam", "112"]
        ];
    }
} else {
    $contacts = [
         ["SAR / BASARNAS", "Pencarian & pertolongan", "115"],
         ["Layanan Darurat Nasional", "Darurat umum 24 jam", "112"]
    ];
    $message .= '<div class="alert alert-warning mt-3">Gagal mengambil data kontak darurat dari database. Menggunakan data statis.</div>';
}

$nama = htmlspecialchars($nama);
$telepon = htmlspecialchars($telepon);
$lokasi = htmlspecialchars($lokasi);
$kerusakan = htmlspecialchars($kerusakan);
$kebutuhan = htmlspecialchars($kebutuhan);
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
                Halaman ini menyediakan daftar kontak penting yang diambil dari database, serta fitur untuk melaporkan kondisi di lokasi Anda.
            </p>
            <div class="alert-warning-custom mt-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                **Gunakan dengan bijak.** Hubungi layanan darurat untuk kondisi gawat darurat.
            </div>
        </section>

        <section>
            <h2 class="section-title">Daftar Kontak Penting</h2>
            <p class="section-subtitle">Data diambil langsung dari database `kontak_darurat`.</p>
            
            <div class="contacts-grid">
                <?php
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

        <section>
            <h2 class="section-title">Lapor Bencana (Pelaporan Cepat)</h2>
            <p class="section-subtitle">Laporkan kondisi terkini di lokasi Anda untuk membantu petugas melakukan penanganan. Data akan disimpan ke database `laporan`.</p>
            
            <?= $message ?>

            <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelapor (opsional)</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Anda" value="<?= $nama ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kerusakan / Kondisi</label>
                        <textarea name="kerusakan" class="form-control" placeholder="Contoh: Jalan tertutup abu, rumah retak, dsb."><?= $kerusakan ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon (wajib)</label>
                        <input type="text" name="telepon" class="form-control" placeholder="0812xxxxxx" required value="<?= $telepon ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lokasi (Desa/Kecamatan) (wajib)</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Desa Suka Maju, Kec. X" required value="<?= $lokasi ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kebutuhan Mendesak</label>
                        <input type="text" name="kebutuhan" class="form-control" placeholder="Contoh: masker, air bersih" value="<?= $kebutuhan ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tingkat Keparahan</label>
                        <select name="keparahan" class="form-select">
                            <?php
                            $opsi_lvl = ["Ringan", "Sedang", "Berat"];
                            foreach ($opsi_lvl as $o) {
                                $sel = $keparahan_selected == $o ? "selected" : "";
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
                    <input type="checkbox" name="setuju" id="setuju" class="form-check-input" <?= $setuju ? "checked" : "" ?> required>
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