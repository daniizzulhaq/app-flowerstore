<?php
/**
 * Script Generator Otomatis untuk Membuat Folder & File per Lokasi
 * 
 * CARA PAKAI:
 * 1. Upload file ini ke root website Anda
 * 2. Akses via browser: http://yoursite.com/generate_all_lokasi.php
 * 3. Script akan otomatis membuat folder dan file index.php untuk semua daerah
 * 4. Hapus file ini setelah selesai generate
 */

// Data lokasi dengan konten unik per daerah
$lokasi_list = [
    [
        'slug' => 'cileungsi',
        'nama' => 'Cileungsi',
        'artikel_judul' => 'Bunga untuk Kawasan Industri yang Terus Berkembang',
        'artikel_intro' => 'Cileungsi bukan hanya sekadar kawasan industri dan perumahan modern. Di sini, setiap hari perusahaan baru dibuka, kompleks perumahan bertambah, dan aktivitas bisnis tak pernah berhenti. <strong>Toko bunga Cileungsi</strong> kami hadir untuk melengkapi setiap momen penting di kawasan strategis ini – dari grand opening pabrik hingga syukuran warga perumahan baru.',
        'artikel_subjudul' => 'Mengapa Perusahaan di Cileungsi Percaya Kepada Kami?',
        'artikel_unik' => 'Di tengah hiruk pikuk kawasan industri, <strong>papan bunga ucapan selamat</strong> menjadi simbol apresiasi yang tak tergantikan. Ketika perusahaan merayakan HUT, karyawan promosi, atau grand opening cabang baru, <em>standing flowers</em> kami tampil dengan desain profesional yang mencerminkan kesuksesan. Dengan pengalaman melayani ratusan perusahaan di Cileungsi, kami paham betul pentingnya ketepatan waktu dan kualitas yang konsisten.'
    ],
    [
        'slug' => 'cariu',
        'nama' => 'Cariu',
        'artikel_judul' => 'Surga Pernikahan dengan Dekorasi Bunga Impian',
        'artikel_intro' => 'Udara sejuk pegunungan, pemandangan hijau yang menyejukkan mata, villa-villa cantik dengan taman luas – itulah <strong>Cariu</strong>. Tidak heran jika daerah ini menjadi destinasi favorit untuk pernikahan outdoor dan gathering eksklusif. <strong>Toko bunga Cariu</strong> kami spesialis dalam dekorasi pernikahan yang memukau, dari <em>papan bunga ucapan selamat</em> hingga rangkaian bunga segar untuk altar dan meja tamu.',
        'artikel_subjudul' => 'Pernikahan di Cariu: Sempurna dengan Bunga Kami',
        'artikel_unik' => 'Bayangkan momen sakral pernikahan Anda dengan latar belakang pegunungan yang megah. Setiap sudut venue dihiasi <strong>bunga segar pilihan</strong> yang kami rangkai khusus. Dari standing flowers menyambut tamu, hingga hand bouquet untuk pengantin – semua dirancang untuk melengkapi keindahan alam Cariu. Kami telah dipercaya oleh puluhan venue pernikahan dan wedding organizer di kawasan ini untuk menghadirkan dekorasi bunga yang tak terlupakan.'
    ],
    [
        'slug' => 'sukamakmur',
        'nama' => 'Sukamakmur',
        'artikel_judul' => 'Tradisi Syukuran yang Selalu Dihiasi Karangan Bunga',
        'artikel_intro' => 'Di <strong>Sukamakmur</strong>, tradisi masih menjadi bagian penting kehidupan masyarakat. Setiap syukuran panen, perayaan adat, hingga hajatan keluarga, selalu dihiasi dengan <strong>karangan bunga</strong> sebagai simbol rasa syukur dan kegembiraan. <strong>Toko bunga Sukamakmur</strong> kami bangga menjadi bagian dari tradisi ini, melayani dengan hati untuk setiap acara warga.',
        'artikel_subjudul' => 'Karangan Bunga untuk Setiap Perayaan Komunitas',
        'artikel_unik' => 'Ketika petani merayakan panen raya, <em>papan bunga ucapan syukur</em> kami turut mewarnai perayaan. Saat ada pernikahan adat, <strong>standing flowers</strong> menghiasi pelaminan dengan anggun. Di setiap pengajian dan acara RT/RW, rangkaian bunga kami hadir sebagai ungkapan kebersamaan. Kami memahami nilai gotong royong di Sukamakmur – maka kami selalu hadir tepat waktu dengan harga yang bersahabat untuk semua kalangan.'
    ],
    [
        'slug' => 'parung',
        'nama' => 'Parung',
        'artikel_judul' => 'Ratusan Usaha Baru Percaya Papan Bunga Kami',
        'artikel_intro' => '<strong>Parung</strong> adalah pusat perdagangan yang tak pernah sepi. Setiap minggu ada toko baru, showroom, café, atau kantor yang diresmikan. Dan di setiap grand opening, <strong>papan bunga ucapan selamat</strong> dari kami selalu menjadi pilihan para pengusaha. <strong>Toko bunga Parung</strong> kami spesialis dalam papan bunga grand opening dengan desain modern dan profesional.',
        'artikel_subjudul' => 'Grand Opening Sukses Dimulai dari Papan Bunga yang Tepat',
        'artikel_unik' => 'Pengusaha di Parung tahu bahwa kesan pertama sangat penting. <em>Papan bunga grand opening</em> yang megah dan eye-catching bisa menarik perhatian pelanggan dan membuat acara pembukaan lebih berkesan. Kami melayani pemesanan mendadak dengan sistem express – pesan pagi, antar siang. Dari minimarket hingga dealer mobil, ratusan usaha telah mempercayakan papan bunga mereka kepada kami. Desain custom, harga kompetitif, dan kualitas yang tidak mengecewakan.'
    ],
    [
        'slug' => 'gunung-sindur',
        'nama' => 'Gunung Sindur',
        'artikel_judul' => 'Melayani Setiap Momen Penting Warga dengan Bunga Segar',
        'artikel_intro' => 'Sebagai kawasan padat penduduk, <strong>Gunung Sindur</strong> memiliki dinamika kehidupan yang tinggi. Setiap hari ada kelahiran yang dirayakan, pernikahan yang digelar, hingga kepergian yang dikenang. <strong>Toko bunga Gunung Sindur</strong> kami hadir 24 jam untuk melayani setiap kebutuhan bunga warga – dari <em>buket ucapan selamat</em> hingga <em>krans duka cita</em>.',
        'artikel_subjudul' => 'Toko Bunga 24 Jam yang Selalu Siap Melayani',
        'artikel_unik' => 'Kami paham bahwa kebutuhan akan bunga bisa datang kapan saja. Ketika ada kabar duka di malam hari, kami siap mengantar <strong>papan bunga duka cita</strong> dengan cepat dan penuh empati. Saat ada teman yang melahirkan, <em>buket bunga ucapan</em> kami bisa diantar di hari yang sama. Dengan armada pengiriman yang luas dan stok bunga segar setiap hari, kami adalah solusi tepat untuk semua kebutuhan bunga di Gunung Sindur. Ratusan keluarga telah mempercayakan momen penting mereka kepada kami.'
    ],
    [
        'slug' => 'kemang',
        'nama' => 'Kemang',
        'artikel_judul' => 'Dekorasi Bunga Premium untuk Pernikahan Mewah',
        'artikel_intro' => 'Villa-villa eksklusif dengan view pegunungan, venue pernikahan bertaraf internasional, dan konsep wedding yang glamor – begitulah <strong>Kemang</strong>. Di sini, pernikahan bukan sekadar acara, melainkan sebuah karya seni. <strong>Toko bunga Kemang</strong> kami dipercaya oleh wedding planner ternama untuk menghadirkan <strong>dekorasi bunga premium</strong> yang memukau.',
        'artikel_subjudul' => 'Pengalaman Melayani Pernikahan Kelas Atas',
        'artikel_unik' => 'Dari royal wedding dengan ribuan tangkai mawar import, hingga garden party dengan konsep rustic yang elegan – kami telah menangani semuanya. Setiap detail diperhatikan: pemilihan bunga segar berkualitas tinggi, kombinasi warna yang harmonis, hingga instalasi yang sempurna. <em>Standing flowers</em> menyambut tamu dengan megah, <strong>hand bouquet pengantin</strong> dirancang eksklusif, dan dekorasi altar yang membuat semua orang terpukau. Tim profesional kami berpengalaman bekerja di berbagai venue premium Kemang dan siap mewujudkan konsep pernikahan impian Anda.'
    ],
    [
        'slug' => 'bojong-gede',
        'nama' => 'Bojong Gede',
        'artikel_judul' => 'Pengiriman Express untuk Kawasan Transit yang Dinamis',
        'artikel_intro' => 'Stasiun kereta yang ramai, hotel dan guest house di setiap sudut, perkantoran yang bertebaran – <strong>Bojong Gede</strong> adalah kawasan transit yang tidak pernah tidur. <strong>Toko bunga Bojong Gede</strong> kami spesialis dalam <em>layanan express same-day delivery</em> untuk melayani kebutuhan mendesak dari para pebisnis dan traveler.',
        'artikel_subjudul' => 'Same Day Delivery yang Bisa Diandalkan',
        'artikel_unik' => 'Bayangkan Anda baru tiba di Bojong Gede untuk meeting bisnis dan tiba-tiba ingat harus mengirim <strong>bunga ucapan selamat</strong> untuk rekan kerja. Atau Anda menginap di hotel dan ingin memberi surprise buket untuk pasangan. Kami siap! Pesan melalui WhatsApp, pilih desain, dan bunga akan tiba dalam hitungan jam. Hotel, kantor, rumah sakit, atau rumah duka – pengiriman kami cepat dan tepat waktu. Ratusan pelanggan korporat di Bojong Gede telah mempercayai layanan kilat kami.'
    ],
    [
        'slug' => 'leuwiliang',
        'nama' => 'Leuwiliang',
        'artikel_judul' => 'Dekorasi Bunga untuk Event Corporate dan Gathering Besar',
        'artikel_intro' => 'Alam yang asri, udara segar pegunungan, dan berbagai venue outbound menjadikan <strong>Leuwiliang</strong> destinasi favorit untuk corporate gathering dan team building. <strong>Toko bunga Leuwiliang</strong> kami berpengalaman menangani dekorasi bunga untuk event skala besar – dari 50 hingga 500 orang.',
        'artikel_subjudul' => 'Spesialis Dekorasi Event Perusahaan',
        'artikel_unik' => 'Ketika perusahaan mengadakan annual gathering, <strong>standing flowers</strong> kami menghiasi stage dan entrance dengan profesional. Saat ada acara family day, rangkaian bunga segar mempercantik setiap booth dan photo spot. Dari perusahaan multinasional hingga startup lokal, kami telah dipercaya menangani ratusan corporate event di berbagai venue Leuwiliang. Tim kami siap survei lokasi, konsultasi konsep, hingga instalasi on-site. <em>Papan bunga ucapan</em> untuk milestone perusahaan? Dekorasi meja VIP? Buket untuk doorprize? Semua kami tangani dengan profesional dan tepat waktu.'
    ],
    [
        'slug' => 'ciampea',
        'nama' => 'Ciampea',
        'artikel_judul' => 'Bunga Wisuda & Buket Ucapan untuk Mahasiswa IPB',
        'artikel_intro' => 'Kampus IPB yang megah, ribuan mahasiswa berprestasi, dan musim wisuda yang selalu meriah – itulah <strong>Ciampea</strong>. <strong>Toko bunga Ciampea</strong> kami adalah pilihan utama mahasiswa dan keluarga untuk <strong>buket bunga wisuda</strong>, <em>hand bouquet ucapan</em>, dan <em>papan bunga congratulation</em> dengan harga terjangkau khusus untuk pelajar.',
        'artikel_subjudul' => 'Paket Spesial Mahasiswa dengan Harga Terjangkau',
        'artikel_unik' => 'Kami tahu budget mahasiswa terbatas, tapi keinginan untuk merayakan kelulusan tetap besar. Karena itu, kami menyediakan <strong>paket bunga wisuda mulai dari 75 ribu</strong> dengan kualitas yang tetap cantik dan segar! Setiap musim wisuda, ratusan keluarga memesan buket dari kami. Desain modern yang instagramable, bisa custom dengan foto dan nama, plus gratis kartu ucapan. Pengiriman langsung ke Kampus IPB atau Graha Widya Wisuda. Sudah ribuan mahasiswa merayakan kesuksesannya dengan bunga dari kami. Sekarang giliran Anda!'
    ],
    [
        'slug' => 'cibungbulang',
        'nama' => 'Cibungbulang',
        'artikel_judul' => 'Standing Flowers untuk Acara HUT dan Apresiasi Karyawan',
        'artikel_intro' => 'Kawasan industri dengan deretan pabrik dan perusahaan besar – <strong>Cibungbulang</strong> adalah jantung manufaktur di Bogor. <strong>Toko bunga Cibungbulang</strong> kami spesialis melayani kebutuhan korporat: <em>standing flowers untuk HUT perusahaan</em>, <em>papan bunga apresiasi karyawan</em>, dan <em>rangkaian bunga untuk acara company gathering</em>.',
        'artikel_subjudul' => 'Partner Terpercaya Perusahaan-Perusahaan Besar',
        'artikel_unik' => 'Kami paham bahwa perusahaan menghargai profesionalisme dan ketepatan waktu. Ketika ada acara HUT, <strong>standing flowers</strong> kami harus tiba tepat sebelum acara dimulai – dan kami selalu deliver! Desain formal yang elegan, branding perusahaan yang bisa dikustomisasi, hingga instalasi yang rapi. Dari pabrik tekstil, manufaktur elektronik, hingga perusahaan logistik – ratusan perusahaan di Cibungbulang telah menjadi klien rutin kami. Invoice dan kwitansi pajak tersedia untuk kemudahan administrasi perusahaan Anda. Hubungi kami untuk penawaran khusus corporate!'
    ],
    [
        'slug' => 'pamijahan',
        'nama' => 'Pamijahan',
        'artikel_judul' => 'Karangan Bunga untuk Acara Keagamaan dan Pesantren',
        'artikel_intro' => 'Sebagai kawasan wisata religi yang terkenal, <strong>Pamijahan</strong> sering mengadakan acara-acara keagamaan berskala besar: pengajian akbar, peringatan hari besar Islam, hingga acara santri di berbagai pesantren. <strong>Toko bunga Pamijahan</strong> kami memahami kebutuhan khusus untuk dekorasi yang sesuai dengan nilai-nilai religius.',
        'artikel_subjudul' => 'Dekorasi Bunga yang Sesuai dengan Nilai Islami',
        'artikel_unik' => 'Kami tahu bahwa <strong>karangan bunga untuk acara keagamaan</strong> perlu dirancang dengan penuh kehormatan dan kesederhanaan. Warna-warna yang lembut, rangkaian yang elegan tanpa berlebihan, dan pemilihan bunga yang tepat – semua dipertimbangkan dengan seksama. Dari pengajian ustadz terkenal, haul tokoh agama, hingga wisuda santri, kami telah dipercaya oleh berbagai pesantren dan panitia acara di Pamijahan. <em>Standing flowers</em> untuk panggung ceramah, <em>papan bunga selamat</em> untuk hafidz Al-Quran, hingga dekorasi masjid untuk acara khusus – semua kami layani dengan penuh tanggung jawab dan hormat.'
    ],
    [
        'slug' => 'rumpin',
        'nama' => 'Rumpin',
        'artikel_judul' => 'Bunga Syukuran untuk Perayaan Panen Raya',
        'artikel_intro' => 'Hamparan sawah yang luas, kebun-kebun produktif, dan tradisi panen raya yang meriah – <strong>Rumpin</strong> adalah daerah agraris dengan budaya syukuran yang kuat. <strong>Toko bunga Rumpin</strong> kami bangga menjadi bagian dari perayaan hasil panen dengan menyediakan <strong>karangan bunga syukuran</strong> yang indah dan bermakna.',
        'artikel_subjudul' => 'Merayakan Keberkahan Hasil Bumi Bersama',
        'artikel_unik' => 'Ketika petani merayakan hasil panen yang melimpah, <em>karangan bunga</em> menjadi simbol rasa syukur kepada Sang Pencipta. Kami menyediakan rangkaian bunga khusus untuk acara ruwatan sawah, syukuran panen, hingga festival pertanian. Desain yang natural dengan bunga-bunga segar dari kebun lokal, mencerminkan kesederhanaan dan keindahan alam Rumpin. Selain untuk acara panen, kami juga melayani kebutuhan bunga untuk pernikahan adat, khitanan, dan perayaan keluarga lainnya. Harga yang bersahabat untuk masyarakat Rumpin, karena kami percaya setiap keberkahan layak dirayakan dengan indah.'
    ]
];

// Template index.php yang akan digenerate
function getTemplate($nama_lokasi, $slug_lokasi, $artikel_judul, $artikel_intro, $artikel_subjudul, $artikel_unik) {
    return <<<HTML
<?php
\$nama_lokasi = '$nama_lokasi';
\$slug_lokasi = '$slug_lokasi';

// Auto-detect base URL
\$base_url = rtrim(dirname(dirname(\$_SERVER['PHP_SELF'])), '/\\\\');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO BUNGA <?= strtoupper(\$nama_lokasi) ?> - Melayani Karangan Bunga & Standing Flowers</title>
    <meta name="description" content="Toko Bunga <?= \$nama_lokasi ?> melayani karangan bunga, papan bunga duka cita, standing flowers, buket bunga dengan harga terjangkau. Buka 24 jam.">
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
            <a class="navbar-brand" href="<?= \$base_url ?>/">TOKO BUNGA <?= strtoupper(\$nama_lokasi) ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portofolio">Portofolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= \$base_url ?>/#lokasi">Lokasi Lain</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item ms-3">
                        <a href="https://wa.me/6281234567890?text=Halo, saya mau pesan bunga untuk daerah <?= \$nama_lokasi ?>" class="btn btn-wa">
                            <i class="fab fa-whatsapp me-2"></i>Pesan WA
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container text-center">
            <h1>Toko Bunga <?= \$nama_lokasi ?></h1>
            <p class="lead">Melayani Karangan Bunga & Standing Flowers dengan Harga Terjangkau</p>
            <a href="https://wa.me/6281234567890?text=Halo, saya mau pesan bunga untuk daerah <?= \$nama_lokasi ?>" class="btn btn-wa btn-lg">
                <i class="fab fa-whatsapp me-2"></i>Konsultasi Gratis
            </a>
        </div>
    </section>

    <section class="content-section" id="layanan">
        <div class="container">
            <h2 class="section-title">Produk Kami</h2>
            <div class="row g-4">
                <?php
                \$produk = [
                    ['nama' => 'Krans Bunga Duka', 'desc' => 'Melayani Krans Bunga Duka ' . \$nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 350.000', 'icon' => '💐'],
                    ['nama' => 'Standing Flowers', 'desc' => 'Melayani Standing Flowers ' . \$nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 450.000', 'icon' => '🌸'],
                    ['nama' => 'Sewa Papan Bunga', 'desc' => 'Melayani Sewa Papan Bunga ' . \$nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 250.000', 'icon' => '🌺'],
                    ['nama' => 'Papan Bunga Akrilik', 'desc' => 'Melayani Papan Bunga Akrilik ' . \$nama_lokasi . ' dengan harga terjangkau & layanan cepat, buka 24 jam.', 'harga' => 'Rp 500.000', 'icon' => '🌼']
                ];
                
                foreach (\$produk as \$p):
                ?>
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-img"><?= \$p['icon'] ?></div>
                        <div class="product-body">
                            <h3 class="product-title"><?= \$p['nama'] ?></h3>
                            <p class="product-desc"><?= \$p['desc'] ?></p>
                            <div class="product-price"><?= \$p['harga'] ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="content-section bg-white">
        <div class="container">
            <h2 class="section-title">Toko Bunga <?= \$nama_lokasi ?> – $artikel_judul</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <p>$artikel_intro</p>
                    
                    <h3 class="mt-4 mb-3">$artikel_subjudul</h3>
                    <p>$artikel_unik</p>
                    
                    <h3 class="mt-4 mb-3">Layanan Unggulan Toko Bunga <?= \$nama_lokasi ?></h3>
                    <p>Sebagai <strong>florist terpercaya di <?= \$nama_lokasi ?></strong>, kami menyediakan berbagai jenis karangan bunga untuk setiap momen spesial Anda:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">🌹 <strong>Papan Bunga Duka Cita</strong> – Mengiringi kepergian dengan doa dan simpati tulus</li>
                        <li class="mb-2">💐 <strong>Papan Bunga Pernikahan</strong> – Menyemarakkan momen sakral penuh cinta dan kebahagiaan</li>
                        <li class="mb-2">🎊 <strong>Papan Bunga Grand Opening</strong> – Ucapan selamat untuk awal bisnis yang gemilang</li>
                        <li class="mb-2">🎓 <strong>Karangan Bunga Wisuda</strong> – Menghargai perjuangan dalam meraih kesuksesan</li>
                        <li class="mb-2">💝 <strong>Buket Bunga</strong> – Hadiah romantis penuh makna untuk orang tersayang</li>
                        <li class="mb-2">🌸 <strong>Standing Flower</strong> – Elegan untuk berbagai acara formal dan perayaan</li>
                    </ul>

                    <div class="alert alert-success mt-4">
                        <h5><i class="fas fa-star"></i> Keunggulan Kami</h5>
                        <ul class="mb-0">
                            <li>✅ Buka 24 jam untuk pemesanan kapan saja</li>
                            <li>✅ Pengiriman same day untuk area <?= \$nama_lokasi ?></li>
                            <li>✅ Desain custom sesuai keinginan</li>
                            <li>✅ Harga terjangkau dengan kualitas premium</li>
                            <li>✅ Bunga segar langsung dari supplier terpercaya</li>
                        </ul>
                    </div>

                    <div class="alert alert-info mt-3">
                        <h5><i class="fas fa-map-marker-alt"></i> Melayani Pengiriman ke Seluruh <?= \$nama_lokasi ?></h5>
                        <p class="mb-0">Kami siap mengantar pesanan Anda ke rumah duka, gedung pernikahan, kantor, rumah sakit, dan lokasi lainnya di area <?= \$nama_lokasi ?> dan sekitarnya. Hubungi kami sekarang untuk konsultasi gratis!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Toko Bunga <?= \$nama_lokasi ?>. All Rights Reserved.</p>
            <p class="mt-2"><i class="fab fa-whatsapp"></i> 0812-3456-7890 | <i class="fas fa-envelope"></i> <?= \$slug_lokasi ?>@toko-bunga.id</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
HTML;
}

// Proses generate
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Generator Lokasi</title></head><body>";
echo "<h1>🚀 Generate Folder & File Lokasi</h1>";
echo "<hr>";

$success = 0;
$failed = 0;

foreach ($lokasi_list as $lok) {
    $folder = $lok['slug'];
    $nama = $lok['nama'];
    
    echo "<p>📁 Membuat folder: <strong>{$folder}</strong>...</p>";
    
    // Buat folder jika belum ada
    if (!file_exists($folder)) {
        if (mkdir($folder, 0755, true)) {
            echo "<p style='color:green'>✓ Folder <strong>{$folder}</strong> berhasil dibuat</p>";
        } else {
            echo "<p style='color:red'>✗ Gagal membuat folder <strong>{$folder}</strong></p>";
            $failed++;
            continue;
        }
    } else {
        echo "<p style='color:orange'>⚠ Folder <strong>{$folder}</strong> sudah ada</p>";
    }
    
    // Buat file index.php
    $filepath = $folder . '/index.php';
    $content = getTemplate(
        $lok['nama'], 
        $folder, 
        $lok['artikel_judul'],
        $lok['artikel_intro'],
        $lok['artikel_subjudul'],
        $lok['artikel_unik']
    );
    
    if (file_put_contents($filepath, $content)) {
        echo "<p style='color:green'>✓ File <strong>{$filepath}</strong> berhasil dibuat</p>";
        $success++;
    } else {
        echo "<p style='color:red'>✗ Gagal membuat file <strong>{$filepath}</strong></p>";
        $failed++;
    }
    
    echo "<hr>";
}

echo "<h2>📊 Summary</h2>";
echo "<p>✅ Berhasil: <strong>{$success}</strong> lokasi</p>";
echo "<p>❌ Gagal: <strong>{$failed}</strong> lokasi</p>";

if ($success > 0) {
    echo "<div style='background:#d4edda;padding:15px;border-radius:5px;margin-top:20px;'>";
    echo "<h3 style='color:#155724'>🎉 Selesai!</h3>";
    echo "<p>Semua file berhasil digenerate. Anda bisa mengakses halaman per lokasi:</p>";
    echo "<ul>";
    foreach ($lokasi_list as $lok) {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $lok['slug'] . '/';
        echo "<li><a href='{$url}' target='_blank'>{$lok['nama']}</a></li>";
    }
    echo "</ul>";
    echo "<p><strong>⚠️ PENTING:</strong> Hapus file <code>generate_all_lokasi.php</code> setelah selesai!</p>";
    echo "</div>";
}

echo "</body></html>";
?>