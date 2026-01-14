<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id   = $_SESSION['user_id'];
$nama = htmlspecialchars($_POST['nama']);

if (!empty($_POST['password'])) {
    // jika password diubah
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE users SET nama='$nama', password='$password' WHERE id='$id'";
} else {
    // jika password tidak diubah
    $sql = "UPDATE users SET nama='$nama' WHERE id='$id'";
}

if ($koneksi->query($sql)) {
    header("Location: profile.php?status=success");
} else {
    echo "Gagal update profil";
}
