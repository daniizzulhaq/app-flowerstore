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
    <style>
        :root {
            --primary: #10b981;
            --secondary: #064e3b;
        }
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 100px 0;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-whatsapp {
            background: #25D366;
            color: white;
            border-radius: 50px;
        }
        .btn-whatsapp:hover {
            background: #128C7E;
            color: white;
        }
        .product-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .product-card:hover {
            transform: translateY(-10px);
        }
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 40px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary);
        }
        .location-card {
            border-left: 4px solid var(--primary);
            transition: all 0.3s;
        }
        .location-card:hover {
            background: #f0fdf4;
            transform: translateX(5px);
        }
        footer {
            background: var(--secondary);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="#">
                <i class="fas fa-flower"></i> Company Florist
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
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
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Wujudkan Momen Spesial dengan Bunga Indah</h1>
                    <p class="lead mb-4">Kami menyediakan rangkaian bunga segar berkualitas untuk setiap momen berharga Anda</p>
                    <a href="https://wa.me/6281322991131" class="btn btn-light btn-lg">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?w=600" class="img-fluid rounded" alt="Bunga">
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-gift fa-3x text-success"></i>
                        </div>
                        <h4>Rangkaian Bunga</h4>
                        <p>Berbagai pilihan rangkaian bunga untuk acara spesial Anda</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-truck fa-3x text-success"></i>
                        </div>
                        <h4>Pengiriman Cepat</h4>
                        <p>Layanan pengiriman ke seluruh wilayah dengan tepat waktu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-palette fa-3x text-success"></i>
                        </div>
                        <h4>Custom Design</h4>
                        <p>Buat rangkaian sesuai keinginan dan tema acara Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Produk -->
    <section id="galeri" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Galeri Produk</h2>
            <div class="row g-4">
                <?php while($product = $products->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="uploads/<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text text-muted"><?= substr($product['description'], 0, 80) ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                                <a href="https://wa.me/6281322991131?text=Halo, saya tertarik dengan <?= urlencode($product['name']) ?>" class="btn btn-sm btn-success">
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
    <section id="lokasi" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Lokasi Kami</h2>
            <div class="row g-3">
                <?php while($location = $locations->fetch_assoc()): ?>
                <div class="col-md-6">
                    <div class="card location-card p-3">
                        <h5><i class="fas fa-map-marker-alt text-success"></i> <?= $location['name'] ?></h5>
                        <p class="mb-2 text-muted"><?= $location['address'] ?></p>
                        <a href="<?= $location['subdomain'] ?>" target="_blank" class="btn btn-sm btn-outline-success">
                            Kunjungi Website <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Pertanyaan Umum (FAQ)</h2>
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
    <footer class="py-4 mt-5">
        <div class="container text-center">
            <h5 class="mb-3"><i class="fas fa-flower"></i> Company Florist</h5>
            <p>Hubungi Kami: <a href="https://wa.me/6281322991131" class="text-white">0813-2299-1131</a></p>
            <p>&copy; <?= date('Y') ?> Company Florist. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>