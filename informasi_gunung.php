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
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --danger: #dc2626;
            --warning: #d97706;
            --success: #059669;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #ffffff 50%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--dark);
            scroll-behavior: smooth;
        }
        
        /* Navbar Elegant */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        }
        
        .brand {
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .brand-icon {
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 8px;
        }
        
        .nav-link {
            font-weight: 600;
            color: var(--gray) !important;
            margin: 0 8px;
            padding: 10px 20px !important;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }
        
        /* Hero Section */
        .hero {
            padding: 120px 0 80px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border-radius: 0 0 40px 40px;
            margin-bottom: 60px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 30px;
            font-weight: 300;
        }
        
        /* Search Section - Simplified */
        .search-section {
            padding: 40px 0;
            background: var(--light);
        }
        
        .search-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .search-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .search-header h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }
        
        .search-header p {
            color: var(--gray);
            font-size: 1.1rem;
        }
        
        .search-input-group {
            position: relative;
            margin-bottom: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .search-input {
            width: 100%;
            padding: 18px 25px 18px 60px;
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.4rem;
        }
        
        .search-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            max-height: 250px;
            overflow-y: auto;
            display: none;
            border: 2px solid var(--primary);
            margin-top: 5px;
        }
        
        .suggestion-item {
            padding: 15px 25px;
            cursor: pointer;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .suggestion-item:hover {
            background: var(--primary);
            color: white;
        }
        
        .suggestion-item:last-child {
            border-bottom: none;
        }
        
        .suggestion-icon {
            width: 20px;
            text-align: center;
            color: var(--primary);
            font-size: 1.1rem;
        }
        
        .suggestion-item:hover .suggestion-icon {
            color: white;
        }
        
        /* Search Results - Card Style */
        .search-results {
            display: none;
            margin-top: 40px;
        }
        
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 0 10px;
        }
        
        .results-count {
            font-weight: 700;
            color: var(--dark);
            font-size: 1.3rem;
        }
        
        .results-actions {
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }
        
        .action-clear {
            background: #f1f5f9;
            color: var(--gray);
        }
        
        .action-clear:hover {
            background: #e2e8f0;
            color: var(--dark);
        }
        
        .action-show-all {
            background: var(--primary);
            color: white;
        }
        
        .action-show-all:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
        }
        
        .search-results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .search-result-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .search-result-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .result-image {
            height: 250px;
            width: 100%;
            object-fit: cover;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .result-content {
            padding: 25px;
        }
        
        .result-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .result-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .result-info {
            color: var(--gray);
            margin-bottom: 20px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
            padding: 8px 0;
        }
        
        .info-icon {
            width: 20px;
            text-align: center;
            color: var(--primary);
        }
        
        .status-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            white-space: nowrap;
        }
        
        .tag-normal { 
            background: rgba(5, 150, 105, 0.1); 
            color: var(--success); 
            border: 1px solid rgba(5, 150, 105, 0.2); 
        }
        
        .tag-waspada { 
            background: rgba(217, 119, 6, 0.1); 
            color: var(--warning); 
            border: 1px solid rgba(217, 119, 6, 0.2); 
        }
        
        .tag-siaga { 
            background: rgba(220, 38, 38, 0.1); 
            color: var(--danger); 
            border: 1px solid rgba(220, 38, 38, 0.2); 
        }
        
        .btn-detail {
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
            color: white;
        }
        
        .no-results {
            text-align: center;
            padding: 80px 40px;
            color: var(--gray);
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        
        .no-results i {
            font-size: 5rem;
            margin-bottom: 25px;
            color: #cbd5e1;
        }
        
        .no-results h4 {
            margin-bottom: 15px;
            color: var(--dark);
            font-size: 1.5rem;
        }
        
        .no-results p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: -80px auto 60px;
            max-width: 1000px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-card.normal { border-left-color: var(--success); }
        .stat-card.waspada { border-left-color: var(--warning); }
        .stat-card.siaga { border-left-color: var(--danger); }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--gray);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 5px;
        }
        
        .stat-normal { color: var(--success); }
        .stat-waspada { color: var(--warning); }
        .stat-siaga { color: var(--danger); }

        /* Volcano Cards - 4 per baris dengan ukuran lebih besar dan container lebar */
        .volcano-grid-container {
            width: 100%;
            max-width: 2100px;
            margin: 0 auto;
            padding: 0 25px;
            height: auto;
        }

        .volcano-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 80px;
        }
        
        @media (max-width: 1400px) {
            .volcano-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            .volcano-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .volcano-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .volcano-grid-container {
                padding: 0 15px;
            }
        }
        
        .volcano-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .volcano-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .volcano-image {
            height: 220px;
            width: 100%;
            object-fit: cover;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .volcano-content {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .volcano-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            line-height: 1.3;
        }
        
        .volcano-info {
            color: var(--gray);
            margin-bottom: 20px;
            flex: 1;
        }
        
        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 30px;
            margin-top: 80px;
        }
        
        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #94a3b8;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Section Title */
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            border-radius: 2px;
        }
        
        /* Floating Action */
        .floating-action {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            color: white;
            padding: 16px 24px;
            border-radius: 16px;
            font-weight: 600;
            z-index: 1000;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            transition: all 0.3s ease;
        }

        .floating-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(37, 99, 235, 0.4);
        }

        /* Mitigation Section Styles - 3 per baris dengan container normal */
        .mitigation-section {
            padding: 80px 0;
            background: var(--light);
        }

        .mitigation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        
        @media (max-width: 992px) {
            .mitigation-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .mitigation-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .mitigation-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .mitigation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .mitigation-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .mitigation-step {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8fafc;
            border-radius: 12px;
        }

        .step-number {
            background: var(--primary);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* Emergency Contacts - Full width di bawah 3 card mitigasi */
        .emergency-contacts-full {
            grid-column: 1 / -1;
            margin-top: 30px;
        }

        .emergency-contacts {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        
        @media (max-width: 992px) {
            .emergency-contacts {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .emergency-contacts {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        .contact-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* Tombol Panggilan Darurat */
        .btn-call {
            background: linear-gradient(45deg, var(--success), #10b981);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .btn-call:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        /* Floating Emergency Button */
        .floating-emergency {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: linear-gradient(45deg, #dc2626, #ef4444);
            color: white;
            padding: 16px 20px;
            border-radius: 16px;
            font-weight: 700;
            z-index: 1000;
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4);
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .floating-emergency:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(220, 38, 38, 0.5);
        }

        @keyframes pulse {
            0% { box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4); }
            50% { box-shadow: 0 10px 30px rgba(220, 38, 38, 0.7); }
            100% { box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4); }
        }

        /* Emergency Modal */
        .emergency-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .emergency-modal-content {
            background: white;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .emergency-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .emergency-modal-header h3 {
            color: var(--danger);
            margin: 0;
            display: flex;
            align-items: center;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.8rem;
            color: var(--gray);
            cursor: button;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            color: var(--danger);
        }

        .emergency-contacts-grid {
            padding: 20px;
        }

        .emergency-contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .emergency-contact-item:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .emergency-contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
        }

        .emergency-contact-icon.police { background: #3b82f6; }
        .emergency-contact-icon.ambulance { background: #ef4444; }
        .emergency-contact-icon.fire { background: #f59e0b; }
        .emergency-contact-icon.disaster { background: #059669; }

        .emergency-contact-info {
            flex: 1;
        }

        .emergency-contact-info h5 {
            margin: 0 0 5px 0;
            color: var(--dark);
        }

        .emergency-contact-info p {
            margin: 0;
            color: var(--gray);
            font-weight: 600;
        }

        .emergency-call-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--success);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .emergency-contact-item:hover .emergency-call-btn {
            background: var(--primary);
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .search-input {
                padding: 16px 20px 16px 50px;
            }
            
            .results-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .results-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .floating-emergency {
                bottom: 20px;
                left: 20px;
                padding: 12px 16px;
                font-size: 0.9rem;
            }

            .floating-action {
                bottom: 20px;
                right: 20px;
                padding: 12px 16px;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.8rem;
                margin-bottom: 30px;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand brand" href="#">
            <i class="fas fa-mountain brand-icon"></i>LavaLink
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#volcanoes">
                        <i class="fas fa-mountain me-2"></i>Mount Explorer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mitigation">
                        <i class="fas fa-shield-alt me-2"></i>Mitigasi
                    </a>
                </li>
                <!-- Tombol Peta dihapus sesuai permintaan -->
            </ul>
        </div>
    </div>
</nav>

<!-- Home Section -->
<section id="home">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Sistem Monitoring Gunung Api</h1>
            <p class="hero-subtitle">Pantau aktivitas gunung berapi di Indonesia secara real-time dan dapatkan informasi mitigasi bencana</p>
            <div class="mt-4">
                <button class="btn btn-light btn-lg rounded-pill px-4 me-3" onclick="scrollToSection('volcanoes')">
                    <i class="fas fa-chart-line me-2"></i>Monitoring Live
                </button>
                <button class="btn btn-outline-light btn-lg rounded-pill px-4" onclick="scrollToSection('volcanoes')">
                    <i class="fas fa-mountain me-2"></i>Jelajahi Gunung
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card normal">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-number stat-normal"><?php
                    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM gunung WHERE status LIKE '%normal%' OR status LIKE '%Normal%'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                ?></div>
                <div>Status Normal</div>
                <small class="text-muted">Aman & Terpantau</small>
            </div>
            <div class="stat-card waspada">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-number stat-waspada"><?php
                    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM gunung WHERE status LIKE '%waspada%' OR status LIKE '%Waspada%'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                ?></div>
                <div>Status Waspada</div>
                <small class="text-muted">Peningkatan Aktivitas</small>
            </div>
            <div class="stat-card siaga">
                <div class="stat-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="stat-number stat-siaga"><?php
                    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM gunung WHERE status LIKE '%siaga%' OR status LIKE '%Siaga%'");
                    $row = mysqli_fetch_assoc($result);
                    echo $row['total'];
                ?></div>
                <div>Status Siaga</div>
                <small class="text-muted">Perhatian Khusus</small>
            </div>
        </div>
    </div>

    <!-- Main Content - Gunung Api di Indonesia dengan container lebar -->
    <div id="volcanoes">
        <h2 class="section-title">Gunung Api di Indonesia</h2>
        
        <!-- Search Section - Simplified -->
        <section class="search-section">
            <div class="search-container">
                <div class="search-header">
                    <h3>Cari Gunung Berapi</h3>
                    <p>Temukan informasi gunung berapi berdasarkan nama atau lokasi</p>
                </div>

                <div class="search-input-group">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" class="search-input" placeholder="Ketik nama gunung atau lokasi...">
                    <div class="search-suggestions" id="searchSuggestions"></div>
                </div>

                <!-- Search Results -->
                <div class="search-results" id="searchResults">
                    <div class="results-header">
                        <div class="results-count" id="resultsCount"></div>
                        <div class="results-actions">
                            <button class="action-btn action-clear" onclick="clearSearch()">
                                <i class="fas fa-times"></i>Hapus Pencarian
                            </button>
                            <button class="action-btn action-show-all" onclick="showAllVolcanoes()">
                                <i class="fas fa-eye"></i>Tampilkan Semua
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
            
            <!-- Kontak Darurat - Full width di bawah 3 card -->
            <div class="emergency-contacts-full">
                <div class="mitigation-card">
                    <div class="mitigation-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Kontak Darurat</h3>
                    <p class="mb-4">Simpan nomor-nomor penting berikut untuk keadaan darurat:</p>
                    
                    <div class="emergency-contacts">
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h5>BNPB</h5>
                            <p>117</p>
                            <button class="btn-call" onclick="makeCall('117')">
                                <i class="fas fa-phone me-2"></i>Hubungi
                            </button>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <h5>Ambulans</h5>
                            <p>118</p>
                            <button class="btn-call" onclick="makeCall('118')">
                                <i class="fas fa-phone me-2"></i>Hubungi
                            </button>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                            <h5>Pemadam Kebakaran</h5>
                            <p>113</p>
                            <button class="btn-call" onclick="makeCall('113')">
                                <i class="fas fa-phone me-2"></i>Hubungi
                            </button>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5>Polisi</h5>
                            <p>110</p>
                            <button class="btn-call" onclick="makeCall('110')">
                                <i class="fas fa-phone me-2"></i>Hubungi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <button class="btn-detail" onclick="scrollToSection('volcanoes')">
                <i class="fas fa-mountain me-2"></i>Kembali ke Gunung Api
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-brand">
                    <i class="fas fa-mountain me-2"></i>LavaLink
                </div>
                <p class="text-light">"Explore Indonesia's Mighty Peaks"</p>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="#home" class="text-light text-decoration-none">Beranda</a></li>
                    <li><a href="#volcanoes" class="text-light text-decoration-none">Mount Explorer</a></li>
                    <li><a href="#mitigation" class="text-light text-decoration-none">Mitigasi</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mb-3">Sumber Data</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">PVMBG</a></li>
                    <li><a href="#" class="text-light text-decoration-none">BMKG</a></li>
                    <li><a href="#" class="text-light text-decoration-none">BNPB</a></li>
                    <li><a href="#" class="text-light text-decoration-none">ESDM</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-5 pt-4 border-top border-secondary">
            <p class="text-light mb-0">© 2025 LavaLink • "Explore Indonesia's Mighty Peaks"</p>
        </div>
    </div>
</footer>

<!-- Floating Action -->
<button class="floating-action" onclick="scrollToSection('volcanoes')">
    <i class="fas fa-mountain"></i>Jelajahi Gunung
</button>

<!-- Floating Emergency Button -->
<div class="floating-emergency" onclick="showEmergencyContacts()">
    <i class="fas fa-phone-alt"></i>
    <span>DARURAT</span>
</div>

<!-- Modal untuk kontak darurat -->
<div class="emergency-modal" id="emergencyModal">
    <div class="emergency-modal-content">
        <div class="emergency-modal-header">
            <h3><i class="fas fa-exclamation-triangle me-2"></i>Kontak Darurat</h3>
            <button class="close-modal" onclick="closeEmergencyModal()">&times;</button>
        </div>
        <div class="emergency-contacts-grid">
            <div class="emergency-contact-item" onclick="makeCall('110')">
                <div class="emergency-contact-icon police">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="emergency-contact-info">
                    <h5>Polisi</h5>
                    <p>110</p>
                </div>
                <div class="emergency-call-btn">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
            <div class="emergency-contact-item" onclick="makeCall('118')">
                <div class="emergency-contact-icon ambulance">
                    <i class="fas fa-ambulance"></i>
                </div>
                <div class="emergency-contact-info">
                    <h5>Ambulans</h5>
                    <p>118</p>
                </div>
                <div class="emergency-call-btn">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
            <div class="emergency-contact-item" onclick="makeCall('113')">
                <div class="emergency-contact-icon fire">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="emergency-contact-info">
                    <h5>Pemadam Kebakaran</h5>
                    <p>113</p>
                </div>
                <div class="emergency-call-btn">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
            <div class="emergency-contact-item" onclick="makeCall('117')">
                <div class="emergency-contact-icon disaster">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="emergency-contact-info">
                    <h5>BNPB</h5>
                    <p>117</p>
                </div>
                <div class="emergency-call-btn">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <div class="search-result-card">
                        <img src="image/${volcano.image}" class="result-image" alt="${volcano.name}">
                        <div class="result-content">
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
                    resultsCount.innerHTML = `<i class="fas fa-mountain me-2"></i>Ditemukan ${visibleCards} gunung untuk "<strong>${currentSearchTerm}</strong>"`;
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
        if (el) el.scrollIntoView({ behavior: 'smooth' });
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
