<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
include '../config.php';

$success = $error = '';

// Handle Upload
if(isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $target_dir = "../uploads/";
    if(!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $image_name = time() . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Validasi file
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $name, $description, $price, $image_name);
            
            if($stmt->execute()) {
                $success = "Produk berhasil ditambahkan!";
            } else {
                $error = "Gagal menambahkan produk!";
            }
        } else {
            $error = "Gagal upload gambar!";
        }
    } else {
        $error = "File bukan gambar!";
    }
}

// Handle Edit
if(isset($_POST['edit_product'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // Cek apakah ada gambar baru
    if($_FILES["image"]["name"]) {
        $target_dir = "../uploads/";
        $image_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            // Hapus gambar lama
            $old_product = $conn->query("SELECT image FROM products WHERE id = $id")->fetch_assoc();
            if($old_product && file_exists("../uploads/" . $old_product['image'])) {
                unlink("../uploads/" . $old_product['image']);
            }
            
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
                $stmt->bind_param("ssdsi", $name, $description, $price, $image_name, $id);
            } else {
                $error = "Gagal upload gambar baru!";
            }
        } else {
            $error = "File bukan gambar!";
        }
    } else {
        // Update tanpa ganti gambar
        $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=? WHERE id=?");
        $stmt->bind_param("ssdi", $name, $description, $price, $id);
    }
    
    if(!$error && $stmt->execute()) {
        $success = "Produk berhasil diupdate!";
    } elseif(!$error) {
        $error = "Gagal mengupdate produk!";
    }
}

// Handle Delete
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $product = $conn->query("SELECT image FROM products WHERE id = $id")->fetch_assoc();
    
    if($product && file_exists("../uploads/" . $product['image'])) {
        unlink("../uploads/" . $product['image']);
    }
    
    $conn->query("DELETE FROM products WHERE id = $id");
    $success = "Produk berhasil dihapus!";
}

$products = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin</title>
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
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .modal-product-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
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
        <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="products.php" class="active"><i class="fas fa-box"></i> Kelola Produk</a>
        <a href="locations.php"><i class="fas fa-map-marker-alt"></i> Kelola Lokasi</a>
        <a href="faqs.php"><i class="fas fa-question-circle"></i> Kelola FAQ</a>
        <hr class="text-white mx-3">
        <a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2 class="mb-4">Kelola Produk</h2>

        <?php if($success): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if($error): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Produk -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Bunga Mawar Merah" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price" class="form-control" placeholder="150000" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi lengkap produk..." required></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="add_product" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan Produk
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Semua Produk</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="80">Gambar</th>
                                <th>Nama Produk</th>
                                <th width="150">Harga</th>
                                <th>Deskripsi</th>
                                <th width="150">Tanggal</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($products->num_rows > 0): ?>
                                <?php while($product = $products->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <img src="../uploads/<?= $product['image'] ?>" class="product-img" alt="<?= $product['name'] ?>">
                                    </td>
                                    <td><strong><?= $product['name'] ?></strong></td>
                                    <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                    <td><?= substr($product['description'], 0, 60) ?>...</td>
                                    <td><?= date('d M Y', strtotime($product['created_at'])) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $product['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="?delete=<?= $product['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Edit untuk setiap produk -->
                                <div class="modal fade" id="editModal<?= $product['id'] ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Harga <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rp</span>
                                                                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                                            <textarea name="description" class="form-control" rows="3" required><?= htmlspecialchars($product['description']) ?></textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Gambar Saat Ini:</label><br>
                                                            <img src="../uploads/<?= $product['image'] ?>" class="modal-product-img mb-2" alt="Current">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Ganti Gambar (Opsional)</label>
                                                            <input type="file" name="image" class="form-control" accept="image/*">
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        <i class="fas fa-times"></i> Batal
                                                    </button>
                                                    <button type="submit" name="edit_product" class="btn btn-warning">
                                                        <i class="fas fa-save"></i> Update Produk
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->

                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada produk</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>