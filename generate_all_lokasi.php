<?php
/**
 * Script Generator Otomatis untuk Membuat Folder & File per Lokasi
 * Untuk Semua Kelurahan di Kota Bogor
 * 
 * CARA PAKAI:
 * 1. Upload file ini ke root website Anda
 * 2. Akses via browser: http://yoursite.com/generate_bogor_all.php
 * 3. Script akan otomatis membuat folder dan file index.php untuk 72 kelurahan
 * 4. Hapus file ini setelah selesai generate
 */

// Data lengkap 72 kelurahan di Kota Bogor dengan konten unik
$lokasi_list = [
    // BOGOR BARAT
    ['slug' => 'balungbangjaya', 'nama' => 'Balungbangjaya', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan perumahan modern yang berkembang pesat', 'event_utama' => 'pernikahan dan syukuran keluarga'],
    // ['slug' => 'bubulak', 'nama' => 'Bubulak', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'dekat dengan stasiun Bogor dan area komersial', 'event_utama' => 'grand opening toko dan acara korporat'],
    // ['slug' => 'cilendek-barat', 'nama' => 'Cilendek Barat', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan padat penduduk dengan aktivitas warga yang tinggi', 'event_utama' => 'hajatan warga dan acara RT/RW'],
    // ['slug' => 'cilendek-timur', 'nama' => 'Cilendek Timur', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'area strategis dengan akses mudah ke pusat kota', 'event_utama' => 'pernikahan dan ulang tahun'],
    // ['slug' => 'curug', 'nama' => 'Curug', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan hijau dengan udara sejuk', 'event_utama' => 'acara outdoor dan family gathering'],
    // ['slug' => 'curugmekar', 'nama' => 'Curugmekar', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'perkampungan tradisional yang masih kental dengan budaya Sunda', 'event_utama' => 'acara adat dan syukuran'],
    // ['slug' => 'gunungbatu', 'nama' => 'Gunungbatu', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'lokasi strategis dekat dengan fasilitas umum', 'event_utama' => 'berbagai acara warga dan pernikahan'],
    // ['slug' => 'loji', 'nama' => 'Loji', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'area heritage dengan bangunan bersejarah', 'event_utama' => 'acara formal dan resepsi elegan'],
    // ['slug' => 'margajaya', 'nama' => 'Margajaya', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan berkembang dengan infrastruktur modern', 'event_utama' => 'grand opening dan launching produk'],
    // ['slug' => 'menteng', 'nama' => 'Menteng', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'pusat kegiatan warga dengan komunitas yang solid', 'event_utama' => 'acara komunitas dan hajatan'],
    // ['slug' => 'pasirjaya', 'nama' => 'Pasirjaya', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan pendidikan dengan banyak sekolah', 'event_utama' => 'wisuda dan acara sekolah'],
    // ['slug' => 'pasirkuda', 'nama' => 'Pasirkuda', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'area residensial tenang yang nyaman', 'event_utama' => 'pernikahan intimate dan arisan'],
    // ['slug' => 'pasirmulya', 'nama' => 'Pasirmulya', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'lokasi strategis dengan akses transportasi mudah', 'event_utama' => 'berbagai acara keluarga'],
    // ['slug' => 'semplak', 'nama' => 'Semplak', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'kawasan berkembang dengan potensi bisnis tinggi', 'event_utama' => 'pembukaan usaha dan kantor baru'],
    // ['slug' => 'sindangbarang', 'nama' => 'Sindangbarang', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'area dengan suasana pedesaan yang asri', 'event_utama' => 'syukuran dan acara tradisional'],
    // ['slug' => 'situgede', 'nama' => 'Situgede', 'kecamatan' => 'Bogor Barat', 'keunikan' => 'dekat dengan danau dan area rekreasi', 'event_utama' => 'acara outdoor dan pre-wedding'],

    // // BOGOR SELATAN
    // ['slug' => 'batutulis', 'nama' => 'Batutulis', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'kawasan heritage dengan situs bersejarah', 'event_utama' => 'acara budaya dan pameran seni'],
    // ['slug' => 'bojongkerta', 'nama' => 'Bojongkerta', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area perumahan elite dengan lingkungan asri', 'event_utama' => 'pernikahan mewah dan resepsi eksklusif'],
    // ['slug' => 'bondongan', 'nama' => 'Bondongan', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'dekat dengan pusat perbelanjaan modern', 'event_utama' => 'grand opening dan promosi'],
    // ['slug' => 'cikaret', 'nama' => 'Cikaret', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'kawasan bisnis yang dinamis', 'event_utama' => 'acara korporat dan seminar'],
    // ['slug' => 'cipaku', 'nama' => 'Cipaku', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area residensial dengan komunitas ramah', 'event_utama' => 'pernikahan dan acara keluarga'],
    // ['slug' => 'empang', 'nama' => 'Empang', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'lokasi strategis di jantung Bogor Selatan', 'event_utama' => 'berbagai acara sosial'],
    // ['slug' => 'genteng', 'nama' => 'Genteng', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'kawasan padat dengan aktivitas tinggi', 'event_utama' => 'hajatan dan acara warga'],
    // ['slug' => 'harjasari', 'nama' => 'Harjasari', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area berkembang dengan infrastruktur memadai', 'event_utama' => 'pernikahan dan syukuran'],
    // ['slug' => 'kertamaya', 'nama' => 'Kertamaya', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'dekat dengan fasilitas pendidikan', 'event_utama' => 'wisuda dan acara sekolah'],
    // ['slug' => 'lawanggintung', 'nama' => 'Lawanggintung', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'kawasan hijau dengan udara segar', 'event_utama' => 'gathering dan outbound'],
    // ['slug' => 'muarasari', 'nama' => 'Muarasari', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area tenang cocok untuk acara privat', 'event_utama' => 'pernikahan intimate'],
    // ['slug' => 'mulyaharja', 'nama' => 'Mulyaharja', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'lokasi strategis dengan akses mudah', 'event_utama' => 'berbagai acara keluarga'],
    // ['slug' => 'pakuan', 'nama' => 'Pakuan', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'dekat dengan kawasan pemerintahan', 'event_utama' => 'acara resmi dan formal'],
    // ['slug' => 'pamoyanan', 'nama' => 'Pamoyanan', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area perumahan berkembang', 'event_utama' => 'pernikahan dan ulang tahun'],
    // ['slug' => 'rancamaya', 'nama' => 'Rancamaya', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'kawasan elit dengan fasilitas lengkap', 'event_utama' => 'pernikahan mewah dan gala dinner'],
    // ['slug' => 'ranggamekar', 'nama' => 'Ranggamekar', 'kecamatan' => 'Bogor Selatan', 'keunikan' => 'area hijau dengan pemandangan indah', 'event_utama' => 'garden party dan outdoor wedding'],

    // // BOGOR TENGAH
    // ['slug' => 'babakan', 'nama' => 'Babakan', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'pusat kota dengan akses mudah ke semua tempat', 'event_utama' => 'berbagai acara bisnis dan sosial'],
    // ['slug' => 'babakanpasar', 'nama' => 'Babakanpasar', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'kawasan perdagangan yang ramai', 'event_utama' => 'grand opening dan promosi'],
    // ['slug' => 'cibogor', 'nama' => 'Cibogor', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'lokasi heritage di tengah kota', 'event_utama' => 'acara formal dan resepsi'],
    // ['slug' => 'ciwaringin', 'nama' => 'Ciwaringin', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'area strategis dekat dengan Kebun Raya', 'event_utama' => 'pernikahan elegan'],
    // ['slug' => 'gudang', 'nama' => 'Gudang', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'kawasan komersial yang berkembang', 'event_utama' => 'launching dan exhibition'],
    // ['slug' => 'kebonkelapa', 'nama' => 'Kebonkelapa', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'area residensial di pusat kota', 'event_utama' => 'pernikahan dan hajatan'],
    // ['slug' => 'pabaton', 'nama' => 'Pabaton', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'dekat dengan Istana Bogor', 'event_utama' => 'acara resmi dan formal'],
    // ['slug' => 'paledang', 'nama' => 'Paledang', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'kawasan padat dengan banyak kantor', 'event_utama' => 'acara korporat'],
    // ['slug' => 'panaragan', 'nama' => 'Panaragan', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'lokasi strategis di jantung kota', 'event_utama' => 'berbagai acara profesional'],
    // ['slug' => 'sempur', 'nama' => 'Sempur', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'area tenang meski di pusat kota', 'event_utama' => 'pernikahan dan acara keluarga'],
    // ['slug' => 'tegallega', 'nama' => 'Tegallega', 'kecamatan' => 'Bogor Tengah', 'keunikan' => 'kawasan berkembang dengan fasilitas lengkap', 'event_utama' => 'berbagai acara sosial'],

    // // BOGOR TIMUR
    // ['slug' => 'baranangsiang', 'nama' => 'Baranangsiang', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'kawasan padat penduduk yang aktif', 'event_utama' => 'hajatan warga dan pernikahan'],
    // ['slug' => 'katulampa', 'nama' => 'Katulampa', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'dekat dengan bendungan dan area wisata', 'event_utama' => 'acara outdoor dan gathering'],
    // ['slug' => 'sindangrasa', 'nama' => 'Sindangrasa', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'area residensial yang berkembang', 'event_utama' => 'pernikahan dan syukuran'],
    // ['slug' => 'sindangsari', 'nama' => 'Sindangsari', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'kawasan hijau dengan suasana asri', 'event_utama' => 'garden party dan pre-wedding'],
    // ['slug' => 'sukasari', 'nama' => 'Sukasari', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'lokasi strategis dengan akses mudah', 'event_utama' => 'berbagai acara keluarga'],
    // ['slug' => 'tajur', 'nama' => 'Tajur', 'kecamatan' => 'Bogor Timur', 'keunikan' => 'kawasan berkembang pesat', 'event_utama' => 'pernikahan dan grand opening'],

    // // BOGOR UTARA
    // ['slug' => 'bantarjati', 'nama' => 'Bantarjati', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'area perumahan modern yang nyaman', 'event_utama' => 'pernikahan dan ulang tahun'],
    // ['slug' => 'cibuluh', 'nama' => 'Cibuluh', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'kawasan sejuk dengan udara segar', 'event_utama' => 'gathering dan outbound'],
    // ['slug' => 'ciluar', 'nama' => 'Ciluar', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'dekat dengan area wisata dan villa', 'event_utama' => 'pernikahan outdoor dan retreat'],
    // ['slug' => 'cimahpar', 'nama' => 'Cimahpar', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'lokasi strategis di Bogor Utara', 'event_utama' => 'berbagai acara sosial'],
    // ['slug' => 'ciparigi', 'nama' => 'Ciparigi', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'kawasan berkembang dengan infrastruktur baik', 'event_utama' => 'pernikahan dan syukuran'],
    // ['slug' => 'kedunghalang', 'nama' => 'Kedunghalang', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'area padat dengan komunitas solid', 'event_utama' => 'hajatan warga dan acara RT/RW'],
    // ['slug' => 'tanahbaru', 'nama' => 'Tanahbaru', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'kawasan baru yang berkembang pesat', 'event_utama' => 'pernikahan dan grand opening'],
    // ['slug' => 'tegalgundil', 'nama' => 'Tegalgundil', 'kecamatan' => 'Bogor Utara', 'keunikan' => 'lokasi strategis dengan akses mudah', 'event_utama' => 'berbagai acara keluarga'],

    // // TANAH SAREAL
    // ['slug' => 'cibadak', 'nama' => 'Cibadak', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'kawasan pendidikan dekat IPB', 'event_utama' => 'wisuda dan acara mahasiswa'],
    // ['slug' => 'kayumanis', 'nama' => 'Kayumanis', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'area strategis dengan fasilitas lengkap', 'event_utama' => 'pernikahan dan seminar'],
    // ['slug' => 'kebonpedes', 'nama' => 'Kebonpedes', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'dekat dengan kampus IPB', 'event_utama' => 'acara akademik dan wisuda'],
    // ['slug' => 'kedungbadak', 'nama' => 'Kedungbadak', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'kawasan padat dengan banyak kost mahasiswa', 'event_utama' => 'acara mahasiswa dan pernikahan'],
    // ['slug' => 'kedungjaya', 'nama' => 'Kedungjaya', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'area berkembang dengan potensi tinggi', 'event_utama' => 'berbagai acara sosial'],
    // ['slug' => 'kedungwaringin', 'nama' => 'Kedungwaringin', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'lokasi strategis dekat pusat kota', 'event_utama' => 'pernikahan dan hajatan'],
    // ['slug' => 'kencana', 'nama' => 'Kencana', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'kawasan perumahan yang tenang', 'event_utama' => 'pernikahan dan syukuran'],
    // ['slug' => 'mekarwangi', 'nama' => 'Mekarwangi', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'area hijau dengan udara sejuk', 'event_utama' => 'garden party dan gathering'],
    // ['slug' => 'sukadamai', 'nama' => 'Sukadamai', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'kawasan damai dengan suasana asri', 'event_utama' => 'pernikahan intimate'],
    // ['slug' => 'sukaresmi', 'nama' => 'Sukaresmi', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'lokasi strategis dengan akses mudah', 'event_utama' => 'berbagai acara keluarga'],
    // ['slug' => 'tanahsareal', 'nama' => 'Tanahsareal', 'kecamatan' => 'Tanah Sareal', 'keunikan' => 'pusat kecamatan dengan fasilitas lengkap', 'event_utama' => 'acara korporat dan pernikahan']
];

// Template index.php yang modern dan responsif
function getTemplate($nama_lokasi, $slug_lokasi, $kecamatan, $keunikan, $event_utama) {
    $artikel_intro = "Selamat datang di <strong>$nama_lokasi</strong>, $keunikan di Kecamatan $kecamatan, Kota Bogor. Sebagai <strong>toko bunga terpercaya di $nama_lokasi</strong>, kami spesialis melayani <em>$event_utama</em> dengan rangkaian bunga segar berkualitas premium. Dari <strong>papan bunga happy wedding</strong> hingga <em>standing flowers</em> untuk berbagai acara, kami siap menghadirkan bunga terbaik untuk momen spesial Anda.";
    
    $artikel_unik = "Warga $nama_lokasi tahu bahwa setiap acara penting membutuhkan sentuhan bunga yang indah. Ketika ada $event_utama, <strong>karangan bunga dari kami</strong> selalu menjadi pilihan utama. Kami memahami kebutuhan masyarakat $nama_lokasi – dari budget yang pas hingga pengiriman yang tepat waktu. Dengan pengalaman melayani ratusan pelanggan di kawasan $kecamatan, kami bangga menjadi bagian dari setiap kebahagiaan Anda. Pemesanan mudah via WhatsApp, pengiriman cepat ke seluruh area $nama_lokasi dan sekitarnya.";
    
    return <<<HTML
<?php
session_start();

// Konfigurasi lokasi
\$nama_lokasi = '$nama_lokasi';
\$slug_lokasi = '$slug_lokasi';
\$kecamatan = '$kecamatan';

// Base URL untuk navigation
\$base_url = dirname(\$_SERVER['PHP_SELF']);
if(\$base_url == '/') \$base_url = '';
\$base_url = rtrim(\$base_url, '/');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bunga <?= \$nama_lokasi ?> - Papan Bunga Happy Wedding & Standing Flowers</title>
    <meta name="description" content="Toko Bunga <?= \$nama_lokasi ?> Kecamatan <?= \$kecamatan ?> Bogor. Melayani papan bunga happy wedding, standing flowers, buket wisuda, karangan duka cita dengan harga terjangkau. Buka 24 jam, pengiriman cepat.">
    <meta name="keywords" content="toko bunga <?= \$nama_lokasi ?>, bunga <?= \$kecamatan ?>, papan bunga happy wedding <?= \$nama_lokasi ?>, standing flowers <?= \$nama_lokasi ?>, karangan bunga bogor">
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
        
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary) !important;
        }
        
        .nav-link {
            color: var(--dark) !important;
            font-weight: 500;
            margin: 0 10px;
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
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 30px;
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
        }
        
        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: var(--secondary);
        }
        
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
        
        .product-icon {
            font-size: 4rem;
            margin: 30px 0 20px;
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
        }
        
        .btn-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 120, 156, 0.4);
            color: white;
        }
        
        footer {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
            color: white;
            padding: 50px 0 30px;
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
        
        footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }
        
        footer a:hover {
            color: white;
        }
        
        .bg-light {
            background: var(--light) !important;
        }
        
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
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= \$base_url ?>/../">
                <i class="fas fa-spa"></i> Company Florist - <?= \$nama_lokasi ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= \$base_url ?>/../#lokasi">Lokasi Lain</a></li>
                </ul>
                <a href="https://wa.me/6281322991131?text=Halo, saya ingin pesan bunga untuk <?= \$nama_lokasi ?>" class="btn btn-whatsapp ms-3">
                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1>Toko Bunga <?= \$nama_lokasi ?>, <?= \$kecamatan ?> - Kota Bogor</h1>
                    <p class="lead">Melayani Papan Bunga Happy Wedding, Standing Flowers, Buket Wisuda & Karangan Duka Cita dengan Pengiriman Cepat ke Seluruh <?= \$nama_lokasi ?></p>
                    <a href="https://wa.me/6281322991131?text=Halo, saya ingin pesan bunga untuk <?= \$nama_lokasi ?>" class="btn btn-hero">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-seedling"></i> Layanan Kami di <?= \$nama_lokasi ?></h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <i class="fas fa-gift fa-3x text-primary mb-3"></i>
                        <h4>Papan Bunga Premium</h4>
                        <p>Papan bunga happy wedding, congratulation, duka cita dengan desain elegan untuk setiap acara di <?= \$nama_lokasi ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <i class="fas fa-truck-fast fa-3x text-primary mb-3"></i>
                        <h4>Pengiriman Express</h4>
                        <p>Same day delivery ke seluruh <?= \$nama_lokasi ?> dan <?= \$kecamatan ?> dengan jaminan tepat waktu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-4 h-100">
                        <i class="fas fa-palette fa-3x text-primary mb-3"></i>
                        <h4>Custom Design</h4>
                        <p>Buat rangkaian bunga sesuai keinginan dengan konsultasi gratis via WhatsApp</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="bg-light">
        <div class="container">
            <h2 class="text-center section-title"><i class="fas fa-images"></i> Galeri Produk Bunga</h2>
        <div class="row g-4">
                <?php
                \$products = [
                    ['name' => 'Karangan Bunga Papan Duka Cita', 'desc' => 'Papan bunga duka cita dengan desain penuh simpati untuk mengiringi kepergian', 'image' => 'duka-cita.webp'],
                    ['name' => 'Karangan Bunga Papan Happy Wedding', 'desc' => 'Papan bunga megah untuk pernikahan dengan desain romantis dan elegan', 'image' => 'happy-wedding.webp'],
                    ['name' => 'Karangan Bunga Papan Ucapan Selamat', 'desc' => 'Papan bunga ucapan selamat untuk grand opening, promosi jabatan, dan acara spesial', 'image' => 'ucapan-selamat.webp'],
                    ['name' => 'Papan Bunga Kertas', 'desc' => 'Papan bunga dari kertas berkualitas dengan desain modern dan tahan lama', 'image' => 'bunga-kertas.webp'],
                    ['name' => 'Bunga Standing Flowers', 'desc' => 'Standing flower elegan untuk berbagai acara formal dan grand opening', 'image' => 'standing-flowers.webp'],
                    ['name' => 'Rangkaian Bunga Meja', 'desc' => 'Bunga meja cantik untuk dekorasi acara dan ruangan kantor', 'image' => 'bunga-meja.webp'],
                    ['name' => 'Buket Bunga', 'desc' => 'Hand bouquet fresh flowers untuk wisuda, anniversary, dan hadiah spesial', 'image' => 'buket-bunga.webp'],
                    ['name' => 'Bunga Standing Flowers Premium', 'desc' => 'Standing flower premium dengan rangkaian bunga pilihan terbaik', 'image' => 'standing-premium.webp'],
                    ['name' => 'Bunga Krans Duka Cita / Wedding', 'desc' => 'Karangan bunga krans untuk duka cita atau dekorasi pernikahan', 'image' => 'bunga-krans.webp'],
                    ['name' => 'Bunga Salip', 'desc' => 'Bunga salip dengan pita ucapan untuk berbagai acara', 'image' => 'bunga-salip.webp'],
                    ['name' => 'Bunga Saku (Corsage)', 'desc' => 'Corsage cantik untuk pengantin, wisuda, dan acara formal', 'image' => 'corsage.webp'],
                    ['name' => 'Parcel Natal & Tahun Baru', 'desc' => 'Parcel hampers spesial untuk perayaan Natal dan Tahun Baru', 'image' => 'parcel-natal.webp'],
                    ['name' => 'Parcel Lebaran', 'desc' => 'Parcel lebaran dengan paket hampers premium', 'image' => 'parcel-lebaran.webp'],
                    ['name' => 'Parcel Buah', 'desc' => 'Parcel buah segar pilihan berkualitas tinggi', 'image' => 'parcel-buah.webp']
                ];
                
                foreach(\$products as \$product):
                ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card product-card">
                        <img src="<?= \$base_url ?>/../assets/images/<?= \$product['image'] ?>" class="card-img-top" alt="<?= \$product['name'] ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1rem; min-height: 48px;"><?= \$product['name'] ?></h5>
                            <p class="card-text text-muted" style="font-size: 0.875rem; min-height: 60px;"><?= \$product['desc'] ?></p>
                            <div class="mt-3">
                                <a href="https://wa.me/6281322991131?text=Halo, saya tertarik dengan <?= urlencode(\$product['name']) ?> untuk <?= \$nama_lokasi ?>" class="btn btn-order w-100">
                                    <i class="fab fa-whatsapp"></i> Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title">Toko Bunga Terpercaya di <?= \$nama_lokasi ?></h2>
                    <p class="lead">$artikel_intro</p>
                    
                    <h3 class="mt-5 mb-3">Mengapa Warga <?= \$nama_lokasi ?> Memilih Kami?</h3>
                    <p>$artikel_unik</p>
                    
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x" style="color: var(--primary)"></i></div>
                                <div>
                                    <h5>Bunga Segar Berkualitas</h5>
                                    <p class="text-muted">Bunga segar pilihan terbaik dari supplier terpercaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x" style="color: var(--primary)"></i></div>
                                <div>
                                    <h5>Pengiriman Tepat Waktu</h5>
                                    <p class="text-muted">Same day delivery untuk area <?= \$nama_lokasi ?> dan sekitarnya</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x" style="color: var(--primary)"></i></div>
                                <div>
                                    <h5>Harga Terjangkau</h5>
                                    <p class="text-muted">Harga kompetitif dengan kualitas premium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-3"><i class="fas fa-check-circle fa-2x" style="color: var(--primary)"></i></div>
                                <div>
                                    <h5>Buka 24 Jam</h5>
                                    <p class="text-muted">Layanan pemesanan tersedia kapan saja</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="position-relative">
        <div class="container text-center">
            <h5><i class="fas fa-spa"></i> Company Florist - <?= \$nama_lokasi ?></h5>
            <p class="mb-2">Toko Bunga Terpercaya di <?= \$kecamatan ?>, Kota Bogor</p>
            <p>Hubungi Kami: <a href="https://wa.me/6281322991131">0813-2299-1131</a></p>
            <p class="mt-4 mb-0">&copy; <?= date('Y') ?> Company Florist. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
HTML;
}

// Proses generate
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Generator 72 Kelurahan Kota Bogor</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>";
echo "</head><body class='bg-light'>";
echo "<div class='container py-5'>";
echo "<h1 class='text-center mb-4'><i class='fas fa-cog'></i> Generate 72 Kelurahan Kota Bogor</h1>";
echo "<div class='alert alert-info'><strong>Target:</strong> Membuat 72 folder dan file index.php untuk semua kelurahan di Kota Bogor</div>";
echo "<hr>";

$success = 0;
$failed = 0;
$logs = [];

foreach ($lokasi_list as $lok) {
    $folder = $lok['slug'];
    $nama = $lok['nama'];
    
    $logs[] = "<div class='card mb-2'>";
    $logs[] = "<div class='card-header' style='background: #d4789c; color: white'><strong>{$lok['kecamatan']}</strong> - {$nama}</div>";
    $logs[] = "<div class='card-body p-3'>";
    
    // Buat folder
    if (!file_exists($folder)) {
        if (mkdir($folder, 0755, true)) {
            $logs[] = "<p class='text-success mb-1'><i class='fas fa-check-circle'></i> Folder <code>{$folder}</code> dibuat</p>";
        } else {
            $logs[] = "<p class='text-danger mb-1'><i class='fas fa-times-circle'></i> Gagal membuat folder <code>{$folder}</code></p>";
            $logs[] = "</div></div>";
            $failed++;
            continue;
        }
    } else {
        $logs[] = "<p class='text-warning mb-1'><i class='fas fa-info-circle'></i> Folder <code>{$folder}</code> sudah ada</p>";
    }
    
    // Buat file
    $filepath = $folder . '/index.php';
    $content = getTemplate($lok['nama'], $lok['slug'], $lok['kecamatan'], $lok['keunikan'], $lok['event_utama']);
    
    if (file_put_contents($filepath, $content)) {
        $logs[] = "<p class='text-success mb-1'><i class='fas fa-check-circle'></i> File <code>{$filepath}</code> dibuat</p>";
        $success++;
    } else {
        $logs[] = "<p class='text-danger mb-1'><i class='fas fa-times-circle'></i> Gagal membuat file</p>";
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
echo "<div class='card-header' style='background: #d4789c; color: white'><h4 class='mb-0'>📊 Summary</h4></div>";
echo "<div class='card-body'>";
echo "<div class='row text-center'>";
echo "<div class='col-md-4'><h2 style='color: #d4789c'>{$success}</h2><p>Berhasil</p></div>";
echo "<div class='col-md-4'><h2 class='text-danger'>{$failed}</h2><p>Gagal</p></div>";
echo "<div class='col-md-4'><h2 class='text-info'>" . count($lokasi_list) . "</h2><p>Total</p></div>";
echo "</div>";
echo "</div></div>";

if ($success > 0) {
    echo "<div class='alert alert-success mt-4'>";
    echo "<h4><i class='fas fa-check-circle'></i> Selesai!</h4>";
    echo "<p><strong>$success dari " . count($lokasi_list) . " lokasi berhasil digenerate.</strong></p>";
    echo "<p>Akses halaman per kelurahan:</p>";
    echo "<div class='row'>";
    
    $grouped = [];
    foreach ($lokasi_list as $lok) {
        $grouped[$lok['kecamatan']][] = $lok;
    }
    
    foreach($grouped as $kec => $loks) {
        echo "<div class='col-md-6 mb-3'>";
        echo "<h5 style='color: #8b4367'><i class='fas fa-map-marked-alt'></i> $kec</h5>";
        echo "<ul class='list-unstyled'>";
        foreach($loks as $lok) {
            $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/' . $lok['slug'] . '/';
            echo "<li><a href='{$url}' target='_blank' class='btn btn-sm btn-outline-secondary mb-1' style='border-color: #d4789c; color: #8b4367'><i class='fas fa-external-link-alt'></i> {$lok['nama']}</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    
    echo "</div>";
    echo "<hr>";
    echo "<p class='text-danger mb-0'><strong>⚠️ PENTING:</strong> Hapus file ini setelah selesai untuk keamanan!</p>";
    echo "</div>";
}

echo "</div></body></html>";
?>