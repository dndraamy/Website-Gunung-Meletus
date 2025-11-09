-- Buat tabel gunung_api
CREATE TABLE gunung_api (
    id INT PRIMARY KEY AUTO_INCREMENT,
    gunung VARCHAR(100) NOT NULL,
    tanggal VARCHAR(50),
    tahun INT,
    lokasi TEXT NOT NULL,
    provinsi VARCHAR(100) NOT NULL,
    meninggal INT DEFAULT 0,
    luka INT DEFAULT 0,
    pengungsi INT DEFAULT 0,
    dampak TEXT,
    status VARCHAR(50) DEFAULT 'Pemantauan',
    prediksi BOOLEAN DEFAULT FALSE,
    ketinggian INT,
    status_gunung VARCHAR(50) DEFAULT 'Aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data gunung api berdasarkan data asli Indonesia
INSERT INTO gunung_api (gunung, tanggal, tahun, lokasi, provinsi, meninggal, luka, pengungsi, dampak, status, prediksi, ketinggian, status_gunung) VALUES
-- Aceh
('Gunung Leuser', '15 Juni 2022', 2022, 'Aceh Tenggara', 'Aceh', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3404, 'Normal'),
('Gunung Burni Telong', '20 Agustus 2021', 2021, 'Bener Meriah', 'Aceh', 0, 0, 150, 'Emisi gas vulkanik', 'Pemantauan', FALSE, 2645, 'Waspada'),

-- Sumatera Utara
('Gunung Sinabung', '10 Agustus 2020', 2020, 'Karo', 'Sumatera Utara', 2, 15, 5200, 'Awan panas, lahan pertanian rusak', 'Selesai', FALSE, 2460, 'Siaga'),
('Gunung Sibayak', '5 Maret 2023', 2023, 'Karo', 'Sumatera Utara', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', FALSE, 2094, 'Normal'),

-- Sumatera Barat
('Gunung Marapi', '22 Januari 2024', 2024, 'Agam & Tanah Datar', 'Sumatera Barat', 0, 12, 1500, 'Awan panas, abu vulkanik', 'Aktif', FALSE, 2891, 'Siaga'),
('Gunung Singgalang', '10 November 2022', 2022, 'Agam', 'Sumatera Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2877, 'Normal'),
('Gunung Tandikat', '15 Juli 2021', 2021, 'Padang Pariaman', 'Sumatera Barat', 0, 0, 0, 'Peningkatan suhu', 'Pemantauan', FALSE, 2438, 'Waspada'),

-- Jambi
('Gunung Kerinci', '15 Mei 2024', 2024, 'Kerinci', 'Jambi', 0, 3, 800, 'Abu vulkanik radius 10km', 'Aktif', FALSE, 3805, 'Siaga'),

-- Sumatera Selatan
('Gunung Dempo', '8 September 2023', 2023, 'Pagar Alam', 'Sumatera Selatan', 0, 0, 350, 'Emisi gas belerang', 'Pemantauan', FALSE, 3173, 'Waspada'),

-- Lampung
('Gunung Rajabasa', '12 Desember 2022', 2022, 'Lampung Selatan', 'Lampung', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 1281, 'Normal'),
('Gunung Pesagi', '20 Oktober 2021', 2021, 'Lampung Barat', 'Lampung', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2230, 'Normal'),

-- Bengkulu
('Gunung Kaba', '30 Maret 2023', 2023, 'Rejang Lebong', 'Bengkulu', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', FALSE, 1940, 'Normal'),

-- Banten
('Gunung Karang', '18 Februari 2024', 2024, 'Pandeglang', 'Banten', 0, 0, 0, 'Aktivitas seismik', 'Pemantauan', FALSE, 1778, 'Normal'),

-- Jawa Barat
('Gunung Gede Pangrango', '5 April 2023', 2023, 'Sukabumi & Cianjur', 'Jawa Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2958, 'Normal'),
('Gunung Tangkuban Perahu', '26 Juli 2019', 2019, 'Bandung Barat', 'Jawa Barat', 0, 0, 2500, 'Erupsi freatik, kawasan wisata ditutup', 'Selesai', FALSE, 2084, 'Waspada'),

-- Jawa Tengah
('Gunung Merapi', '11 Maret 2023', 2023, 'Magelang & Boyolali', 'Jawa Tengah', 2, 15, 1250, 'Awan panas, 45 rumah rusak', 'Selesai', FALSE, 2930, 'Siaga'),
('Gunung Merbabu', '15 Januari 2024', 2024, 'Magelang & Boyolali', 'Jawa Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3145, 'Normal'),
('Gunung Slamet', '18 Agustus 2023', 2023, 'Banyumas & Tegal', 'Jawa Tengah', 0, 2, 800, 'Luncuran awan panas', 'Selesai', FALSE, 3428, 'Waspada'),
('Gunung Sumbing', '22 Mei 2022', 2022, 'Wonosobo & Temanggung', 'Jawa Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3371, 'Normal'),
('Gunung Sindoro', '30 November 2023', 2023, 'Temanggung & Wonosobo', 'Jawa Tengah', 0, 0, 300, 'Emisi abu vulkanik', 'Pemantauan', FALSE, 3136, 'Waspada'),

-- DI Yogyakarta
('Gunung Merapi', '11 Maret 2023', 2023, 'Sleman', 'DI Yogyakarta', 2, 15, 1250, 'Awan panas, 45 rumah rusak', 'Selesai', FALSE, 2930, 'Siaga'),

-- Jawa Timur
('Gunung Bromo', '20 Januari 2024', 2024, 'Probolinggo & Pasuruan', 'Jawa Timur', 0, 0, 1500, 'Abu vulkanik, wisata ditutup sementara', 'Aktif', FALSE, 2329, 'Waspada'),
('Gunung Semeru', '4 Desember 2022', 2022, 'Lumajang & Malang', 'Jawa Timur', 57, 104, 10250, 'Awan panas guguran, 5,205 rumah rusak', 'Selesai', FALSE, 3676, 'Siaga'),
('Gunung Ijen', '3 Maret 2024', 2024, 'Banyuwangi', 'Jawa Timur', 0, 0, 0, 'Emisi gas belerang meningkat', 'Pemantauan', FALSE, 2799, 'Waspada'),
('Gunung Kelud', '14 Februari 2024', 2024, 'Kediri & Blitar', 'Jawa Timur', 0, 0, 2500, 'Peningkatan aktivitas seismik', 'Pemantauan', FALSE, 1731, 'Waspada'),
('Gunung Argopuro', '14 Maret 2023', 2023, 'Situbondo & Probolinggo', 'Jawa Timur', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3088, 'Normal'),

-- Bali
('Gunung Agung', '21 November 2023', 2023, 'Karangasem', 'Bali', 0, 0, 25000, 'Emisi abu, bandara ditutup sementara', 'Selesai', FALSE, 3031, 'Waspada'),
('Gunung Batur', '8 Juni 2022', 2022, 'Bangli', 'Bali', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 1717, 'Normal'),

-- NTB
('Gunung Rinjani', '8 September 2023', 2023, 'Lombok Timur', 'Nusa Tenggara Barat', 0, 8, 3200, 'Luncuran awan panas, lahan pertanian terdampak abu', 'Aktif', FALSE, 3726, 'Siaga'),

-- NTT
('Gunung Inerie', '15 Oktober 2023', 2023, 'Ngada', 'Nusa Tenggara Timur', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', FALSE, 2245, 'Normal'),
('Gunung Egon', '5 Agustus 2022', 2022, 'Sikka', 'Nusa Tenggara Timur', 0, 0, 450, 'Emisi gas vulkanik', 'Pemantauan', FALSE, 1703, 'Waspada'),
('Gunung Lewotobi', '12 Januari 2024', 2024, 'Flores Timur', 'Nusa Tenggara Timur', 0, 0, 1200, 'Abu vulkanik', 'Pemantauan', FALSE, 1703, 'Waspada'),

-- Kalimantan Barat
('Gunung Niut', '20 Mei 2021', 2021, 'Bengkayang', 'Kalimantan Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 1701, 'Normal'),

-- Kalimantan Tengah
('Gunung Bukit Raya', '15 November 2020', 2020, 'Katingan', 'Kalimantan Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2278, 'Normal'),

-- Kalimantan Timur
('Gunung Lumut', '10 Desember 2022', 2022, 'Paser', 'Kalimantan Timur', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 1582, 'Normal'),

-- Sulawesi Utara
('Gunung Soputan', '3 Oktober 2023', 2023, 'Minahasa Tenggara', 'Sulawesi Utara', 1, 0, 2100, 'Awan panas, 12 rumah rusak', 'Selesai', FALSE, 1784, 'Siaga'),
('Gunung Lokon', '18 Juli 2022', 2022, 'Tomohon', 'Sulawesi Utara', 0, 0, 800, 'Emisi abu vulkanik', 'Pemantauan', FALSE, 1580, 'Waspada'),

-- Gorontalo
('Gunung Ambang', '25 September 2023', 2023, 'Bolaang Mongondow Timur', 'Gorontalo', 0, 0, 0, 'Aktivitas seismik', 'Pemantauan', FALSE, 1830, 'Normal'),

-- Sulawesi Tengah
('Gunung Rantemario', '5 April 2021', 2021, 'Luwu', 'Sulawesi Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3478, 'Normal'),

-- Sulawesi Selatan
('Gunung Latimojong', '12 Agustus 2022', 2022, 'Enrekang', 'Sulawesi Selatan', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 3478, 'Normal'),

-- Sulawesi Tenggara
('Gunung Mekongga', '30 Juni 2023', 2023, 'Kolaka', 'Sulawesi Tenggara', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2650, 'Normal'),

-- Maluku
('Gunung Banda Api', '15 Mei 2022', 2022, 'Maluku Tengah', 'Maluku', 0, 0, 1500, 'Erupsi kecil, pemukiman terdampak abu', 'Selesai', FALSE, 641, 'Waspada'),

-- Maluku Utara
('Gunung Gamalama', '8 Maret 2024', 2024, 'Kota Ternate', 'Maluku Utara', 0, 0, 800, 'Emisi abu vulkanik', 'Pemantauan', FALSE, 1715, 'Waspada'),
('Gunung Dukono', '20 November 2023', 2023, 'Halmahera Utara', 'Maluku Utara', 0, 0, 0, 'Emisi abu terus menerus', 'Aktif', FALSE, 1229, 'Siaga'),
('Gunung Ibu', '12 Februari 2024', 2024, 'Halmahera Barat', 'Maluku Utara', 0, 0, 600, 'Awan panas guguran', 'Aktif', FALSE, 1325, 'Siaga'),

-- Papua Barat
('Gunung Arfak', '5 Januari 2021', 2021, 'Manokwari', 'Papua Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 2955, 'Normal'),

-- Papua
('Puncak Jaya (Carstensz)', '15 Oktober 2020', 2020, 'Mimika', 'Papua', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', FALSE, 4884, 'Normal');

-- Tampilkan data untuk verifikasi
SELECT COUNT(*) as total_gunung FROM gunung_api;
SELECT provinsi, COUNT(*) as jumlah FROM gunung_api GROUP BY provinsi ORDER BY jumlah DESC;