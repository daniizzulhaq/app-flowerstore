<?php
session_start();
include 'config.php';

// Ambil data produk
$products = $conn->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 6");

// Ambil data lokasi
$locations = $conn->query("SELECT * FROM locations ORDER BY name ASC");

// Ambil data FAQ
$faqs = $conn->query("SELECT * FROM faqs ORDER BY urutan ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Florist - Toko Bunga Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #d4789c;
            --secondary: #8b4367;
            --accent: #f4a9c5;
            --dark: #3d1e2e;
            --light: #fdf5f8;
            --success: #7cb342;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
        
        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-brand i {
            font-size: 2rem;
            color: var(--accent);
        }
        
        .nav-link {
            color: var(--dark) !important;
            font-weight: 500;
            margin: 0 10px;
            position: relative;
            transition: color 0.3s;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: all 0.3s;
            transform: translateX(-50%);
        }
        
        .nav-link:hover:after {
            width: 80%;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            border: none;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
            transition: all 0.3s;
        }
        
        .btn-whatsapp:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            color: white;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        .hero-image {
            position: relative;
            animation: fadeInUp 0.8s ease 0.4s both;
        }
        
        .hero-image img {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 8px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-hero {
            background: white;
            color: var(--primary);
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            animation: fadeInUp 0.8s ease 0.6s both;
        }
        
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--secondary);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Section Styling */
        section {
            padding: 80px 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            position: relative;
            padding-bottom: 20px;
            margin-bottom: 50px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--primary));
            border-radius: 2px;
        }
        
        .section-title i {
            color: var(--accent);
            margin-right: 10px;
        }
        
        /* Layanan Cards */
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            border: 2px solid var(--light);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            transition: left 0.5s ease;
            z-index: 0;
        }
        
        .service-card:hover::before {
            left: 0;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(212, 120, 156, 0.3);
            border-color: var(--primary);
        }
        
        .service-card > * {
            position: relative;
            z-index: 1;
            transition: color 0.3s ease;
        }
        
        .service-card:hover h4,
        .service-card:hover p {
            color: white;
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            background: white;
            transform: scale(1.1) rotate(5deg);
        }
        
        .service-icon i {
            font-size: 2rem;
            color: white;
            transition: color 0.3s ease;
        }
        
        .service-card:hover .service-icon i {
            color: var(--primary);
        }
        
        .service-card h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
        }
        
        .service-card p {
            color: #666;
            line-height: 1.6;
        }
        
        /* Product Cards */
        .product-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            background: white;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 50px rgba(212, 120, 156, 0.25);
        }
        
        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
        }
        
        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover img {
            transform: scale(1.1);
        }
        
        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(212, 120, 156, 0.4);
        }
        
        .product-card .card-body {
            padding: 25px;
        }
        
        .product-card h5 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .product-card .card-text {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
        }
        
        .btn-order {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(212, 120, 156, 0.3);
        }
        
        .btn-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 120, 156, 0.4);
            color: white;
        }
        
        /* Location Cards */
        .location-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            border-left: 5px solid var(--primary);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .location-card:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 30px rgba(212, 120, 156, 0.2);
            background: var(--light);
        }
        
        .location-card h5 {
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .location-card i {
            color: var(--primary);
            margin-right: 10px;
        }
        
        .location-card p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .btn-location {
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-location:hover {
            background: var(--primary);
            color: white;
        }
        
        /* FAQ */
        .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }
        
        .accordion-button {
            background: white;
            color: var(--dark);
            font-weight: 600;
            padding: 20px 25px;
            font-size: 1.05rem;
            border: none;
        }
        
        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            color: white;
            box-shadow: none;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border: none;
        }
        
        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23d4789c'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        
        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        
        .accordion-body {
            padding: 25px;
            background: white;
            color: #666;
            line-height: 1.7;
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
            color: white;
            padding: 50px 0 30px;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--primary), var(--accent));
        }
        
        footer h5 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        
        footer i {
            color: var(--accent);
        }
        
        footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        footer a:hover {
            color: white;
        }
        
        /* Background Patterns */
        .bg-light {
            background: var(--light) !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero {
                padding: 80px 0 60px;
            }
            
            section {
                padding: 60px 0;
            }
        }
        
        /* Category Items */
        .category-item {
            background: white;
            border-radius: 20px;
            padding: 35px 20px;
            text-align: center;
            border: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }
        
        .category-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }
        
        .category-item::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: 1;
        }
        
        .category-item:hover::before {
            opacity: 1;
        }
        
        .category-item:hover::after {
            opacity: 1;
            top: -10%;
            right: -10%;
        }
        
        .category-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(212, 120, 156, 0.4);
        }
        
        .category-icon-wrapper {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, var(--light) 0%, #fff 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
            box-shadow: 0 5px 20px rgba(212, 120, 156, 0.15);
        }
        
        .category-item:hover .category-icon-wrapper {
            background: white;
            transform: rotate(360deg) scale(1.1);
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.5);
        }
        
        .category-item i {
            font-size: 2.8rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }
        
        .category-item:hover i {
            -webkit-text-fill-color: var(--primary);
            transform: scale(1.1);
        }
        
        .category-item h6 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark);
            transition: all 0.3s ease;
            line-height: 1.4;
            position: relative;
            z-index: 2;
        }
        
        .category-item:hover h6 {
            color: white;
            transform: translateY(-2px);
        }
        
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .category-item:hover .category-badge {
            opacity: 1;
            transform: translateX(0);
            background: white;
            color: var(--primary);
        }
        
        /* Category Section Enhancement */
        #kategori {
            position: relative;
        }
        
        #kategori::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(180deg, var(--light) 0%, transparent 100%);
            pointer-events: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-spa"></i> Company Florist
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kategori">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                </ul>
                <a href="https://wa.me/6281322991131" class="btn btn-whatsapp ms-3">
                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Wujudkan Momen Spesial dengan Bunga Indah</h1>
                    <p>Rangkaian papan bunga segar berkualitas premium untuk setiap perayaan dan momen berharga Anda</p>
                    <a href="https://wa.me/6281322991131" class="btn btn-hero">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                </div>
                <div class="col-lg-6 hero-image">
                    <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?w=600" class="img-fluid" alt="Bunga">
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Produk Section -->
    <section id="kategori" class="bg-light">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-th-large"></i> Kategori Produk</h2>
            <p class="text-center text-muted mb-5">Jelajahi berbagai pilihan bunga untuk setiap momen spesial Anda</p>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Popular</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-ribbon"></i>
                        </div>
                        <h6>Papan Duka Cita</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Popular</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-rings-wedding"></i>
                        </div>
                        <h6>Papan Happy Wedding</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Trending</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-star"></i>
                        </div>
                        <h6>Papan Ucapan Selamat</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">New</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <h6>Papan Bunga Kertas</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Popular</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h6>Standing Flowers</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Best</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-table"></i>
                        </div>
                        <h6>Rangkaian Bunga Meja</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Trending</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-gifts"></i>
                        </div>
                        <h6>Buket Bunga</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Special</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h6>Bunga Tangan Wedding</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Classic</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-circle-notch"></i>
                        </div>
                        <h6>Bunga Krans</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Classic</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-cross"></i>
                        </div>
                        <h6>Bunga Salib</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Elegant</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-vest"></i>
                        </div>
                        <h6>Bunga Saku (Corsage)</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Seasonal</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-tree"></i>
                        </div>
                        <h6>Parcel Natal</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Seasonal</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-moon"></i>
                        </div>
                        <h6>Parcel Lebaran</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Fresh</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h6>Parcel Buah</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Modern</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-print"></i>
                        </div>
                        <h6>Papan Printing</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="category-item">
                        <span class="category-badge">Premium</span>
                        <div class="category-icon-wrapper">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h6>Papan Akrilik</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-seedling"></i> Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>Papan Bunga Premium</h4>
                        <p>Berbagai pilihan papan bunga elegan untuk ucapan duka cita, pernikahan, grand opening, dan acara spesial lainnya</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <h4>Pengiriman Express</h4>
                        <p>Layanan pengiriman cepat ke seluruh wilayah dengan jaminan tepat waktu dan kondisi bunga tetap segar</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h4>Custom Design</h4>
                        <p>Buat rangkaian papan bunga sesuai keinginan, tema, dan budget Anda dengan desain yang memukau</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Produk -->
    <section id="galeri" class="bg-light">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-images"></i> Galeri Produk</h2>
            <div class="row g-4">
                <?php while($product = $products->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card product-card">
                        <div class="product-image-wrapper">
                            <img src="uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                            <div class="product-badge">Bunga Segar</div>
                        </div>
                        <div class="card-body">
                            <h5><?= $product['name'] ?></h5>
                            <p class="card-text"><?= substr($product['description'], 0, 80) ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                                <a href="https://wa.me/6281322991131?text=Halo, saya tertarik dengan <?= urlencode($product['name']) ?>" class="btn btn-order">
                                    <i class="fab fa-whatsapp"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Lokasi Section -->
    <section id="lokasi">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-map-marked-alt"></i> Lokasi Kami</h2>
            <div class="row g-4">
                <?php while($location = $locations->fetch_assoc()): ?>
                <div class="col-md-6">
                    <div class="location-card">
                        <h5><i class="fas fa-map-marker-alt"></i> <?= $location['name'] ?></h5>
                        <p><?= $location['address'] ?></p>
                        <a href="<?= $location['subdomain'] ?>" target="_blank" class="btn-location">
                            Kunjungi Website <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="bg-light">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-question-circle"></i> Pertanyaan Umum (FAQ)</h2>
            <div class="accordion" id="faqAccordion">
                <?php 
                $i = 1;
                while($faq = $faqs->fetch_assoc()): 
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?= $i > 1 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
                            <?= $faq['question'] ?>
                        </button>
                    </h2>
                    <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i == 1 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?= $faq['answer'] ?>
                        </div>
                    </div>
                </div>
                <?php 
                $i++;
                endwhile; 
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <h5><i class="fas fa-spa"></i> Company Florist</h5>
            <p class="mb-2">Toko Papan Bunga Terpercaya</p>
            <p>Hubungi Kami: <a href="https://wa.me/6281322991131">0813-2299-1131</a></p>
            <p class="mt-4 mb-0">&copy; <?= date('Y') ?> Company Florist. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>