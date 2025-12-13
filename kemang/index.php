<?php
session_start();

// Konfigurasi lokasi
$nama_lokasi = 'Kemang';
$slug_lokasi = 'kemang';

// Base URL untuk navigation
$base_url = dirname($_SERVER['PHP_SELF']);
if($base_url == '/') $base_url = '';
$base_url = rtrim($base_url, '/');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Florist <?= $nama_lokasi ?> - Toko Bunga Terpercaya</title>
    <meta name="description" content="Toko Bunga <?= $nama_lokasi ?> melayani karangan bunga, papan bunga, standing flowers dengan harga terjangkau. Buka 24 jam, pengiriman cepat.">
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
            height: 100%;
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
        footer {
            background: var(--secondary);
            color: white;
        }
        .service-icon {
            font-size: 3rem;
            color: var(--primary);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="<?= $base_url ?>/../">
                <i class="fas fa-flower"></i> Company Florist - <?= $nama_lokasi ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $base_url ?>/../#lokasi">Lokasi Lain</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                </ul>
                <a href="https://wa.me/6281322991131?text=Halo, saya ingin pesan bunga untuk area <?= $nama_lokasi ?>" class="btn btn-whatsapp ms-3">
                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-4">Company Florist <?= $nama_lokasi ?></h1>
                    <p class="lead mb-4">Melayani Karangan Bunga, Standing Flowers & Papan Bunga dengan Kualitas Terbaik di <?= $nama_lokasi ?></p>
                    <a href="https://wa.me/6281322991131?text=Halo, saya ingin pesan bunga untuk area <?= $nama_lokasi ?>" class="btn btn-light btn-lg">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Layanan Kami di <?= $nama_lokasi ?></h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-gift service-icon"></i>
                        </div>
                        <h4>Rangkaian Bunga</h4>
                        <p>Berbagai pilihan rangkaian bunga segar untuk setiap acara spesial Anda di <?= $nama_lokasi ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-truck service-icon"></i>
                        </div>
                        <h4>Pengiriman Cepat</h4>
                        <p>Layanan pengiriman same day ke seluruh wilayah <?= $nama_lokasi ?> dengan tepat waktu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-palette service-icon"></i>
                        </div>
                        <h4>Custom Design</h4>
                        <p>Buat rangkaian sesuai keinginan dan tema acara Anda dengan konsultasi gratis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Produk -->
    <section id="galeri" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Galeri Produk Bunga Kami</h2>
            <div class="row g-4">
                <?php
                $products = [
                    ['name' => 'Papan Bunga Duka Cita', 'desc' => 'Karangan bunga duka cita untuk mengiringi kepergian dengan penuh simpati', 'price' => 350000, 'icon' => '🕊️'],
                    ['name' => 'Standing Flower Grand Opening', 'desc' => 'Standing flower megah untuk acara grand opening dan ucapan selamat', 'price' => 500000, 'icon' => '🎊'],
                    ['name' => 'Buket Bunga Wisuda', 'desc' => 'Hand bouquet cantik untuk merayakan kelulusan dan wisuda', 'price' => 150000, 'icon' => '🎓'],
                    ['name' => 'Papan Bunga Pernikahan', 'desc' => 'Rangkaian bunga elegan untuk menyemarakkan acara pernikahan', 'price' => 450000, 'icon' => '💐'],
                    ['name' => 'Bunga Meja', 'desc' => 'Table flower untuk dekorasi acara dan ruangan', 'price' => 200000, 'icon' => '🌸'],
                    ['name' => 'Buket Ucapan', 'desc' => 'Buket bunga segar untuk berbagai ucapan dan kejutan spesial', 'price' => 125000, 'icon' => '💝']
                ];
                
                foreach($products as $product):
                ?>
                <div class="col-md-4">
                    <div class="card product-card">
                        <div class="card-body text-center">
                            <div style="font-size: 4rem; margin-bottom: 1rem;"><?= $product['icon'] ?></div>
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text text-muted"><?= $product['desc'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-success fw-bold">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                                <a href="https://wa.me/6281322991131?text=Halo, saya tertarik dengan <?= urlencode($product['name']) ?> untuk area <?= $nama_lokasi ?>" class="btn btn-sm btn-success">
                                    <i class="fab fa-whatsapp"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Artikel Lokasi -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title">Dekorasi Bunga Premium untuk Pernikahan Mewah</h2>
                    <p class="lead">Villa-villa eksklusif dengan view pegunungan, venue pernikahan bertaraf internasional, dan konsep wedding yang glamor – begitulah <strong>Kemang</strong>. Di sini, pernikahan bukan sekadar acara, melainkan sebuah karya seni. <strong>Toko bunga Kemang</strong> kami dipercaya oleh wedding planner ternama untuk menghadirkan <strong>dekorasi bunga premium</strong> yang memukau.</p>
                    
                    <h3 class="mt-4 mb-3">Pengalaman Melayani Pernikahan Kelas Atas</h3>
                    <p>Dari royal wedding dengan ribuan tangkai mawar import, hingga garden party dengan konsep rustic yang elegan – kami telah menangani semuanya. Setiap detail diperhatikan: pemilihan bunga segar berkualitas tinggi, kombinasi warna yang harmonis, hingga instalasi yang sempurna. <em>Standing flowers</em> menyambut tamu dengan megah, <strong>hand bouquet pengantin</strong> dirancang eksklusif, dan dekorasi altar yang membuat semua orang terpukau.</p>
                    
                    <h3 class="mt-5 mb-3">Mengapa Memilih Company Florist di <?= $nama_lokasi ?>?</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                                <div>
                                    <h5>Bunga Segar Berkualitas</h5>
                                    <p class="text-muted">Kami hanya menggunakan bunga segar pilihan terbaik dari supplier terpercaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                                <div>
                                    <h5>Pengiriman Tepat Waktu</h5>
                                    <p class="text-muted">Same day delivery untuk area <?= $nama_lokasi ?> dan sekitarnya</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                                <div>
                                    <h5>Harga Terjangkau</h5>
                                    <p class="text-muted">Harga kompetitif dengan kualitas premium tanpa hidden cost</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                                <div>
                                    <h5>Buka 24 Jam</h5>
                                    <p class="text-muted">Layanan pemesanan dan konsultasi tersedia kapan saja</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-success mt-4">
                        <h5><i class="fas fa-map-marker-alt"></i> Area Pengiriman</h5>
                        <p class="mb-0">Kami melayani pengiriman ke seluruh wilayah <?= $nama_lokasi ?> dan sekitarnya: rumah duka, gedung pernikahan, kantor, rumah sakit, hotel, dan lokasi lainnya dengan layanan cepat dan profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Pertanyaan Umum (FAQ)</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara memesan bunga?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda dapat memesan melalui WhatsApp kami di 0813-2299-1131 atau langsung mengklik tombol "Pesan" pada produk yang Anda inginkan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Berapa lama waktu pengiriman ke <?= $nama_lokasi ?>?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Untuk wilayah <?= $nama_lokasi ?>, pengiriman memakan waktu 2-4 jam setelah konfirmasi pembayaran. Kami juga menyediakan layanan express untuk kebutuhan mendesak.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah bisa custom design bunga?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, kami menerima custom design sesuai keinginan Anda. Silakan hubungi kami untuk konsultasi lebih lanjut mengenai tema, warna, dan jenis bunga yang Anda inginkan.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Bagaimana cara pembayaran?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami menerima pembayaran melalui transfer bank, e-wallet (OVO, GoPay, Dana), dan COD untuk wilayah tertentu di <?= $nama_lokasi ?>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 mt-5">
        <div class="container text-center">
            <h5 class="mb-3"><i class="fas fa-flower"></i> Company Florist - <?= $nama_lokasi ?></h5>
            <p>Hubungi Kami: <a href="https://wa.me/6281322991131" class="text-white">0813-2299-1131</a></p>
            <p class="mb-0">&copy; <?= date('Y') ?> Company Florist. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>