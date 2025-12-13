<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
include '../config.php';

$success = $error = '';

// Handle Add
if(isset($_POST['add_faq'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $urutan = $_POST['urutan'];
    
    $stmt = $conn->prepare("INSERT INTO faqs (question, answer, urutan) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $question, $answer, $urutan);
    
    if($stmt->execute()) {
        $success = "FAQ berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan FAQ!";
    }
}

// Handle Delete
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM faqs WHERE id = $id");
    $success = "FAQ berhasil dihapus!";
}

$faqs = $conn->query("SELECT * FROM faqs ORDER BY urutan ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola FAQ - Admin</title>
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
        <a href="locations.php"><i class="fas fa-map-marker-alt"></i> Kelola Lokasi</a>
        <a href="faqs.php" class="active"><i class="fas fa-question-circle"></i> Kelola FAQ</a>
        <hr class="text-white mx-3">
        <a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2 class="mb-4">Kelola FAQ</h2>

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

        <!-- Form Tambah FAQ -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah FAQ Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control" placeholder="Contoh: Bagaimana cara memesan?" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="urutan" class="form-control" value="0" required>
                            <small class="text-muted">0 = paling atas</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Jawaban <span class="text-danger">*</span></label>
                            <textarea name="answer" class="form-control" rows="4" placeholder="Jawaban lengkap..." required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="add_faq" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan FAQ
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar FAQ -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Semua FAQ</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="80">Urutan</th>
                                <th width="300">Pertanyaan</th>
                                <th>Jawaban</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($faqs->num_rows > 0): ?>
                                <?php while($faq = $faqs->fetch_assoc()): ?>
                                <tr>
                                    <td><span class="badge bg-success"><?= $faq['urutan'] ?></span></td>
                                    <td><strong><?= $faq['question'] ?></strong></td>
                                    <td><?= substr($faq['answer'], 0, 100) ?>...</td>
                                    <td>
                                        <a href="?delete=<?= $faq['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus FAQ ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada FAQ</td>
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
