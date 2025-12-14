<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

// Error handling untuk debugging (hapus setelah fix)
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

include '../config.php';

$success = $error = '';

// Handle Add
if(isset($_POST['add_location'])) {
    try {
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $subdomain = trim($_POST['subdomain']);
        
        $stmt = $conn->prepare("INSERT INTO locations (name, address, subdomain) VALUES (?, ?, ?)");
        
        if($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("sss", $name, $address, $subdomain);
        
        if($stmt->execute()) {
            $success = "Lokasi berhasil ditambahkan!";
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $stmt->close();
    } catch(Exception $e) {
        $error = "Gagal menambahkan lokasi: " . $e->getMessage();
    }
}

// Handle Delete - Gunakan prepared statement
if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    try {
        $id = (int)$_GET['delete'];
        
        $stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
        
        if($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("i", $id);
        
        if($stmt->execute()) {
            if($stmt->affected_rows > 0) {
                $success = "Lokasi berhasil dihapus!";
            } else {
                $error = "Lokasi tidak ditemukan!";
            }
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $stmt->close();
        
        // Redirect untuk menghindari resubmit
        header("Location: locations.php?msg=deleted");
        exit;
        
    } catch(Exception $e) {
        $error = "Gagal menghapus lokasi: " . $e->getMessage();
    }
}

// Handle Edit
if(isset($_POST['edit_location'])) {
    try {
        $id = (int)$_POST['location_id'];
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $subdomain = trim($_POST['subdomain']);
        
        $stmt = $conn->prepare("UPDATE locations SET name=?, address=?, subdomain=? WHERE id=?");
        
        if($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("sssi", $name, $address, $subdomain, $id);
        
        if($stmt->execute()) {
            $success = "Lokasi berhasil diupdate!";
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $stmt->close();
    } catch(Exception $e) {
        $error = "Gagal mengupdate lokasi: " . $e->getMessage();
    }
}

// Success message dari redirect
if(isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    $success = "Lokasi berhasil dihapus!";
}

// Get all locations
try {
    $locations = $conn->query("SELECT * FROM locations ORDER BY name ASC");
    if($locations === false) {
        throw new Exception("Query failed: " . $conn->error);
    }
} catch(Exception $e) {
    $error = "Gagal mengambil data lokasi: " . $e->getMessage();
    $locations = false;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lokasi - Admin</title>
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
        <a href="products.php"><i class="fas fa-box"></i> Kelola Produk</a>
        <a href="locations.php" class="active"><i class="fas fa-map-marker-alt"></i> Kelola Lokasi</a>
        <a href="faqs.php"><i class="fas fa-question-circle"></i> Kelola FAQ</a>
        <hr class="text-white mx-3">
        <a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2 class="mb-4">Kelola Lokasi</h2>

        <?php if($success): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?= htmlspecialchars($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if($error): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Lokasi -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Lokasi Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Bojong Gede" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subdomain/URL <span class="text-danger">*</span></label>
                            <input type="text" name="subdomain" class="form-control" placeholder="http://bojong-gede.companyflorist.com" required>
                            <small class="text-muted">URL lengkap untuk subdomain lokasi</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="2" placeholder="Alamat lengkap cabang..." required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="add_location" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan Lokasi
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Lokasi -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Semua Lokasi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="200">Nama Lokasi</th>
                                <th>Alamat</th>
                                <th width="300">Subdomain/URL</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($locations && $locations->num_rows > 0): ?>
                                <?php while($location = $locations->fetch_assoc()): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($location['name']) ?></strong></td>
                                    <td><?= htmlspecialchars($location['address']) ?></td>
                                    <td>
                                        <a href="<?= htmlspecialchars($location['subdomain']) ?>" target="_blank" class="text-success">
                                            <?= htmlspecialchars($location['subdomain']) ?> <i class="fas fa-external-link-alt fa-xs"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $location['id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="?delete=<?= $location['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus lokasi ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $location['id'] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Lokasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="location_id" value="<?= $location['id'] ?>">
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($location['name']) ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Subdomain/URL <span class="text-danger">*</span></label>
                                                        <input type="text" name="subdomain" class="form-control" value="<?= htmlspecialchars($location['subdomain']) ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                                        <textarea name="address" class="form-control" rows="2" required><?= htmlspecialchars($location['address']) ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        <i class="fas fa-times"></i> Batal
                                                    </button>
                                                    <button type="submit" name="edit_location" class="btn btn-warning">
                                                        <i class="fas fa-save"></i> Update Lokasi
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
                                    <td colspan="4" class="text-center text-muted">Belum ada lokasi</td>
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