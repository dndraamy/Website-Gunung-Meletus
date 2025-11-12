<?php
include 'koneksi.php';

// Query total gunung api
$total_gunung = $conn->query("SELECT COUNT(*) AS total FROM data_gunung")->fetch_assoc()['total'];

// Query berdasarkan status
$status_siaga = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Siaga'")->fetch_assoc()['total'];
$status_waspada = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Waspada'")->fetch_assoc()['total'];
$status_normal = $conn->query("SELECT COUNT(*) AS total FROM data_gunung WHERE status='Normal'")->fetch_assoc()['total'];

// Hapus laporan
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $conn->query("DELETE FROM laporan WHERE id=$id");
    header("Location: dashboard_admin.php?page=laporan");
    exit;
}

// --- Hapus data gunung ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM data_gunung WHERE id = $id");
}

// --- Update status gunung ---
if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $conn->query("UPDATE data_gunung SET status='$status' WHERE id=$id");
}

// --- Ambil semua data gunung ---
$result = $conn->query("SELECT * FROM data_gunung ORDER BY id DESC");

$page = $_GET['page'] ?? 'dashboard';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin LavaLink</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles_css/dashboard_admin.css" />
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#" class="active" onclick="showPage('dashboard')"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="#" onclick="showPage('gunung')"><i class="fa-solid fa-mountain"></i> Data Gunung Api</a>
        <a href="#" onclick="showPage('peringatan')"><i class="fa-solid fa-bell"></i> Peringatan</a>
        <a href="#" onclick="showPage('laporan')"><i class="fa-solid fa-file-lines"></i> Laporan</a>
        <div class="topbar">
            <form action="logout.php" method="POST" class="logout-form">
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <div class="main">
        <!-- Dashboard -->
        <div id="dashboard" class="page">
            <h1>ᨒ Selamat Datang, Admin LavaLink!</h1>
            <p id="currentDateTime" style="color: #555; margin-bottom: 20px;"></p>

            <div class="card-grid">
                <div class="card">
                    <h3>Total Gunung Api</h3>
                    <p><?= $total_gunung; ?></p>
                </div>
                <div class="card">
                    <h3>Status Siaga</h3>
                    <p><?= $status_siaga; ?></p>
                </div>
                <div class="card">
                    <h3>Status Waspada</h3>
                    <p><?= $status_waspada; ?></p>
                </div>
                <div class="card">
                    <h3>Status Normal</h3>
                    <p><?= $status_normal; ?></p>
                </div>
            </div>

            <div class="dashboard-summary">
                <h2>Ringkasan Aktivitas</h2>
                <ul>
                    <li><i class="fas fa-mountain"></i> Gunung Anak Krakatau saat ini berstatus <strong>Siaga</strong>.</li>
                    <li><i class="fas fa-database"></i> Total <strong><?= $total_gunung; ?></strong> data gunung tersimpan di sistem.</li>
                    <li><i class="fas fa-user-shield"></i> Pastikan selalu memperbarui peringatan di menu <strong>Peringatan</strong>.</li>
                </ul>
            </div>
        </div>

        <!-- Data Gunung -->
        <div id="gunung" class="page" style="display:none;">
            <h1>Data Gunung Api</h1>
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
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nama_gunung']) ?></td>
                            <td><?= htmlspecialchars($row['lokasi']) ?></td>
                            <td>
                                <form method="POST" style="display:flex; align-items:center; gap:8px;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <select name="status">
                                        <option <?= $row['status'] == 'Normal' ? 'selected' : '' ?>>Normal</option>
                                        <option <?= $row['status'] == 'Waspada' ? 'selected' : '' ?>>Waspada</option>
                                        <option <?= $row['status'] == 'Siaga' ? 'selected' : '' ?>>Siaga</option>
                                    </select>
                                    <button type="submit" name="update_status" class="save" style="padding:4px 8px;">Simpan</button>
                                </form>
                            </td>
                            <td>
                                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div id="peringatan" class="page" style="display:none;">
            <h1>Kelola Peringatan</h1>
            <form action="update_peringatan.php" method="POST" style="max-width:600px;">
                <label for="pesan">Teks Peringatan:</label>
                <textarea id="pesan" name="pesan" rows="4" required>
                    <?php
                    $result = $conn->query("SELECT isi_pesan FROM peringatan ORDER BY id DESC LIMIT 1");
                    $row = $result->fetch_assoc();
                    echo htmlspecialchars($row ? $row['isi_pesan'] : '');
                    ?>
                </textarea>
                <button type="submit" class="save">Simpan Perubahan</button>
            </form>
        </div>


        <!-- Laporan -->
        <div id="laporan" class="page" style="display:none;">
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
                    // Jika ada aksi konfirmasi
                    if (isset($_GET['konfirmasi'])) {
                        $id = intval($_GET['konfirmasi']);
                        $conn->query("UPDATE laporan SET status='Terkonfirmasi' WHERE id=$id");
                        echo "<script>alert('Laporan telah dikonfirmasi.');window.location='?page=laporan';</script>";
                    }

                    // Ambil data laporan
                    $result = $conn->query("SELECT * FROM laporan ORDER BY waktu_lapor DESC");
                    if ($result && $result->num_rows > 0):
                        while ($row = $result->fetch_assoc()):
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
                                        <img src="<?= htmlspecialchars($row['foto_path']) ?>" alt="Foto Laporan" width="80">
                                    <?php else: ?>
                                        Tidak ada
                                    <?php endif; ?>
                                </td>
                                <td><?= $row['waktu_lapor'] ?></td>
                                <td>
                                    <span style="color:<?= $row['status'] == 'Terkonfirmasi' ? 'rgba(0, 101, 44, 1)' : 'rgba(177, 0, 0, 1)' ?>; font-weight: bold;">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($row['status'] != 'Terkonfirmasi'): ?>
                                        <a href="?page=laporan&konfirmasi=<?= $row['id'] ?>"
                                            onclick="return confirm('Tandai laporan ini sebagai telah dikonfirmasi?')">
                                            <i class="fa-solid fa-check"></i>
                                        </a>
                                    <?php else: ?>
                                        <i class="fa-solid fa-check-double" style="color:green;"></i>
                                    <?php endif; ?>
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
            document.querySelectorAll('.page').forEach(p => p.style.display = 'none');
            document.getElementById(id).style.display = 'block';
            document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
            event.target.closest('a').classList.add('active');
        }

        // Gunung CRUD Dummy
        function addGunung() {
            const table = document.getElementById('gunungTable');
            const row = table.insertRow();
            row.innerHTML = `
        <td>Gunung Baru</td>
        <td>Lokasi Baru</td>
        <td>Normal</td>
        <td>
          <button onclick="editGunung(this)"><i class='fa-solid fa-pen'></i></button>
          <button onclick="hapusGunung(this)"><i class='fa-solid fa-trash'></i></button>
        </td>`;
        }

        function hapusGunung(btn) {
            btn.closest('tr').remove();
        }

        function editGunung(btn) {
            const row = btn.closest('tr');
            const statusCell = row.cells[2];
            const current = statusCell.innerText;
            const newStatus = prompt("Masukkan status baru (Normal/Siaga/Waspada):", current);
            if (newStatus) statusCell.innerText = newStatus;
        }

        // Peringatan Edit
        function saveAlert() {
            const text = document.getElementById('alertText').value;
            alert('Pesan peringatan disimpan:\n' + text);
        }

        // Laporan Dummy
        function hapusLaporan(btn) {
            btn.closest('tr').remove();
        }

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