<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['update'])) {
    $id   = $_SESSION['user_id'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);

    if (!empty($_POST['password'])) {
        // Enkripsi password baru
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE pengguna SET nama_lengkap='$nama', password='$password' WHERE id='$id'";
    } else {
        // Update nama saja
        $sql = "UPDATE pengguna SET nama_lengkap='$nama' WHERE id='$id'";
    }

    if ($koneksi->query($sql)) {
        header("Location: profile.php?status=success");
        exit;
    } else {
        die("Gagal update data: " . $koneksi->error);
    }
} else {
    header("Location: profile.php");
    exit;
}