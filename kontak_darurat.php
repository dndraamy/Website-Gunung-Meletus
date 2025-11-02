<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Darurat & Pelaporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles_css/kontak_darurat.css">
</head>

<body class="bg-light">
    <div class="container my-5">
        
        <header class="text-center bg-white p-4 rounded-3 shadow-sm mb-5">
            <h1 class="display-5 fw-bold text-danger"><i class="bi bi-headset me-2"></i> Kontak Darurat & Pelaporan</h1>
            <p class="lead text-secondary mt-3">
                Halaman ini menyediakan akses cepat dan mudah ke nomor-nomor telepon penting serta fasilitas pelaporan cepat untuk situasi darurat bencana erupsi gunung. <br class="d-none d-sm-block">
                <span class="fw-bold text-danger">Mohon gunakan kontak darurat ini hanya untuk kondisi yang mendesak.</span>
            </p>
        </header>

        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header card-header-danger">
                        <h2 class="h5 mb-0"><i class="bi bi-telephone-fill me-2"></i> Daftar Kontak Resmi (Siaga 24 Jam)</h2>
                    </div>
                    <div class="card-body contact-list">
                        <p class="text-muted">Klik nomor yang tertera untuk langsung melakukan panggilan:</p>
                        
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                                <span><i class="bi bi-hospital me-2 text-danger"></i> <strong>Ambulans Darurat:</strong></span> 
                                <a href="tel:118" class="text-primary fw-bold fs-8">118 / 119</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-life-preserver me-2 text-success"></i> <strong>SAR/BASARNAS:</strong></span> 
                                <a href="tel:115" class="text-primary fw-bold fs-8">115</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-megaphone-fill me-2 text-warning"></i> <strong>POLRI (Kepolisian):</strong></span> 
                                <a href="tel:110" class="text-primary fw-bold fs-8">110</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-shield-fill me-2 text-info"></i> <strong>TNI (Markas Besar):</strong></span> 
                                <a href="tel:02184595576" class="text-primary fw-bold fs-8">021-84595576</a>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-geo-alt-fill me-2 text-primary"></i> <strong>Pusdalops BNPB (HP/WA):</strong></span> 
                                <a href="tel:08121237575" class="text-primary fw-bold fs-8">0812-1237575</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-telephone-inbound me-2 text-primary"></i> <strong>Pusdalops BNPB (Telepon):</strong></span> 
                                <a href="tel:02129827666" class="text-primary fw-bold fs-8">021-29827666</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-heart-fill me-2 text-danger"></i> <strong>Palang Merah Indonesia (PMI):</strong></span> 
                                <a href="tel:0214207051" class="text-primary fw-bold fs-8">021-4207051</a>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-thermometer-sun me-2 text-warning"></i> <strong>PVMBG (Informasi Gunung):</strong></span> 
                                <a href="tel:0227272606" class="text-primary fw-bold fs-8">022-7272606</a>
                            </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-cloud-lightning-rain-fill me-2 text-info"></i> <strong>BMKG (Informasi Cuaca):</strong></span> 
                                <a href="tel:0216546318" class="text-primary fw-bold fs-8">021-6546318</a>
                            </li>
                            
                        </ul>
                        
                        <div class="alert alert-info mt-3" role="alert">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> <b>Nomor Tunggal Darurat:</b> Untuk kondisi darurat umum, hubungi <b>112</b>. | <b>Hotline Kemenkes (PPPK):</b> Hubungi <b>1500-567</b> (Khusus masalah kesehatan).
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 mb-4">
                <div class="card shadow border-0">
                    <div class="card-header card-header-danger">
                        <h2 class="h5 mb-0"><i class="bi bi-clipboard-check me-2"></i> Formulir Pelaporan Cepat (Verifikasi)</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">Laporan akan diteruskan kepada pihak berwenang (BPBD, SAR, atau Posko Terdekat) untuk diverifikasi dan ditindaklanjuti.</p>
                        
                        <form id="report-form" action="submit_report.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="nama" class="form-label fw-bold">Nama Pelapor (Wajib):</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomor" class="form-label fw-bold">Nomor Kontak Pelapor (Wajib):</label>
                                    <input type="tel" id="nomor" name="nomor" class="form-control" placeholder="Cth: 0812XXXXXXXX" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="lokasi" class="form-label fw-bold">Lokasi/Alamat Kejadian (Wajib):</label>
                                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Contoh: Desa Suka Maju, RT 05/RW 02" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jenis Laporan (Pilih Minimal Satu):</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis[]" id="kerusakan" value="Kerusakan Infrastruktur">
                                    <label class="form-check-label" for="kerusakan">Kerusakan Infrastruktur (Jalan, Jembatan, Rumah)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis[]" id="korban" value="Korban/Cedera Memerlukan Bantuan Medis">
                                    <label class="form-check-label" for="korban">Korban/Cedera Memerlukan Bantuan Medis</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis[]" id="kebutuhan" value="Kebutuhan Mendesak (Logistik)">
                                    <label class="form-check-label" for="kebutuhan">Kebutuhan Mendesak (Air Bersih, Makanan, Obat-obatan)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="jenis[]" id="lainnya" value="Kondisi Mendesak Lainnya">
                                    <label class="form-check-label" for="lainnya">Kondisi Mendesak Lainnya</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Uraian Detail Laporan (Wajib):</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan secara singkat dan jelas kondisi yang Anda lihat." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="file_bukti" class="form-label fw-bold">Unggah Bukti Visual (Opsional):</label>
                                <input class="form-control" type="file" id="file_bukti" name="file_bukti[]" multiple accept="image/*,video/*">
                                <div class="form-text">Maksimal 2 file (Foto/Video pendek) untuk memverifikasi laporan.</div>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="verifikasi" name="verifikasi" required>
                                <label class="form-check-label small" for="verifikasi"><b>Saya menyatakan bahwa informasi yang saya berikan adalah benar dan dapat dipertanggungjawabkan.</b></label>
                            </div>
                            
                            <button type="submit" class="btn btn-danger btn-lg w-100 mt-2"><i class="bi bi-send-fill me-2"></i> Kirim Laporan Cepat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>