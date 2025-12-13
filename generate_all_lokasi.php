<?php
/**
 * Script Generator Otomatis untuk Membuat Folder & File per Lokasi
 * Sesuai dengan Design Index.php Company Florist
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
        'slug' => 'bojong-gede',
        'nama' => 'Bojong Gede',
        'artikel_judul' => 'Pengiriman Express untuk Kawasan Transit yang Dinamis',
        'artikel_intro' => 'Stasiun kereta yang ramai, hotel dan guest house di setiap sudut, perkantoran yang bertebaran – <strong>Bojong Gede</strong> adalah kawasan transit yang tidak pernah tidur. <strong>Toko bunga Bojong Gede</strong> kami spesialis dalam <em>layanan express same-day delivery</em> untuk melayani kebutuhan mendesak dari para pebisnis dan traveler.',
        'artikel_subjudul' => 'Same Day Delivery yang Bisa Diandalkan',
        'artikel_unik' => 'Bayangkan Anda baru tiba di Bojong Gede untuk meeting bisnis dan tiba-tiba ingat harus mengirim <strong>bunga ucapan selamat</strong> untuk rekan kerja. Atau Anda menginap di hotel dan ingin memberi surprise buket untuk pasangan. Kami siap! Pesan melalui WhatsApp, pilih desain, dan bunga akan tiba dalam hitungan jam. Hotel, kantor, rumah sakit, atau rumah duka – pengiriman kami cepat dan tepat waktu. Ratusan pelanggan korporat di Bojong Gede telah mempercayai layanan kilat kami.'
    ],
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
        'slug' => 'cibungbulang',
        'nama' => 'Cibungbulang',
        'artikel_judul' => 'Standing Flowers untuk Acara HUT dan Apresiasi Karyawan',
        'artikel_intro' => 'Kawasan industri dengan deretan pabrik dan perusahaan besar – <strong>Cibungbulang</strong> adalah jantung manufaktur di Bogor. <strong>Toko bunga Cibungbulang</strong> kami spesialis melayani kebutuhan korporat: <em>standing flowers untuk HUT perusahaan</em>, <em>papan bunga apresiasi karyawan</em>, dan <em>rangkaian bunga untuk acara company gathering</em>.',
        'artikel_subjudul' => 'Partner Terpercaya Perusahaan-Perusahaan Besar',
        'artikel_unik' => 'Kami paham bahwa perusahaan menghargai profesionalisme dan ketepatan waktu. Ketika ada acara HUT, <strong>standing flowers</strong> kami harus tiba tepat sebelum acara dimulai – dan kami selalu deliver! Desain formal yang elegan, branding perusahaan yang bisa dikustomisasi, hingga instalasi yang rapi. Dari pabrik tekstil, manufaktur elektronik, hingga perusahaan logistik – ratusan perusahaan di Cibungbulang telah menjadi klien rutin kami.'
    ],
    [
        'slug' => 'gunung-sindur',
        'nama' => 'Gunung Sindur',
        'artikel_judul' => 'Melayani Setiap Momen Penting Warga dengan Bunga Segar',
        'artikel_intro' => 'Sebagai kawasan padat penduduk, <strong>Gunung Sindur</strong> memiliki dinamika kehidupan yang tinggi. Setiap hari ada kelahiran yang dirayakan, pernikahan yang digelar, hingga kepergian yang dikenang. <strong>Toko bunga Gunung Sindur</strong> kami hadir 24 jam untuk melayani setiap kebutuhan bunga warga – dari <em>buket ucapan selamat</em> hingga <em>krans duka cita</em>.',
        'artikel_subjudul' => 'Toko Bunga 24 Jam yang Selalu Siap Melayani',
        'artikel_unik' => 'Kami paham bahwa kebutuhan akan bunga bisa datang kapan saja. Ketika ada kabar duka di malam hari, kami siap mengantar <strong>papan bunga duka cita</strong> dengan cepat dan penuh empati. Saat ada teman yang melahirkan, <em>buket bunga ucapan</em> kami bisa diantar di hari yang sama. Dengan armada pengiriman yang luas dan stok bunga segar setiap hari, kami adalah solusi tepat untuk semua kebutuhan bunga di Gunung Sindur.'
    ],
    [
        'slug' => 'kemang',
        'nama' => 'Kemang',
        'artikel_judul' => 'Dekorasi Bunga Premium untuk Pernikahan Mewah',
        'artikel_intro' => 'Villa-villa eksklusif dengan view pegunungan, venue pernikahan bertaraf internasional, dan konsep wedding yang glamor – begitulah <strong>Kemang</strong>. Di sini, pernikahan bukan sekadar acara, melainkan sebuah karya seni. <strong>Toko bunga Kemang</strong> kami dipercaya oleh wedding planner ternama untuk menghadirkan <strong>dekorasi bunga premium</strong> yang memukau.',
        'artikel_subjudul' => 'Pengalaman Melayani Pernikahan Kelas Atas',
        'artikel_unik' => 'Dari royal wedding dengan ribuan tangkai mawar import, hingga garden party dengan konsep rustic yang elegan – kami telah menangani semuanya. Setiap detail diperhatikan: pemilihan bunga segar berkualitas tinggi, kombinasi warna yang harmonis, hingga instalasi yang sempurna. <em>Standing flowers</em> menyambut tamu dengan megah, <strong>hand bouquet pengantin</strong> dirancang eksklusif, dan dekorasi altar yang membuat semua orang terpukau.'
    ],
    [
        'slug' => 'leuwiliang',
        'nama' => 'Leuwiliang',
        'artikel_judul' => 'Dekorasi Bunga untuk Event Corporate dan Gathering Besar',
        'artikel_intro' => 'Alam yang asri, udara segar pegunungan, dan berbagai venue outbound menjadikan <strong>Leuwiliang</strong> destinasi favorit untuk corporate gathering dan team building. <strong>Toko bunga Leuwiliang</strong> kami berpengalaman menangani dekorasi bunga untuk event skala besar – dari 50 hingga 500 orang.',
        'artikel_subjudul' => 'Spesialis Dekorasi Event Perusahaan',
        'artikel_unik' => 'Ketika perusahaan mengadakan annual gathering, <strong>standing flowers</strong> kami menghiasi stage dan entrance dengan profesional. Saat ada acara family day, rangkaian bunga segar mempercantik setiap booth dan photo spot. Dari perusahaan multinasional hingga startup lokal, kami telah dipercaya menangani ratusan corporate event di berbagai venue Leuwiliang.'
    ],
    [
        'slug' => 'pamijahan',
        'nama' => 'Pamijahan',
        'artikel_judul' => 'Karangan Bunga untuk Acara Keagamaan dan Pesantren',
        'artikel_intro' => 'Sebagai kawasan wisata religi yang terkenal, <strong>Pamijahan</strong> sering mengadakan acara-acara keagamaan berskala besar: pengajian akbar, peringatan hari besar Islam, hingga acara santri di berbagai pesantren. <strong>Toko bunga Pamijahan</strong> kami memahami kebutuhan khusus untuk dekorasi yang sesuai dengan nilai-nilai religius.',
        'artikel_subjudul' => 'Dekorasi Bunga yang Sesuai dengan Nilai Islami',
        'artikel_unik' => 'Kami tahu bahwa <strong>karangan bunga untuk acara keagamaan</strong> perlu dirancang dengan penuh kehormatan dan kesederhanaan. Warna-warna yang lembut, rangkaian yang elegan tanpa berlebihan, dan pemilihan bunga yang tepat – semua dipertimbangkan dengan seksama. Dari pengajian ustadz terkenal, haul tokoh agama, hingga wisuda santri, kami telah dipercaya oleh berbagai pesantren dan panitia acara di Pamijahan.'
    ],
    [
        'slug' => 'parung',
        'nama' => 'Parung',
        'artikel_judul' => 'Ratusan Usaha Baru Percaya Papan Bunga Kami',
        'artikel_intro' => '<strong>Parung</strong> adalah pusat perdagangan yang tak pernah sepi. Setiap minggu ada toko baru, showroom, café, atau kantor yang diresmikan. Dan di setiap grand opening, <strong>papan bunga ucapan selamat</strong> dari kami selalu menjadi pilihan para pengusaha. <strong>Toko bunga Parung</strong> kami spesialis dalam papan bunga grand opening dengan desain modern dan profesional.',
        'artikel_subjudul' => 'Grand Opening Sukses Dimulai dari Papan Bunga yang Tepat',
        'artikel_unik' => 'Pengusaha di Parung tahu bahwa kesan pertama sangat penting. <em>Papan bunga grand opening</em> yang megah dan eye-catching bisa menarik perhatian pelanggan dan membuat acara pembukaan lebih berkesan. Kami melayani pemesanan mendadak dengan sistem express – pesan pagi, antar siang. Dari minimarket hingga dealer mobil, ratusan usaha telah mempercayakan papan bunga mereka kepada kami.'
    ],
    [
        'slug' => 'rumpin',
        'nama' => 'Rumpin',
        'artikel_judul' => 'Bunga Syukuran untuk Perayaan Panen Raya',
        'artikel_intro' => 'Hamparan sawah yang luas, kebun-kebun produktif, dan tradisi panen raya yang meriah – <strong>Rumpin</strong> adalah daerah agraris dengan budaya syukuran yang kuat. <strong>Toko bunga Rumpin</strong> kami bangga menjadi bagian dari perayaan hasil panen dengan menyediakan <strong>karangan bunga syukuran</strong> yang indah dan bermakna.',
        'artikel_subjudul' => 'Merayakan Keberkahan Hasil Bumi Bersama',
        'artikel_unik' => 'Ketika petani merayakan hasil panen yang melimpah, <em>karangan bunga</em> menjadi simbol rasa syukur kepada Sang Pencipta. Kami menyediakan rangkaian bunga khusus untuk acara ruwatan sawah, syukuran panen, hingga festival pertanian. Desain yang natural dengan bunga-bunga segar dari kebun lokal, mencerminkan kesederhanaan dan keindahan alam Rumpin.'
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
        'slug' => 'ciampea',
        'nama' => 'Ciampea',
        'artikel_judul' => 'Bunga Wisuda & Buket Ucapan untuk Mahasiswa IPB',
        'artikel_intro' => 'Kampus IPB yang megah, ribuan mahasiswa berprestasi, dan musim wisuda yang selalu meriah – itulah <strong>Ciampea</strong>. <strong>Toko bunga Ciampea</strong> kami adalah pilihan utama mahasiswa dan keluarga untuk <strong>buket bunga wisuda</strong>, <em>hand bouquet ucapan</em>, dan <em>papan bunga congratulation</em> dengan harga terjangkau khusus untuk pelajar.',
        'artikel_subjudul' => 'Paket Spesial Mahasiswa dengan Harga Terjangkau',
        'artikel_unik' => 'Kami tahu budget mahasiswa terbatas, tapi keinginan untuk merayakan kelulusan tetap besar. Karena itu, kami menyediakan <strong>paket bunga wisuda mulai dari 75 ribu</strong> dengan kualitas yang tetap cantik dan segar! Setiap musim wisuda, ratusan keluarga memesan buket dari kami. Desain modern yang instagramable, bisa custom dengan foto dan nama, plus gratis kartu ucapan. Pengiriman langsung ke Kampus IPB atau Graha Widya Wisuda.'
    ],
    [
        'slug' => 'ciampea',
        'nama' => 'Ciampea',
        'artikel_judul' => 'Bunga Wisuda & Buket Ucapan untuk Mahasiswa IPB',
        'artikel_intro' => 'Kampus IPB yang megah, ribuan mahasiswa berprestasi, dan musim wisuda yang selalu meriah – itulah <strong>Ciampea</strong>. <strong>Toko bunga Ciampea</strong> kami adalah pilihan utama mahasiswa dan keluarga untuk <strong>buket bunga wisuda</strong>, <em>hand bouquet ucapan</em>, dan <em>papan bunga congratulation</em> dengan harga terjangkau khusus untuk pelajar.',
        'artikel_subjudul' => 'Paket Spesial Mahasiswa dengan Harga Terjangkau',
        'artikel_unik' => 'Kami tahu budget mahasiswa terbatas, tapi keinginan untuk merayakan kelulusan tetap besar. Karena itu, kami menyediakan <strong>paket bunga wisuda mulai dari 75 ribu</strong> dengan kualitas yang tetap cantik dan segar! Setiap musim wisuda, ratusan keluarga memesan buket dari kami. Desain modern yang instagramable, bisa custom dengan foto dan nama, plus gratis kartu ucapan. Pengiriman langsung ke Kampus IPB atau Graha Widya Wisuda.'
    ],
    [
        'slug' => 'dramaga',
        'nama' => 'Dramaga',
        'artikel_judul' => 'Spesialis Bunga Wisuda untuk Kampus IPB',
        'artikel_intro' => 'Sebagai lokasi Kampus IPB Dramaga, kawasan ini selalu ramai dengan mahasiswa dan kegiatan akademik. <strong>Toko bunga Dramaga</strong> kami menjadi pilihan favorit untuk <strong>bunga wisuda IPB</strong>, buket ucapan, dan papan bunga kelulusan dengan harga khusus mahasiswa.',
        'artikel_subjudul' => 'Paket Bunga Wisuda Mulai 50 Ribu',
        'artikel_unik' => 'Kami paham budget mahasiswa sangat terbatas. Karena itu, kami menawarkan <strong>paket bunga wisuda super hemat mulai dari 50 ribu rupiah</strong>! Meskipun harga terjangkau, kualitas tetap premium dengan bunga segar pilihan. Bisa custom dengan nama, foto, dan kartu ucapan gratis. Pengiriman langsung ke gedung wisuda atau kampus IPB. Sudah ribuan wisudawan IPB merayakan kesuksesan mereka dengan bunga dari kami!'
    ]
];

// Template index.php yang disesuaikan dengan design Company Florist
function getTemplate($nama_lokasi, $slug_lokasi, $artikel_judul, $artikel_intro, $artikel_subjudul, $artikel_unik) {
    return <<<'HTML'
<?php
session_start();

// Konfigurasi lokasi
$nama_lokasi = '{{NAMA_LOKASI}}';
$slug_lokasi = '{{SLUG_LOKASI}}';

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
                    <h2 class="section-title">{{ARTIKEL_JUDUL}}</h2>
                    <p class="lead">{{ARTIKEL_INTRO}}</p>
                    
                    <h3 class="mt-4 mb-3">{{ARTIKEL_SUBJUDUL}}</h3>
                    <p>{{ARTIKEL_UNIK}}</p>
                    
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
HTML;
}

// Proses generate
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Generator Lokasi - Company Florist</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head><body class='bg-light'>";
echo "<div class='container py-5'>";
echo "<h1 class='text-center mb-4'><i class='fas fa-cog'></i> Generate Folder & File Lokasi</h1>";
echo "<div class='alert alert-info'>Script ini akan membuat folder dan file index.php untuk setiap lokasi dengan design yang sama dengan halaman utama.</div>";
echo "<hr>";

$success = 0;
$failed = 0;
$logs = [];

foreach ($lokasi_list as $lok) {
    $folder = $lok['slug'];
    $nama = $lok['nama'];
    
    $logs[] = "<div class='card mb-3'>";
    $logs[] = "<div class='card-header bg-primary text-white'><strong>Proses: {$nama}</strong></div>";
    $logs[] = "<div class='card-body'>";
    
    // Buat folder jika belum ada
    if (!file_exists($folder)) {
        if (mkdir($folder, 0755, true)) {
            $logs[] = "<p class='text-success'><i class='fas fa-check-circle'></i> Folder <code>{$folder}</code> berhasil dibuat</p>";
        } else {
            $logs[] = "<p class='text-danger'><i class='fas fa-times-circle'></i> Gagal membuat folder <code>{$folder}</code></p>";
            $logs[] = "</div></div>";
            $failed++;
            continue;
        }
    } else {
        $logs[] = "<p class='text-warning'><i class='fas fa-info-circle'></i> Folder <code>{$folder}</code> sudah ada</p>";
    }
    
    // Buat file index.php
    $filepath = $folder . '/index.php';
    $template = getTemplate(
        $lok['nama'], 
        $folder, 
        $lok['artikel_judul'],
        $lok['artikel_intro'],
        $lok['artikel_subjudul'],
        $lok['artikel_unik']
    );
    
    // Replace placeholders
    $content = str_replace('{{NAMA_LOKASI}}', $lok['nama'], $template);
    $content = str_replace('{{SLUG_LOKASI}}', $folder, $content);
    $content = str_replace('{{ARTIKEL_JUDUL}}', $lok['artikel_judul'], $content);
    $content = str_replace('{{ARTIKEL_INTRO}}', $lok['artikel_intro'], $content);
    $content = str_replace('{{ARTIKEL_SUBJUDUL}}', $lok['artikel_subjudul'], $content);
    $content = str_replace('{{ARTIKEL_UNIK}}', $lok['artikel_unik'], $content);
    
    if (file_put_contents($filepath, $content)) {
        $logs[] = "<p class='text-success'><i class='fas fa-check-circle'></i> File <code>{$filepath}</code> berhasil dibuat</p>";
        $success++;
    } else {
        $logs[] = "<p class='text-danger'><i class='fas fa-times-circle'></i> Gagal membuat file <code>{$filepath}</code></p>";
        $failed++;
    }
    
    $logs[] = "</div></div>";
}

// Tampilkan logs
foreach($logs as $log) {
    echo $log;
}

// Summary
echo "<div class='card border-success mt-4'>";
echo "<div class='card-header bg-success text-white'><h4 class='mb-0'>📊 Summary</h4></div>";
echo "<div class='card-body'>";
echo "<div class='row text-center'>";
echo "<div class='col-md-6'><h2 class='text-success'>{$success}</h2><p>Berhasil</p></div>";
echo "<div class='col-md-6'><h2 class='text-danger'>{$failed}</h2><p>Gagal</p></div>";
echo "</div>";
echo "</div></div>";

if ($success > 0) {
    echo "<div class='alert alert-success mt-4'>";
    echo "<h4><i class='fas fa-check-circle'></i> Selesai!</h4>";
    echo "<p>Semua file berhasil digenerate. Anda bisa mengakses halaman per lokasi:</p>";
    echo "<ul>";
    foreach ($lokasi_list as $lok) {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/' . $lok['slug'] . '/';
        echo "<li><a href='{$url}' target='_blank' class='btn btn-sm btn-outline-success mb-1'><i class='fas fa-external-link-alt'></i> {$lok['nama']}</a></li>";
    }
    echo "</ul>";
    echo "<hr>";
    echo "<p class='text-danger mb-0'><strong>⚠️ PENTING:</strong> Hapus file <code>generate_all_lokasi.php</code> setelah selesai untuk keamanan!</p>";
    echo "</div>";
}

echo "</div></body></html>";
?>