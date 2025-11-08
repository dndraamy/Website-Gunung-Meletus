<?php
// gunung.php
include_once 'config.php';

$db = new Database();
$conn = $db->getConnection();

// Ambil semua data gunung api
$query = "SELECT * FROM gunung_api ORDER BY 
          FIELD(status, 'Awas', 'Siaga', 'Waspada', 'Normal'), 
          nama ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
$gunung_api = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Filter berdasarkan status jika ada
$filter_status = $_GET['status'] ?? '';
if($filter_status) {
    $query = "SELECT * FROM gunung_api WHERE status = ? ORDER BY nama ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute([$filter_status]);
    $gunung_api = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gunung Api - Sistem Informasi Gunung Api</title>
    <style>
        /* Gunakan CSS dari index.php dengan tambahan */
        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }
        
        .filter-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary);
            background: white;
            color: var(--primary);
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: white;
        }
        
        .gunung-table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: var(--primary);
            color: white;
            font-weight: 600;
        }
        
        tr:hover {
            background: #f9f9f9;
        }
        
        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .action-btn {
            padding: 0.3rem 0.8rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: var(--transition);
        }
        
        .action-btn:hover {
            background: var(--secondary);
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <a href="index.php">Beranda</a> | 
        <a href="admin.php">Admin Panel</a> | 
        <a href="map.php">Peta Lengkap</a>
    </div>
    
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyMmM1LjUyMyAwIDEwLTQuNDc3IDEwLTEwUzE3LjUyMyAyIDEyIDIgMiA2LjQ3NyAyIDEyczQuNDc3IDEwIDEwIDEweiI+PC9wYXRoPjxwYXRoIGQ9Ik0xMiA2djYiPjwvcGF0aD48cGF0aCBkPSJNMTIgMTJoNCI+PC9wYXRoPjwvc3ZnPg==" alt="Logo PVMBG">
                    <h1>Daftar Gunung Api</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="gunung.php" class="active">Gunung Api</a></li>
                        <li><a href="map.php">Peta</a></li>
                        <li><a href="pengumuman.php">Pengumuman</a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container main-content">
        <section class="filter-section">
            <h2 class="section-title">Filter Berdasarkan Status</h2>
            <div class="filter-buttons">
                <a href="gunung.php" class="filter-btn <?php echo !$filter_status ? 'active' : ''; ?>">Semua</a>
                <a href="gunung.php?status=Awas" class="filter-btn <?php echo $filter_status == 'Awas' ? 'active' : ''; ?>">Awas</a>
                <a href="gunung.php?status=Siaga" class="filter-btn <?php echo $filter_status == 'Siaga' ? 'active' : ''; ?>">Siaga</a>
                <a href="gunung.php?status=Waspada" class="filter-btn <?php echo $filter_status == 'Waspada' ? 'active' : ''; ?>">Waspada</a>
                <a href="gunung.php?status=Normal" class="filter-btn <?php echo $filter_status == 'Normal' ? 'active' : ''; ?>">Normal</a>
            </div>
        </section>

        <section class="gunung-section">
            <h2 class="section-title">Daftar Gunung Api di Indonesia</h2>
            
            <div class="gunung-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Gunung</th>
                            <th>Lokasi</th>
                            <th>Ketinggian</th>
                            <th>Status</th>
                            <th>Update Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($gunung_api as $gunung): ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($gunung['nama']); ?></strong>
                            </td>
                            <td><?php echo htmlspecialchars($gunung['lokasi']); ?></td>
                            <td><?php echo number_format($gunung['ketinggian'], 0); ?> mdpl</td>
                            <td>
                                <span class="status-badge" style="background: <?php echo getStatusColor($gunung['status']); ?>">
                                    <?php echo $gunung['status']; ?>
                                </span>
                            </td>
                            <td><?php echo date('d M Y H:i', strtotime($gunung['last_update'])); ?></td>
                            <td>
                                <a href="gunung_detail.php?id=<?php echo $gunung['id']; ?>" class="action-btn">Detail</a>
                                <a href="map.php?gunung=<?php echo $gunung['id']; ?>" class="action-btn">Peta</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>Sistem Informasi Gunung Api dikembangkan oleh Pusat Vulkanologi dan Mitigasi Bencana Geologi (PVMBG).</p>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p>PVMBG - Badan Geologi</p>
                    <p>Jl. Diponegoro No. 57, Bandung</p>
                    <p>Telp: (022) 7272606</p>
                    <p>Email: info@pvmbg.esdm.go.id</p>
                </div>
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <a href="gunung.php">Status Gunung Api</a>
                    <a href="map.php">Peta Interaktif</a>
                    <a href="pengumuman.php">Pengumuman</a>
                    <a href="#">Data Historis</a>
                    <a href="#">Unduhan</a>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Pusat Vulkanologi dan Mitigasi Bencana Geologi (PVMBG).</p>
            </div>
        </div>
    </footer>
</body>
</html>