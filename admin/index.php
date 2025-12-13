<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
include '../config.php';

$total_products = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$total_locations = $conn->query("SELECT COUNT(*) as total FROM locations")->fetch_assoc()['total'];
$total_faqs = $conn->query("SELECT COUNT(*) as total FROM faqs")->fetch_assoc()['total'];

$recent_products = $conn->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Company Florist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #064e3b;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
        }
        .sidebar a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #10b981;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .stat-card {
            border-left: 4px solid #10b981;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar text-white">
        <div class="p-3">
            <h4><i class="fas fa-flower"></i> Admin Panel</h4>
            <hr>
        </div>
        <a href="index.php" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="products.php"><i class="fas fa-box"></i> Kelola Produk</a>
        <a href="locations.php"><i class="fas fa-map-marker-alt"></i> Kelola Lokasi</a>
        <a href="faqs.php"><i class="fas fa-question-circle"></i> Kelola FAQ</a>
        <hr class="text-white mx-3">
        <a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Dashboard</h2>
            <div>
                <span class="text-muted">Selamat datang, </span>
                <strong class="text-success"><?= $_SESSION['admin_username'] ?></strong>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="text-success mb-0"><?= $total_products ?></h3>
                                <p class="text-muted mb-0">Total Produk</p>
                            </div>
                            <div>
                                <i class="fas fa-box fa-3x text-success opacity-25"></i>
                            </div>
                        </div>
                        <a href="products.php" class="btn btn-sm btn-outline-success mt-3">Kelola Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="text-success mb-0"><?= $total_locations ?></h3>
                                <p class="text-muted mb-0">Total Lokasi</p>
                            </div>
                            <div>
                                <i class="fas fa-map-marker-alt fa-3x text-success opacity-25"></i>
                            </div>
                        </div>
                        <a href="locations.php" class="btn btn-sm btn-outline-success mt-3">Kelola Lokasi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="text-success mb-0"><?= $total_faqs ?></h3>
                                <p class="text-muted mb-0">Total FAQ</p>
                            </div>
                            <div>
                                <i class="fas fa-question-circle fa-3x text-success opacity-25"></i>
                            </div>
                        </div>
                        <a href="faqs.php" class="btn btn-sm btn-outline-success mt-3">Kelola FAQ</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Produk Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($product = $recent_products->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <img src="../uploads/<?= $product['image'] ?>" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                </td>
                                <td><?= $product['name'] ?></td>
                                <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                <td><?= date('d M Y', strtotime($product['created_at'])) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Info -->
        <div class="card mt-4">
            <div class="card-body">
                <h5>Informasi Sistem</h5>
                <ul class="mb-0">
                    <li>Website: <a href="../index.php" target="_blank">Lihat Website</a></li>
                    <li>WhatsApp: <strong>0813-2299-1131</strong></li>
                    <li>Folder Upload: <code>uploads/</code></li>
                    <li>Database: <code>company_florist</code></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>