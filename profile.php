<?php
session_start();
require 'koneksi.php';

// pastikan login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$user = $koneksi->query("SELECT * FROM pengguna WHERE id='$id'")->fetch_assoc();
?>

<h3>Edit Profil</h3>

<form method="post" action="profile_proses.php">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control"
               value="<?= $pengguna['nama']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control"
               value="<?= $pengguna['email']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Password Baru</label>
        <input type="password" name="password" class="form-control"
               placeholder="Kosongkan jika tidak diubah">
    </div>

    <button type="submit" name="update" class="btn btn-primary">
        Simpan Perubahan
    </button>
</form>
