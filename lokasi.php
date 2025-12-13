

<?php
$lokasi = $_GET['lokasi'] ?? 'cariu';

// Data lokasi
$data_lokasi = [
    'cileungsi' => ['nama' => 'Cileungsi', 'kota' => 'Bogor'],
    'cariu' => ['nama' => 'Cariu', 'kota' => 'Bogor'],
    'sukamakmur' => ['nama' => 'Sukamakmur', 'kota' => 'Bogor'],
    'parung' => ['nama' => 'Parung', 'kota' => 'Bogor'],
    'gunung-sindur' => ['nama' => 'Gunung Sindur', 'kota' => 'Bogor'],
    'kemang' => ['nama' => 'Kemang', 'kota' => 'Bogor'],
    'bojong-gede' => ['nama' => 'Bojong Gede', 'kota' => 'Bogor'],
    'leuwiliang' => ['nama' => 'Leuwiliang', 'kota' => 'Bogor'],
    'ciampea' => ['nama' => 'Ciampea', 'kota' => 'Bogor'],
    'cibungbulang' => ['nama' => 'Cibungbulang', 'kota' => 'Bogor'],
    'pamijahan' => ['nama' => 'Pamijahan', 'kota' => 'Bogor'],
    'rumpin' => ['nama' => 'Rumpin', 'kota' => 'Bogor']
];

$current = $data_lokasi[$lokasi] ?? $data_lokasi['cariu'];
$nama_lokasi = $current['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO BUNGA <?= strtoupper($nama_lokasi) ?> - Melayani Karangan Bunga & Standing Flowers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { --primary: #2c3e50; --secondary: #f39c12; --bg-cream: #faf8f3; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg-cream); }
        .navbar { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 1rem 0; }
        .navbar-brand { font-size: 1.5rem; font-weight: 700; color: var(--primary) !important; }
        .btn-wa { background: #25D366; color: white; padding: 0.5rem 1.5rem; border-radius: 25px; font-weight: 600; text-decoration: none; display: inline-block; }
        .btn-wa:hover { background: #128C7E; color: white; }
        .product-card {
            background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease; height: 100%;
        }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 5px 20px rgba(0,0,0,0.15); }
        .product-img { width: 100%; height: 200px; object-fit: cover; background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 4rem; }
        .product-body { padding: 1.5rem; }
        .product-title { font-size: 1.2rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; }
        .product-desc { color: #666; font-size: 0.9rem; margin-bottom: 1rem; }
        .product-price { font-size: 1.3rem; font-weight: 700; color: var(--secondary); }
        .hero-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 4rem 0; }
        .hero-section h1 { font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; }
        .content-section { padding: 4rem 0; }
        .section-title { font-size: 2rem; font-weight: 700; color: var(--primary); margin-bottom: 2rem; text-align: center; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">TOKO BUNGA <?= strtoupper($nama_lokasi) ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portofolio">Portofolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#lokasi">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item ms-3">
                        <a href="https://wa.me/6281234567890" class="btn btn-wa">
                            <i class="fab fa-whatsapp me-2"></i>Pesan WA
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container text-center">
            <h1>Toko Bunga <?= $nama_lokasi ?></h1>
            <p class="lead">Melayani Karangan Bunga & Standing Flowers dengan Harga Terjangkau</p>
        </div>
    </section>

    <section class="content-section" id="layanan">
        <div class="container">
            <h2 class="section-title">Produk Kami</h2>
            <div class="row g-4">
                <?php
                $produk = [
                    ['nama' => 'Krans Bunga Duka', 'desc' => 'Melayani Krans Bunga Duka ' . $nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 350.000', 'icon' => '💐'],
                    ['nama' => 'Standing Flowers', 'desc' => 'Melayani Standing Flowers ' . $nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 450.000', 'icon' => '🌸'],
                    ['nama' => 'Sewa Papan Bunga', 'desc' => 'Melayani Sewa Papan Bunga ' . $nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 250.000', 'icon' => '🌺'],
                    ['nama' => 'Papan Bunga Akrilik', 'desc' => 'Melayani Papan Bunga Akrilik ' . $nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 500.000', 'icon' => '🌼']
                ];
                
                foreach ($produk as $p):
                ?>
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-img"><?= $p['icon'] ?></div>
                        <div class="product-body">
                            <h3 class="product-title"><?= $p['nama'] ?></h3>
                            <p class="product-desc"><?= $p['desc'] ?></p>
                            <div class="product-price"><?= $p['harga'] ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title">Toko Bunga <?= $nama_lokasi ?> – Cerita di Balik Setiap Karangan Bunga</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <p>Pernahkah Anda membayangkan betapa <strong>karangan bunga</strong> bisa menjadi bahasa tanpa kata? Di <strong>toko bunga <?= $nama_lokasi ?></strong>, setiap <em>papan bunga</em>, <em>buket bunga</em>, hingga <em>krans bunga duka cita</em> kami rangkai dengan penuh arti. Bagi kami, bunga bukan sekadar hiasan – melainkan perasaan yang ingin disampaikan: ucapan selamat, doa, simpati, dan cinta.</p>
                    
                    <h3 class="mt-4 mb-3">Dari Momen Bahagia Hingga Duka Cita</h3>
                    <p>Saat sahabat menikah, papan bunga pernikahan jadi simbol doa terbaik. Saat kerabat berduka, papan bunga duka cita menyampaikan simpati yang tak bisa terucap. Saat bisnis baru dibuka, papan bunga grand opening jadi tanda dukungan dan doa sukses. Semua momen itu bisa Anda percayakan kepada <strong>Florist <?= $nama_lokasi ?></strong> kami.</p>
                    
                    <h3 class="mt-4 mb-3">Apa yang Bisa Anda Pesan di Toko Karangan Bunga <?= $nama_lokasi ?>?</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2">✓ <strong>Papan Bunga Duka Cita</strong> – Mengiringi kepergian dengan doa tulus.</li>
                        <li class="mb-2">✓ <strong>Papan Bunga Pernikahan</strong> – Menyemarakkan momen sakral penuh cinta.</li>
                        <li class="mb-2">✓ <strong>Papan Bunga Grand Opening</strong> – Ucapan selamat untuk awal baru yang gemilang.</li>
                        <li class="mb-2">✓ <strong>Karangan Bunga Wisuda</strong> – Menghargai perjuangan dalam meraih gelar.</li>
                        <li class="mb-2">✓ <strong>Buket Bunga</strong> – Hadiah manis penuh makna untuk orang tersayang.</li>
                        <li class="mb-2">✓ <strong>Standing Flower & Krans Bunga</strong> – Elegan untuk event formal dan penghormatan terakhir.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Toko Bunga <?= $nama_lokasi ?>. All Rights Reserved.</p>
            <p class="mt-2"><i class="fab fa-whatsapp"></i> 0812-3456-7890 | <i class="fas fa-envelope"></i> <?= strtolower($lokasi) ?>@toko-bunga.id</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

*/
?>