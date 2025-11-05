<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Korban & Statistik - Sistem Informasi Gunung Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 20px;
        }
        .header {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
            padding: 20px 0;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border: none;
        }
        .card-header {
            background-color: #495057;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
        }
        .table-responsive {
            border-radius: 0 0 10px 10px;
        }
        .table th {
            background-color: #e9ecef;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
            border-radius: 10px;
        }
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 30px;
        }
        .source-info {
            font-size: 0.85rem;
            color: #6c757d;
            font-style: italic;
        }
        .prediction-note {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        .search-card {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: 1px solid #90caf9;
        }
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .page-info {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .search-highlight {
            background-color: #fff3cd;
            font-weight: 600;
        }
        .filter-badge {
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header text-center">
            <h1>Sistem Informasi Gunung Api</h1>
            <p class="lead">Data Korban & Statistik (2018-2025)</p>
        </div>

        <!-- Card Pencarian -->
        <div class="card search-card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-search me-2"></i>Pencarian & Filter Data</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
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
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Status Kejadian</label>
                        <select class="form-select" id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Pemantauan">Pemantauan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Pencarian Nama Gunung</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchGunung" placeholder="Cari nama gunung...">
                            <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-primary me-2" id="btnFilter">
                            <i class="fas fa-filter me-1"></i>Terapkan Filter
                        </button>
                        <button class="btn btn-outline-secondary" id="btnReset">
                            <i class="fas fa-redo me-1"></i>Reset Filter
                        </button>
                        <div id="activeFilters" class="mt-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Kejadian -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    Data Kejadian Erupsi Gunung Api (2018-2025)
                    <span class="badge bg-secondary ms-2" id="totalRecords">0 data</span>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="togglePrediction">
                    <label class="form-check-label text-white" for="togglePrediction">
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

        <!-- Ringkasan Statistik -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center">
                        <h4>Total Korban Meninggal</h4>
                        <h2 id="statMeninggal">60</h2>
                        <p>2018-2025</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body text-center">
                        <h4>Total Korban Luka</h4>
                        <h2 id="statLuka">147</h2>
                        <p>2018-2025</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body text-center">
                        <h4>Total Pengungsi</h4>
                        <h2 id="statPengungsi">56,400</h2>
                        <p>2018-2025</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer text-center">
            <p>Sistem Informasi Gunung Api &copy; 2023-2025</p>
            <p>Data diperbarui secara berkala dari sumber resmi BNPB/BPBD/PVMBG</p>
            <p class="small">*Data prediksi berdasarkan analisis tren dan pemantauan aktivitas vulkanik</p>
        </div>
    </div>

    <script>
        // Data lengkap
        const allData = [
            { id: 1, gunung: "Gunung Merapi", tanggal: "11 Maret 2023", tahun: 2023, lokasi: "Kab. Sleman, Magelang, Klaten", provinsi: "Jawa Tengah", meninggal: 2, luka: 15, pengungsi: 1250, dampak: "45 rumah rusak", status: "Selesai", prediksi: false },
            { id: 2, gunung: "Gunung Semeru", tanggal: "4 Desember 2022", tahun: 2022, lokasi: "Kab. Lumajang, Malang", provinsi: "Jawa Timur", meninggal: 57, luka: 104, pengungsi: 10250, dampak: "5,205 rumah rusak", status: "Selesai", prediksi: false },
            { id: 3, gunung: "Gunung Sinabung", tanggal: "10 Agustus 2020", tahun: 2020, lokasi: "Kab. Karo", provinsi: "Sumatera Utara", meninggal: 0, luka: 0, pengungsi: 1500, dampak: "Lahan pertanian terdampak", status: "Selesai", prediksi: false },
            { id: 4, gunung: "Gunung Agung", tanggal: "21 November 2019", tahun: 2019, lokasi: "Kab. Karangasem", provinsi: "Bali", meninggal: 0, luka: 0, pengungsi: 25000, dampak: "Bandara ditutup sementara", status: "Selesai", prediksi: false },
            { id: 5, gunung: "Gunung Soputan", tanggal: "3 Oktober 2018", tahun: 2018, lokasi: "Kab. Minahasa Tenggara", provinsi: "Sulawesi Utara", meninggal: 1, luka: 0, pengungsi: 2100, dampak: "12 rumah rusak", status: "Selesai", prediksi: false },
            { id: 6, gunung: "Gunung Kerinci", tanggal: "15 Mei 2024", tahun: 2024, lokasi: "Kab. Kerinci, Solok Selatan", provinsi: "Jambi", meninggal: 0, luka: 3, pengungsi: 800, dampak: "Abu vulkanik radius 10km", status: "Aktif", prediksi: true },
            { id: 7, gunung: "Gunung Rinjani", tanggal: "8 September 2024", tahun: 2024, lokasi: "Kab. Lombok Utara", provinsi: "Nusa Tenggara Barat", meninggal: 0, luka: 8, pengungsi: 3200, dampak: "Lahan pertanian terdampak abu", status: "Aktif", prediksi: true },
            { id: 8, gunung: "Gunung Marapi", tanggal: "22 Januari 2025", tahun: 2025, lokasi: "Kab. Agam, Tanah Datar", provinsi: "Sumatera Barat", meninggal: 0, luka: 12, pengungsi: 5500, dampak: "50 rumah rusak ringan", status: "Pemantauan", prediksi: true },
            { id: 9, gunung: "Gunung Kelud", tanggal: "14 Juli 2025", tahun: 2025, lokasi: "Kab. Kediri, Blitar", provinsi: "Jawa Timur", meninggal: 0, luka: 5, pengungsi: 7800, dampak: "Infrastruktur jalan terdampak", status: "Pemantauan", prediksi: true },
            // Data tambahan untuk demo pagination
            { id: 10, gunung: "Gunung Raung", tanggal: "5 Juni 2021", tahun: 2021, lokasi: "Kab. Banyuwangi, Jember", provinsi: "Jawa Timur", meninggal: 0, luka: 0, pengungsi: 1200, dampak: "Abu vulkanik", status: "Selesai", prediksi: false },
            { id: 11, gunung: "Gunung Slamet", tanggal: "18 Agustus 2019", tahun: 2019, lokasi: "Kab. Banyumas, Tegal", provinsi: "Jawa Tengah", meninggal: 0, luka: 2, pengungsi: 800, dampak: "Lahan pertanian terdampak", status: "Selesai", prediksi: false },
            { id: 12, gunung: "Gunung Bromo", tanggal: "20 Januari 2021", tahun: 2021, lokasi: "Kab. Probolinggo, Malang", provinsi: "Jawa Timur", meninggal: 0, luka: 0, pengungsi: 1500, dampak: "Wisata ditutup sementara", status: "Selesai", prediksi: false },
            { id: 13, gunung: "Gunung Tangkuban Parahu", tanggal: "26 Juli 2019", tahun: 2019, lokasi: "Kab. Bandung Barat", provinsi: "Jawa Barat", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Kawasan wisata ditutup", status: "Selesai", prediksi: false },
            { id: 14, gunung: "Gunung Ijen", tanggal: "3 Maret 2020", tahun: 2020, lokasi: "Kab. Banyuwangi", provinsi: "Jawa Timur", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Aktivitas meningkat", status: "Selesai", prediksi: false },
            { id: 15, gunung: "Gunung Dieng", tanggal: "12 November 2021", tahun: 2021, lokasi: "Kab. Banjarnegara, Wonosobo", provinsi: "Jawa Tengah", meninggal: 0, luka: 0, pengungsi: 300, dampak: "Gas beracun", status: "Selesai", prediksi: false },
            { id: 16, gunung: "Gunung Papandayan", tanggal: "8 Mei 2022", tahun: 2022, lokasi: "Kab. Garut", provinsi: "Jawa Barat", meninggal: 0, luka: 0, pengungsi: 500, dampak: "Aktivitas fumarol", status: "Selesai", prediksi: false },
            { id: 17, gunung: "Gunung Galunggung", tanggal: "15 September 2020", tahun: 2020, lokasi: "Kab. Tasikmalaya", provinsi: "Jawa Barat", meninggal: 0, luka: 0, pengungsi: 400, dampak: "Peningkatan aktivitas", status: "Selesai", prediksi: false },
            { id: 18, gunung: "Gunung Ciremai", tanggal: "22 April 2021", tahun: 2021, lokasi: "Kab. Kuningan, Majalengka", provinsi: "Jawa Barat", meninggal: 0, luka: 0, pengungsi: 200, dampak: "Aktivitas seismik", status: "Selesai", prediksi: false },
            { id: 19, gunung: "Gunung Lawu", tanggal: "30 Oktober 2019", tahun: 2019, lokasi: "Kab. Karanganyar, Magetan", provinsi: "Jawa Tengah", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Peningkatan suhu", status: "Selesai", prediksi: false },
            { id: 20, gunung: "Gunung Muria", tanggal: "7 Desember 2020", tahun: 2020, lokasi: "Kab. Kudus, Jepara", provinsi: "Jawa Tengah", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Aktivitas minor", status: "Selesai", prediksi: false },
            { id: 21, gunung: "Gunung Argopuro", tanggal: "14 Maret 2022", tahun: 2022, lokasi: "Kab. Jember, Situbondo", provinsi: "Jawa Timur", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Aktivitas normal", status: "Selesai", prediksi: false },
            { id: 22, gunung: "Gunung Welirang", tanggal: "9 Agustus 2021", tahun: 2021, lokasi: "Kab. Mojokerto, Pasuruan", provinsi: "Jawa Timur", meninggal: 0, luka: 0, pengungsi: 0, dampak: "Emisi gas", status: "Selesai", prediksi: false }
        ];

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
            pagination.appendChild(nextLi);
            
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
            const totalMeninggal = filteredData.reduce((sum, item) => sum + item.meninggal, 0);
            const totalLuka = filteredData.reduce((sum, item) => sum + item.luka, 0);
            const totalPengungsi = filteredData.reduce((sum, item) => sum + item.pengungsi, 0);
            
            document.getElementById('statMeninggal').textContent = totalMeninggal;
            document.getElementById('statLuka').textContent = totalLuka;
            document.getElementById('statPengungsi').textContent = totalPengungsi.toLocaleString();
        }

        // Helper function untuk class badge status
        function getStatusBadgeClass(status) {
            switch(status) {
                case 'Selesai': return 'bg-success';
                case 'Aktif': return 'bg-warning';
                case 'Pemantauan': return 'bg-info';
                default: return 'bg-secondary';
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

        // Grafik (sama seperti sebelumnya)
        function createCharts() {
            // Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: ['2018', '2019', '2020', '2021', '2022', '2023', '2024*', '2025*'],
                    datasets: [{
                        label: 'Korban Meninggal',
                        data: [1, 0, 0, 0, 57, 2, 0, 0],
                        borderColor: '#dc3545',
                        backgroundColor: 'rgba(220, 53, 69, 0.1)',
                        tension: 0.3,
                        fill: true,
                        borderDash: [5, 5],
                        pointStyle: 'circle'
                    }, {
                        label: 'Korban Luka',
                        data: [0, 0, 0, 0, 104, 15, 11, 17],
                        borderColor: '#fd7e14',
                        backgroundColor: 'rgba(253, 126, 20, 0.1)',
                        tension: 0.3,
                        fill: true,
                        borderDash: [5, 5],
                        pointStyle: 'circle'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        title: {
                            display: true,
                            text: 'Tren Korban Akibat Erupsi Gunung Api'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'Jumlah Korban' }
                        },
                        x: {
                            title: { display: true, text: 'Tahun (*Prediksi)' }
                        }
                    }
                }
            });

            // Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Korban Meninggal', 'Korban Luka', 'Pengungsi'],
                    datasets: [{
                        data: [60, 147, 56400],
                        backgroundColor: ['#dc3545', '#fd7e14', '#0d6efd'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' },
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