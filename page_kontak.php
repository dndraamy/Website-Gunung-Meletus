<?php
// Proses form submit
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
        $message = '<div class="alert alert-danger">Nomor telepon, lokasi, dan persetujuan wajib diisi.</div>';
    } else {
        // Simulasi penyimpanan data atau pengiriman email dll
        $message = '<div class="alert alert-success">Terima kasih sudah melaporkan kondisi. Tim kami akan segera menindaklanjuti.</div>';
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

<body>

    <div class="header-section bg-gradient p-4 rounded-4">
        <h1 class="fw-bold" style="font-size: 2.8rem;">Kontak Darurat & Pelaporan Cepat</h1>
        <p class="lead" style="max-width: 600px;">Halaman ini menyediakan daftar kontak penting yang dapat dihubungi saat terjadi bencana gunung meletus, serta fitur untuk melaporkan kondisi di lokasi Anda.</p>
        <div class="alert-warning-custom" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:20px; height:20px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4m0 4h.01" />
            </svg>
            Gunakan dengan bijak. Hubungi layanan darurat untuk kondisi gawat darurat.
        </div>
    </div>

    <div class="content-wrapper">
        <section>
            <h2 class="section-title">Daftar Kontak Penting</h2>
            <p class="section-subtitle">Ketuk nomor untuk langsung menelpon. Simpan daftar ini untuk akses cepat saat keadaan darurat.</p>
            <div class="contacts-grid">

                <!-- Kontak 1 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 1.5l7 4v6c0 4-1.5 7-7 9-5.5-2-7-5-7-9v-6l7-4z" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">BPBD Kabupaten/Kota</div>
                            <small class="text-secondary">Pusat informasi & koordinasi bencana</small>
                        </div>
                    </div>
                    <a href="tel:+621130" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> +621130</a>
                </div>

                <!-- Kontak 2 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke-width="1.5" />
                                <circle cx="12" cy="12" r="4" stroke-width="1.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 16l4 4" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 12l-4 4" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">SAR / BASARNAS</div>
                            <small class="text-secondary">Pencarian & pertolongan</small>
                        </div>
                    </div>
                    <a href="tel:+622129" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> 115</a>
                </div>

                <!-- Kontak 3 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="5" y="3" width="14" height="18" rx="3" ry="3" stroke-width="1.5" />
                                <line x1="12" y1="7" x2="12" y2="17" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">Polisi</div>
                            <small class="text-secondary">Keamanan & pengaturan lalu lintas</small>
                        </div>
                    </div>
                    <a href="tel:+62110" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> 110</a>
                </div>

                <!-- Kontak 4 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="5" y="3" width="14" height="18" rx="3" ry="3" stroke-width="1.5" />
                                <line x1="9" y1="7" x2="15" y2="7" stroke-width="1.5" />
                                <line x1="9" y1="11" x2="15" y2="11" stroke-width="1.5" />
                                <line x1="9" y1="15" x2="15" y2="15" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">TNI</div>
                            <small class="text-secondary">Evakuasi & dukungan logistik</small>
                        </div>
                    </div>
                    <a href="tel:+6281870" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> 021-81870</a>
                </div>

                <!-- Kontak 5 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 7a3 3 0 0 1-6 0" stroke-width="1.5" />
                                <rect x="5" y="8" width="14" height="11" rx="2" ry="2" stroke-width="1.5" />
                                <line x1="12" y1="12" x2="12" y2="12" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">Ambulans / Posko Kesehatan</div>
                            <small class="text-secondary">Panggilan medis darurat</small>
                        </div>
                    </div>
                    <a href="tel:+62118" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> 118/119</a>
                </div>

                <!-- Kontak 6 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5h2m-1-2v4m-7 7v5a2 2 0 002 2h10a2 2 0 002-2v-5m-14 0h14" />
                                <line x1="12" y1="12" x2="12" y2="17" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">PMI</div>
                            <small class="text-secondary">Palang Merah Indonesia</small>
                        </div>
                    </div>
                    <a href="tel:+62112" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> 021-42070</a>
                </div>

                <!-- Kontak 7 -->
                <div class="contact-card">
                    <div class="contact-left">
                        <div class="contact-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5h2m-1-2v4m-7 7v5a2 2 0 002 2h10a2 2 0 002-2v-5m-14 0h14" />
                                <line x1="12" y1="12" x2="12" y2="17" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div>
                            <div class="fw-semibold">Layanan Darurat Nasional</div>
                            <small class="text-secondary">Darurat umum 24 jam</small>
                        </div>
                    </div>
                    <a href="tel:+62112" class="btn-call"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:18px; height:18px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.45A11.958 11.958 0 0112 21a12 12 0 01-9-16.66z" />
                        </svg> +62112</a>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">Lapor Bencana (Pelaporan Cepat) <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20" style="color:#a05501; vertical-align:middle;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4m0 4h.01" />
                </svg></h2>
            <p class="section-subtitle" style="margin-bottom:30px;">Laporkan kondisi terkini di lokasi Anda untuk membantu petugas melakukan penanganan.</p>

            <?= $message ?>

            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="nama" class="form-label fw-semibold">Nama Pelapor (opsional)</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama Anda" class="form-control" value="<?= isset($nama) ? $nama : '' ?>" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="kerusakan" class="form-label fw-semibold">Kerusakan / Kondisi</label>
                        <textarea name="kerusakan" id="kerusakan" placeholder="Contoh: Jalan tertutup abu, rumah retak, aktivitas erupsi meningkat, dsb." class="form-control" rows="3"><?= isset($kerusakan) ? $kerusakan : '' ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="telepon" class="form-label fw-semibold">Nomor Telepon (wajib)</label>
                        <input type="text" name="telepon" id="telepon" placeholder="Contoh: 0812xxxxxx" required class="form-control" value="<?= isset($telepon) ? $telepon : '' ?>" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="korban" class="form-label fw-semibold">Korban</label>
                        <input type="text" name="korban" id="korban" placeholder="Contoh: 2 luka ringan" class="form-control" value="<?= isset($korban) ? $korban : '' ?>" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 form-group">
                        <label for="lokasi" class="form-label fw-semibold">Lokasi (Desa/Kecamatan) (wajib)</label>
                        <input type="text" name="lokasi" id="lokasi" placeholder="Contoh: Desa Suka Maju, Kec. X" required class="form-control" value="<?= isset($lokasi) ? $lokasi : '' ?>" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="kebutuhan" class="form-label fw-semibold">Kebutuhan Mendesak</label>
                        <input type="text" name="kebutuhan" id="kebutuhan" placeholder="Contoh: masker, air b" class="form-control" value="<?= isset($kebutuhan) ? $kebutuhan : '' ?>" />
                    </div>
                </div>

                <div class="row mb-3 gx-3">
                    <div class="col-md-6">
                        <label for="jenis" class="form-label fw-semibold">Jenis Kejadian</label>
                        <select name="jenis" id="jenis" class="form-select">
                            <option <?= (isset($jenis) && $jenis == "Gunung Meletus") ? "selected" : "" ?>>Gunung Meletus</option>
                            <option <?= (isset($jenis) && $jenis == "Gempa") ? "selected" : "" ?>>Gempa</option>
                            <option <?= (isset($jenis) && $jenis == "Banjir") ? "selected" : "" ?>>Banjir</option>
                            <option <?= (isset($jenis) && $jenis == "Lain-lain") ? "selected" : "" ?>>Lain-lain</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="keparahan" class="form-label fw-semibold">Tingkat Keparahan</label>
                        <select name="keparahan" id="keparahan" class="form-select">
                            <option <?= (isset($keparahan) && $keparahan == "Ringan") ? "selected" : "" ?>>Ringan</option>
                            <option <?= (isset($keparahan) && $keparahan == "Sedang") ? "selected" : "" ?>>Sedang</option>
                            <option <?= (isset($keparahan) && $keparahan == "Berat") ? "selected" : "" ?>>Berat</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 form-group">
                    <label for="foto" class="form-label fw-semibold">Unggah Foto (opsional)</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*" />
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" value="1" name="setuju" id="setuju" class="form-check-input" <?= isset($setuju) && $setuju ? "checked" : "" ?> required />
                    <label for="setuju" class="form-check-label">
                        Saya menyetujui bahwa data laporan ini dapat dibagikan kepada pihak berwenang untuk keperluan penanganan bencana.
                    </label>
                </div>

                <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" type="submit">Kirim Laporan</button>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>