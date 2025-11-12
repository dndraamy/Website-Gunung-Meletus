-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2025 pada 19.15
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
-- Struktur dari tabel `data_gunung`
--

CREATE TABLE `data_gunung` (
  `id` int(11) NOT NULL,
  `nama_gunung` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `ketinggian` int(11) DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `geologi` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
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

INSERT INTO `data_gunung` (`id`, `nama_gunung`, `lokasi`, `ketinggian`, `sejarah`, `geologi`, `status`, `rekomendasi`, `gambar`, `tipe_gunung`, `bentuk_gunung`, `letusan_terakhir`, `suhu_magma`, `tipe_batuan`, `mineral_dominan`, `created_at`, `update_at`) VALUES
(1, 'Gunung Merapi', 'Jawa Tengah & Yogyakarta', 2930, 'Gunung Merapi merupakan gunung api teraktif di Indonesia dengan sejarah letusan yang panjang. Letusan pertama tercatat pada tahun 1600 dan sejak itu terus menunjukkan aktivitas vulkanik yang signifikan.\n\nMerapi memiliki siklus erupsi setiap 2-5 tahun dengan erupsi besar setiap 10-15 tahun. Letusan besar terakhir terjadi pada tahun 2010 yang mengakibatkan dampak signifikan pada wilayah sekitarnya.', 'Merapi merupakan gunung api tipe stratovolcano dengan komposisi batuan andesit-basaltik. Struktur gunung ini ditandai dengan kubah lava yang terus tumbuh dan runtuh secara berkala.\n\nKarakteristik geologi Merapi termasuk:\n• Tipe magma andesitik-basaltik\n• Sistem plumbing yang kompleks\n• Pertumbuhan kubah lava yang cepat\n• Aliran piroklastik yang dominan', 'Siaga', 'Masyarakat dihimbau untuk tidak beraktivitas dalam radius 3 km dari puncak Merapi.\n\nLangkah mitigasi yang harus dilakukan:\n1. Selalu pantau informasi terbaru dari PVMBG\n2. Siapkan masker untuk melindungi dari abu vulkanik\n3. Ketahui jalur evakuasi terdekat\n4. Siapkan tas siaga bencana\n5. Ikuti arahan dari pihak berwenang', 'merapi.jpg', 'Aktif', 'Stratovolcano', '2023', '800-1200°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-12 17:23:13'),
(2, 'Gunung Semeru', 'Jawa Timur', 3676, 'Gunung Semeru merupakan gunung tertinggi di Pulau Jawa dan sering mengalami erupsi kecil setiap tahun.', 'Stratovulkan aktif yang terbentuk dari aktivitas vulkanik berulang.', 'Waspada', 'Masyarakat diminta tidak beraktivitas dalam radius 1 km dari kawah Jonggring Saloka.', 'semeru.jpg', '', '', '', '', '', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(3, 'Gunung Bromo', 'Jawa Timur', 2329, 'Gunung Bromo merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Gunung ini memiliki kawah yang aktif dengan aktivitas letusan kecil yang terjadi secara berkala.\n\nBromo dianggap suci oleh masyarakat Tengger dan menjadi lokasi upacara Kasada setiap tahunnya.', 'Bromo adalah gunung api maar yang terletak dalam kaldera Tengger. Karakteristik geologinya unik dengan kawah yang aktif mengeluarkan asap belerang secara terus menerus.\n\nFitur geologi utama:\n• Kaldera Tengger selebar 10 km\n• Kawah aktif dengan diameter 800 m\n• Material vulkanik andesitik\n• Sistem hydrothermal yang aktif', 'Normal', 'Pengunjung diperbolehkan hingga bibir kawah dengan tetap memperhatikan kondisi cuaca dan aktivitas vulkanik.\n\nPeringatan keselamatan:\n• Gunakan masker di sekitar kawah\n• Hindari angin yang membawa gas beracun\n• Ikuti jalur yang ditentukan\n• Perhatikan kondisi cuaca', 'bromo.jpg', 'Aktif', 'Stratovolcano', '2021', '600-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(4, 'Gunung Sinabung', 'Sumatera Utara', 2460, 'Gunung Sinabung mengalami kebangkitan aktivitas vulkanik setelah 400 tahun tertidur. Letusan pertama dalam era modern terjadi pada tahun 2010 dan sejak itu menunjukkan aktivitas yang intensif.\n\nGunung ini telah menyebabkan pengungsian besar-besaran penduduk di sekitarnya.', 'Sinabung adalah stratovolcano andesitik-dasitik dengan sejarah letusan eksplosif. Gunung ini memiliki karakteristik:\n• Kubah lava yang tumbuh cepat\n• Letusan eksplosif dengan kolom abu tinggi\n• Aliran piroklastik yang ekstensif\n• Lava kental dengan kandungan silika tinggi', 'Waspada', 'Zona bahaya diperluas hingga radius 5 km dari puncak. Masyarakat di zona merah harus mengungsi dan tidak diperbolehkan beraktivitas.\n\nKewaspadaan:\n• Siap siaga untuk evakuasi\n• Pantau perkembangan aktivitas\n• Hindari lembah dan daerah aliran lahar', 'sinabung.jpg', 'Aktif', 'Stratovolcano', '2022', '700-900°C', 'Dasit-Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(5, 'Gunung Kerinci', 'Jambi, Sumatera', 3805, 'Gunung Kerinci merupakan gunung api tertinggi di Indonesia dan salah satu gunung api teraktif di Sumatera. Gunung ini memiliki kawah berisi danau belerang yang aktif.', 'Kerinci adalah stratovolcano andesitik dengan kawah kompleks. Gunung ini memiliki sistem hydrothermal yang aktif dan sering mengeluarkan gas belerang.', 'Waspada', 'Pendaki disarankan menggunakan masker gas di sekitar kawah. Tidak diperbolehkan mendekat ke bibir kawah karena gas beracun.', 'kerinci.jpg', 'Aktif', 'Stratovolcano', '2022', '600-900°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(6, 'Gunung Rinjani', 'Lombok, NTB', 3726, 'Gunung Rinjani memiliki kaldera besar dengan danau Segara Anak di dalamnya. Gunung Baru Jari tumbuh di dalam kaldera ini dan aktif mengeluarkan asap.', 'Rinjani adalah gunung api kompleks dengan kaldera besar. Gunung Baru Jari di dalamnya merupakan kerucut vulkanik baru yang terus aktif.', 'Normal', 'Pendaki boleh hingga bibir kawah dengan pengawasan. Hindari gas beracun dari Gunung Baru Jari.', 'rinjani.jpg', 'Aktif', 'Stratovolcano', '2016', '700-1000°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(7, 'Gunung Kelud', 'Jawa Timur', 1731, 'Gunung Kelud dikenal dengan letusan eksplosifnya yang dahsyat. Sebelum letusan 2014, kawahnya berisi danau kawah yang besar.', 'Kelud memiliki sistem magma yang unik dengan letusan eksplosif periodik. Setelah letusan 2014, terbentuk kubah lava di kawah.', 'Normal', 'Status normal namun tetap waspada. Kunjungan ke kawah harus dengan izin dan pengawasan.', 'kelud.jpg', 'Aktif', 'Stratovolcano', '2014', '800-1100°C', 'Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(8, 'Gunung Agung', 'Bali', 3031, 'Gunung Agung merupakan gunung suci bagi masyarakat Bali. Letusan besar terakhir terjadi pada tahun 1963 yang sangat dahsyat.', 'Agung adalah stratovolcano andesitik dengan karakteristik letusan eksplosif. Gunung ini memiliki periode istirahat yang panjang di antara letusan besar.', 'Waspada', 'Masyarakat di zona bahaya harus siap siaga. Pantau terus informasi dari PVMBG.', 'agung.jpg', 'Aktif', 'Stratovolcano', '2019', '850-1150°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(9, 'Gunung Soputan', 'Sulawesi Utara', 1784, 'Gunung Soputan merupakan salah satu gunung api teraktif di Sulawesi dengan frekuensi letusan yang tinggi dalam beberapa tahun terakhir.', 'Soputan adalah stratovolcano andesitik dengan letusan efusif dan eksplosif. Sering menghasilkan aliran lava dan awan panas.', 'Siaga', 'Zona bahaya radius 4 km dari puncak. Masyarakat di lembah sungai harus waspada lahar.', 'soputan.jpg', 'Aktif', 'Stratovolcano', '2023', '750-1000°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(10, 'Gunung Lokon', 'Sulawesi Utara', 1580, 'Gunung Lokon sering menunjukkan aktivitas vulkanik dengan letusan kecil berkala. Bersama dengan Gunung Empung membentuk kompleks vulkanik.', 'Lokon adalah gunung api doble dengan kawah aktif Tompaluan. Memiliki karakteristik letusan freatik dan magmatik.', 'Waspada', 'Waspada terhadap letusan freatik mendadak. Tidak beraktivitas dalam radius 2.5 km.', 'lokon.jpg', 'Aktif', 'Stratovolcano', '2015', '600-850°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(11, 'Gunung Ijen', 'Jawa Timur', 2799, 'Gunung Ijen terkenal dengan danau kawah asam berwarna turquoise dan blue fire (api biru) yang hanya ada dua di dunia.', 'Ijen adalah kompleks vulkanik dengan kawah asam terbesar di dunia. Aktivitas dominan adalah fumarolik dengan emisi gas belerang tinggi.', 'Waspada', 'Wajib menggunakan masker gas di kawah. Hindari menghirup gas beracun terutama pada malam hari.', 'ijen.jpg', 'Aktif', 'Stratovolcano', '1999', '200-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(12, 'Gunung Talang', 'Sumatera Barat', 2597, 'Gunung Talang memiliki dua kawah aktif dengan danau kawah yang indah. Aktivitas vulkanik ditandai dengan emisi gas dan uap.', 'Talang adalah stratovolcano dengan sistem fumarolik aktif. Memiliki beberapa kawah dengan karakteristik berbeda.', 'Normal', 'Pendakian diperbolehkan dengan tetap menjaga jarak dari kawah aktif.', 'talang.jpg', 'Aktif', 'Stratovolcano', '2007', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(13, 'Gunung Gamalama', 'Ternate, Maluku Utara', 1715, 'Gunung Gamalama merupakan gunung api pulau yang membentuk Pulau Ternate. Memiliki sejarah letusan yang panjang sejak abad ke-16.', 'Gamalama adalah stratovolcano basaltik-andesitik dengan letusan eksplosif dan efusif. Sering menghasilkan aliran lava.', 'Waspada', 'Masyarakat pulau harus siap dengan rencana evakuasi. Pantau informasi dari pos pengamatan.', 'gamalama.jpg', 'Aktif', 'Stratovolcano', '2018', '800-1100°C', 'Basalt-Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(14, 'Gunung Papandayan', 'Jawa Barat', 2665, 'Gunung Papandayan dikenal dengan kawah mati dan kawah aktifnya yang mengeluarkan gas belerang. Letusan besar tahun 1772 menghancurkan 40 desa.', 'Papandayan adalah kompleks vulkanik dengan beberapa kawah aktif. Dominan aktivitas fumarolik dengan suhu tinggi.', 'Waspada', 'Hati-hati dengan lubang gas beracun. Selalu ikuti jalur yang ditentukan.', 'papandayan.jpg', 'Aktif', 'Stratovolcano', '2002', '300-800°C', 'Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(15, 'Gunung Tambora', 'Sumbawa, NTB', 2850, 'Gunung Tambora terkenal dengan letusan super pada tahun 1815 yang merupakan letusan terbesar dalam sejarah modern. Letusan ini mengubah iklim global dan menciptakan kaldera raksasa.', 'Tambora adalah stratovolcano dengan kaldera besar selebar 6 km. Pasca letusan 1815, terbentuk kerucut baru (Doro Api Toi) di dalam kaldera.', 'Normal', 'Kunjungan ke kaldera diperbolehkan dengan pengawasan. Waspada terhadap gas beracun di dasar kaldera.', 'tambora.jpg', 'Aktif', 'Stratovolcano', '1967', '700-1000°C', 'Dasit-Riolit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(16, 'Gunung Krakatau', 'Selat Sunda', 813, 'Anak Krakatau tumbuh dari kaldera letusan super Krakatau 1883. Letusan 2018 menyebabkan tsunami dan mengubah bentuk gunung secara dramatis.', 'Anak Krakatau adalah gunung api strato yang sangat aktif, tumbuh dari kaldera Krakatau. Sering mengalami letusan strombolian dan pembentukan kubah lava.', 'Siaga', 'Tidak boleh mendekat dalam radius 5 km. Waspada tsunami vulkanik di pesisir Selat Sunda.', 'krakatau.jpg', 'Aktif', 'Kaldera', '2022', '800-1100°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(17, 'Gunung Batur', 'Bali', 1717, 'Gunung Batur terletak dalam kaldera ganda yang spektakuler. Memiliki sejarah letusan yang panjang dengan kaldera terbentuk sekitar 29.000 tahun lalu.', 'Batur adalah gunung api kompleks dalam kaldera. Memiliki beberapa kerucut parasit dan kawah aktif yang sering meletus.', 'Waspada', 'Pendakian diperbolehkan dengan pemandu. Hindari kawah saat aktivitas meningkat.', 'batur.jpg', 'Aktif', 'Kaldera', '2000', '600-900°C', 'Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(18, 'Gunung Sumbing', 'Jawa Tengah', 3370, 'Gunung Sumbing merupakan gunung api aktif yang memiliki kawah ganda. Aktivitas terakhir berupa emisi fumarol dan solfatara.', 'Sumbing adalah stratovolcano andesitik dengan kawah kompleks. Memiliki aktivitas fumarolik di kawah utama.', 'Normal', 'Status normal, pendakian diperbolehkan dengan tetap waspada terhadap gas beracun.', 'sumbing.jpg', 'Aktif', 'Stratovolcano', '1730', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(19, 'Gunung Sundoro', 'Jawa Tengah', 3136, 'Gunung Sundoro memiliki kawah yang masih aktif dengan fumarol dan solfatara. Letusan terakhir terjadi pada abad ke-19.', 'Sundoro adalah stratovolcano andesitik dengan kawah yang dalam. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian aman dengan tetap menjaga jarak dari kawah aktif.', 'sundoro.jpg', 'Aktif', 'Stratovolcano', '1903', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(20, 'Gunung Dieng', 'Jawa Tengah', 2565, 'Kompleks Dieng merupakan dataran tinggi vulkanik dengan banyak kawah aktif, fumarol, dan danau vulkanik. Sering terjadi letusan freatik.', 'Dieng adalah kompleks vulkanik dengan multiple kawah. Aktivitas dominan freatik dengan emisi gas CO2 beracun.', 'Waspada', 'Waspada gas beracun (CO2) di daerah rendah. Selalu ikuti jalur evakuasi.', 'dieng.jpg', 'Aktif', 'Kompleks Vulkanik', '2021', '200-500°C', 'Andesit-Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(21, 'Gunung Slamet', 'Jawa Tengah', 3428, 'Gunung Slamet merupakan gunung api teraktif di Jawa Tengah dengan letusan berkala. Sering mengeluarkan abu vulkanik dan suara gemuruh.', 'Slamet adalah stratovolcano andesitik besar dengan kawah aktif. Sering mengalami leturan strombolian dan emisi abu.', 'Waspada', 'Zona bahaya radius 2 km dari puncak. Pendakian tidak diperbolehkan saat status waspada.', 'slamet.jpg', 'Aktif', 'Stratovolcano', '2014', '700-1000°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(22, 'Gunung Ciremai', 'Jawa Barat', 3078, 'Gunung Ciremai merupakan gunung api tertinggi di Jawa Barat. Memiliki kawah ganda dengan aktivitas fumarolik.', 'Ciremai adalah stratovolcano andesitik dengan kawah yang relatif tenang. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian diperbolehkan dengan tetap waspada terhadap perubahan aktivitas.', 'ciremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(23, 'Gunung Gede', 'Jawa Barat', 2958, 'Gunung Gede merupakan gunung api aktif yang memiliki beberapa kawah aktif. Sering terjadi letusan freatik kecil.', 'Gede adalah gunung api kompleks dengan multiple kawah aktif. Aktivitas fumarolik dan solfatarik intensif.', 'Waspada', 'Tidak diperbolehkan mendekat kawah aktif. Waspada gas beracun.', 'gede.jpg', 'Aktif', 'Stratovolcano', '2022', '300-600°C', 'Andesit-Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(24, 'Gunung Salak', 'Jawa Barat', 2211, 'Gunung Salak merupakan kompleks vulkanik dengan beberapa puncak. Memiliki sejarah letusan freatik yang berbahaya bagi penerbangan.', 'Salak adalah kompleks vulkanik dengan kawah aktif. Sering mengeluarkan gas vulkanik yang mengganggu penerbangan.', 'Normal', 'Waspada gas vulkanik di area kawah. Informasi penting bagi penerbangan.', 'salak.jpg', 'Aktif', 'Stratovolcano', '1938', '400-700°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(25, 'Gunung Galunggung', 'Jawa Barat', 2168, 'Gunung Galunggung terkenal dengan letusan 1982 yang mengganggu penerbangan internasional. Memiliki kawah dengan danau yang indah.', 'Galunggung adalah stratovolcano dengan kawah danau. Pasca letusan 1982, terbentuk kubah lava di dalam kawah.', 'Normal', 'Kunjungan ke kawah diperbolehkan. Danau kawah aman untuk dikunjungi.', 'galunggung.jpg', 'Aktif', 'Stratovolcano', '1984', '600-900°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(26, 'Gunung Tangkuban Parahu', 'Jawa Barat', 2084, 'Gunung Tangkuban Parahu merupakan gunung api aktif yang populer untuk wisata. Memiliki beberapa kawah aktif dengan fumarol aktif.', 'Tangkuban Parahu adalah stratovolcano dengan multiple kawah. Kawah Ratu dan Domas aktif mengeluarkan gas belerang.', 'Waspada', 'Tidak mendekat bibir kawah saat beraktivitas fumarolik tinggi. Gunakan masker.', 'tangkuban.jpg', 'Aktif', 'Stratovolcano', '2019', '200-500°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(27, 'Gunung Ceremai', 'Jawa Barat', 3078, 'Gunung Ceremai memiliki bentuk yang simetris dan merupakan gunung api tertinggi di Jawa Barat. Aktivitas terakhir berupa emisi fumarol.', 'Ceremai adalah stratovolcano andesitik dengan kawah ganda. Aktivitas fumarolik lemah di kawah utama.', 'Normal', 'Pendakian aman dengan izin. Tetap pantau informasi terbaru.', 'ceremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(28, 'Gunung Lawu', 'Jawa Timur', 3265, 'Gunung Lawu merupakan gunung api yang dianggap keramat dengan banyak situs spiritual. Aktivitas vulkanik terakhir pada abad ke-19.', 'Lawu adalah stratovolcano andesitik dengan aktivitas fumarolik lemah. Memiliki beberapa kawah yang sudah tidak aktif.', 'Normal', 'Pendakian diperbolehkan. Status normal dengan aktivitas minimal.', 'lawu.jpg', 'Aktif', 'Stratovolcano', '1885', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(29, 'Gunung Welirang', 'Jawa Timur', 3156, 'Gunung Welirang terkenal dengan deposit belerangnya yang ditambang secara tradisional. Memiliki fumarol dan solfatara aktif.', 'Welirang adalah stratovolcano dengan aktivitas fumarolik intensif. Emisi gas belerang sangat tinggi di area puncak.', 'Waspada', 'Wajib menggunakan masker gas di area puncak. Penambang belerang harus ekstra hati-hati.', 'welirang.jpg', 'Aktif', 'Stratovolcano', '1952', '200-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(30, 'Gunung Arjuno', 'Jawa Timur', 3339, 'Gunung Arjuno merupakan kompleks vulkanik dengan beberapa puncak. Memiliki kawah yang sudah tidak aktif dengan danau kecil.', 'Arjuno adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama sudah tidak menunjukkan aktivitas signifikan.', 'Normal', 'Pendakian aman. Tidak ada larangan khusus saat status normal.', 'arjuno.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(31, 'Gunung Lamongan', 'Jawa Timur', 1651, 'Gunung Lamongan memiliki banyak kawah kecil dan danau vulkanik. Aktivitas terakhir berupa letusan freatik pada abad ke-19.', 'Lamongan adalah gunung api dengan banyak kerucut parasit. Memiliki danau kawah dan aktivitas fumarolik lemah.', 'Normal', 'Status normal, kunjungan diperbolehkan dengan pengawasan.', 'lamongan.jpg', 'Aktif', 'Stratovolcano', '1898', '500-800°C', 'Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(32, 'Gunung Raung', 'Jawa Timur', 3332, 'Gunung Raung memiliki kaldera yang sangat besar dan dalam. Sering mengeluarkan abu vulkanik yang mengganggu penerbangan di Bali.', 'Raung adalah stratovolcano dengan kaldera besar. Sering mengalami leturan strombolian dan emisi abu tinggi.', 'Siaga', 'Zona bahaya radius 3 km. Penerbangan harus waspada abu vulkanik.', 'raung.jpg', 'Aktif', 'Stratovolcano', '2021', '700-1000°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(33, 'Gunung Iyang', 'Jawa Timur', 2550, 'Gunung Iyang merupakan kompleks vulkanik dengan beberapa puncak. Aktivitas terakhir berupa emisi fumarol pada abad ke-20.', 'Iyang adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama menunjukkan aktivitas minimal.', 'Normal', 'Pendakian diperbolehkan. Tidak ada pembatasan khusus.', 'iyang.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(34, 'Gunung Argopuro', 'Jawa Timur', 3088, 'Gunung Argopuro memiliki kaldera besar dan merupakan gunung api yang sudah lama tidak aktif. Memiliki danau kawah yang indah.', 'Argopuro adalah stratovolcano dengan kaldera. Aktivitas vulkanik sangat rendah, didominasi oleh fumarol lemah.', 'Normal', 'Status normal, pendakian panjang tetapi aman.', 'argopuro.jpg', 'Aktif', 'Stratovolcano', 'Tidak tercatat', '300-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(64, 'Gunung Leuser', 'Aceh Tenggara', 3404, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(65, 'Gunung Burni Telong', 'Bener Meriah', 2645, 'Emisi gas vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(67, 'Gunung Sibayak', 'Karo', 2094, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(68, 'Gunung Marapi', 'Agam & Tanah Datar', 2891, 'Awan panas, abu vulkanik', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(69, 'Gunung Singgalang', 'Agam', 2877, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(70, 'Gunung Tandikat', 'Padang Pariaman', 2438, 'Peningkatan suhu', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(72, 'Gunung Dempo', 'Pagar Alam', 3173, 'Emisi gas belerang', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(73, 'Gunung Rajabasa', 'Lampung Selatan', 1281, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(74, 'Gunung Pesagi', 'Lampung Barat', 2230, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(75, 'Gunung Kaba', 'Rejang Lebong', 1940, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(76, 'Gunung Karang', 'Pandeglang', 1778, 'Aktivitas seismik', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(77, 'Gunung Gede Pangrango', 'Sukabumi & Cianjur', 2958, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(78, 'Gunung Tangkuban Perahu', 'Bandung Barat', 2084, 'Erupsi freatik, kawasan wisata ditutup', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(80, 'Gunung Merbabu', 'Magelang & Boyolali', 3145, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(83, 'Gunung Sindoro', 'Temanggung & Wonosobo', 3136, 'Emisi abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(93, 'Gunung Inerie', 'Ngada', 2245, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(94, 'Gunung Egon', 'Sikka', 1703, 'Emisi gas vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(95, 'Gunung Lewotobi', 'Flores Timur', 1703, 'Abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(96, 'Gunung Niut', 'Bengkayang', 1701, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(97, 'Gunung Bukit Raya', 'Katingan', 2278, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(98, 'Gunung Lumut', 'Paser', 1582, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(101, 'Gunung Ambang', 'Bolaang Mongondow Timur', 1830, 'Aktivitas seismik', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(102, 'Gunung Rantemario', 'Luwu', 3478, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(103, 'Gunung Latimojong', 'Enrekang', 3478, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(104, 'Gunung Mekongga', 'Kolaka', 2650, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(105, 'Gunung Banda Api', 'Maluku Tengah', 641, 'Erupsi kecil, pemukiman terdampak abu', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(107, 'Gunung Dukono', 'Halmahera Utara', 1229, 'Emisi abu terus menerus', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(108, 'Gunung Ibu', 'Halmahera Barat', 1325, 'Awan panas guguran', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(109, 'Gunung Arfak', 'Manokwari', 2955, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(110, 'Puncak Jaya (Carstensz)', 'Mimika', 4884, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-12 17:05:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gunung_backup`
--

CREATE TABLE `data_gunung_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nama_gunung` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `ketinggian` int(11) DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `geologi` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
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
-- Dumping data untuk tabel `data_gunung_backup`
--

INSERT INTO `data_gunung_backup` (`id`, `nama_gunung`, `lokasi`, `ketinggian`, `sejarah`, `geologi`, `status`, `rekomendasi`, `gambar`, `tipe_gunung`, `bentuk_gunung`, `letusan_terakhir`, `suhu_magma`, `tipe_batuan`, `mineral_dominan`, `created_at`, `update_at`) VALUES
(1, 'Gunung Merapi', 'Jawa Tengah & Yogyakarta', 2930, 'Gunung Merapi merupakan gunung api teraktif di Indonesia dengan sejarah letusan yang panjang. Letusan pertama tercatat pada tahun 1600 dan sejak itu terus menunjukkan aktivitas vulkanik yang signifikan.\n\nMerapi memiliki siklus erupsi setiap 2-5 tahun dengan erupsi besar setiap 10-15 tahun. Letusan besar terakhir terjadi pada tahun 2010 yang mengakibatkan dampak signifikan pada wilayah sekitarnya.', 'Merapi merupakan gunung api tipe stratovolcano dengan komposisi batuan andesit-basaltik. Struktur gunung ini ditandai dengan kubah lava yang terus tumbuh dan runtuh secara berkala.\n\nKarakteristik geologi Merapi termasuk:\n• Tipe magma andesitik-basaltik\n• Sistem plumbing yang kompleks\n• Pertumbuhan kubah lava yang cepat\n• Aliran piroklastik yang dominan', 'Siaga', 'Masyarakat dihimbau untuk tidak beraktivitas dalam radius 3 km dari puncak Merapi.\n\nLangkah mitigasi yang harus dilakukan:\n1. Selalu pantau informasi terbaru dari PVMBG\n2. Siapkan masker untuk melindungi dari abu vulkanik\n3. Ketahui jalur evakuasi terdekat\n4. Siapkan tas siaga bencana\n5. Ikuti arahan dari pihak berwenang', 'merapi.jpg', 'Aktif', 'Stratovolcano', '2023', '800-1200°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(2, 'Gunung Semeru', 'Jawa Timur', 3676, 'Gunung Semeru merupakan gunung tertinggi di Pulau Jawa dan sering mengalami erupsi kecil setiap tahun.', 'Stratovulkan aktif yang terbentuk dari aktivitas vulkanik berulang.', 'Waspada', 'Masyarakat diminta tidak beraktivitas dalam radius 1 km dari kawah Jonggring Saloka.', 'semeru.jpg', '', '', '', '', '', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(3, 'Gunung Bromo', 'Jawa Timur', 2329, 'Gunung Bromo merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Gunung ini memiliki kawah yang aktif dengan aktivitas letusan kecil yang terjadi secara berkala.\n\nBromo dianggap suci oleh masyarakat Tengger dan menjadi lokasi upacara Kasada setiap tahunnya.', 'Bromo adalah gunung api maar yang terletak dalam kaldera Tengger. Karakteristik geologinya unik dengan kawah yang aktif mengeluarkan asap belerang secara terus menerus.\n\nFitur geologi utama:\n• Kaldera Tengger selebar 10 km\n• Kawah aktif dengan diameter 800 m\n• Material vulkanik andesitik\n• Sistem hydrothermal yang aktif', 'Normal', 'Pengunjung diperbolehkan hingga bibir kawah dengan tetap memperhatikan kondisi cuaca dan aktivitas vulkanik.\n\nPeringatan keselamatan:\n• Gunakan masker di sekitar kawah\n• Hindari angin yang membawa gas beracun\n• Ikuti jalur yang ditentukan\n• Perhatikan kondisi cuaca', 'bromo.jpg', 'Aktif', 'Stratovolcano', '2021', '600-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(4, 'Gunung Sinabung', 'Sumatera Utara', 2460, 'Gunung Sinabung mengalami kebangkitan aktivitas vulkanik setelah 400 tahun tertidur. Letusan pertama dalam era modern terjadi pada tahun 2010 dan sejak itu menunjukkan aktivitas yang intensif.\n\nGunung ini telah menyebabkan pengungsian besar-besaran penduduk di sekitarnya.', 'Sinabung adalah stratovolcano andesitik-dasitik dengan sejarah letusan eksplosif. Gunung ini memiliki karakteristik:\n• Kubah lava yang tumbuh cepat\n• Letusan eksplosif dengan kolom abu tinggi\n• Aliran piroklastik yang ekstensif\n• Lava kental dengan kandungan silika tinggi', 'Waspada', 'Zona bahaya diperluas hingga radius 5 km dari puncak. Masyarakat di zona merah harus mengungsi dan tidak diperbolehkan beraktivitas.\n\nKewaspadaan:\n• Siap siaga untuk evakuasi\n• Pantau perkembangan aktivitas\n• Hindari lembah dan daerah aliran lahar', 'sinabung.jpg', 'Aktif', 'Stratovolcano', '2022', '700-900°C', 'Dasit-Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(5, 'Gunung Kerinci', 'Jambi, Sumatera', 3805, 'Gunung Kerinci merupakan gunung api tertinggi di Indonesia dan salah satu gunung api teraktif di Sumatera. Gunung ini memiliki kawah berisi danau belerang yang aktif.', 'Kerinci adalah stratovolcano andesitik dengan kawah kompleks. Gunung ini memiliki sistem hydrothermal yang aktif dan sering mengeluarkan gas belerang.', 'Waspada', 'Pendaki disarankan menggunakan masker gas di sekitar kawah. Tidak diperbolehkan mendekat ke bibir kawah karena gas beracun.', 'kerinci.jpg', 'Aktif', 'Stratovolcano', '2022', '600-900°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(6, 'Gunung Rinjani', 'Lombok, NTB', 3726, 'Gunung Rinjani memiliki kaldera besar dengan danau Segara Anak di dalamnya. Gunung Baru Jari tumbuh di dalam kaldera ini dan aktif mengeluarkan asap.', 'Rinjani adalah gunung api kompleks dengan kaldera besar. Gunung Baru Jari di dalamnya merupakan kerucut vulkanik baru yang terus aktif.', 'Normal', 'Pendaki boleh hingga bibir kawah dengan pengawasan. Hindari gas beracun dari Gunung Baru Jari.', 'rinjani.jpg', 'Aktif', 'Stratovolcano', '2016', '700-1000°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(7, 'Gunung Kelud', 'Jawa Timur', 1731, 'Gunung Kelud dikenal dengan letusan eksplosifnya yang dahsyat. Sebelum letusan 2014, kawahnya berisi danau kawah yang besar.', 'Kelud memiliki sistem magma yang unik dengan letusan eksplosif periodik. Setelah letusan 2014, terbentuk kubah lava di kawah.', 'Normal', 'Status normal namun tetap waspada. Kunjungan ke kawah harus dengan izin dan pengawasan.', 'kelud.jpg', 'Aktif', 'Stratovolcano', '2014', '800-1100°C', 'Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(8, 'Gunung Agung', 'Bali', 3031, 'Gunung Agung merupakan gunung suci bagi masyarakat Bali. Letusan besar terakhir terjadi pada tahun 1963 yang sangat dahsyat.', 'Agung adalah stratovolcano andesitik dengan karakteristik letusan eksplosif. Gunung ini memiliki periode istirahat yang panjang di antara letusan besar.', 'Waspada', 'Masyarakat di zona bahaya harus siap siaga. Pantau terus informasi dari PVMBG.', 'agung.jpg', 'Aktif', 'Stratovolcano', '2019', '850-1150°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(9, 'Gunung Soputan', 'Sulawesi Utara', 1784, 'Gunung Soputan merupakan salah satu gunung api teraktif di Sulawesi dengan frekuensi letusan yang tinggi dalam beberapa tahun terakhir.', 'Soputan adalah stratovolcano andesitik dengan letusan efusif dan eksplosif. Sering menghasilkan aliran lava dan awan panas.', 'Siaga', 'Zona bahaya radius 4 km dari puncak. Masyarakat di lembah sungai harus waspada lahar.', 'soputan.jpg', 'Aktif', 'Stratovolcano', '2023', '750-1000°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(10, 'Gunung Lokon', 'Sulawesi Utara', 1580, 'Gunung Lokon sering menunjukkan aktivitas vulkanik dengan letusan kecil berkala. Bersama dengan Gunung Empung membentuk kompleks vulkanik.', 'Lokon adalah gunung api doble dengan kawah aktif Tompaluan. Memiliki karakteristik letusan freatik dan magmatik.', 'Waspada', 'Waspada terhadap letusan freatik mendadak. Tidak beraktivitas dalam radius 2.5 km.', 'lokon.jpg', 'Aktif', 'Stratovolcano', '2015', '600-850°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(11, 'Gunung Ijen', 'Jawa Timur', 2799, 'Gunung Ijen terkenal dengan danau kawah asam berwarna turquoise dan blue fire (api biru) yang hanya ada dua di dunia.', 'Ijen adalah kompleks vulkanik dengan kawah asam terbesar di dunia. Aktivitas dominan adalah fumarolik dengan emisi gas belerang tinggi.', 'Waspada', 'Wajib menggunakan masker gas di kawah. Hindari menghirup gas beracun terutama pada malam hari.', 'ijen.jpg', 'Aktif', 'Stratovolcano', '1999', '200-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(12, 'Gunung Talang', 'Sumatera Barat', 2597, 'Gunung Talang memiliki dua kawah aktif dengan danau kawah yang indah. Aktivitas vulkanik ditandai dengan emisi gas dan uap.', 'Talang adalah stratovolcano dengan sistem fumarolik aktif. Memiliki beberapa kawah dengan karakteristik berbeda.', 'Normal', 'Pendakian diperbolehkan dengan tetap menjaga jarak dari kawah aktif.', 'talang.jpg', 'Aktif', 'Stratovolcano', '2007', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(13, 'Gunung Gamalama', 'Ternate, Maluku Utara', 1715, 'Gunung Gamalama merupakan gunung api pulau yang membentuk Pulau Ternate. Memiliki sejarah letusan yang panjang sejak abad ke-16.', 'Gamalama adalah stratovolcano basaltik-andesitik dengan letusan eksplosif dan efusif. Sering menghasilkan aliran lava.', 'Waspada', 'Masyarakat pulau harus siap dengan rencana evakuasi. Pantau informasi dari pos pengamatan.', 'gamalama.jpg', 'Aktif', 'Stratovolcano', '2018', '800-1100°C', 'Basalt-Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(14, 'Gunung Papandayan', 'Jawa Barat', 2665, 'Gunung Papandayan dikenal dengan kawah mati dan kawah aktifnya yang mengeluarkan gas belerang. Letusan besar tahun 1772 menghancurkan 40 desa.', 'Papandayan adalah kompleks vulkanik dengan beberapa kawah aktif. Dominan aktivitas fumarolik dengan suhu tinggi.', 'Waspada', 'Hati-hati dengan lubang gas beracun. Selalu ikuti jalur yang ditentukan.', 'papandayan.jpg', 'Aktif', 'Stratovolcano', '2002', '300-800°C', 'Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(15, 'Gunung Tambora', 'Sumbawa, NTB', 2850, 'Gunung Tambora terkenal dengan letusan super pada tahun 1815 yang merupakan letusan terbesar dalam sejarah modern. Letusan ini mengubah iklim global dan menciptakan kaldera raksasa.', 'Tambora adalah stratovolcano dengan kaldera besar selebar 6 km. Pasca letusan 1815, terbentuk kerucut baru (Doro Api Toi) di dalam kaldera.', 'Normal', 'Kunjungan ke kaldera diperbolehkan dengan pengawasan. Waspada terhadap gas beracun di dasar kaldera.', 'tambora.jpg', 'Aktif', 'Stratovolcano', '1967', '700-1000°C', 'Dasit-Riolit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(16, 'Gunung Krakatau', 'Selat Sunda', 813, 'Anak Krakatau tumbuh dari kaldera letusan super Krakatau 1883. Letusan 2018 menyebabkan tsunami dan mengubah bentuk gunung secara dramatis.', 'Anak Krakatau adalah gunung api strato yang sangat aktif, tumbuh dari kaldera Krakatau. Sering mengalami letusan strombolian dan pembentukan kubah lava.', 'Siaga', 'Tidak boleh mendekat dalam radius 5 km. Waspada tsunami vulkanik di pesisir Selat Sunda.', 'krakatau.jpg', 'Aktif', 'Kaldera', '2022', '800-1100°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(17, 'Gunung Batur', 'Bali', 1717, 'Gunung Batur terletak dalam kaldera ganda yang spektakuler. Memiliki sejarah letusan yang panjang dengan kaldera terbentuk sekitar 29.000 tahun lalu.', 'Batur adalah gunung api kompleks dalam kaldera. Memiliki beberapa kerucut parasit dan kawah aktif yang sering meletus.', 'Waspada', 'Pendakian diperbolehkan dengan pemandu. Hindari kawah saat aktivitas meningkat.', 'batur.jpg', 'Aktif', 'Kaldera', '2000', '600-900°C', 'Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(18, 'Gunung Sumbing', 'Jawa Tengah', 3370, 'Gunung Sumbing merupakan gunung api aktif yang memiliki kawah ganda. Aktivitas terakhir berupa emisi fumarol dan solfatara.', 'Sumbing adalah stratovolcano andesitik dengan kawah kompleks. Memiliki aktivitas fumarolik di kawah utama.', 'Normal', 'Status normal, pendakian diperbolehkan dengan tetap waspada terhadap gas beracun.', 'sumbing.jpg', 'Aktif', 'Stratovolcano', '1730', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(19, 'Gunung Sundoro', 'Jawa Tengah', 3136, 'Gunung Sundoro memiliki kawah yang masih aktif dengan fumarol dan solfatara. Letusan terakhir terjadi pada abad ke-19.', 'Sundoro adalah stratovolcano andesitik dengan kawah yang dalam. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian aman dengan tetap menjaga jarak dari kawah aktif.', 'sundoro.jpg', 'Aktif', 'Stratovolcano', '1903', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(20, 'Gunung Dieng', 'Jawa Tengah', 2565, 'Kompleks Dieng merupakan dataran tinggi vulkanik dengan banyak kawah aktif, fumarol, dan danau vulkanik. Sering terjadi letusan freatik.', 'Dieng adalah kompleks vulkanik dengan multiple kawah. Aktivitas dominan freatik dengan emisi gas CO2 beracun.', 'Waspada', 'Waspada gas beracun (CO2) di daerah rendah. Selalu ikuti jalur evakuasi.', 'dieng.jpg', 'Aktif', 'Kompleks Vulkanik', '2021', '200-500°C', 'Andesit-Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(21, 'Gunung Slamet', 'Jawa Tengah', 3428, 'Gunung Slamet merupakan gunung api teraktif di Jawa Tengah dengan letusan berkala. Sering mengeluarkan abu vulkanik dan suara gemuruh.', 'Slamet adalah stratovolcano andesitik besar dengan kawah aktif. Sering mengalami leturan strombolian dan emisi abu.', 'Waspada', 'Zona bahaya radius 2 km dari puncak. Pendakian tidak diperbolehkan saat status waspada.', 'slamet.jpg', 'Aktif', 'Stratovolcano', '2014', '700-1000°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(22, 'Gunung Ciremai', 'Jawa Barat', 3078, 'Gunung Ciremai merupakan gunung api tertinggi di Jawa Barat. Memiliki kawah ganda dengan aktivitas fumarolik.', 'Ciremai adalah stratovolcano andesitik dengan kawah yang relatif tenang. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian diperbolehkan dengan tetap waspada terhadap perubahan aktivitas.', 'ciremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(23, 'Gunung Gede', 'Jawa Barat', 2958, 'Gunung Gede merupakan gunung api aktif yang memiliki beberapa kawah aktif. Sering terjadi letusan freatik kecil.', 'Gede adalah gunung api kompleks dengan multiple kawah aktif. Aktivitas fumarolik dan solfatarik intensif.', 'Waspada', 'Tidak diperbolehkan mendekat kawah aktif. Waspada gas beracun.', 'gede.jpg', 'Aktif', 'Stratovolcano', '2022', '300-600°C', 'Andesit-Dasit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(24, 'Gunung Salak', 'Jawa Barat', 2211, 'Gunung Salak merupakan kompleks vulkanik dengan beberapa puncak. Memiliki sejarah letusan freatik yang berbahaya bagi penerbangan.', 'Salak adalah kompleks vulkanik dengan kawah aktif. Sering mengeluarkan gas vulkanik yang mengganggu penerbangan.', 'Normal', 'Waspada gas vulkanik di area kawah. Informasi penting bagi penerbangan.', 'salak.jpg', 'Aktif', 'Stratovolcano', '1938', '400-700°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(25, 'Gunung Galunggung', 'Jawa Barat', 2168, 'Gunung Galunggung terkenal dengan letusan 1982 yang mengganggu penerbangan internasional. Memiliki kawah dengan danau yang indah.', 'Galunggung adalah stratovolcano dengan kawah danau. Pasca letusan 1982, terbentuk kubah lava di dalam kawah.', 'Normal', 'Kunjungan ke kawah diperbolehkan. Danau kawah aman untuk dikunjungi.', 'galunggung.jpg', 'Aktif', 'Stratovolcano', '1984', '600-900°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(26, 'Gunung Tangkuban Parahu', 'Jawa Barat', 2084, 'Gunung Tangkuban Parahu merupakan gunung api aktif yang populer untuk wisata. Memiliki beberapa kawah aktif dengan fumarol aktif.', 'Tangkuban Parahu adalah stratovolcano dengan multiple kawah. Kawah Ratu dan Domas aktif mengeluarkan gas belerang.', 'Waspada', 'Tidak mendekat bibir kawah saat beraktivitas fumarolik tinggi. Gunakan masker.', 'tangkuban.jpg', 'Aktif', 'Stratovolcano', '2019', '200-500°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(27, 'Gunung Ceremai', 'Jawa Barat', 3078, 'Gunung Ceremai memiliki bentuk yang simetris dan merupakan gunung api tertinggi di Jawa Barat. Aktivitas terakhir berupa emisi fumarol.', 'Ceremai adalah stratovolcano andesitik dengan kawah ganda. Aktivitas fumarolik lemah di kawah utama.', 'Normal', 'Pendakian aman dengan izin. Tetap pantau informasi terbaru.', 'ceremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(28, 'Gunung Lawu', 'Jawa Timur', 3265, 'Gunung Lawu merupakan gunung api yang dianggap keramat dengan banyak situs spiritual. Aktivitas vulkanik terakhir pada abad ke-19.', 'Lawu adalah stratovolcano andesitik dengan aktivitas fumarolik lemah. Memiliki beberapa kawah yang sudah tidak aktif.', 'Normal', 'Pendakian diperbolehkan. Status normal dengan aktivitas minimal.', 'lawu.jpg', 'Aktif', 'Stratovolcano', '1885', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(29, 'Gunung Welirang', 'Jawa Timur', 3156, 'Gunung Welirang terkenal dengan deposit belerangnya yang ditambang secara tradisional. Memiliki fumarol dan solfatara aktif.', 'Welirang adalah stratovolcano dengan aktivitas fumarolik intensif. Emisi gas belerang sangat tinggi di area puncak.', 'Waspada', 'Wajib menggunakan masker gas di area puncak. Penambang belerang harus ekstra hati-hati.', 'welirang.jpg', 'Aktif', 'Stratovolcano', '1952', '200-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(30, 'Gunung Arjuno', 'Jawa Timur', 3339, 'Gunung Arjuno merupakan kompleks vulkanik dengan beberapa puncak. Memiliki kawah yang sudah tidak aktif dengan danau kecil.', 'Arjuno adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama sudah tidak menunjukkan aktivitas signifikan.', 'Normal', 'Pendakian aman. Tidak ada larangan khusus saat status normal.', 'arjuno.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(31, 'Gunung Lamongan', 'Jawa Timur', 1651, 'Gunung Lamongan memiliki banyak kawah kecil dan danau vulkanik. Aktivitas terakhir berupa letusan freatik pada abad ke-19.', 'Lamongan adalah gunung api dengan banyak kerucut parasit. Memiliki danau kawah dan aktivitas fumarolik lemah.', 'Normal', 'Status normal, kunjungan diperbolehkan dengan pengawasan.', 'lamongan.jpg', 'Aktif', 'Stratovolcano', '1898', '500-800°C', 'Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(32, 'Gunung Raung', 'Jawa Timur', 3332, 'Gunung Raung memiliki kaldera yang sangat besar dan dalam. Sering mengeluarkan abu vulkanik yang mengganggu penerbangan di Bali.', 'Raung adalah stratovolcano dengan kaldera besar. Sering mengalami leturan strombolian dan emisi abu tinggi.', 'Siaga', 'Zona bahaya radius 3 km. Penerbangan harus waspada abu vulkanik.', 'raung.jpg', 'Aktif', 'Stratovolcano', '2021', '700-1000°C', 'Andesit-Basalt', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(33, 'Gunung Iyang', 'Jawa Timur', 2550, 'Gunung Iyang merupakan kompleks vulkanik dengan beberapa puncak. Aktivitas terakhir berupa emisi fumarol pada abad ke-20.', 'Iyang adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama menunjukkan aktivitas minimal.', 'Normal', 'Pendakian diperbolehkan. Tidak ada pembatasan khusus.', 'iyang.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(34, 'Gunung Argopuro', 'Jawa Timur', 3088, 'Gunung Argopuro memiliki kaldera besar dan merupakan gunung api yang sudah lama tidak aktif. Memiliki danau kawah yang indah.', 'Argopuro adalah stratovolcano dengan kaldera. Aktivitas vulkanik sangat rendah, didominasi oleh fumarol lemah.', 'Normal', 'Status normal, pendakian panjang tetapi aman.', 'argopuro.jpg', 'Aktif', 'Stratovolcano', 'Tidak tercatat', '300-600°C', 'Andesit', '0', '2025-11-11 18:12:32', '2025-11-11 18:12:32'),
(64, 'Gunung Leuser', 'Aceh Tenggara', 3404, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(65, 'Gunung Burni Telong', 'Bener Meriah', 2645, 'Emisi gas vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(66, 'Gunung Sinabung', 'Karo', 2460, 'Awan panas, lahan pertanian rusak', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(67, 'Gunung Sibayak', 'Karo', 2094, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(68, 'Gunung Marapi', 'Agam & Tanah Datar', 2891, 'Awan panas, abu vulkanik', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(69, 'Gunung Singgalang', 'Agam', 2877, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(70, 'Gunung Tandikat', 'Padang Pariaman', 2438, 'Peningkatan suhu', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(71, 'Gunung Kerinci', 'Kerinci', 3805, 'Abu vulkanik radius 10km', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(72, 'Gunung Dempo', 'Pagar Alam', 3173, 'Emisi gas belerang', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(73, 'Gunung Rajabasa', 'Lampung Selatan', 1281, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(74, 'Gunung Pesagi', 'Lampung Barat', 2230, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(75, 'Gunung Kaba', 'Rejang Lebong', 1940, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(76, 'Gunung Karang', 'Pandeglang', 1778, 'Aktivitas seismik', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(77, 'Gunung Gede Pangrango', 'Sukabumi & Cianjur', 2958, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(78, 'Gunung Tangkuban Perahu', 'Bandung Barat', 2084, 'Erupsi freatik, kawasan wisata ditutup', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(79, 'Gunung Merapi', 'Magelang & Boyolali', 2930, 'Awan panas, 45 rumah rusak', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(80, 'Gunung Merbabu', 'Magelang & Boyolali', 3145, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(81, 'Gunung Slamet', 'Banyumas & Tegal', 3428, 'Luncuran awan panas', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(82, 'Gunung Sumbing', 'Wonosobo & Temanggung', 3371, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(83, 'Gunung Sindoro', 'Temanggung & Wonosobo', 3136, 'Emisi abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(84, 'Gunung Merapi', 'Sleman', 2930, 'Awan panas, 45 rumah rusak', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(85, 'Gunung Bromo', 'Probolinggo & Pasuruan', 2329, 'Abu vulkanik, wisata ditutup sementara', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(86, 'Gunung Semeru', 'Lumajang & Malang', 3676, 'Awan panas guguran, 5,205 rumah rusak', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(87, 'Gunung Ijen', 'Banyuwangi', 2799, 'Emisi gas belerang meningkat', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(88, 'Gunung Kelud', 'Kediri & Blitar', 1731, 'Peningkatan aktivitas seismik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(89, 'Gunung Argopuro', 'Situbondo & Probolinggo', 3088, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(90, 'Gunung Agung', 'Karangasem', 3031, 'Emisi abu, bandara ditutup sementara', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(91, 'Gunung Batur', 'Bangli', 1717, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(92, 'Gunung Rinjani', 'Lombok Timur', 3726, 'Luncuran awan panas, lahan pertanian terdampak abu', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(93, 'Gunung Inerie', 'Ngada', 2245, 'Aktivitas fumarol', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(94, 'Gunung Egon', 'Sikka', 1703, 'Emisi gas vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(95, 'Gunung Lewotobi', 'Flores Timur', 1703, 'Abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(96, 'Gunung Niut', 'Bengkayang', 1701, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(97, 'Gunung Bukit Raya', 'Katingan', 2278, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(98, 'Gunung Lumut', 'Paser', 1582, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(99, 'Gunung Soputan', 'Minahasa Tenggara', 1784, 'Awan panas, 12 rumah rusak', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(100, 'Gunung Lokon', 'Tomohon', 1580, 'Emisi abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(101, 'Gunung Ambang', 'Bolaang Mongondow Timur', 1830, 'Aktivitas seismik', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(102, 'Gunung Rantemario', 'Luwu', 3478, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(103, 'Gunung Latimojong', 'Enrekang', 3478, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(104, 'Gunung Mekongga', 'Kolaka', 2650, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(105, 'Gunung Banda Api', 'Maluku Tengah', 641, 'Erupsi kecil, pemukiman terdampak abu', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(106, 'Gunung Gamalama', 'Kota Ternate', 1715, 'Emisi abu vulkanik', NULL, 'Waspada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(107, 'Gunung Dukono', 'Halmahera Utara', 1229, 'Emisi abu terus menerus', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(108, 'Gunung Ibu', 'Halmahera Barat', 1325, 'Awan panas guguran', NULL, 'Siaga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(109, 'Gunung Arfak', 'Manokwari', 2955, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30'),
(110, 'Puncak Jaya (Carstensz)', 'Mimika', 4884, 'Aktivitas normal', NULL, 'Normal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:15:30', '2025-11-11 18:15:30');

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
(1, 'Gunung Leuser', 'Aceh', '15 Juni 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(2, 'Gunung Burni Telong', 'Aceh', '20 Agustus 2021', 2021, 0, 0, 150, 'Emisi gas vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(3, 'Gunung Sinabung', 'Sumatera Utara', '10 Agustus 2020', 2020, 2, 15, 5200, 'Awan panas, lahan pertanian rusak', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(4, 'Gunung Sibayak', 'Sumatera Utara', '5 Maret 2023', 2023, 0, 0, 0, 'Aktivitas fumarol', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(5, 'Gunung Marapi', 'Sumatera Barat', '22 Januari 2024', 2024, 0, 12, 1500, 'Awan panas, abu vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(6, 'Gunung Singgalang', 'Sumatera Barat', '10 November 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(7, 'Gunung Tandikat', 'Sumatera Barat', '15 Juli 2021', 2021, 0, 0, 0, 'Peningkatan suhu', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(8, 'Gunung Kerinci', 'Jambi', '15 Mei 2024', 2024, 0, 3, 800, 'Abu vulkanik radius 10km', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(9, 'Gunung Dempo', 'Sumatera Selatan', '8 September 2023', 2023, 0, 0, 350, 'Emisi gas belerang', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(10, 'Gunung Rajabasa', 'Lampung', '12 Desember 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(11, 'Gunung Pesagi', 'Lampung', '20 Oktober 2021', 2021, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(12, 'Gunung Kaba', 'Bengkulu', '30 Maret 2023', 2023, 0, 0, 0, 'Aktivitas fumarol', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(13, 'Gunung Karang', 'Banten', '18 Februari 2024', 2024, 0, 0, 0, 'Aktivitas seismik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(14, 'Gunung Gede Pangrango', 'Jawa Barat', '5 April 2023', 2023, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(15, 'Gunung Tangkuban Perahu', 'Jawa Barat', '26 Juli 2019', 2019, 0, 0, 2500, 'Erupsi freatik, kawasan wisata ditutup', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(16, 'Gunung Merapi', 'Jawa Tengah', '11 Maret 2023', 2023, 2, 15, 1250, 'Awan panas, 45 rumah rusak', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(17, 'Gunung Merbabu', 'Jawa Tengah', '15 Januari 2024', 2024, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(18, 'Gunung Slamet', 'Jawa Tengah', '18 Agustus 2023', 2023, 0, 2, 800, 'Luncuran awan panas', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(19, 'Gunung Sumbing', 'Jawa Tengah', '22 Mei 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(20, 'Gunung Sindoro', 'Jawa Tengah', '30 November 2023', 2023, 0, 0, 300, 'Emisi abu vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(21, 'Gunung Merapi', 'DI Yogyakarta', '11 Maret 2023', 2023, 2, 15, 1250, 'Awan panas, 45 rumah rusak', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(22, 'Gunung Bromo', 'Jawa Timur', '20 Januari 2024', 2024, 0, 0, 1500, 'Abu vulkanik, wisata ditutup sementara', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(23, 'Gunung Semeru', 'Jawa Timur', '4 Desember 2022', 2022, 57, 104, 10250, 'Awan panas guguran, 5,205 rumah rusak', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(24, 'Gunung Ijen', 'Jawa Timur', '3 Maret 2024', 2024, 0, 0, 0, 'Emisi gas belerang meningkat', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(25, 'Gunung Kelud', 'Jawa Timur', '14 Februari 2024', 2024, 0, 0, 2500, 'Peningkatan aktivitas seismik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(26, 'Gunung Argopuro', 'Jawa Timur', '14 Maret 2023', 2023, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(27, 'Gunung Agung', 'Bali', '21 November 2023', 2023, 0, 0, 25000, 'Emisi abu, bandara ditutup sementara', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(28, 'Gunung Batur', 'Bali', '8 Juni 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(29, 'Gunung Rinjani', 'Nusa Tenggara Barat', '8 September 2023', 2023, 0, 8, 3200, 'Luncuran awan panas, lahan pertanian terdampak abu', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(30, 'Gunung Inerie', 'Nusa Tenggara Timur', '15 Oktober 2023', 2023, 0, 0, 0, 'Aktivitas fumarol', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(31, 'Gunung Egon', 'Nusa Tenggara Timur', '5 Agustus 2022', 2022, 0, 0, 450, 'Emisi gas vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(32, 'Gunung Lewotobi', 'Nusa Tenggara Timur', '12 Januari 2024', 2024, 0, 0, 1200, 'Abu vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(33, 'Gunung Niut', 'Kalimantan Barat', '20 Mei 2021', 2021, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(34, 'Gunung Bukit Raya', 'Kalimantan Tengah', '15 November 2020', 2020, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(35, 'Gunung Lumut', 'Kalimantan Timur', '10 Desember 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(36, 'Gunung Soputan', 'Sulawesi Utara', '3 Oktober 2023', 2023, 1, 0, 2100, 'Awan panas, 12 rumah rusak', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(37, 'Gunung Lokon', 'Sulawesi Utara', '18 Juli 2022', 2022, 0, 0, 800, 'Emisi abu vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(38, 'Gunung Ambang', 'Gorontalo', '25 September 2023', 2023, 0, 0, 0, 'Aktivitas seismik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(39, 'Gunung Rantemario', 'Sulawesi Tengah', '5 April 2021', 2021, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(40, 'Gunung Latimojong', 'Sulawesi Selatan', '12 Agustus 2022', 2022, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(41, 'Gunung Mekongga', 'Sulawesi Tenggara', '30 Juni 2023', 2023, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(42, 'Gunung Banda Api', 'Maluku', '15 Mei 2022', 2022, 0, 0, 1500, 'Erupsi kecil, pemukiman terdampak abu', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(43, 'Gunung Gamalama', 'Maluku Utara', '8 Maret 2024', 2024, 0, 0, 800, 'Emisi abu vulkanik', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(44, 'Gunung Dukono', 'Maluku Utara', '20 November 2023', 2023, 0, 0, 0, 'Emisi abu terus menerus', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(45, 'Gunung Ibu', 'Maluku Utara', '12 Februari 2024', 2024, 0, 0, 600, 'Awan panas guguran', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(46, 'Gunung Arfak', 'Papua Barat', '5 Januari 2021', 2021, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39'),
(47, 'Puncak Jaya (Carstensz)', 'Papua', '15 Oktober 2020', 2020, 0, 0, 0, 'Aktivitas normal', 0, '2025-11-11 18:22:39', '2025-11-11 18:22:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gunung`
--

CREATE TABLE `gunung` (
  `id` int(11) NOT NULL,
  `nama_gunung` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `ketinggian` int(11) DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `geologi` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tipe_gunung` varchar(50) NOT NULL,
  `bentuk_gunung` varchar(50) NOT NULL,
  `letusan_terakhir` varchar(100) NOT NULL,
  `suhu_magma` varchar(100) NOT NULL,
  `tipe_batuan` varchar(100) NOT NULL,
  `mineral_dominan` int(100) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gunung`
--

INSERT INTO `gunung` (`id`, `nama_gunung`, `lokasi`, `ketinggian`, `sejarah`, `geologi`, `status`, `rekomendasi`, `gambar`, `tipe_gunung`, `bentuk_gunung`, `letusan_terakhir`, `suhu_magma`, `tipe_batuan`, `mineral_dominan`, `update_at`, `created_at`) VALUES
(1, 'Gunung Merapi', 'Jawa Tengah & Yogyakarta', 2930, 'Gunung Merapi merupakan gunung api teraktif di Indonesia dengan sejarah letusan yang panjang. Letusan pertama tercatat pada tahun 1600 dan sejak itu terus menunjukkan aktivitas vulkanik yang signifikan.\n\nMerapi memiliki siklus erupsi setiap 2-5 tahun dengan erupsi besar setiap 10-15 tahun. Letusan besar terakhir terjadi pada tahun 2010 yang mengakibatkan dampak signifikan pada wilayah sekitarnya.', 'Merapi merupakan gunung api tipe stratovolcano dengan komposisi batuan andesit-basaltik. Struktur gunung ini ditandai dengan kubah lava yang terus tumbuh dan runtuh secara berkala.\n\nKarakteristik geologi Merapi termasuk:\n• Tipe magma andesitik-basaltik\n• Sistem plumbing yang kompleks\n• Pertumbuhan kubah lava yang cepat\n• Aliran piroklastik yang dominan', 'Siaga', 'Masyarakat dihimbau untuk tidak beraktivitas dalam radius 3 km dari puncak Merapi.\n\nLangkah mitigasi yang harus dilakukan:\n1. Selalu pantau informasi terbaru dari PVMBG\n2. Siapkan masker untuk melindungi dari abu vulkanik\n3. Ketahui jalur evakuasi terdekat\n4. Siapkan tas siaga bencana\n5. Ikuti arahan dari pihak berwenang', 'merapi.jpg', 'Aktif', 'Stratovolcano', '2023', '800-1200°C', 'Andesit-Basalt', 0, '2025-11-09 03:27:24', '2025-11-09 03:17:58'),
(2, 'Gunung Semeru', 'Jawa Timur', 3676, 'Gunung Semeru merupakan gunung tertinggi di Pulau Jawa dan sering mengalami erupsi kecil setiap tahun.', 'Stratovulkan aktif yang terbentuk dari aktivitas vulkanik berulang.', 'Waspada', 'Masyarakat diminta tidak beraktivitas dalam radius 1 km dari kawah Jonggring Saloka.', 'semeru.jpg', '', '', '', '', '', 0, '2025-11-09 03:13:42', '2025-11-09 03:15:17'),
(4, 'Gunung Bromo', 'Jawa Timur', 2329, 'Gunung Bromo merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Gunung ini memiliki kawah yang aktif dengan aktivitas letusan kecil yang terjadi secara berkala.\n\nBromo dianggap suci oleh masyarakat Tengger dan menjadi lokasi upacara Kasada setiap tahunnya.', 'Bromo adalah gunung api maar yang terletak dalam kaldera Tengger. Karakteristik geologinya unik dengan kawah yang aktif mengeluarkan asap belerang secara terus menerus.\n\nFitur geologi utama:\n• Kaldera Tengger selebar 10 km\n• Kawah aktif dengan diameter 800 m\n• Material vulkanik andesitik\n• Sistem hydrothermal yang aktif', 'Normal', 'Pengunjung diperbolehkan hingga bibir kawah dengan tetap memperhatikan kondisi cuaca dan aktivitas vulkanik.\n\nPeringatan keselamatan:\n• Gunakan masker di sekitar kawah\n• Hindari angin yang membawa gas beracun\n• Ikuti jalur yang ditentukan\n• Perhatikan kondisi cuaca', 'bromo.jpg', 'Aktif', 'Stratovolcano', '2021', '600-800°C', 'Andesit', 0, '2025-11-09 03:17:58', '2025-11-09 03:17:58'),
(5, 'Gunung Sinabung', 'Sumatera Utara', 2460, 'Gunung Sinabung mengalami kebangkitan aktivitas vulkanik setelah 400 tahun tertidur. Letusan pertama dalam era modern terjadi pada tahun 2010 dan sejak itu menunjukkan aktivitas yang intensif.\n\nGunung ini telah menyebabkan pengungsian besar-besaran penduduk di sekitarnya.', 'Sinabung adalah stratovolcano andesitik-dasitik dengan sejarah letusan eksplosif. Gunung ini memiliki karakteristik:\n• Kubah lava yang tumbuh cepat\n• Letusan eksplosif dengan kolom abu tinggi\n• Aliran piroklastik yang ekstensif\n• Lava kental dengan kandungan silika tinggi', 'Waspada', 'Zona bahaya diperluas hingga radius 5 km dari puncak. Masyarakat di zona merah harus mengungsi dan tidak diperbolehkan beraktivitas.\n\nKewaspadaan:\n• Siap siaga untuk evakuasi\n• Pantau perkembangan aktivitas\n• Hindari lembah dan daerah aliran lahar', 'sinabung.jpg', 'Aktif', 'Stratovolcano', '2022', '700-900°C', 'Dasit-Andesit', 0, '2025-11-09 03:17:58', '2025-11-09 03:17:58'),
(6, 'Gunung Kerinci', 'Jambi, Sumatera', 3805, 'Gunung Kerinci merupakan gunung api tertinggi di Indonesia dan salah satu gunung api teraktif di Sumatera. Gunung ini memiliki kawah berisi danau belerang yang aktif.', 'Kerinci adalah stratovolcano andesitik dengan kawah kompleks. Gunung ini memiliki sistem hydrothermal yang aktif dan sering mengeluarkan gas belerang.', 'Waspada', 'Pendaki disarankan menggunakan masker gas di sekitar kawah. Tidak diperbolehkan mendekat ke bibir kawah karena gas beracun.', 'kerinci.jpg', 'Aktif', 'Stratovolcano', '2022', '600-900°C', 'Andesit-Basalt', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(7, 'Gunung Rinjani', 'Lombok, NTB', 3726, 'Gunung Rinjani memiliki kaldera besar dengan danau Segara Anak di dalamnya. Gunung Baru Jari tumbuh di dalam kaldera ini dan aktif mengeluarkan asap.', 'Rinjani adalah gunung api kompleks dengan kaldera besar. Gunung Baru Jari di dalamnya merupakan kerucut vulkanik baru yang terus aktif.', 'Normal', 'Pendaki boleh hingga bibir kawah dengan pengawasan. Hindari gas beracun dari Gunung Baru Jari.', 'rinjani.jpg', 'Aktif', 'Stratovolcano', '2016', '700-1000°C', 'Andesit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(8, 'Gunung Kelud', 'Jawa Timur', 1731, 'Gunung Kelud dikenal dengan letusan eksplosifnya yang dahsyat. Sebelum letusan 2014, kawahnya berisi danau kawah yang besar.', 'Kelud memiliki sistem magma yang unik dengan letusan eksplosif periodik. Setelah letusan 2014, terbentuk kubah lava di kawah.', 'Normal', 'Status normal namun tetap waspada. Kunjungan ke kawah harus dengan izin dan pengawasan.', 'kelud.jpg', 'Aktif', 'Stratovolcano', '2014', '800-1100°C', 'Dasit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(9, 'Gunung Agung', 'Bali', 3031, 'Gunung Agung merupakan gunung suci bagi masyarakat Bali. Letusan besar terakhir terjadi pada tahun 1963 yang sangat dahsyat.', 'Agung adalah stratovolcano andesitik dengan karakteristik letusan eksplosif. Gunung ini memiliki periode istirahat yang panjang di antara letusan besar.', 'Waspada', 'Masyarakat di zona bahaya harus siap siaga. Pantau terus informasi dari PVMBG.', 'agung.jpg', 'Aktif', 'Stratovolcano', '2019', '850-1150°C', 'Andesit-Basalt', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(10, 'Gunung Soputan', 'Sulawesi Utara', 1784, 'Gunung Soputan merupakan salah satu gunung api teraktif di Sulawesi dengan frekuensi letusan yang tinggi dalam beberapa tahun terakhir.', 'Soputan adalah stratovolcano andesitik dengan letusan efusif dan eksplosif. Sering menghasilkan aliran lava dan awan panas.', 'Siaga', 'Zona bahaya radius 4 km dari puncak. Masyarakat di lembah sungai harus waspada lahar.', 'soputan.jpg', 'Aktif', 'Stratovolcano', '2023', '750-1000°C', 'Andesit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(11, 'Gunung Lokon', 'Sulawesi Utara', 1580, 'Gunung Lokon sering menunjukkan aktivitas vulkanik dengan letusan kecil berkala. Bersama dengan Gunung Empung membentuk kompleks vulkanik.', 'Lokon adalah gunung api doble dengan kawah aktif Tompaluan. Memiliki karakteristik letusan freatik dan magmatik.', 'Waspada', 'Waspada terhadap letusan freatik mendadak. Tidak beraktivitas dalam radius 2.5 km.', 'lokon.jpg', 'Aktif', 'Stratovolcano', '2015', '600-850°C', 'Andesit-Basalt', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(12, 'Gunung Ijen', 'Jawa Timur', 2799, 'Gunung Ijen terkenal dengan danau kawah asam berwarna turquoise dan blue fire (api biru) yang hanya ada dua di dunia.', 'Ijen adalah kompleks vulkanik dengan kawah asam terbesar di dunia. Aktivitas dominan adalah fumarolik dengan emisi gas belerang tinggi.', 'Waspada', 'Wajib menggunakan masker gas di kawah. Hindari menghirup gas beracun terutama pada malam hari.', 'ijen.jpg', 'Aktif', 'Stratovolcano', '1999', '200-600°C', 'Andesit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(13, 'Gunung Talang', 'Sumatera Barat', 2597, 'Gunung Talang memiliki dua kawah aktif dengan danau kawah yang indah. Aktivitas vulkanik ditandai dengan emisi gas dan uap.', 'Talang adalah stratovolcano dengan sistem fumarolik aktif. Memiliki beberapa kawah dengan karakteristik berbeda.', 'Normal', 'Pendakian diperbolehkan dengan tetap menjaga jarak dari kawah aktif.', 'talang.jpg', 'Aktif', 'Stratovolcano', '2007', '500-800°C', 'Andesit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(14, 'Gunung Gamalama', 'Ternate, Maluku Utara', 1715, 'Gunung Gamalama merupakan gunung api pulau yang membentuk Pulau Ternate. Memiliki sejarah letusan yang panjang sejak abad ke-16.', 'Gamalama adalah stratovolcano basaltik-andesitik dengan letusan eksplosif dan efusif. Sering menghasilkan aliran lava.', 'Waspada', 'Masyarakat pulau harus siap dengan rencana evakuasi. Pantau informasi dari pos pengamatan.', 'gamalama.jpg', 'Aktif', 'Stratovolcano', '2018', '800-1100°C', 'Basalt-Andesit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(15, 'Gunung Papandayan', 'Jawa Barat', 2665, 'Gunung Papandayan dikenal dengan kawah mati dan kawah aktifnya yang mengeluarkan gas belerang. Letusan besar tahun 1772 menghancurkan 40 desa.', 'Papandayan adalah kompleks vulkanik dengan beberapa kawah aktif. Dominan aktivitas fumarolik dengan suhu tinggi.', 'Waspada', 'Hati-hati dengan lubang gas beracun. Selalu ikuti jalur yang ditentukan.', 'papandayan.jpg', 'Aktif', 'Stratovolcano', '2002', '300-800°C', 'Dasit', 0, '2025-11-09 03:40:18', '2025-11-09 03:40:18'),
(16, 'Gunung Tambora', 'Sumbawa, NTB', 2850, 'Gunung Tambora terkenal dengan letusan super pada tahun 1815 yang merupakan letusan terbesar dalam sejarah modern. Letusan ini mengubah iklim global dan menciptakan kaldera raksasa.', 'Tambora adalah stratovolcano dengan kaldera besar selebar 6 km. Pasca letusan 1815, terbentuk kerucut baru (Doro Api Toi) di dalam kaldera.', 'Normal', 'Kunjungan ke kaldera diperbolehkan dengan pengawasan. Waspada terhadap gas beracun di dasar kaldera.', 'tambora.jpg', 'Aktif', 'Stratovolcano', '1967', '700-1000°C', 'Dasit-Riolit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(17, 'Gunung Krakatau', 'Selat Sunda', 813, 'Anak Krakatau tumbuh dari kaldera letusan super Krakatau 1883. Letusan 2018 menyebabkan tsunami dan mengubah bentuk gunung secara dramatis.', 'Anak Krakatau adalah gunung api strato yang sangat aktif, tumbuh dari kaldera Krakatau. Sering mengalami letusan strombolian dan pembentukan kubah lava.', 'Siaga', 'Tidak boleh mendekat dalam radius 5 km. Waspada tsunami vulkanik di pesisir Selat Sunda.', 'krakatau.jpg', 'Aktif', 'Kaldera', '2022', '800-1100°C', 'Andesit-Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(18, 'Gunung Batur', 'Bali', 1717, 'Gunung Batur terletak dalam kaldera ganda yang spektakuler. Memiliki sejarah letusan yang panjang dengan kaldera terbentuk sekitar 29.000 tahun lalu.', 'Batur adalah gunung api kompleks dalam kaldera. Memiliki beberapa kerucut parasit dan kawah aktif yang sering meletus.', 'Waspada', 'Pendakian diperbolehkan dengan pemandu. Hindari kawah saat aktivitas meningkat.', 'batur.jpg', 'Aktif', 'Kaldera', '2000', '600-900°C', 'Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(19, 'Gunung Sumbing', 'Jawa Tengah', 3370, 'Gunung Sumbing merupakan gunung api aktif yang memiliki kawah ganda. Aktivitas terakhir berupa emisi fumarol dan solfatara.', 'Sumbing adalah stratovolcano andesitik dengan kawah kompleks. Memiliki aktivitas fumarolik di kawah utama.', 'Normal', 'Status normal, pendakian diperbolehkan dengan tetap waspada terhadap gas beracun.', 'sumbing.jpg', 'Aktif', 'Stratovolcano', '1730', '500-800°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(20, 'Gunung Sundoro', 'Jawa Tengah', 3136, 'Gunung Sundoro memiliki kawah yang masih aktif dengan fumarol dan solfatara. Letusan terakhir terjadi pada abad ke-19.', 'Sundoro adalah stratovolcano andesitik dengan kawah yang dalam. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian aman dengan tetap menjaga jarak dari kawah aktif.', 'sundoro.jpg', 'Aktif', 'Stratovolcano', '1903', '400-700°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(21, 'Gunung Dieng', 'Jawa Tengah', 2565, 'Kompleks Dieng merupakan dataran tinggi vulkanik dengan banyak kawah aktif, fumarol, dan danau vulkanik. Sering terjadi letusan freatik.', 'Dieng adalah kompleks vulkanik dengan multiple kawah. Aktivitas dominan freatik dengan emisi gas CO2 beracun.', 'Waspada', 'Waspada gas beracun (CO2) di daerah rendah. Selalu ikuti jalur evakuasi.', 'dieng.jpg', 'Aktif', 'Kompleks Vulkanik', '2021', '200-500°C', 'Andesit-Dasit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(22, 'Gunung Slamet', 'Jawa Tengah', 3428, 'Gunung Slamet merupakan gunung api teraktif di Jawa Tengah dengan letusan berkala. Sering mengeluarkan abu vulkanik dan suara gemuruh.', 'Slamet adalah stratovolcano andesitik besar dengan kawah aktif. Sering mengalami leturan strombolian dan emisi abu.', 'Waspada', 'Zona bahaya radius 2 km dari puncak. Pendakian tidak diperbolehkan saat status waspada.', 'slamet.jpg', 'Aktif', 'Stratovolcano', '2014', '700-1000°C', 'Andesit-Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(23, 'Gunung Ciremai', 'Jawa Barat', 3078, 'Gunung Ciremai merupakan gunung api tertinggi di Jawa Barat. Memiliki kawah ganda dengan aktivitas fumarolik.', 'Ciremai adalah stratovolcano andesitik dengan kawah yang relatif tenang. Aktivitas terkini berupa emisi gas lemah.', 'Normal', 'Pendakian diperbolehkan dengan tetap waspada terhadap perubahan aktivitas.', 'ciremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(24, 'Gunung Gede', 'Jawa Barat', 2958, 'Gunung Gede merupakan gunung api aktif yang memiliki beberapa kawah aktif. Sering terjadi letusan freatik kecil.', 'Gede adalah gunung api kompleks dengan multiple kawah aktif. Aktivitas fumarolik dan solfatarik intensif.', 'Waspada', 'Tidak diperbolehkan mendekat kawah aktif. Waspada gas beracun.', 'gede.jpg', 'Aktif', 'Stratovolcano', '2022', '300-600°C', 'Andesit-Dasit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(25, 'Gunung Salak', 'Jawa Barat', 2211, 'Gunung Salak merupakan kompleks vulkanik dengan beberapa puncak. Memiliki sejarah letusan freatik yang berbahaya bagi penerbangan.', 'Salak adalah kompleks vulkanik dengan kawah aktif. Sering mengeluarkan gas vulkanik yang mengganggu penerbangan.', 'Normal', 'Waspada gas vulkanik di area kawah. Informasi penting bagi penerbangan.', 'salak.jpg', 'Aktif', 'Stratovolcano', '1938', '400-700°C', 'Andesit-Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(26, 'Gunung Galunggung', 'Jawa Barat', 2168, 'Gunung Galunggung terkenal dengan letusan 1982 yang mengganggu penerbangan internasional. Memiliki kawah dengan danau yang indah.', 'Galunggung adalah stratovolcano dengan kawah danau. Pasca letusan 1982, terbentuk kubah lava di dalam kawah.', 'Normal', 'Kunjungan ke kawah diperbolehkan. Danau kawah aman untuk dikunjungi.', 'galunggung.jpg', 'Aktif', 'Stratovolcano', '1984', '600-900°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(27, 'Gunung Tangkuban Parahu', 'Jawa Barat', 2084, 'Gunung Tangkuban Parahu merupakan gunung api aktif yang populer untuk wisata. Memiliki beberapa kawah aktif dengan fumarol aktif.', 'Tangkuban Parahu adalah stratovolcano dengan multiple kawah. Kawah Ratu dan Domas aktif mengeluarkan gas belerang.', 'Waspada', 'Tidak mendekat bibir kawah saat beraktivitas fumarolik tinggi. Gunakan masker.', 'tangkuban.jpg', 'Aktif', 'Stratovolcano', '2019', '200-500°C', 'Andesit-Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(28, 'Gunung Ceremai', 'Jawa Barat', 3078, 'Gunung Ceremai memiliki bentuk yang simetris dan merupakan gunung api tertinggi di Jawa Barat. Aktivitas terakhir berupa emisi fumarol.', 'Ceremai adalah stratovolcano andesitik dengan kawah ganda. Aktivitas fumarolik lemah di kawah utama.', 'Normal', 'Pendakian aman dengan izin. Tetap pantau informasi terbaru.', 'ceremai.jpg', 'Aktif', 'Stratovolcano', '1951', '500-800°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(29, 'Gunung Lawu', 'Jawa Timur', 3265, 'Gunung Lawu merupakan gunung api yang dianggap keramat dengan banyak situs spiritual. Aktivitas vulkanik terakhir pada abad ke-19.', 'Lawu adalah stratovolcano andesitik dengan aktivitas fumarolik lemah. Memiliki beberapa kawah yang sudah tidak aktif.', 'Normal', 'Pendakian diperbolehkan. Status normal dengan aktivitas minimal.', 'lawu.jpg', 'Aktif', 'Stratovolcano', '1885', '400-700°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(30, 'Gunung Welirang', 'Jawa Timur', 3156, 'Gunung Welirang terkenal dengan deposit belerangnya yang ditambang secara tradisional. Memiliki fumarol dan solfatara aktif.', 'Welirang adalah stratovolcano dengan aktivitas fumarolik intensif. Emisi gas belerang sangat tinggi di area puncak.', 'Waspada', 'Wajib menggunakan masker gas di area puncak. Penambang belerang harus ekstra hati-hati.', 'welirang.jpg', 'Aktif', 'Stratovolcano', '1952', '200-600°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(31, 'Gunung Arjuno', 'Jawa Timur', 3339, 'Gunung Arjuno merupakan kompleks vulkanik dengan beberapa puncak. Memiliki kawah yang sudah tidak aktif dengan danau kecil.', 'Arjuno adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama sudah tidak menunjukkan aktivitas signifikan.', 'Normal', 'Pendakian aman. Tidak ada larangan khusus saat status normal.', 'arjuno.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(32, 'Gunung Lamongan', 'Jawa Timur', 1651, 'Gunung Lamongan memiliki banyak kawah kecil dan danau vulkanik. Aktivitas terakhir berupa letusan freatik pada abad ke-19.', 'Lamongan adalah gunung api dengan banyak kerucut parasit. Memiliki danau kawah dan aktivitas fumarolik lemah.', 'Normal', 'Status normal, kunjungan diperbolehkan dengan pengawasan.', 'lamongan.jpg', 'Aktif', 'Stratovolcano', '1898', '500-800°C', 'Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(33, 'Gunung Raung', 'Jawa Timur', 3332, 'Gunung Raung memiliki kaldera yang sangat besar dan dalam. Sering mengeluarkan abu vulkanik yang mengganggu penerbangan di Bali.', 'Raung adalah stratovolcano dengan kaldera besar. Sering mengalami leturan strombolian dan emisi abu tinggi.', 'Siaga', 'Zona bahaya radius 3 km. Penerbangan harus waspada abu vulkanik.', 'raung.jpg', 'Aktif', 'Stratovolcano', '2021', '700-1000°C', 'Andesit-Basalt', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(34, 'Gunung Iyang', 'Jawa Timur', 2550, 'Gunung Iyang merupakan kompleks vulkanik dengan beberapa puncak. Aktivitas terakhir berupa emisi fumarol pada abad ke-20.', 'Iyang adalah kompleks vulkanik dengan aktivitas fumarolik lemah. Kawah utama menunjukkan aktivitas minimal.', 'Normal', 'Pendakian diperbolehkan. Tidak ada pembatasan khusus.', 'iyang.jpg', 'Aktif', 'Stratovolcano', '1952', '400-700°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33'),
(35, 'Gunung Argopuro', 'Jawa Timur', 3088, 'Gunung Argopuro memiliki kaldera besar dan merupakan gunung api yang sudah lama tidak aktif. Memiliki danau kawah yang indah.', 'Argopuro adalah stratovolcano dengan kaldera. Aktivitas vulkanik sangat rendah, didominasi oleh fumarol lemah.', 'Normal', 'Status normal, pendakian panjang tetapi aman.', 'argopuro.jpg', 'Aktif', 'Stratovolcano', 'Tidak tercatat', '300-600°C', 'Andesit', 0, '2025-11-09 03:48:33', '2025-11-09 03:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gunung_api`
--

CREATE TABLE `gunung_api` (
  `id` int(11) NOT NULL,
  `gunung` varchar(100) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `lokasi` text NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `meninggal` int(11) DEFAULT 0,
  `luka` int(11) DEFAULT 0,
  `pengungsi` int(11) DEFAULT 0,
  `dampak` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pemantauan',
  `prediksi` tinyint(1) DEFAULT 0,
  `ketinggian` int(11) DEFAULT NULL,
  `status_gunung` varchar(50) DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gunung_api`
--

INSERT INTO `gunung_api` (`id`, `gunung`, `tanggal`, `tahun`, `lokasi`, `provinsi`, `meninggal`, `luka`, `pengungsi`, `dampak`, `status`, `prediksi`, `ketinggian`, `status_gunung`, `created_at`, `updated_at`) VALUES
(1, 'Gunung Leuser', '15 Juni 2022', 2022, 'Aceh Tenggara', 'Aceh', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3404, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(2, 'Gunung Burni Telong', '20 Agustus 2021', 2021, 'Bener Meriah', 'Aceh', 0, 0, 150, 'Emisi gas vulkanik', 'Pemantauan', 0, 2645, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(3, 'Gunung Sinabung', '10 Agustus 2020', 2020, 'Karo', 'Sumatera Utara', 2, 15, 5200, 'Awan panas, lahan pertanian rusak', 'Selesai', 0, 2460, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(4, 'Gunung Sibayak', '5 Maret 2023', 2023, 'Karo', 'Sumatera Utara', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', 0, 2094, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(5, 'Gunung Marapi', '22 Januari 2024', 2024, 'Agam & Tanah Datar', 'Sumatera Barat', 0, 12, 1500, 'Awan panas, abu vulkanik', 'Aktif', 0, 2891, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(6, 'Gunung Singgalang', '10 November 2022', 2022, 'Agam', 'Sumatera Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2877, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(7, 'Gunung Tandikat', '15 Juli 2021', 2021, 'Padang Pariaman', 'Sumatera Barat', 0, 0, 0, 'Peningkatan suhu', 'Pemantauan', 0, 2438, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(8, 'Gunung Kerinci', '15 Mei 2024', 2024, 'Kerinci', 'Jambi', 0, 3, 800, 'Abu vulkanik radius 10km', 'Aktif', 0, 3805, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(9, 'Gunung Dempo', '8 September 2023', 2023, 'Pagar Alam', 'Sumatera Selatan', 0, 0, 350, 'Emisi gas belerang', 'Pemantauan', 0, 3173, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(10, 'Gunung Rajabasa', '12 Desember 2022', 2022, 'Lampung Selatan', 'Lampung', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 1281, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(11, 'Gunung Pesagi', '20 Oktober 2021', 2021, 'Lampung Barat', 'Lampung', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2230, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(12, 'Gunung Kaba', '30 Maret 2023', 2023, 'Rejang Lebong', 'Bengkulu', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', 0, 1940, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(13, 'Gunung Karang', '18 Februari 2024', 2024, 'Pandeglang', 'Banten', 0, 0, 0, 'Aktivitas seismik', 'Pemantauan', 0, 1778, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(14, 'Gunung Gede Pangrango', '5 April 2023', 2023, 'Sukabumi & Cianjur', 'Jawa Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2958, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(15, 'Gunung Tangkuban Perahu', '26 Juli 2019', 2019, 'Bandung Barat', 'Jawa Barat', 0, 0, 2500, 'Erupsi freatik, kawasan wisata ditutup', 'Selesai', 0, 2084, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(16, 'Gunung Merapi', '11 Maret 2023', 2023, 'Magelang & Boyolali', 'Jawa Tengah', 2, 15, 1250, 'Awan panas, 45 rumah rusak', 'Selesai', 0, 2930, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(17, 'Gunung Merbabu', '15 Januari 2024', 2024, 'Magelang & Boyolali', 'Jawa Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3145, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(18, 'Gunung Slamet', '18 Agustus 2023', 2023, 'Banyumas & Tegal', 'Jawa Tengah', 0, 2, 800, 'Luncuran awan panas', 'Selesai', 0, 3428, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(19, 'Gunung Sumbing', '22 Mei 2022', 2022, 'Wonosobo & Temanggung', 'Jawa Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3371, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(20, 'Gunung Sindoro', '30 November 2023', 2023, 'Temanggung & Wonosobo', 'Jawa Tengah', 0, 0, 300, 'Emisi abu vulkanik', 'Pemantauan', 0, 3136, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(21, 'Gunung Merapi', '11 Maret 2023', 2023, 'Sleman', 'DI Yogyakarta', 2, 15, 1250, 'Awan panas, 45 rumah rusak', 'Selesai', 0, 2930, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(22, 'Gunung Bromo', '20 Januari 2024', 2024, 'Probolinggo & Pasuruan', 'Jawa Timur', 0, 0, 1500, 'Abu vulkanik, wisata ditutup sementara', 'Aktif', 0, 2329, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(23, 'Gunung Semeru', '4 Desember 2022', 2022, 'Lumajang & Malang', 'Jawa Timur', 57, 104, 10250, 'Awan panas guguran, 5,205 rumah rusak', 'Selesai', 0, 3676, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(24, 'Gunung Ijen', '3 Maret 2024', 2024, 'Banyuwangi', 'Jawa Timur', 0, 0, 0, 'Emisi gas belerang meningkat', 'Pemantauan', 0, 2799, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(25, 'Gunung Kelud', '14 Februari 2024', 2024, 'Kediri & Blitar', 'Jawa Timur', 0, 0, 2500, 'Peningkatan aktivitas seismik', 'Pemantauan', 0, 1731, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(26, 'Gunung Argopuro', '14 Maret 2023', 2023, 'Situbondo & Probolinggo', 'Jawa Timur', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3088, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(27, 'Gunung Agung', '21 November 2023', 2023, 'Karangasem', 'Bali', 0, 0, 25000, 'Emisi abu, bandara ditutup sementara', 'Selesai', 0, 3031, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(28, 'Gunung Batur', '8 Juni 2022', 2022, 'Bangli', 'Bali', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 1717, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(29, 'Gunung Rinjani', '8 September 2023', 2023, 'Lombok Timur', 'Nusa Tenggara Barat', 0, 8, 3200, 'Luncuran awan panas, lahan pertanian terdampak abu', 'Aktif', 0, 3726, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(30, 'Gunung Inerie', '15 Oktober 2023', 2023, 'Ngada', 'Nusa Tenggara Timur', 0, 0, 0, 'Aktivitas fumarol', 'Pemantauan', 0, 2245, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(31, 'Gunung Egon', '5 Agustus 2022', 2022, 'Sikka', 'Nusa Tenggara Timur', 0, 0, 450, 'Emisi gas vulkanik', 'Pemantauan', 0, 1703, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(32, 'Gunung Lewotobi', '12 Januari 2024', 2024, 'Flores Timur', 'Nusa Tenggara Timur', 0, 0, 1200, 'Abu vulkanik', 'Pemantauan', 0, 1703, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(33, 'Gunung Niut', '20 Mei 2021', 2021, 'Bengkayang', 'Kalimantan Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 1701, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(34, 'Gunung Bukit Raya', '15 November 2020', 2020, 'Katingan', 'Kalimantan Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2278, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(35, 'Gunung Lumut', '10 Desember 2022', 2022, 'Paser', 'Kalimantan Timur', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 1582, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(36, 'Gunung Soputan', '3 Oktober 2023', 2023, 'Minahasa Tenggara', 'Sulawesi Utara', 1, 0, 2100, 'Awan panas, 12 rumah rusak', 'Selesai', 0, 1784, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(37, 'Gunung Lokon', '18 Juli 2022', 2022, 'Tomohon', 'Sulawesi Utara', 0, 0, 800, 'Emisi abu vulkanik', 'Pemantauan', 0, 1580, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(38, 'Gunung Ambang', '25 September 2023', 2023, 'Bolaang Mongondow Timur', 'Gorontalo', 0, 0, 0, 'Aktivitas seismik', 'Pemantauan', 0, 1830, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(39, 'Gunung Rantemario', '5 April 2021', 2021, 'Luwu', 'Sulawesi Tengah', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3478, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(40, 'Gunung Latimojong', '12 Agustus 2022', 2022, 'Enrekang', 'Sulawesi Selatan', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 3478, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(41, 'Gunung Mekongga', '30 Juni 2023', 2023, 'Kolaka', 'Sulawesi Tenggara', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2650, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(42, 'Gunung Banda Api', '15 Mei 2022', 2022, 'Maluku Tengah', 'Maluku', 0, 0, 1500, 'Erupsi kecil, pemukiman terdampak abu', 'Selesai', 0, 641, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(43, 'Gunung Gamalama', '8 Maret 2024', 2024, 'Kota Ternate', 'Maluku Utara', 0, 0, 800, 'Emisi abu vulkanik', 'Pemantauan', 0, 1715, 'Waspada', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(44, 'Gunung Dukono', '20 November 2023', 2023, 'Halmahera Utara', 'Maluku Utara', 0, 0, 0, 'Emisi abu terus menerus', 'Aktif', 0, 1229, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(45, 'Gunung Ibu', '12 Februari 2024', 2024, 'Halmahera Barat', 'Maluku Utara', 0, 0, 600, 'Awan panas guguran', 'Aktif', 0, 1325, 'Siaga', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(46, 'Gunung Arfak', '5 Januari 2021', 2021, 'Manokwari', 'Papua Barat', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 2955, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10'),
(47, 'Puncak Jaya (Carstensz)', '15 Oktober 2020', 2020, 'Mimika', 'Papua', 0, 0, 0, 'Aktivitas normal', 'Pemantauan', 0, 4884, 'Normal', '2025-11-11 17:41:10', '2025-11-11 17:41:10');

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
  `status` enum('Belum Dikonfirmasi','Terkonfirmasi') DEFAULT 'Belum Dikonfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `nama_pelapor`, `telepon`, `lokasi`, `keparahan`, `kerusakan`, `kebutuhan`, `foto_path`, `waktu_lapor`, `status`) VALUES
(1, 'Budi Santoso', '081234567890', 'Desa Lereng Agung, Kec. Karangasem', 'Berat', 'Atap rumah hancur sebagian, listrik terputus.', 'Air mineral, Masker N95', '', '2025-11-09 11:34:04', 'Terkonfirmasi'),
(2, 'Citra Dewi', '087711223344', 'Dusun Sukamaju, Kec. Klungkung', 'Sedang', 'Jalan tertutup abu setebal 5 cm, jarak pandang rendah.', 'Masker, Kacamata Pelindung', '', '2025-11-09 11:34:04', 'Belum Dikonfirmasi'),
(3, 'Joko Susilo', '089955544333', 'Kota Pinggiran', 'Ringan', 'Getaran terasa ringan, tidak ada kerusakan fisik.', 'Informasi resmi', '', '2025-11-09 11:34:04', 'Belum Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringatan`
--

CREATE TABLE `peringatan` (
  `id` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peringatan`
--

INSERT INTO `peringatan` (`id`, `isi_pesan`, `tanggal_update`) VALUES
(1, 'PERINGATAN: Gunung Anak Krakatau dalam Status Siaga. Masyarakat dihimbau tidak beraktivitas dalam radius 5 km dari kawah.', '2025-11-12 16:57:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_aktivitas`
--

CREATE TABLE `riwayat_aktivitas` (
  `id` int(11) NOT NULL,
  `gunung_id` int(11) DEFAULT NULL,
  `periode` varchar(100) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tipe_aktivitas` enum('letusan','peningkatan','penurunan','normal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_aktivitas`
--

INSERT INTO `riwayat_aktivitas` (`id`, `gunung_id`, `periode`, `judul`, `deskripsi`, `tipe_aktivitas`) VALUES
(26, 2, '2023', 'Letusan Besar', 'Letusan dengan kolom abu mencapai 1500 meter dan guguran awan panas', 'letusan'),
(27, 2, '2022', 'Pertumbuhan Kubah Lava', 'Pertumbuhan kubah lava baru di kawah Jonggring Saloko', 'peningkatan'),
(28, 4, '2022', 'Emisi Gas Tinggi', 'Tingkat emisi SO2 menunjukkan peningkatan signifikan', 'peningkatan'),
(29, 4, '2023', 'Stabil', 'Aktivitas dalam level normal dengan emisi gas konsisten', 'normal'),
(30, 5, '2023', 'Letusan Eksplosif', 'Letusan eksplosif dengan kolom abu mencapai 3000 meter', 'letusan'),
(31, 5, '2024', 'Pertumbuhan Kubah Lava', 'Pertumbuhan kubah lava baru terdeteksi', 'peningkatan'),
(32, 2, '2023', 'Letusan Besar', 'Letusan dengan kolom abu mencapai 1500 meter dan guguran awan panas', 'letusan'),
(33, 2, '2022', 'Pertumbuhan Kubah Lava', 'Pertumbuhan kubah lava baru di kawah Jonggring Saloko', 'peningkatan'),
(34, 4, '2022', 'Emisi Gas Tinggi', 'Tingkat emisi SO2 menunjukkan peningkatan signifikan', 'peningkatan'),
(35, 4, '2023', 'Stabil', 'Aktivitas dalam level normal dengan emisi gas konsisten', 'normal'),
(36, 5, '2023', 'Letusan Eksplosif', 'Letusan eksplosif dengan kolom abu mencapai 3000 meter', 'letusan'),
(37, 5, '2024', 'Pertumbuhan Kubah Lava', 'Pertumbuhan kubah lava baru terdeteksi', 'peningkatan'),
(38, 6, '2016-Sekarang', 'Emisi Gas Tinggi', 'Aktivitas fumarolik dengan emisi gas belerang yang konsisten', 'peningkatan'),
(39, 6, '2009-2016', 'Letusan Kecil', 'Serangkaian letusan kecil dengan abu vulkanik', 'letusan'),
(40, 6, '2004-2009', 'Aktivitas Normal', 'Emisi gas dalam level normal', 'normal'),
(41, 7, '2016', 'Letusan Gunung Baru Jari', 'Letusan dari kerucut baru dalam kaldera', 'letusan'),
(42, 7, '2010-2016', 'Peningkatan Aktivitas', 'Peningkatan suhu danau Segara Anak', 'peningkatan'),
(43, 7, '2009-2010', 'Stabil', 'Aktivitas vulkanik dalam level dasar', 'normal'),
(44, 8, '2014', 'Letusan Eksplosif Besar', 'Letusan dahsyat yang menghancurkan kubah lava lama', 'letusan'),
(45, 8, '2007-2014', 'Pembentukan Kubah Lava', 'Pertumbuhan kubah lava di danau kawah', 'peningkatan'),
(46, 8, '1990-2007', 'Masa Tenang', 'Aktivitas minimal dengan danau kawah stabil', 'normal'),
(47, 9, '2017-2019', 'Siklus Letusan', 'Serangkaian leturan setelah 54 tahun tertidur', 'letusan'),
(48, 9, '1963-2017', 'Masa Tenang Panjang', 'Periode istirahat setelah letusan dahsyat 1963', 'normal'),
(49, 10, '2018-2023', 'Letusan Berkala', 'Letusan kecil terjadi hampir setiap tahun', 'letusan'),
(50, 10, '2011-2018', 'Aktivitas Intensif', 'Frekuensi letusan yang meningkat', 'peningkatan'),
(51, 10, '2008-2011', 'Stabil', 'Aktivitas vulkanik periodik', 'normal'),
(52, 11, '2011-2015', 'Periode Letusan', 'Serangkaian letusan dari kawah Tompaluan', 'letusan'),
(53, 11, '2003-2011', 'Aktivitas Fumarolik', 'Emisi gas dan uap tinggi', 'peningkatan'),
(54, 12, '1990-1999', 'Aktivitas Freatik', 'Letusan freatik dengan emisi gas', 'letusan'),
(55, 12, '1952-1990', 'Emisi Gas Stabil', 'Aktivitas fumarolik konsisten', 'normal'),
(56, 13, '2005-2007', 'Peningkatan Aktivitas', 'Peningkatan suhu danau kawah dan emisi gas', 'peningkatan'),
(57, 13, '2001-2005', 'Stabil', 'Aktivitas dalam level normal', 'normal'),
(58, 14, '2011-2018', 'Letusan Periodik', 'Letusan kecil terjadi beberapa kali', 'letusan'),
(59, 14, '2003-2011', 'Aktivitas Fumarolik', 'Emisi gas dan uap dari kawah', 'peningkatan'),
(60, 15, '2002', 'Letusan Freatik', 'Letusan uap dan material freatik', 'letusan'),
(61, 15, '1998-2002', 'Peningkatan Suhu', 'Peningkatan suhu fumarol dan emisi gas', 'peningkatan'),
(62, 1, '2023', 'Letusan Kecil', 'Terjadi letusan dengan tinggi kolom abu 1000 meter', 'letusan'),
(63, 1, '2024', 'Deformasi', 'Terdeteksi inflasi tubuh gunung', 'peningkatan'),
(64, 2, '2023', 'Awan Panas Guguran', 'Guguran awan panas mencapai jarak 3 km', 'letusan'),
(65, 2, '2024', 'Peningkatan Gempa', 'Peningkatan frekuensi gempa vulkanik', 'peningkatan'),
(66, 4, '2023', 'Emisi Gas', 'Peningkatan emisi gas belerang', 'peningkatan'),
(67, 5, '2023', 'Letusan Eksplosif', 'Letusan dengan lontaran material pijar', 'letusan'),
(68, 6, '2023', 'Kegempaan', 'Peningkatan aktivitas gempa vulkanik', 'peningkatan'),
(69, 9, '2023', 'Emisi SO2', 'Peningkatan emisi gas SO2', 'peningkatan'),
(70, 10, '2023', 'Letusan Strombolian', 'Letusan dengan lontaran bom vulkanik', 'letusan'),
(187, 16, '1815', 'Letusan Super', 'Letusan terdahsyat dalam sejarah modern, mengubah iklim global', 'letusan'),
(188, 16, '1880-1967', 'Aktivitas Minor', 'Letusan kecil dan pembentukan kerucut baru di kaldera', 'letusan'),
(189, 16, '1967-Sekarang', 'Masa Tenang', 'Aktivitas fumarolik lemah, status normal', 'normal'),
(190, 17, '1883', 'Letusan Katastropik', 'Letusan dahsyat menghancurkan Pulau Krakatau', 'letusan'),
(191, 17, '1927-Sekarang', 'Pertumbuhan Anak Krakatau', 'Pertumbuhan gunung baru dari kaldera', 'peningkatan'),
(192, 17, '2018', 'Letusan dan Tsunami', 'Letusan menyebabkan tsunami di Selat Sunda', 'letusan'),
(193, 17, '2020-2023', 'Aktivitas Berkala', 'Letusan strombolian dan emisi abu', 'letusan'),
(194, 18, '1917-2000', 'Seri Letusan', 'Serangkaian leturan membentuk kerucut baru', 'letusan'),
(195, 18, '1963-1968', 'Leturan Besar', 'Leturan efusif dengan aliran lava', 'letusan'),
(196, 18, '2000-Sekarang', 'Aktivitas Rendah', 'Emisi fumarol dan aktivitas minimal', 'normal'),
(197, 19, '1730', 'Letusan Terakhir', 'Letusan terakhir yang tercatat dalam sejarah', 'letusan'),
(198, 19, '1800-Sekarang', 'Fumarolik', 'Aktivitas fumarolik lemah berkelanjutan', 'normal'),
(199, 20, '1903', 'Letusan Historis', 'Letusan terakhir yang terdokumentasi', 'letusan'),
(200, 20, '1903-Sekarang', 'Tenang', 'Aktivitas vulkanik sangat rendah', 'normal'),
(201, 21, '2011-2021', 'Letusan Freatik', 'Serangkaian letusan freatik dari kawah Sikidang', 'letusan'),
(202, 21, '1979-2011', 'Aktivitas Gas', 'Emisi gas CO2 dan peristiwa gas beracun', 'peningkatan'),
(203, 21, '2022-Sekarang', 'Stabil', 'Aktivitas dalam level waspada', 'normal'),
(204, 22, '2009-2014', 'Periode Letusan', 'Letusan strombolian dan emisi abu intensif', 'letusan'),
(205, 22, '2000-2009', 'Peningkatan Aktivitas', 'Peningkatan gempa dan emisi gas', 'peningkatan'),
(206, 22, '2014-Sekarang', 'Waspada', 'Aktivitas vulkanik periodik', ''),
(207, 23, '1951', 'Leturan Terakhir', 'Leturan kecil dengan emisi abu', 'letusan'),
(208, 23, '1937-1951', 'Aktivitas Fumarolik', 'Emisi gas dan uap intensif', 'peningkatan'),
(209, 23, '1951-Sekarang', 'Tenang', 'Aktivitas minimal dengan status normal', 'normal'),
(210, 24, '2020-2022', 'Letusan Freatik', 'Letusan freatik kecil dari kawah aktif', 'letusan'),
(211, 24, '2011-2020', 'Peningkatan Suhu', 'Peningkatan suhu air kawah dan emisi gas', 'peningkatan'),
(212, 24, '2022-Sekarang', 'Waspada', 'Aktivitas fumarolik terus dipantau', ''),
(213, 25, '1938', 'Letusan Terakhir', 'Letusan freatik dengan emisi abu', 'letusan'),
(214, 25, '1900-1938', 'Aktiv Periodik', 'Letusan freatik berkala', 'letusan'),
(215, 25, '1938-Sekarang', 'Normal', 'Aktivitas fumarolik lemah', 'normal'),
(216, 26, '1982-1984', 'Letusan Besar', 'Letusan dengan abu mengganggu penerbangan', 'letusan'),
(217, 26, '1918-1982', 'Masa Tenang', 'Aktivitas minimal setelah letusan 1918', 'normal'),
(218, 26, '1984-Sekarang', 'Stabil', 'Pembentukan kubah lava dan aktivitas tenang', 'normal'),
(219, 27, '2013-2019', 'Aktivitas Freatik', 'Letusan freatik dan peningkatan emisi gas', 'letusan'),
(220, 27, '2005-2013', 'Peningkatan Suhu', 'Peningkatan suhu kawah dan fumarol', 'peningkatan'),
(221, 27, '2019-Sekarang', 'Waspada', 'Aktivitas fumarolik intensif', ''),
(222, 28, '1951', 'Aktivitas Terakhir', 'Leturan kecil dengan emisi abu', 'letusan'),
(223, 28, '1937-1951', 'Fumarolik Tinggi', 'Emisi gas dan uap signifikan', 'peningkatan'),
(224, 28, '1951-Sekarang', 'Normal', 'Aktivitas vulkanik sangat rendah', 'normal'),
(225, 29, '1885', 'Letusan Historis', 'Letusan terakhir yang tercatat', 'letusan'),
(226, 29, '1800-1885', 'Aktivitas Minor', 'Letusan kecil periodik', 'letusan'),
(227, 29, '1885-Sekarang', 'Tenang', 'Tidak ada aktivitas signifikan', 'normal'),
(228, 30, '1952', 'Aktivitas Terakhir', 'Emisi gas dan material freatik', 'letusan'),
(229, 30, '1940-1952', 'Fumarolik Intensif', 'Aktivitas fumarolik tinggi', 'peningkatan'),
(230, 30, '1952-Sekarang', 'Waspada', 'Emisi gas belerang terus berlanjut', ''),
(231, 31, '1952', 'Aktivitas Terakhir', 'Emisi fumarol dan material vulkanik', 'letusan'),
(232, 31, '1900-1952', 'Aktivitas Periodik', 'Letusan kecil berkala', 'letusan'),
(233, 31, '1952-Sekarang', 'Normal', 'Aktivitas fumarolik lemah', 'normal'),
(234, 32, '1898', 'Letusan Terakhir', 'Letusan freatik dengan emisi abu', 'letusan'),
(235, 32, '1800-1898', 'Aktivitas Intensif', 'Banyak letusan kecil dari kerucut parasit', 'letusan'),
(236, 32, '1898-Sekarang', 'Tenang', 'Aktivitas vulkanik minimal', 'normal'),
(237, 33, '2015-2021', 'Letusan Berkala', 'Letusan dengan abu vulkanik tinggi', 'letusan'),
(238, 33, '2012-2015', 'Peningkatan Aktivitas', 'Peningkatan gempa dan deformasi', 'peningkatan'),
(239, 33, '2021-Sekarang', 'Siaga', 'Aktivitas vulkanik terus meningkat', ''),
(240, 34, '1952', 'Aktivitas Terakhir', 'Emisi fumarol dan gas vulkanik', 'letusan'),
(241, 34, '1920-1952', 'Aktivitas Fumarolik', 'Emisi gas periodik', 'peningkatan'),
(242, 34, '1952-Sekarang', 'Normal', 'Aktivitas vulkanik rendah', 'normal'),
(243, 35, 'Tidak tercatat', 'Tidak Ada Aktivitas', 'Tidak ada letusan dalam sejarah modern', 'normal'),
(244, 35, 'Pra-Sejarah', 'Aktivitas Masa Lalu', 'Pembentukan kaldera pada masa pra-sejarah', 'letusan');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gunung_api`
--
ALTER TABLE `gunung_api`
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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gunung_id` (`gunung_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_gunung`
--
ALTER TABLE `data_gunung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `data_korban`
--
ALTER TABLE `data_korban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `gunung_api`
--
ALTER TABLE `gunung_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
-- AUTO_INCREMENT untuk tabel `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat_aktivitas`
--
ALTER TABLE `riwayat_aktivitas`
  ADD CONSTRAINT `riwayat_aktivitas_ibfk_1` FOREIGN KEY (`gunung_id`) REFERENCES `gunung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
