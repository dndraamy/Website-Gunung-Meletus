<?php
include 'koneksi.php';

$sql = "SELECT id, gunung, tanggal, tahun, lokasi, provinsi, meninggal, luka, pengungsi, dampak, status, prediksi, ketinggian, status_gunung FROM gunung_api ORDER BY tahun DESC, tanggal DESC";
$result = $conn->query($sql);

$dataArray = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Korban & Statistik - Sistem Informasi Gunung Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles_css/statistik.css">
</head>

<body style="background-color: black;">
    <header>
        <?php include 'navbar.html'; ?>
    </header>

    <main class="content-wrapper">
        <section class="header-section text-center p-4 rounded-4 mb-5">
            <h1 class="fw-bold display-6 text-white">Data Korban & Statistik (2018-2025)</h1>
            <p class="lead mx-auto" style="max-width: 800px; color: white">
                Halaman ini menyajikan ringkasan data kejadian erupsi, dampak, dan korban jiwa dari berbagai gunung api di Indonesia selama periode tertentu.
            </p>
        </section>

        <!-- Card Pencarian -->
        <section>
            <div class="card-fix">
                <div>
                    <h5 class="mb-0 text-white"><i class="fas fa-search me-2 text-white"></i>Pencarian & Filter Data</h5>
                </div>
                <div class="card-body text-white">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <br>
                            <label class="form-label fw-bold">Tahun Kejadian</label>
                            <select class="form-select" id="filterTahun">
                                <option value="">Semua Tahun</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="form-label fw-bold">Provinsi</label>
                            <select class="form-select" id="filterProvinsi">
                                <option value="">Semua Provinsi</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="Sumatera Utara">Sumatera Utara</option>
                                <option value="Bali">Bali</option>
                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                <option value="Jambi">Jambi</option>
                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                <option value="Sumatera Barat">Sumatera Barat</option>
                                <!-- Tambahkan opsi provinsi lainnya sesuai data -->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="form-label fw-bold">Status Kejadian</label>
                            <select class="form-select" id="filterStatus">
                                <option value="">Semua Status</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Pemantauan">Pemantauan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="form-label fw-bold">Pencarian Nama Gunung</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchGunung" placeholder="Cari nama gunung...">
                                <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" type="button" id="clearSearch" style="transition: all 0.3s ease; margin-left: 15px;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" id="btnFilter" style="transition: all 0.3s ease;">
                                <i class="fas fa-filter me-1"></i>Terapkan Filter
                            </button>
                            <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" id="btnReset" style="transition: all 0.3s ease;">
                                <i class="fas fa-redo me-1"></i>Reset Filter
                            </button>
                            <div id="activeFilters" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Pelaporan -->
        <section>
            <br><br>
            <h2 class="section-title">Data Kejadian Erupsi</h2>
            <p class="section-subtitle">Laporkan kondisi terkini di lokasi Anda untuk membantu petugas melakukan penanganan.</p>

            <!-- Tabel Data Kejadian -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Data Kejadian Erupsi Gunung Api (2018-2025)
                        <span class="badge bg-secondary ms-2" id="totalRecords">0 data</span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="togglePrediction">
                        <label class="form-check-label text-black" for="togglePrediction">
                            Sembunyikan Data Prediksi
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="prediction-note">
                        <strong>Catatan:</strong> Data tahun 2024-2025 merupakan prediksi berdasarkan tren historis dan pemantauan aktivitas gunung api.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gunung</th>
                                    <th>Tanggal Kejadian</th>
                                    <th>Lokasi Terdampak</th>
                                    <th>Korban Meninggal</th>
                                    <th>Korban Luka</th>
                                    <th>Pengungsi</th>
                                    <th>Dampak Material</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Data akan diisi secara dinamis -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="page-info" id="pageInfo">
                            Menampilkan 0 dari 0 data
                        </div>
                        <nav>
                            <ul class="pagination mb-0" id="pagination">
                                <!-- Pagination akan diisi secara dinamis -->
                            </ul>
                        </nav>
                    </div>

                    <p class="source-info mt-2">Sumber Data: BNPB/BPBD/PVMBG - Terakhir diperbarui: 15 Maret 2025 | *Data 2024-2025: Prediksi</p>
                </div>
            </div>
        </section>

        <section>
            <br><br>
            <h2 class="section-title">Dampak & Korban Jiwa</h2>
            <p class="section-subtitle">Laporkan kondisi terkini di lokasi Anda untuk membantu petugas melakukan penanganan.</p>

            <!-- Statistik & Visualisasi Data -->
            <div class="row">
                <!-- Grafik Tren Korban Jiwa -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Tren Korban Jiwa Akibat Erupsi Gunung Api (2018-2025)
                        </div>
                        <div class="card-body">
                            <div class="prediction-note">
                                <strong>Analisis Tren:</strong> Penurunan signifikan korban jiwa akibat peningkatan sistem peringatan dini dan evakuasi.
                            </div>
                            <div class="chart-container">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diagram Lingkaran Jenis Dampak -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Jenis Dampak Erupsi Gunung Api (Total 2018-2025)
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <br><br>
            <!-- Ringkasan Statistik -->
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <div class="feature-card">
                            <h4>Total Korban Meninggal</h4>
                            <h2 id="statMeninggal">0</h2>
                            <p>2018-2025</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <div class="feature-card">
                            <h4>Total Korban Luka</h4>
                            <h2 id="statLuka">0</h2>
                            <p>2018-2025</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <div class="feature-card">
                            <h4>Total Pengungsi</h4>
                            <h2 id="statPengungsi">0</h2>
                            <p>2018-2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include 'footer.html'; ?>
    </footer>

    <script>
        // Data lengkap dari database
        const allData = <?php echo json_encode($dataArray); ?>;

        // Konfigurasi pagination
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredData = [...allData];
        let activeFilters = {};

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', function() {
            initializeFilters();
            renderTable();
            updateStatistics();
            createCharts();

            // Event listeners
            document.getElementById('btnFilter').addEventListener('click', applyFilters);
            document.getElementById('btnReset').addEventListener('click', resetFilters);
            document.getElementById('clearSearch').addEventListener('click', clearSearch);
            document.getElementById('togglePrediction').addEventListener('change', togglePrediction);
            document.getElementById('searchGunung').addEventListener('input', debounce(applyFilters, 300));
        });

        // Inisialisasi filter
        function initializeFilters() {
            // Set tahun default ke semua
            document.getElementById('filterTahun').value = '';
            document.getElementById('filterProvinsi').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('searchGunung').value = '';
        }

        // Terapkan filter
        function applyFilters() {
            const tahun = document.getElementById('filterTahun').value;
            const provinsi = document.getElementById('filterProvinsi').value;
            const status = document.getElementById('filterStatus').value;
            const searchGunung = document.getElementById('searchGunung').value.toLowerCase();
            const hidePrediction = document.getElementById('togglePrediction').checked;

            activeFilters = {};

            // Filter data
            filteredData = allData.filter(item => {
                let match = true;

                // Filter tahun
                if (tahun && item.tahun != tahun) {
                    match = false;
                } else if (tahun) {
                    activeFilters.tahun = tahun;
                }

                // Filter provinsi
                if (provinsi && item.provinsi !== provinsi) {
                    match = false;
                } else if (provinsi) {
                    activeFilters.provinsi = provinsi;
                }

                // Filter status
                if (status && item.status !== status) {
                    match = false;
                } else if (status) {
                    activeFilters.status = status;
                }

                // Filter pencarian
                if (searchGunung && !item.gunung.toLowerCase().includes(searchGunung)) {
                    match = false;
                } else if (searchGunung) {
                    activeFilters.searchGunung = searchGunung;
                }

                // Filter prediksi
                if (hidePrediction && item.prediksi) {
                    match = false;
                }

                return match;
            });

            currentPage = 1;
            renderTable();
            updateActiveFiltersDisplay();
            updateStatistics();
        }

        // Reset filter
        function resetFilters() {
            initializeFilters();
            filteredData = [...allData];
            currentPage = 1;
            activeFilters = {};
            renderTable();
            updateActiveFiltersDisplay();
            updateStatistics();
            document.getElementById('togglePrediction').checked = false;
        }

        // Clear search
        function clearSearch() {
            document.getElementById('searchGunung').value = '';
            applyFilters();
        }

        // Toggle prediksi
        function togglePrediction() {
            applyFilters();
        }

        // Render tabel dengan pagination
        function renderTable() {
            const tableBody = document.getElementById('tableBody');
            const totalRecords = document.getElementById('totalRecords');
            const pageInfo = document.getElementById('pageInfo');

            // Hitung pagination
            const totalItems = filteredData.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
            const currentItems = filteredData.slice(startIndex, endIndex);

            // Update info
            totalRecords.textContent = `${totalItems} data`;
            pageInfo.textContent = `Menampilkan ${startIndex + 1}-${endIndex} dari ${totalItems} data`;

            // Render rows
            tableBody.innerHTML = '';
            currentItems.forEach((item, index) => {
                const row = `
                    <tr>
                        <td>${startIndex + index + 1}</td>
                        <td>${highlightSearch(item.gunung)}</td>
                        <td>${item.tanggal}</td>
                        <td>${item.lokasi}</td>
                        <td>${item.meninggal}</td>
                        <td>${item.luka}</td>
                        <td>${item.pengungsi.toLocaleString()}</td>
                        <td>${item.dampak}</td>
                        <td>
                            <span class="badge ${getStatusBadgeClass(item.status)}">${item.status}</span>
                            ${item.prediksi ? '<span class="badge bg-secondary ms-1">Prediksi</span>' : ''}
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            // Render pagination
            renderPagination(totalPages);
        }

        // Highlight pencarian
        function highlightSearch(text) {
            const searchTerm = activeFilters.searchGunung;
            if (!searchTerm) return text;

            const regex = new RegExp(`(${searchTerm})`, 'gi');
            return text.replace(regex, '<span class="search-highlight">$1</span>');
        }

        // Render pagination
        function renderPagination(totalPages) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            if (totalPages <= 1) return;

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage - 1}">Sebelumnya</a>`;
            pagination.appendChild(prevLi);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.className = `page-item ${currentPage === i ? 'active' : ''}`;
                li.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                pagination.appendChild(li);
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" data-page="${currentPage + 1}">Selanjutnya</a>`;
            // Add event listeners
            pagination.querySelectorAll('.page-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = parseInt(this.getAttribute('data-page'));
                    if (page >= 1 && page <= totalPages && page !== currentPage) {
                        currentPage = page;
                        renderTable();
                    }
                });
            });
        }

        // Update tampilan filter aktif
        function updateActiveFiltersDisplay() {
            const container = document.getElementById('activeFilters');
            container.innerHTML = '';

            if (Object.keys(activeFilters).length === 0) return;

            let html = '<strong>Filter Aktif:</strong> ';
            const filters = [];

            if (activeFilters.tahun) {
                filters.push(`Tahun: ${activeFilters.tahun}`);
            }
            if (activeFilters.provinsi) {
                filters.push(`Provinsi: ${activeFilters.provinsi}`);
            }
            if (activeFilters.status) {
                filters.push(`Status: ${activeFilters.status}`);
            }
            if (activeFilters.searchGunung) {
                filters.push(`Pencarian: "${activeFilters.searchGunung}"`);
            }

            filters.forEach(filter => {
                html += `<span class="filter-badge">${filter}</span>`;
            });

            container.innerHTML = html;
        }

        // Update statistik
        function updateStatistics() {
            const totalMeninggal = filteredData.reduce((sum, item) => sum + parseInt(item.meninggal), 0);
            const totalLuka = filteredData.reduce((sum, item) => sum + parseInt(item.luka), 0);
            const totalPengungsi = filteredData.reduce((sum, item) => sum + parseInt(item.pengungsi), 0);

            document.getElementById('statMeninggal').textContent = totalMeninggal;
            document.getElementById('statLuka').textContent = totalLuka;
            document.getElementById('statPengungsi').textContent = totalPengungsi.toLocaleString();
        }

        // Helper function untuk class badge status
        function getStatusBadgeClass(status) {
            switch (status) {
                case 'Selesai':
                    return 'bg-success';
                case 'Aktif':
                    return 'bg-warning';
                case 'Pemantauan':
                    return 'bg-info';
                default:
                    return 'bg-secondary';
            }
        }

        // Debounce untuk pencarian
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Grafik
        function createCharts() {
            // Hitung data untuk grafik dari filteredData
            const yearData = {};
            filteredData.forEach(item => {
                const year = item.tahun;
                if (!yearData[year]) {
                    yearData[year] = {
                        meninggal: 0,
                        luka: 0,
                        pengungsi: 0
                    };
                }
                yearData[year].meninggal += parseInt(item.meninggal);
                yearData[year].luka += parseInt(item.luka);
                yearData[year].pengungsi += parseInt(item.pengungsi);
            });

            const years = Object.keys(yearData).sort();
            const meninggalData = years.map(year => yearData[year].meninggal);
            const lukaData = years.map(year => yearData[year].luka);

            // Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Korban Meninggal',
                        data: meninggalData,
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220, 53, 69, 0.1)',
                        tension: 0.3,
                        fill: true,
                        pointStyle: 'circle'
                    }, {
                        label: 'Korban Luka',
                        data: lukaData,
                        borderColor: '#fd7e14',
                        backgroundColor: 'rgba(253, 126, 20, 0.1)',
                        tension: 0.3,
                        fill: true,
                        pointStyle: 'circle'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Tren Korban Akibat Erupsi Gunung Api'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Korban'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tahun'
                            }
                        }
                    }
                }
            });

            // Pie Chart
            const totalMeninggal = filteredData.reduce((sum, item) => sum + parseInt(item.meninggal), 0);
            const totalLuka = filteredData.reduce((sum, item) => sum + parseInt(item.luka), 0);
            const totalPengungsi = filteredData.reduce((sum, item) => sum + parseInt(item.pengungsi), 0);

            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Korban Meninggal', 'Korban Luka', 'Pengungsi'],
                    datasets: [{
                        data: [totalMeninggal, totalLuka, totalPengungsi],
                        backgroundColor: ['#dc3545', '#fd7e14', '#0d6efd'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) label += ': ';
                                    if (context.parsed !== null) {
                                        label += new Intl.NumberFormat('id-ID').format(context.parsed);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>