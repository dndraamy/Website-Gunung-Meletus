<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LavaLink - "Explore Indonesia's Mighty Peaks"</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles_css/info_gunung.css">
</head>

<body style="background-color: black;">
    <header style="z-index: 9999;">
        <?php include 'navbar.html'; ?>
    </header>

    <main class="content-wrapper">
        <section class="header-section text-center p-4 rounded-4 mb-5">
            <h1 class="fw-bold display-6 text-white">Informasi Gunung Api & Mitigasi</h1>
            <p class="lead mx-auto" style="max-width: 800px; color: white">
                Halaman ini menyajikan ringkasan data kejadian erupsi, dampak, dan korban jiwa dari berbagai gunung api di Indonesia selama periode tertentu.
            </p>
        </section>

        <section>
            <div class="card-fix">
                <div>
                    <h5 class="mb-0 text-white" style="text-align: center;"><i class="fas fa-search me-2 text-white"></i>Cari Gunung Berapi di Indonesia</h5>
                </div>
                <div class="search-input-group" style="padding-top: 20px">
                    <input type="text" id="searchInput" class="search-input" placeholder="Ketik nama gunung atau lokasi...">
                    <div class="search-suggestions" id="searchSuggestions"></div>
                </div>

                <!-- Search Results -->
                <div class="search-results" id="searchResults">
                    <div class="results-header">
                        <div class="results-count" id="resultsCount"></div>
                        <div class="results-actions">
                            <button class="btn btn-danger rounded-4 px-4 py-2 fw-semibold" id="btnReset" onclick="clearSearch()">
                                <i class="fas fa-redo me-1"></i>Hapus Pencarian
                            </button>
                        </div>
                    </div>

                    <!-- Results Grid -->
                    <div class="search-results-grid" id="resultsGrid">
                        <!-- Results will be populated here by JavaScript -->
                    </div>

                    <div class="no-results" id="noResults" style="display: none;">
                        <i class="fas fa-search"></i>
                        <h4>Tidak ada hasil ditemukan</h4>
                        <p>Silakan coba kata kunci lain atau gunakan filter yang berbeda</p>
                        <button class="btn-detail mt-3" onclick="clearSearch()">
                            <i class="fas fa-times me-2"></i>Hapus Pencarian
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- All Volcanoes Grid - 4 per baris dengan container lebar -->
        <div class="volcano-grid-container">
            <div class="volcano-grid" id="volcanoGrid">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM gunung");
                $allVolcanoes = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $status_class = 'tag-normal';
                    $status_icon = 'fas fa-check-circle';
                    $status_text = 'Normal';

                    if (strpos(strtolower($row['status']), 'waspada') !== false) {
                        $status_class = 'tag-waspada';
                        $status_icon = 'fas fa-exclamation-triangle';
                        $status_text = 'Waspada';
                    } elseif (strpos(strtolower($row['status']), 'siaga') !== false) {
                        $status_class = 'tag-siaga';
                        $status_icon = 'fas fa-fire';
                        $status_text = 'Siaga';
                    }

                    $allVolcanoes[] = [
                        'id' => $row['id'],
                        'name' => $row['nama_gunung'],
                        'location' => $row['lokasi'],
                        'status' => $status_text,
                        'image' => $row['gambar'],
                        'elevation' => $row['ketinggian'],
                        'status_detail' => $row['status'],
                        'status_class' => $status_class,
                        'status_icon' => $status_icon
                    ];
                ?>
                    <div class="volcano-card" data-name="<?php echo strtolower($row['nama_gunung']); ?>" data-location="<?php echo strtolower($row['lokasi']); ?>" data-status="<?php echo strtolower($status_text); ?>">
                        <img src="image/<?php echo $row['gambar']; ?>" class="volcano-image" alt="<?php echo $row['nama_gunung']; ?>">
                        <div class="volcano-content">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3 class="volcano-name">
                                    <i class="fas fa-mountain"></i><?php echo $row['nama_gunung']; ?>
                                </h3>
                                <span class="status-tag <?php echo $status_class; ?>">
                                    <i class="<?php echo $status_icon; ?>"></i><?php echo $status_text; ?>
                                </span>
                            </div>
                            <div class="volcano-info">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <strong>Lokasi:</strong> <?php echo $row['lokasi']; ?>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-mountain"></i>
                                    </div>
                                    <div>
                                        <strong>Ketinggian:</strong> <?php echo $row['ketinggian']; ?> mdpl
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div>
                                        <strong>Aktivitas:</strong> <?php echo $row['status']; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="detail_gunung.php?id=<?php echo $row['id']; ?>" class="btn-detail">
                                <i class="fas fa-search"></i>Lihat Detail Lengkap
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        </div>
        </section>


        <!-- Mitigation Section dengan container normal -->
        <section class="mitigation-section" id="mitigation">
            <div class="container">
                <h2 class="section-title">Mitigasi Bencana Gunung Api</h2>

                <div class="mitigation-grid">
                    <!-- Card 1: Sebelum Erupsi -->
                    <div class="mitigation-card">
                        <div class="mitigation-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3>Sebelum Erupsi</h3>
                        <div class="mitigation-step">
                            <div class="step-number">1</div>
                            <div>
                                <h5>Kenali Tanda-tanda</h5>
                                <p>Pelajari tanda-tanda peningkatan aktivitas vulkanik seperti gempa vulkanik, perubahan suhu, dan emisi gas.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">2</div>
                            <div>
                                <h5>Siapkan Rencana Evakuasi</h5>
                                <p>Buat rencana evakuasi keluarga dan tentukan titik kumpul yang aman dari jalur lahar dan awan panas.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">3</div>
                            <div>
                                <h5>Siapkan Tas Darurat</h5>
                                <p>Siapkan tas berisi makanan, air, obat-obatan, dokumen penting, dan masker untuk setidaknya 3 hari.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Saat Erupsi -->
                    <div class="mitigation-card">
                        <div class="mitigation-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        <h3>Saat Erupsi</h3>
                        <div class="mitigation-step">
                            <div class="step-number">1</div>
                            <div>
                                <h5>Ikuti Instruksi Resmi</h5>
                                <p>Dengarkan informasi dari PVMBG, BMKG, dan BNPB melalui radio atau media resmi.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">2</div>
                            <div>
                                <h5>Evakuasi ke Tempat Aman</h5>
                                <p>Segera evakuasi ke tempat yang lebih tinggi dan menjauhi lembah sungai yang berpotensi dilalui lahar.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">3</div>
                            <div>
                                <h5>Lindungi Diri</h5>
                                <p>Gunakan masker untuk melindungi pernapasan dari abu vulkanik dan kenakan pakaian tertutup.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Setelah Erupsi -->
                    <div class="mitigation-card">
                        <div class="mitigation-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Setelah Erupsi</h3>
                        <div class="mitigation-step">
                            <div class="step-number">1</div>
                            <div>
                                <h5>Tunggu Izin Kembali</h5>
                                <p>Tunggu hingga pihak berwenang menyatakan aman untuk kembali ke rumah.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">2</div>
                            <div>
                                <h5>Bersihkan Abu Vulkanik</h5>
                                <p>Bersihkan atap dari abu vulkanik untuk mencegah kerusakan struktur bangunan.</p>
                            </div>
                        </div>
                        <div class="mitigation-step">
                            <div class="step-number">3</div>
                            <div>
                                <h5>Periksa Kesehatan</h5>
                                <p>Periksakan kesehatan terutama masalah pernapasan akibat paparan abu vulkanik.</p>
                            </div>
                        </div>
                    </div>
        </section>

    </main>

    <footer>
        <?php include 'footer.html'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data gunung dari PHP (keep for search/features)
        const allVolcanoes = <?php echo json_encode($allVolcanoes); ?>;

        // Fungsi untuk melakukan panggilan telepon
        function makeCall(phoneNumber) {
            if (confirm(`Apakah Anda yakin ingin menghubungi ${phoneNumber}?`)) {
                window.location.href = `tel:${phoneNumber}`;
                if (!/Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    alert(`Untuk perangkat desktop, silakan hubungi nomor ${phoneNumber} secara manual.`);
                }
            }
        }

        // Fungsi untuk menampilkan modal kontak darurat
        function showEmergencyContacts() {
            document.getElementById('emergencyModal').style.display = 'flex';
        }

        // Fungsi untuk menutup modal kontak darurat
        function closeEmergencyModal() {
            document.getElementById('emergencyModal').style.display = 'none';
        }

        // Tutup modal ketika klik di luar konten
        window.onclick = function(event) {
            const modal = document.getElementById('emergencyModal');
            if (event.target === modal) {
                closeEmergencyModal();
            }
        }

        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchResults = document.getElementById('searchResults');
            const resultsGrid = document.getElementById('resultsGrid');
            const resultsCount = document.getElementById('resultsCount');
            const noResults = document.getElementById('noResults');
            const volcanoGrid = document.getElementById('volcanoGrid');
            const searchSuggestions = document.getElementById('searchSuggestions');

            let currentSearchTerm = '';

            // Search input event
            searchInput.addEventListener('input', function() {
                currentSearchTerm = this.value.toLowerCase();

                // Show suggestions
                if (currentSearchTerm.length > 1) {
                    showSuggestions(currentSearchTerm);
                } else {
                    searchSuggestions.style.display = 'none';
                }

                performSearch();
            });

            // Show search suggestions
            function showSuggestions(term) {
                const suggestions = allVolcanoes.filter(volcano =>
                    volcano.name.toLowerCase().includes(term) ||
                    volcano.location.toLowerCase().includes(term)
                ).slice(0, 5);

                if (suggestions.length > 0) {
                    searchSuggestions.innerHTML = suggestions.map(volcano =>
                        `<div class="suggestion-item" data-name="${volcano.name}">
                        <i class="fas fa-mountain suggestion-icon"></i>
                        <div>
                            <strong>${volcano.name}</strong><br>
                            <small>${volcano.location}</small>
                        </div>
                    </div>`
                    ).join('');
                    searchSuggestions.style.display = 'block';

                    // Add click event to suggestions
                    searchSuggestions.querySelectorAll('.suggestion-item').forEach(item => {
                        item.addEventListener('click', function() {
                            searchInput.value = this.getAttribute('data-name');
                            searchSuggestions.style.display = 'none';
                            performSearch();
                        });
                    });
                } else {
                    searchSuggestions.style.display = 'none';
                }
            }

            // Hide suggestions when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
                    searchSuggestions.style.display = 'none';
                }
            });

            // Perform search function
            function performSearch() {
                let visibleCards = 0;
                let searchResultsHTML = '';

                // Filter volcanoes based on search
                const filteredVolcanoes = allVolcanoes.filter(volcano => {
                    return currentSearchTerm === '' ||
                        volcano.name.toLowerCase().includes(currentSearchTerm) ||
                        volcano.location.toLowerCase().includes(currentSearchTerm);
                });

                // Generate search results HTML for cards
                filteredVolcanoes.forEach(volcano => {
                    searchResultsHTML += `
                    <div class="volcano-card">
                        <img src="image/${volcano.image}" class="result-image" alt="${volcano.name}">
                        <div class="volcano-content">
                            <div class="result-header">
                                <h3 class="result-name">
                                    <i class="fas fa-mountain"></i>${volcano.name}
                                </h3>
                                <span class="status-tag ${volcano.status_class}">
                                    <i class="${volcano.status_icon}"></i>${volcano.status}
                                </span>
                            </div>
                            <div class="result-info">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <strong>Lokasi:</strong> ${volcano.location}
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-mountain"></i>
                                    </div>
                                    <div>
                                        <strong>Ketinggian:</strong> ${volcano.elevation}
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div>
                                        <strong>Aktivitas:</strong> ${volcano.status_detail}
                                    </div>
                                </div>
                            </div>
                            <a href="detail_gunung.php?id=${volcano.id}" class="btn-detail">
                                <i class="fas fa-search"></i>Lihat Detail Lengkap
                            </a>
                        </div>
                    </div>
                `;
                    visibleCards++;
                });

                // Update results grid
                resultsGrid.innerHTML = searchResultsHTML;

                // Update results count and visibility
                if (currentSearchTerm !== '') {
                    searchResults.style.display = 'block';
                    volcanoGrid.style.display = 'none';

                    if (visibleCards > 0) {
                        resultsCount.innerHTML = `<div style="color:white; font-size: 18px;"><i class="fas fa-mountain me-2"></i>Ditemukan ${visibleCards} gunung untuk "${currentSearchTerm}"</div>`;
                        noResults.style.display = 'none';
                    } else {
                        resultsCount.textContent = '';
                        noResults.style.display = 'block';
                    }
                } else {
                    searchResults.style.display = 'none';
                    volcanoGrid.style.display = 'grid';
                }
            }

            // Initial search to count all volcanoes
            performSearch();
        });

        // Clear search function
        function clearSearch() {
            document.getElementById('searchInput').value = '';
            // hide local currentSearchTerm if present
            // Hide search results and show all volcanoes
            document.getElementById('searchResults').style.display = 'none';
            document.getElementById('volcanoGrid').style.display = 'grid';
            // Hide suggestions
            const ss = document.getElementById('searchSuggestions');
            if (ss) ss.style.display = 'none';
        }

        // Show all volcanoes function
        function showAllVolcanoes() {
            clearSearch();
            document.getElementById('searchInput').focus();
        }

        // Scroll to section function
        function scrollToSection(sectionId) {
            const el = document.getElementById(sectionId);
            if (el) el.scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Add click event untuk floating action
        document.querySelector('.floating-action').addEventListener('click', function() {
            scrollToSection('volcanoes');
        });

        // Add event listeners untuk nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                const targetId = this.getAttribute('href').substring(1);
                scrollToSection(targetId);
            });
        });

        // Hero section buttons
        document.querySelector('.hero .btn-light').addEventListener('click', function() {
            scrollToSection('volcanoes');
        });

        document.querySelector('.hero .btn-outline-light').addEventListener('click', function() {
            scrollToSection('volcanoes');
        });
    </script>
</body>

</html>