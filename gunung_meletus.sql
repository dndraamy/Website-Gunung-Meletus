-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2025 pada 14.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunung_meletus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_users`
--

INSERT INTO `admin_users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin 1', 'admin1@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gunung`
--

CREATE TABLE `data_gunung` (
  `id` int(11) NOT NULL,
  `nama_gunung` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `lon` decimal(10,6) DEFAULT NULL,
  `ketinggian` int(11) DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `geologi` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
  `jalur_evakuasi` text DEFAULT NULL,
  `zona_merah` text DEFAULT NULL,
  `zona_kuning` text DEFAULT NULL,
  `zona_hijau` text DEFAULT NULL,
  `titik_kumpul` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tipe_gunung` varchar(50) DEFAULT NULL,
  `bentuk_gunung` varchar(50) DEFAULT NULL,
  `letusan_terakhir` varchar(100) DEFAULT NULL,
  `suhu_magma` varchar(100) DEFAULT NULL,
  `tipe_batuan` varchar(100) DEFAULT NULL,
  `mineral_dominan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_gunung`
--

INSERT INTO `data_gunung` (`id`, `nama_gunung`, `lokasi`, `lat`, `lon`, `ketinggian`, `sejarah`, `geologi`, `status`, `rekomendasi`, `jalur_evakuasi`, `zona_merah`, `zona_kuning`, `zona_hijau`, `titik_kumpul`, `gambar`, `tipe_gunung`, `bentuk_gunung`, `letusan_terakhir`, `suhu_magma`, `tipe_batuan`, `mineral_dominan`, `created_at`, `update_at`) VALUES
(1, 'Gunung Merapi', 'Jawa Tengah & Yogyakarta', -7.540000, 110.446000, 2930, 'Gunung Merapi merupakan gunung api teraktif di Indonesia dengan sejarah letusan yang panjang. Letusan pertama tercatat pada tahun 1600 dan sejak itu terus menunjukkan aktivitas vulkanik yang signifikan.\n\nMerapi memiliki siklus erupsi setiap 2-5 tahun dengan erupsi besar setiap 10-15 tahun. Letusan besar terakhir terjadi pada tahun 2010 yang mengakibatkan dampak signifikan pada wilayah sekitarnya.', 'Merapi merupakan gunung api tipe stratovolcano dengan komposisi batuan andesit-basaltik. Struktur gunung ini ditandai dengan kubah lava yang terus tumbuh dan runtuh secara berkala.\n\nKarakteristik geologi Merapi termasuk:\n• Tipe magma andesitik-basaltik\n• Sistem plumbing yang kompleks\n• Pertumbuhan kubah lava yang cepat\n• Aliran piroklastik yang dominan', 'Siaga', 'Waspada Awan Panas Guguran (APG) dan lahar hujan. Dilarang di radius 5km dari puncak.', 'Jika Anda di Zona MERAH: Segera bergerak diwaktu tercepat. Langkah: (1) Bawa tas darurat, anak & lansia diutamakan; (2) Dari posko desa, ambil jalan utama ke selatan ?2 km sampai SPBU, belok kanan; (3) Lanjutkan 1.2 km melewati jembatan kecil; (4) Sampai di Lapangan Umbulharjo lapor ke posko. Jangan melewati alur sungai/lubuk.', 'Kaliurang, Kinahrejo, Deles', 'Sleman Utara, Boyolali Barat, Magelang Timur', NULL, 'Lapangan Denggung Sleman, Lapangan Tegalrejo Magelang', 'merapi.jpg', 'Aktif', 'Stratovolcano', '2023', '800-1200°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:30'),
(2, 'Gunung Semeru', 'Jawa Timur', -8.108000, 112.922000, 3676, 'Gunung Semeru merupakan gunung tertinggi di Pulau Jawa dan sering mengalami erupsi kecil setiap tahun.', 'Stratovulkan aktif yang terbentuk dari aktivitas vulkanik berulang.', 'Waspada', 'Waspada lahar hujan dan guguran lava. Dilarang beraktivitas di sektor tenggara sejauh 13 km.', 'Zona Merah (Curah Kobokan, Supiturang): Wajib evakuasi mengikuti rambu kuning ke Titik Kumpul terdekat. Hindari seluruh alur sungai/DAS. Gunakan masker/kain basah saat hujan abu. Zona Kuning: Tingkatkan kewaspadaan dan siapkan tas siaga.', 'Curah Kobokan, Besuk Kobokan', 'Candipuro, Pronojiwo, Lumajang Kota', NULL, 'Balai Desa Supiturang, Lapangan Pasirian', 'semeru.jpg', '', '', '', '', '', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:30'),
(3, 'Gunung Bromo', 'Jawa Timur', -7.942000, 112.953000, 2329, 'Gunung Bromo merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Gunung ini memiliki kawah yang aktif dengan aktivitas letusan kecil yang terjadi secara berkala.\n\nBromo dianggap suci oleh masyarakat Tengger dan menjadi lokasi upacara Kasada setiap tahunnya.', 'Bromo adalah gunung api maar yang terletak dalam kaldera Tengger. Karakteristik geologinya unik dengan kawah yang aktif mengeluarkan asap belerang secara terus menerus.\n\nFitur geologi utama:\n• Kaldera Tengger selebar 10 km\n• Kawah aktif dengan diameter 800 m\n• Material vulkanik andesitik\n• Sistem hydrothermal yang aktif', 'Normal', 'Pengunjung diperbolehkan hingga bibir kawah dengan tetap memperhatikan kondisi cuaca dan aktivitas vulkanik.\n\nPeringatan keselamatan:\n• Gunakan masker di sekitar kawah\n• Hindari angin yang membawa gas beracun\n• Ikuti jalur yang ditentukan\n• Perhatikan kondisi cuaca', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'bromo.jpg', 'Aktif', 'Stratovolcano', '2021', '600-800°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(4, 'Gunung Sinabung', 'Sumatera Utara', 3.160000, 98.392000, 2460, 'Gunung Sinabung mengalami kebangkitan aktivitas vulkanik setelah 400 tahun tertidur. Letusan pertama dalam era modern terjadi pada tahun 2010 dan sejak itu menunjukkan aktivitas yang intensif.\n\nGunung ini telah menyebabkan pengungsian besar-besaran penduduk di sekitarnya.', 'Sinabung adalah stratovolcano andesitik-dasitik dengan sejarah letusan eksplosif. Gunung ini memiliki karakteristik:\n• Kubah lava yang tumbuh cepat\n• Letusan eksplosif dengan kolom abu tinggi\n• Aliran piroklastik yang ekstensif\n• Lava kental dengan kandungan silika tinggi', 'Waspada', 'Waspada awan panas dan guguran lava, dilarang di radius 3km, sektor tenggara 4km.', 'Masyarakat di sekitar Sektor Selatan dan Timur wajib evakuasi segera ke lokasi aman yang telah ditentukan di Kabanjahe. Jauhi area yang merupakan jalur luncuran awan panas, khususnya pada radius 5 km.', 'Desa Sigarang-garang, Sukanalu', 'Berastagi, Kabanjahe, Tiga Pancur', NULL, 'Lapangan Kabanjahe, Kompleks Kantor Bupati Karo', 'sinabung.jpg', 'Aktif', 'Stratovolcano', '2022', '700-900°C', 'Dasit-Andesit', 'Plagioklas & Kuarsa', '2025-11-11 18:12:32', '2025-11-16 11:17:31'),
(5, 'Gunung Kerinci', 'Jambi, Sumatera', -1.697000, 101.265000, 3805, 'Gunung Kerinci merupakan gunung api tertinggi di Indonesia dan salah satu gunung api teraktif di Sumatera. Gunung ini memiliki kawah berisi danau belerang yang aktif.', 'Kerinci adalah stratovolcano andesitik dengan kawah kompleks. Gunung ini memiliki sistem hydrothermal yang aktif dan sering mengeluarkan gas belerang.', 'Waspada', 'Dilarang mendekat kawah dalam radius 3km. Waspada letusan freatik dan gas beracun.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Pelompek, Kersik Tuo', 'Kayu Aro, Lempur, Desa Siulak', NULL, 'Lapangan Sungai Penuh, Balai Desa Siulak', 'kerinci.jpg', 'Aktif', 'Stratovolcano', '2022', '600-900°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(6, 'Gunung Rinjani', 'Lombok, NTB', -8.417000, 116.467000, 3726, 'Gunung Rinjani memiliki kaldera besar dengan danau Segara Anak di dalamnya. Gunung Baru Jari tumbuh di dalam kaldera ini dan aktif mengeluarkan asap.', 'Rinjani adalah gunung api kompleks dengan kaldera besar. Gunung Baru Jari di dalamnya merupakan kerucut vulkanik baru yang terus aktif.', 'Normal', 'Pendaki boleh hingga bibir kawah dengan pengawasan. Hindari gas beracun dari Gunung Baru Jari.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'rinjani.jpg', 'Aktif', 'Stratovolcano', '2016', '700-1000°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(7, 'Gunung Kelud', 'Jawa Timur', -7.930000, 112.308000, 1731, 'Gunung Kelud dikenal dengan letusan eksplosifnya yang dahsyat. Sebelum letusan 2014, kawahnya berisi danau kawah yang besar.', 'Kelud memiliki sistem magma yang unik dengan letusan eksplosif periodik. Setelah letusan 2014, terbentuk kubah lava di kawah.', 'Normal', 'Status normal namun tetap waspada. Kunjungan ke kawah harus dengan izin dan pengawasan.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'kelud.jpg', 'Aktif', 'Stratovolcano', '2014', '800-1100°C', 'Dasit', 'Plagioklas & Kuarsa', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(8, 'Gunung Agung', 'Bali', -8.342000, 115.506000, 3031, 'Gunung Agung merupakan gunung suci bagi masyarakat Bali. Letusan besar terakhir terjadi pada tahun 1963 yang sangat dahsyat.', 'Agung adalah stratovolcano andesitik dengan karakteristik letusan eksplosif. Gunung ini memiliki periode istirahat yang panjang di antara letusan besar.', 'Waspada', 'Dilarang beraktivitas dalam radius 4km. Waspada abu vulkanik dan gempa.', 'Evakuasi mengikuti arah jalan utama menuju selatan/tenggara (menjauhi puncak). Prioritaskan evakuasi ke GOR Swecapura atau lokasi aman lainnya yang ditetapkan BPBD Karangasem. Dilarang keras berada dalam radius 4 km dari kawah.', 'Desa Jungutan, Desa Besakih', 'Desa Sebudi, Rendang, Selat', NULL, 'Lapangan Rendang, Lapangan Karangasem', 'agung.jpg', 'Aktif', 'Stratovolcano', '2019', '850-1150°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:30'),
(9, 'Gunung Soputan', 'Sulawesi Utara', 1.111000, 124.733000, 1784, 'Gunung Soputan merupakan salah satu gunung api teraktif di Sulawesi dengan frekuensi letusan yang tinggi dalam beberapa tahun terakhir.', 'Soputan adalah stratovolcano andesitik dengan letusan efusif dan eksplosif. Sering menghasilkan aliran lava dan awan panas.', 'Siaga', 'Dilarang beraktivitas dalam radius 4km dari puncak. Waspada luncuran lava dan abu.', 'Peringatan Tingkat III (Siaga). Bersiap untuk evakuasi. Pastikan semua anggota keluarga mengetahui rute evakuasi dan Titik Kumpul. Siapkan kendaraan dan perlengkapan P3K/tas siaga. Jauhi area KRB II dan aliran sungai.', 'Desa Tounelet, Pangu', 'Desa Kembuan, Desa Tountimomor', NULL, 'Lapangan Tountimomor, Kantor Camat Ratahan', 'soputan.jpg', 'Aktif', 'Stratovolcano', '2023', '750-1000°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(10, 'Gunung Lokon', 'Sulawesi Utara', 1.358000, 124.792000, 1580, 'Gunung Lokon sering menunjukkan aktivitas vulkanik dengan letusan kecil berkala. Bersama dengan Gunung Empung membentuk kompleks vulkanik.', 'Lokon adalah gunung api doble dengan kawah aktif Tompaluan. Memiliki karakteristik letusan freatik dan magmatik.', 'Waspada', 'Dilarang mendekat kawah Tompaluan dalam radius 2.5km. Waspada letusan eksplosif.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Desa Kakaskasen, Kinilow', 'Desa Tinoor, Kota Tomohon', NULL, 'Lapangan Tomohon, Kantor Walikota Tomohon', 'lokon.jpg', 'Aktif', 'Stratovolcano', '2015', '600-850°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(11, 'Gunung Ijen', 'Jawa Timur', -8.058000, 114.244000, 2799, 'Gunung Ijen terkenal dengan danau kawah asam berwarna turquoise dan blue fire (api biru) yang hanya ada dua di dunia.', 'Ijen adalah kompleks vulkanik dengan kawah asam terbesar di dunia. Aktivitas dominan adalah fumarolik dengan emisi gas belerang tinggi.', 'Waspada', 'Dilarang mendekat kawah dalam radius 1.5km. Waspada gas beracun (CO2 dan SO2).', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Paltuding, Kawah Ijen', 'Desa Licin, Desa Tamansari, Desa Kemiren', NULL, 'Balai Desa Licin, Area Lapangan Sempol', 'ijen.jpg', 'Aktif', 'Stratovolcano', '1999', '200-600°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(12, 'Gunung Talang', 'Sumatera Barat', -0.970000, 100.679000, 2597, 'Gunung Talang memiliki dua kawah aktif dengan danau kawah yang indah. Aktivitas vulkanik ditandai dengan emisi gas dan uap.', 'Talang adalah stratovolcano dengan sistem fumarolik aktif. Memiliki beberapa kawah dengan karakteristik berbeda.', 'Normal', 'Pendakian diperbolehkan dengan tetap menjaga jarak dari kawah aktif.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'talang.jpg', 'Aktif', 'Stratovolcano', '2007', '500-800°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(13, 'Gunung Gamalama', 'Ternate, Maluku Utara', 0.800000, 127.333000, 1715, 'Gunung Gamalama merupakan gunung api pulau yang membentuk Pulau Ternate. Memiliki sejarah letusan yang panjang sejak abad ke-16.', 'Gamalama adalah stratovolcano basaltik-andesitik dengan letusan eksplosif dan efusif. Sering menghasilkan aliran lava.', 'Waspada', 'Dilarang beraktivitas dalam radius 1.5km dari puncak. Waspada letusan dan abu.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Desa Dufa-Dufa, Fora', 'Kota Ternate, Pulau Hiri, Ternate Selatan', NULL, 'Lapangan Salero, Kompleks Benteng Oranje', 'gamalama.jpg', 'Aktif', 'Stratovolcano', '2018', '800-1100°C', 'Basalt-Andesit', 'Plagioklas & Olivin', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(14, 'Gunung Papandayan', 'Jawa Barat', -7.317000, 107.733000, 2665, 'Gunung Papandayan dikenal dengan kawah mati dan kawah aktifnya yang mengeluarkan gas belerang. Letusan besar tahun 1772 menghancurkan 40 desa.', 'Papandayan adalah kompleks vulkanik dengan beberapa kawah aktif. Dominan aktivitas fumarolik dengan suhu tinggi.', 'Waspada', 'Dilarang mendekat kawah dalam radius 2km. Waspada gas beracun dan letusan freatik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Baru, Kawah Manuk', 'Desa Cisurupan, Desa Sukanagara, Garut Kota', NULL, 'Lapangan Cisurupan, Alun-alun Garut', 'papandayan.jpg', 'Aktif', 'Stratovolcano', '2002', '300-800°C', 'Dasit', 'Plagioklas & Kuarsa', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(15, 'Gunung Tambora', 'Sumbawa, NTB', -8.250000, 118.000000, 2850, 'Gunung Tambora terkenal dengan letusan super pada tahun 1815 yang merupakan letusan terbesar dalam sejarah modern. Letusan ini mengubah iklim global dan menciptakan kaldera raksasa.', 'Tambora adalah stratovolcano dengan kaldera besar selebar 6 km. Pasca letusan 1815, terbentuk kerucut baru (Doro Api Toi) di dalam kaldera.', 'Normal', 'Kunjungan ke kaldera diperbolehkan dengan pengawasan. Waspada terhadap gas beracun di dasar kaldera.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'tambora.jpg', 'Aktif', 'Stratovolcano', '1967', '700-1000°C', 'Dasit-Riolit', 'Kuarsa & Feldspar Alkali', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(16, 'Gunung Krakatau', 'Selat Sunda', -6.102000, 105.423000, 813, 'Anak Krakatau tumbuh dari kaldera letusan super Krakatau 1883. Letusan 2018 menyebabkan tsunami dan mengubah bentuk gunung secara dramatis.', 'Anak Krakatau adalah gunung api strato yang sangat aktif, tumbuh dari kaldera Krakatau. Sering mengalami letusan strombolian dan pembentukan kubah lava.', 'Awas', 'Evakuasi di radius 7km wajib, siapkan jalur laut dan darat menuju titik kumpul.', 'Peringatan Tingkat IV (Awas). Evakuasi wajib dan segera. Ikuti jalur evakuasi yang ditandai, menuju Titik Kumpul terdekat. Utamakan keselamatan lansia, anak-anak, dan bawa tas siaga bencana. Dilarang berada dalam radius yang ditentukan PVMBG.', 'Pulau Sebesi, Pulau Sebuku', 'Desa Canti, Desa Rajabasa, Dermaga Kalianda', NULL, 'Pelabuhan Merak, Lapangan Kalianda', 'krakatau.jpg', 'Aktif', 'Kaldera', '2022', '800-1100°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(17, 'Gunung Batur', 'Bali', -8.242000, 115.375000, 1717, 'Gunung Batur terletak dalam kaldera ganda yang spektakuler. Memiliki sejarah letusan yang panjang dengan kaldera terbentuk sekitar 29.000 tahun lalu.', 'Batur adalah gunung api kompleks dalam kaldera. Memiliki beberapa kerucut parasit dan kawah aktif yang sering meletus.', 'Waspada', 'Dilarang mendekat kawah dalam radius 1.5km. Waspada letusan freatik dan gas beracun.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Batur I, Area Danau Batur', 'Desa Batur Tengah, Kedisan, Kintamani', NULL, 'Lapangan Kintamani, Balai Desa Kedisan', 'batur.jpg', 'Aktif', 'Kaldera', '2000', '600-900°C', 'Basalt', 'Plagioklas & Olivin', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(18, 'Gunung Sumbing', 'Jawa Tengah', -7.383000, 110.050000, 3370, 'Gunung Sumbing merupakan gunung api aktif yang memiliki kawah ganda. Aktivitas terakhir berupa emisi fumarol dan solfatara.', 'Sumbing adalah stratovolcano andesitik dengan kawah kompleks. Memiliki aktivitas fumarolik di kawah utama.', 'Normal', 'Status normal, pendakian diperbolehkan dengan tetap waspada terhadap gas beracun.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'sumbing.jpg', 'Aktif', 'Stratovolcano', '1730', '500-800°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(19, 'Gunung Sundoro', 'Jawa Tengah', -7.300000, 109.983000, 3136, 'Gunung Sundoro memiliki kawah yang masih aktif dengan fumarol dan solfatara. Letusan terakhir terjadi pada abad ke-19.', 'Sundoro adalah stratovolcano andesitik dengan kawah yang dalam. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian aman dengan tetap menjaga jarak dari kawah aktif.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'sundoro.jpg', 'Aktif', 'Stratovolcano', '1903', '400-700°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(20, 'Gunung Dieng', 'Jawa Tengah', -7.200000, 109.917000, 2565, 'Kompleks Dieng merupakan dataran tinggi vulkanik dengan banyak kawah aktif, fumarol, dan danau vulkanik. Sering terjadi letusan freatik.', 'Dieng adalah kompleks vulkanik dengan multiple kawah. Aktivitas dominan freatik dengan emisi gas CO2 beracun.', 'Waspada', 'Dilarang mendekat kawah Sikidang dalam radius 1km. Waspada emisi gas CO2 mematikan.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Sikidang, Kawah Sileri', 'Desa Dieng Kulon, Kepakisan, Banjarnegara', NULL, 'Balai Desa Dieng, Alun-alun Wonosobo', 'dieng.jpg', 'Aktif', 'Kompleks Vulkanik', '2021', '200-500°C', 'Andesit-Dasit', 'Plagioklas & Kuarsa', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(21, 'Gunung Slamet', 'Jawa Tengah', -7.242000, 109.208000, 3428, 'Gunung Slamet merupakan gunung api teraktif di Jawa Tengah dengan letusan berkala. Sering mengeluarkan abu vulkanik dan suara gemuruh.', 'Slamet adalah stratovolcano andesitik besar dengan kawah aktif. Sering mengalami leturan strombolian dan emisi abu.', 'Waspada', 'Dilarang beraktivitas dalam radius 2km dari puncak. Waspada letusan abu.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Pos Bambangan, Pos Guci', 'Desa Gambuhan, Serang, Pemalang', NULL, 'Lapangan Purbalingga, Alun-alun Brebes', 'slamet.jpg', 'Aktif', 'Stratovolcano', '2014', '700-1000°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(22, 'Gunung Ciremai', 'Jawa Barat', -6.892000, 108.400000, 3078, 'Gunung Ciremai merupakan gunung api tertinggi di Jawa Barat. Memiliki kawah ganda dengan aktivitas fumarolik.', 'Ciremai adalah stratovolcano andesitik dengan kawah yang relatif tenang. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian diperbolehkan dengan tetap waspada terhadap perubahan aktivitas.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'ciremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(23, 'Gunung Gede', 'Jawa Barat', -6.783000, 106.967000, 2958, 'Gunung Gede merupakan gunung api aktif yang memiliki beberapa kawah aktif. Sering terjadi letusan freatik kecil.', 'Gede adalah gunung api kompleks dengan multiple kawah aktif. Aktivitas fumarolik dan solfatarik intensif.', 'Waspada', 'Dilarang mendekat kawah dalam radius 1.5km. Waspada gas dan letusan freatik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Lanang, Kawah Ratu', 'Cipanas, Selabintana, Cisaat', NULL, 'Lapangan Cipanas, Alun-alun Sukabumi', 'gede.jpg', 'Aktif', 'Stratovolcano', '2022', '300-600°C', 'Andesit-Dasit', 'Plagioklas & Kuarsa', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(24, 'Gunung Salak', 'Jawa Barat', -6.720000, 106.740000, 2211, 'Gunung Salak merupakan kompleks vulkanik dengan beberapa puncak. Memiliki sejarah letusan freatik yang berbahaya bagi penerbangan.', 'Salak adalah kompleks vulkanik dengan kawah aktif. Sering mengeluarkan gas vulkanik yang mengganggu penerbangan.', 'Normal', 'Waspada gas vulkanik di area kawah. Informasi penting bagi penerbangan.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'salak.jpg', 'Aktif', 'Stratovolcano', '1938', '400-700°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(25, 'Gunung Galunggung', 'Jawa Barat', -7.333000, 108.050000, 2168, 'Gunung Galunggung terkenal dengan letusan 1982 yang mengganggu penerbangan internasional. Memiliki kawah dengan danau yang indah.', 'Galunggung adalah stratovolcano dengan kawah danau. Pasca letusan 1982, terbentuk kubah lava di dalam kawah.', 'Normal', 'Kunjungan ke kawah diperbolehkan. Danau kawah aman untuk dikunjungi.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'galunggung.jpg', 'Aktif', 'Stratovolcano', '1984', '600-900°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(26, 'Gunung Tangkuban Parahu', 'Jawa Barat', -6.772000, 107.604000, 2084, 'Gunung Tangkuban Parahu merupakan gunung api aktif yang populer untuk wisata. Memiliki beberapa kawah aktif dengan fumarol aktif.', 'Tangkuban Parahu adalah stratovolcano dengan multiple kawah. Kawah Ratu dan Domas aktif mengeluarkan gas belerang.', 'Waspada', 'Dilarang mendekat Kawah Ratu dalam radius 500 meter. Waspada gas beracun dan letusan freatik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Ratu, Kawah Upas', 'Lembang, Cikole, Subang Selatan', NULL, 'Lapangan Lembang, Alun-alun Subang', 'tangkuban.jpg', 'Aktif', 'Stratovolcano', '2019', '200-500°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(27, 'Gunung Ceremai', 'Jawa Barat', -6.892000, 108.400000, 3078, 'Gunung Ceremai memiliki bentuk yang simetris dan merupakan gunung api tertinggi di Jawa Barat. Aktivitas terakhir berupa emisi fumarol.', 'Ceremai adalah stratovolcano andesitik dengan kawah ganda. Aktivitas fumarolik lemah di kawah utama.', 'Normal', 'Pendakian aman dengan izin. Tetap pantau informasi terbaru.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'ceremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(28, 'Gunung Lawu', 'Jawa Timur', -7.625000, 111.192000, 3265, 'Gunung Lawu merupakan gunung api yang dianggap keramat dengan banyak situs spiritual. Aktivitas vulkanik terakhir pada abad ke-19.', 'Lawu adalah stratovolcano andesitik dengan aktivitas fumarolik lemah. Memiliki beberapa kawah yang sudah tidak aktif.', 'Normal', 'Pendakian diperbolehkan. Status normal dengan aktivitas minimal.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'lawu.jpg', 'Aktif', 'Stratovolcano', '1885', '400-700°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(29, 'Gunung Welirang', 'Jawa Timur', -7.883000, 112.583000, 3156, 'Gunung Welirang terkenal dengan deposit belerangnya yang ditambang secara tradisional. Memiliki fumarol dan solfatara aktif.', 'Welirang adalah stratovolcano dengan aktivitas fumarolik intensif. Emisi gas belerang sangat tinggi di area puncak.', 'Waspada', 'Dilarang mendekat kawah dalam radius 1km. Waspada gas beracun dan letusan.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Welirang', 'Desa Pacet, Trawas, Prigen', NULL, 'Lapangan Trawas, Alun-alun Mojokerto', 'welirang.jpg', 'Aktif', 'Stratovolcano', '1952', '200-600°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(30, 'Gunung Arjuno', 'Jawa Timur', -7.725000, 112.583000, 3339, 'Gunung Arjuno merupakan kompleks vulkanik dengan beberapa puncak. Memiliki kawah yang sudah tidak aktif dengan danau kecil.', 'Arjuno adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama sudah tidak menunjukkan aktivitas signifikan.', 'Normal', 'Pendakian aman. Tidak ada larangan khusus saat status normal.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'arjuno.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(31, 'Gunung Lamongan', 'Jawa Timur', -8.000000, 113.342000, 1651, 'Gunung Lamongan memiliki banyak kawah kecil dan danau vulkanik. Aktivitas terakhir berupa letusan freatik pada abad ke-19.', 'Lamongan adalah gunung api dengan banyak kerucut parasit. Memiliki danau kawah dan aktivitas fumarolik lemah.', 'Normal', 'Status normal, kunjungan diperbolehkan dengan pengawasan.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'lamongan.jpg', 'Aktif', 'Stratovolcano', '1898', '500-800°C', 'Basalt', 'Plagioklas & Olivin', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(32, 'Gunung Raung', 'Jawa Timur', -8.125000, 114.045000, 3332, 'Gunung Raung memiliki kaldera yang sangat besar dan dalam. Sering mengeluarkan abu vulkanik yang mengganggu penerbangan di Bali.', 'Raung adalah stratovolcano dengan kaldera besar. Sering mengalami leturan strombolian dan emisi abu tinggi.', 'Siaga', 'Dilarang mendekat dalam radius 3km dari kawah. Waspada abu vulkanik.', 'Peringatan Tingkat III (Siaga). Bersiap untuk evakuasi. Pastikan semua anggota keluarga mengetahui rute evakuasi dan Titik Kumpul. Siapkan kendaraan dan perlengkapan P3K/tas siaga. Jauhi area KRB II dan aliran sungai.', 'Desa Sumberarum, Pondok Curahdami', 'Desa Bajulmati, Desa Kalibaru, Kecamatan Songgon', NULL, 'Balai Desa Kalibaru, Lapangan Krikilan', 'raung.jpg', 'Aktif', 'Stratovolcano', '2021', '700-1000°C', 'Andesit-Basalt', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:49'),
(33, 'Gunung Iyang', 'Jawa Timur', -7.880000, 113.560000, 2550, 'Gunung Iyang merupakan kompleks vulkanik dengan beberapa puncak. Aktivitas terakhir berupa emisi fumarol pada abad ke-20.', 'Iyang adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama menunjukkan aktivitas minimal.', 'Normal', 'Pendakian diperbolehkan. Tidak ada pembatasan khusus.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'iyang.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(34, 'Gunung Argopuro', 'Jawa Timur', -8.100000, 113.583000, 3088, 'Gunung Argopuro memiliki kaldera besar dan merupakan gunung api yang sudah lama tidak aktif. Memiliki danau kawah yang indah.', 'Argopuro adalah stratovolcano dengan kaldera. Aktivitas vulkanik sangat rendah, didominasi oleh fumarol lemah.', 'Normal', 'Status normal, pendakian panjang tetapi aman.', 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, 'argopuro.jpg', 'Aktif', 'Stratovolcano', 'Tidak tercatat', '300-600°C', 'Andesit', 'Plagioklas & Piroksen', '2025-11-11 18:12:32', '2025-11-16 11:17:50'),
(64, 'Gunung Leuser', 'Aceh Tenggara', 3.867000, 97.283000, 3404, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(65, 'Gunung Burni Telong', 'Bener Meriah', 4.092000, 96.817000, 2645, 'Emisi gas vulkanik', NULL, 'Waspada', 'Dilarang mendekat kawah dalam radius 2km. Waspada letusan freatik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Desa Rembune, Simpang Tiga', 'Kota Takengon, Bener Meriah', NULL, 'Lapangan Takengon, Kantor Bupati Bener Meriah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(67, 'Gunung Sibayak', 'Karo', 3.220000, 98.510000, 2094, 'Aktivitas fumarol', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(68, 'Gunung Marapi', 'Agam & Tanah Datar', -0.380000, 100.473000, 2891, 'Awan panas, abu vulkanik', NULL, 'Siaga', 'Dilarang mendaki dan beraktivitas dalam radius 3km dari kawah Verbeek. Waspada letusan tiba-tiba.', 'Peringatan Tingkat III (Siaga). Bersiap untuk evakuasi. Pastikan semua anggota keluarga mengetahui rute evakuasi dan Titik Kumpul. Siapkan kendaraan dan perlengkapan P3K/tas siaga. Jauhi area KRB II dan aliran sungai.', 'Nagari Bukik Batabuah, Nagari Batipuh', 'Nagari Sungai Puar, Padang Panjang', NULL, 'Lapangan Gantiang, Area Batusangkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(69, 'Gunung Singgalang', 'Agam', -0.395000, 100.320000, 2877, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(70, 'Gunung Tandikat', 'Padang Pariaman', -0.438000, 100.315000, 2438, 'Peningkatan suhu', NULL, 'Waspada', 'Dilarang mendaki dalam radius 1.5km dari kawah. Waspada gas beracun.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Malalak, Sicincin', 'Padang Pariaman, Desa Tandikek', NULL, 'Lapangan Sicincin, Kantor Camat Malalak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(72, 'Gunung Dempo', 'Pagar Alam', -4.032000, 103.137000, 3173, 'Emisi gas belerang', NULL, 'Waspada', 'Dilarang mendekat kawah dalam radius 1.5km. Waspada gas beracun dan abu.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Pagaralam', 'Kota Pagaralam, Lahat Selatan', NULL, 'Lapangan Pagaralam, Alun-alun Lahat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(73, 'Gunung Rajabasa', 'Lampung Selatan', -5.787000, 105.617000, 1281, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(74, 'Gunung Pesagi', 'Lampung Barat', -5.000000, 104.050000, 2230, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(75, 'Gunung Kaba', 'Rejang Lebong', -3.500000, 102.617000, 1940, 'Aktivitas fumarol', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(76, 'Gunung Karang', 'Pandeglang', -6.267000, 106.050000, 1778, 'Aktivitas seismik', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(77, 'Gunung Gede Pangrango', 'Sukabumi & Cianjur', -6.783000, 106.967000, 2958, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(78, 'Gunung Tangkuban Perahu', 'Bandung Barat', -6.772000, 107.604000, 2084, 'Erupsi freatik, kawasan wisata ditutup', NULL, 'Waspada', 'Dilarang mendekat Kawah Ratu dalam radius 500 meter. Waspada gas beracun dan letusan freatik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Ratu, Kawah Upas', 'Lembang, Cikole, Subang Selatan', NULL, 'Lapangan Lembang, Alun-alun Subang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(80, 'Gunung Merbabu', 'Magelang & Boyolali', -7.458000, 110.433000, 3145, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(83, 'Gunung Sindoro', 'Temanggung & Wonosobo', -7.300000, 109.992000, 3136, 'Emisi abu vulkanik', NULL, 'Waspada', 'Dilarang beraktivitas dalam radius 1km. Waspada letusan abu.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Kawah Sigedang', 'Desa Kledung, Desa Kwadungan, Parakan', NULL, 'Lapangan Parakan, Alun-alun Temanggung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(93, 'Gunung Inerie', 'Ngada', -8.847000, 120.940000, 2245, 'Aktivitas fumarol', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(94, 'Gunung Egon', 'Sikka', -8.670000, 122.450000, 1703, 'Emisi gas vulkanik', NULL, 'Waspada', 'Dilarang beraktivitas dalam radius 1.5km. Waspada letusan freatik dan abu.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Desa Waioti, Desa Sikka', 'Desa Hewa, Maumere', NULL, 'Lapangan Sikka, Kantor Bupati Sikka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(95, 'Gunung Lewotobi', 'Flores Timur', -8.558000, 122.763000, 1703, 'Abu vulkanik', NULL, 'Waspada', 'Dilarang mendekat kawah dalam radius 2km. Waspada abu vulkanik.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Desa Boru, Desa Konga', 'Flores Timur, Desa Waienga', NULL, 'Lapangan Konga, Kantor Camat Wulanggitang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(96, 'Gunung Niut', 'Bengkayang', 1.633000, 109.117000, 1701, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(97, 'Gunung Bukit Raya', 'Katingan', -0.400000, 112.520000, 2278, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(98, 'Gunung Lumut', 'Paser', -0.833000, 103.950000, 1582, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(101, 'Gunung Ambang', 'Bolaang Mongondow Timur', 0.750000, 124.450000, 1830, 'Aktivitas seismik', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(102, 'Gunung Rantemario', 'Luwu', -3.375000, 120.017000, 3478, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(103, 'Gunung Latimojong', 'Enrekang', -3.367000, 120.000000, 3478, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(104, 'Gunung Mekongga', 'Kolaka', -3.550000, 121.283000, 2650, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(105, 'Gunung Banda Api', 'Maluku Tengah', -4.520000, 129.875000, 641, 'Erupsi kecil, pemukiman terdampak abu', NULL, 'Waspada', 'Dilarang mendekat kawah dalam radius 1km. Waspada tsunami kecil jika terjadi letusan besar.', 'Peringatan Tingkat II (Waspada). Tingkatkan kesiapsiagaan. Masyarakat diimbau untuk tidak mendekati kawah dalam radius 1-3 km. Awasi informasi resmi secara berkala dan pastikan jalur evakuasi sudah dipahami.', 'Pulau Banda Neira, Pulau Rhun', 'Maluku Tengah, Pulau Lontor', NULL, 'Dermaga Banda Neira, Lapangan Lontor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(107, 'Gunung Dukono', 'Halmahera Utara', 1.685000, 127.892000, 1229, 'Emisi abu terus menerus', NULL, 'Siaga', 'Jauhi radius 3km dari kawah Malupang Warirang. Waspada abu vulkanik tebal.', 'Peringatan Tingkat III (Siaga). Bersiap untuk evakuasi. Pastikan semua anggota keluarga mengetahui rute evakuasi dan Titik Kumpul. Siapkan kendaraan dan perlengkapan P3K/tas siaga. Jauhi area KRB II dan aliran sungai.', 'Desa Tobaru, Desa Mamuya', 'Desa Gamtala, Loleo', NULL, 'Kantor Camat Galela, Lapangan Tobelo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(108, 'Gunung Ibu', 'Halmahera Barat', 1.488000, 127.632000, 1325, 'Awan panas guguran', NULL, 'Siaga', 'Dilarang beraktivitas dalam radius 3.5km dari pusat aktivitas. Potensi awan panas.', 'Peringatan Tingkat III (Siaga). Bersiap untuk evakuasi. Pastikan semua anggota keluarga mengetahui rute evakuasi dan Titik Kumpul. Siapkan kendaraan dan perlengkapan P3K/tas siaga. Jauhi area KRB II dan aliran sungai.', 'Desa Togoreba Sungi, Desa Duabiku', 'Desa Sangaji, Desa Gamsungi', NULL, 'Lapangan Sangaji, Balai Desa Gamsungi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:49'),
(109, 'Gunung Arfak', 'Manokwari', -1.025000, 134.017000, 2955, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50'),
(110, 'Puncak Jaya (Carstensz)', 'Mimika', -4.083000, 137.183000, 4884, 'Aktivitas normal', NULL, 'Normal', NULL, 'Tingkat I (Normal). Aktivitas gunung normal. Tetap waspada terhadap perubahan cuaca dan ikuti peraturan pendakian jika berada di area gunung. Tidak ada jalur evakuasi khusus yang diaktifkan.', NULL, NULL, 'Area pendakian, area pemukiman di luar radius 1km', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-16 11:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_korban`
--

CREATE TABLE `data_korban` (
  `id` int(11) NOT NULL,
  `nama_gunung` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `meninggal` int(11) DEFAULT 0,
  `luka` int(11) DEFAULT 0,
  `pengungsi` int(11) DEFAULT 0,
  `dampak` text DEFAULT NULL,
  `prediksi` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_korban`
--

INSERT INTO `data_korban` (`id`, `nama_gunung`, `provinsi`, `tanggal`, `tahun`, `meninggal`, `luka`, `pengungsi`, `dampak`, `prediksi`, `created_at`, `updated_at`) VALUES
(1, 'Gunung Anak Krakatau', 'Lampung/Banten', '2018-12-22', 2018, 437, 1400, 36000, 'Tsunami, Erupsi Besar', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(2, 'Gunung Rinjani', 'Nusa Tenggara Barat', '2018-07-29', 2018, 0, 0, 1000, 'Gempa Vulkanik, Erupsi Freatik', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(3, 'Gunung Tangkuban Parahu', 'Jawa Barat (Bandung)', '2019-07-26', 2019, 0, 0, 0, 'Erupsi Freatik, Hujan Abu', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(4, 'Gunung Semeru', 'Jawa Timur', '2021-12-04', 2021, 51, 104, 10000, 'Awan Panas Guguran (APG), Lahar', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(5, 'Gunung Semeru', 'Jawa Timur', '2022-12-04', 2022, 0, 0, 2500, 'Awan Panas Guguran (APG)', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(6, 'Gunung Marapi', 'Sumatera Barat', '2023-12-03', 2023, 23, 0, 0, 'Erupsi Eksplosif, Lontaran Batu', 0, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(7, 'Gunung Dukono', 'Maluku Utara', '2024-05-15', 2024, 0, 0, 500, 'Abu Vulkanik (Prediksi)', 1, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(8, 'Gunung Ibu', 'Maluku Utara', '2024-05-20', 2024, 0, 0, 1200, 'Lava & Awan Panas (Prediksi)', 1, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(9, 'Gunung Merapi', 'Jawa Tengah', '2025-01-01', 2025, 0, 10, 5000, 'Lava & Awan Panas (Prediksi)', 1, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(10, 'Gunung Sinabung', 'Sumatera Utara', '2025-06-01', 2025, 0, 0, 800, 'Hujan Abu Tebal (Prediksi)', 1, '2025-11-16 12:16:33', '2025-11-16 12:16:33'),
(11, 'Gunung Karangetang', 'Sulawesi Utara', '2025-03-01', 2025, 0, 0, 0, 'Emisi Abu Kontinu (Prediksi)', 1, '2025-11-16 12:16:33', '2025-11-16 12:16:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_darurat`
--

CREATE TABLE `kontak_darurat` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `kategori` enum('Pusat','Medis','Keamanan','SAR','Lainnya') NOT NULL,
  `wilayah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontak_darurat`
--

INSERT INTO `kontak_darurat` (`id`, `instansi`, `deskripsi`, `nomor_telepon`, `kategori`, `wilayah`) VALUES
(1, 'Layanan Darurat Nasional', 'Darurat umum 24 jam', '112', 'Pusat', NULL),
(2, 'SAR / BASARNAS', 'Pencarian & pertolongan', '115', 'SAR', NULL),
(3, 'Ambulans / Posko Kesehatan', 'Panggilan medis darurat', '118', 'Medis', NULL),
(4, 'Panggilan Medis (Alternatif)', 'Panggilan medis darurat', '119', 'Medis', NULL),
(5, 'Polisi', 'Keamanan & pengaturan lalu lintas', '110', 'Keamanan', NULL),
(6, 'BPBD Kabupaten/Kota', 'Pusat informasi & koordinasi bencana', '113', 'Pusat', NULL),
(7, 'PMI', 'Palang Merah Indonesia', '021-42070', 'Medis', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keparahan` varchar(50) NOT NULL,
  `kerusakan` text NOT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `foto_path` varchar(255) DEFAULT NULL,
  `waktu_lapor` datetime NOT NULL,
  `status` enum('Belum Dikonfirmasi','Terkonfirmasi') DEFAULT 'Belum Dikonfirmasi',
  `id_gunung_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `nama_pelapor`, `telepon`, `lokasi`, `keparahan`, `kerusakan`, `kebutuhan`, `foto_path`, `waktu_lapor`, `status`, `id_gunung_fk`) VALUES
(0, 'Citra Mahadewi', '081122334455', 'Desa Warna Warni, Kec. Kampung Pelangi', 'Berat', 'Atap rumah hancur sebagian, listrik terputus.', 'Air mineral, Masker N95', 'uploads/laporan_6919a6714af56.jpg', '2025-11-16 17:24:49', 'Belum Dikonfirmasi', NULL),
(2, 'Andika Saputra', '087711223344', 'Dusun Sukamaju, Kec. Klungkung', 'Sedang', 'Jalan tertutup abu setebal 5 cm, jarak pandang rendah.', 'Masker, Kacamata Pelindung', '', '2025-11-09 11:34:04', 'Terkonfirmasi', NULL),
(3, 'Chris Evans', '089955544333', 'Kota Baru', 'Ringan', 'Getaran terasa ringan, tidak ada kerusakan fisik.', 'Informasi resmi', '', '2025-11-09 11:34:04', 'Terkonfirmasi', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringatan`
--

CREATE TABLE `peringatan` (
  `id` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_gunung_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peringatan`
--

INSERT INTO `peringatan` (`id`, `isi_pesan`, `tanggal_update`, `id_gunung_fk`) VALUES
(1, '                    PERINGATAN: Sistem memuat data Status Gunung Api. Selalu waspada dan ikuti arahan resmi.                ', '2025-11-16 10:21:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_korban`
--
ALTER TABLE `data_korban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_darurat`
--
ALTER TABLE `kontak_darurat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laporan_gunung` (`id_gunung_fk`);

--
-- Indeks untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gunung_peringatan` (`id_gunung_fk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `data_korban`
--
ALTER TABLE `data_korban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kontak_darurat`
--
ALTER TABLE `kontak_darurat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_korban`
--
ALTER TABLE `data_korban`
  ADD CONSTRAINT `fk_korban_gunung` FOREIGN KEY (`id`) REFERENCES `data_gunung` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_gunung` FOREIGN KEY (`id_gunung_fk`) REFERENCES `data_gunung` (`id`);

--
-- Ketidakleluasaan untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  ADD CONSTRAINT `fk_gunung_peringatan` FOREIGN KEY (`id_gunung_fk`) REFERENCES `data_gunung` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
