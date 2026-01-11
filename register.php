<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $password     = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '' || $nama_lengkap === '') {
        $error = "Semua kolom wajib diisi!";
    } else {
        $cek_email = $koneksi->prepare("SELECT email FROM pengguna WHERE email = ?");
        $cek_email->bind_param("s", $email);
        $cek_email->execute();
        $cek_email->store_result();

        if ($cek_email->num_rows > 0) {
            $error = "Email ini sudah terdaftar!";
        } else {
            $password_aman = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $koneksi->prepare("INSERT INTO pengguna (nama_lengkap, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_lengkap, $email, $password_aman);

            if ($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan login.";
            } else {
                $error = "Terjadi kesalahan saat mendaftar.";
            }
            $stmt->close();
        }
        $cek_email->close();
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Daftar Akun Baru</h5>
                </div>
                <div class="card-body">

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success) ?>
                            <br><a href="login.php" class="alert-link">Klik di sini untuk login</a>
                        </div>
                    <?php endif; ?>

                    <form method="post" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <small>Sudah punya akun? <a href="login.php">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>