<?php
session_start();

include 'koneksi.php';

// 1. Pengecekan Akses
if (!isset($_SESSION['is_admin_login']) || $_SESSION['is_admin_login'] !== true) {
    header('Location: login.php');
    exit;
}

// 2. Variabel Dashboard & Filter
$page = $_GET['page'] ?? 'dashboard';
$filter_lokasi = $_GET['lokasi'] ?? '';
$search_query = $_GET['search'] ?? '';

// Ambil daftar lokasi unik untuk filter
$result_lokasi = $conn->query("SELECT DISTINCT lokasi FROM data_gunung ORDER BY lokasi ASC");
$lokasi_options = [];
while ($row = $result_lokasi->fetch_assoc()) {
    $lokasi_options[] = $row['lokasi'];
}

// 3. Penanganan Aksi (Hapus, Update Status, Simpan Peringatan, Konfirmasi Laporan)
if (isset($_POST['update_status'])) {
    $id = intval($_POST['id']);
    $status = $conn->real_escape_string($_POST['status']);
    $conn->query("UPDATE data_gunung SET status='$status' WHERE id=$id");
    header("Location: dashboard_admin.php?page=gunung&success=status_updated");
    exit;
}

if (isset($_POST['save_warning'])) {
    $pesan = $conn->real_escape_string($_POST['pesan']);
    $latest_row = $conn->query("SELECT id FROM peringatan ORDER BY id DESC LIMIT 1")->fetch_assoc();

    if ($latest_row) {
        $id_peringatan = $latest_row['id'];
        $conn->query("UPDATE peringatan SET isi_pesan='$pesan', tanggal_update=NOW() WHERE id=$id_peringatan");
    } else {
        $conn->query("INSERT INTO peringatan (isi_pesan) VALUES ('$pesan')");
    }
    header("Location: dashboard_admin.php?page=peringatan&success=warning_saved");
    exit;
}

if (isset($_GET['konfirmasi'])) {
    $id = intval($_GET['konfirmasi']);
    $conn->query("UPDATE laporan SET status='Terkonfirmasi' WHERE id=$id");
    header("Location: dashboard_admin.php?page=laporan&success=report_confirmed");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $type = $_GET['type'] ?? 'gunung';

    if ($type === 'laporan') {
        $conn->query("DELETE FROM laporan WHERE id=$id");
        header("Location: dashboard_admin.php?page=laporan&success=deleted");
    } else {
        $conn->query("DELETE FROM data_gunung WHERE id = $id");
        header("Location: dashboard_admin.php?page=gunung&success=deleted");
    }
    exit;
}


// 4. Pengambilan Data
$sql_gunung = "SELECT * FROM data_gunung WHERE 1=1";
if (!empty($search_query)) {
    $search_term = $conn->real_escape_string($search_query);
    $sql_gunung .= " AND nama_gunung LIKE '%$search_term%'";
}
if (!empty($filter_lokasi)) {
    $filter_loc_safe = $conn->real_escape_string($filter_lokasi);
    $sql_gunung .= " AND lokasi = '$filter_loc_safe'";
}
$sql_gunung .= " ORDER BY id DESC";
$result_gunung = $conn->query($sql_gunung);

$result_laporan = $conn->query("SELECT * FROM laporan ORDER BY waktu_lapor DESC");

// Variabel Dashboard (Ringkasan Status)
$total_gunung = $conn->query("SELECT COUNT(*) AS total FROM data_gunung")->fetch_assoc()['total'];
$status_awas = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Awas'")->fetch_assoc()['total'];
$status_siaga = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Siaga'")->fetch_assoc()['total'];
$status_waspada = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Waspada'")->fetch_assoc()['total'];
$status_normal = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Normal'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin LavaLink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles_css/dashboard.css" />
</head>

<body>

    <?php
    if (isset($_GET['success'])) {
        $alert_message = '';
        switch ($_GET['success']) {
            case 'status_updated':
                $alert_message = '✅ Status gunung berhasil diperbarui!';
                break;
            case 'warning_saved':
                $alert_message = '✅ Pesan peringatan berhasil disimpan!';
                break;
            case 'deleted':
                $alert_message = '🗑️ Data berhasil dihapus.';
                break;
            case 'report_confirmed':
                $alert_message = '✅ Laporan berhasil dikonfirmasi!';
                break;
        }
        if ($alert_message) {
            echo "<script>alert('$alert_message');</script>";
        }
    }
    ?>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="?page=dashboard" class="<?= $page == 'dashboard' ? 'active' : '' ?>"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="?page=gunung" class="<?= $page == 'gunung' ? 'active' : '' ?>"><i class="fa-solid fa-mountain"></i> Data Gunung Api</a>
        <a href="?page=peringatan" class="<?= $page == 'peringatan' ? 'active' : '' ?>"><i class="fa-solid fa-bell"></i> Peringatan</a>
        <a href="?page=laporan" class="<?= $page == 'laporan' ? 'active' : '' ?>"><i class="fa-solid fa-file-lines"></i> Laporan</a>

        <form action="logout.php" method="POST" class="logout-form">
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>

    <div class="main">
        <div id="dashboard" class="page" style="display:<?= $page == 'dashboard' ? 'block' : 'none' ?>;">
            <h1>ᨒ Selamat Datang, Admin LavaLink!</h1>
            <p id="currentDateTime" style="color: #555; margin-bottom: 20px;"></p>

            <div class="card-grid">
                <div class="card status-awas">
                    <h3>Status Awas</h3>
                    <p><?= $status_awas; ?></p>
                </div>
                <div class="card status-siaga">
                    <h3>Status Siaga</h3>
                    <p><?= $status_siaga; ?></p>
                </div>
                <div class="card status-waspada">
                    <h3>Status Waspada</h3>
                    <p><?= $status_waspada; ?></p>
                </div>
                <div class="card status-normal">
                    <h3>Status Normal</h3>
                    <p><?= $status_normal; ?></p>
                </div>
            </div>

            <div class="dashboard-summary">
                <h2>Ringkasan Aktivitas</h2>
                <ul>
                    <li><i class="fas fa-database"></i> Total <strong><?= $total_gunung; ?></strong> data gunung tersimpan di sistem.</li>
                    <li><i class="fas fa-user-shield"></i> Pastikan selalu memperbarui peringatan di menu <strong>Peringatan</strong>.</li>
                </ul>
            </div>
        </div>

        <div id="gunung" class="page" style="display:<?= $page == 'gunung' ? 'block' : 'none' ?>;">
            <h1>Data Gunung Api</h1>

            <div class="filter-controls">
                <form method="GET" action="dashboard_admin.php" style="display:flex; gap:10px; margin-bottom:20px;">
                    <input type="hidden" name="page" value="gunung">
                    <input type="text" name="search" placeholder="Cari Nama Gunung..." value="<?= htmlspecialchars($search_query) ?>" style="flex-grow:1;">

                    <select name="lokasi">
                        <option value="">-- Semua Lokasi --</option>
                        <?php foreach ($lokasi_options as $lokasi): ?>
                            <option value="<?= htmlspecialchars($lokasi) ?>" <?= $filter_lokasi == $lokasi ? 'selected' : '' ?>>
                                <?= htmlspecialchars($lokasi) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i> Cari & Filter</button>
                    <a href="?page=gunung" class="reset-btn"><i class="fa-solid fa-rotate-left"></i> Reset</a>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama Gunung</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="gunungTable">
                    <?php if ($result_gunung->num_rows > 0): ?>
                        <?php while ($row = $result_gunung->fetch_assoc()) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nama_gunung']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                                <td>
                                    <form method="POST" action="dashboard_admin.php" style="display:flex; align-items:center; gap:8px;">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="page" value="gunung">
                                        <select name="status" class="status-select status-<?= strtolower($row['status']) ?>">
                                            <option value="Normal" <?= $row['status'] == 'Normal' ? 'selected' : '' ?>>Normal</option>
                                            <option value="Waspada" <?= $row['status'] == 'Waspada' ? 'selected' : '' ?>>Waspada</option>
                                            <option value="Siaga" <?= $row['status'] == 'Siaga' ? 'selected' : '' ?>>Siaga</option>
                                            <option value="Awas" <?= $row['status'] == 'Awas' ? 'selected' : '' ?>>Awas</option>
                                        </select>
                                        <button type="submit" name="update_status" class="save-status-btn" title="Simpan Status">
                                            <i class="fa-solid fa-save"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="?page=gunung&hapus=<?= $row['id'] ?>&type=gunung"
                                        onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($row['nama_gunung']) ?>? Aksi ini tidak dapat dibatalkan.')">
                                        <button class="delete-btn"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">Tidak ada data gunung yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


        <div id="peringatan" class="page" style="display:<?= $page == 'peringatan' ? 'block' : 'none' ?>;">
            <h1>Kelola Peringatan</h1>
            <form action="?page=peringatan" method="POST" style="max-width:600px;">
                <label for="pesan">Teks Peringatan:</label>
                <textarea id="pesan" name="pesan" rows="4" required>
                    <?php
                    $result_peringatan = $conn->query("SELECT isi_pesan FROM peringatan ORDER BY id DESC LIMIT 1");
                    $row_peringatan = $result_peringatan->fetch_assoc();
                    echo trim(htmlspecialchars($row_peringatan ? $row_peringatan['isi_pesan'] : ''));
                    ?>
                </textarea>
                <button type="submit" name="save_warning" class="save-btn">Simpan Perubahan</button>
            </form>
        </div>


        <div id="laporan" class="page" style="display:<?= $page == 'laporan' ? 'block' : 'none' ?>;">
            <h1>Laporan Kebencanaan</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Pelapor</th>
                        <th>Telepon</th>
                        <th>Lokasi</th>
                        <th>Keparahan</th>
                        <th>Kerusakan</th>
                        <th>Kebutuhan</th>
                        <th>Foto</th>
                        <th>Waktu Lapor</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_laporan && $result_laporan->num_rows > 0):
                        while ($row = $result_laporan->fetch_assoc()):
                    ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nama_pelapor']) ?></td>
                                <td><?= htmlspecialchars($row['telepon']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                                <td><?= htmlspecialchars($row['keparahan']) ?></td>
                                <td><?= htmlspecialchars($row['kerusakan']) ?></td>
                                <td><?= htmlspecialchars($row['kebutuhan']) ?></td>
                                <td>
                                    <?php if (!empty($row['foto_path'])): ?>
                                        <a href="<?= htmlspecialchars($row['foto_path']) ?>" target="_blank">
                                            <img src="<?= htmlspecialchars($row['foto_path']) ?>" alt="Foto Laporan" width="80">
                                        </a>
                                    <?php else: ?>
                                        Tidak ada
                                    <?php endif; ?>
                                </td>
                                <td><?= $row['waktu_lapor'] ?></td>
                                <td>
                                    <span class="status-indicator <?= $row['status'] == 'Terkonfirmasi' ? 'confirmed' : 'pending' ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td class="action-cell">
                                    <?php if ($row['status'] != 'Terkonfirmasi'): ?>
                                        <a href="?page=laporan&konfirmasi=<?= $row['id'] ?>" class="confirm-btn"
                                            onclick="return confirm('Tandai laporan ini sebagai telah dikonfirmasi?')">
                                            <i class="fa-solid fa-check" title="Konfirmasi"></i>
                                        </a>
                                    <?php else: ?>
                                        <i class="fa-solid fa-check-double confirmed-icon" title="Terkonfirmasi"></i>
                                    <?php endif; ?>
                                    <a href="?page=laporan&hapus=<?= $row['id'] ?>&type=laporan" class="delete-btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus laporan ini? Aksi ini tidak dapat dibatalkan.')">
                                        <i class="fa-solid fa-trash" title="Hapus"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="10" style="text-align:center;">Belum ada laporan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showPage(id) {
            window.location.href = `dashboard_admin.php?page=${id}`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const initialPage = '<?= $page ?>';
            document.querySelectorAll('.page').forEach(p => p.style.display = 'none');
            const activePageElement = document.getElementById(initialPage);
            if (activePageElement) {
                activePageElement.style.display = 'block';
            }

            document.querySelectorAll('.sidebar a').forEach(a => {
                const href = a.getAttribute('href');
                if (href.includes(`page=${initialPage}`)) {
                    a.classList.add('active');
                } else {
                    a.classList.remove('active');
                }
            });

            // Hapus parameter 'success' dari URL setelah alert tampil
            if (window.location.search.includes('success=')) {
                setTimeout(() => {
                    const url = new URL(window.location.href);
                    url.searchParams.delete('success');
                    history.replaceState(null, '', url.toString());
                }, 10);
            }
        });

        // Menampilkan tanggal dan waktu saat ini
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById("currentDateTime").textContent =
            now.toLocaleDateString('id-ID', options) + " | " + now.toLocaleTimeString('id-ID');
    </script>
</body>

</html>