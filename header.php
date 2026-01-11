<?php
// Proteksi session (kecuali login)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Aplikasi DB Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">DB Akademik</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=mahasiswa">Mahasiswa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=mahasiswa_create">Tambah Mahasiswa</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Program Studi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?p=prodi_trpl">TRPL</a></li>
                        <li><a class="dropdown-item" href="index.php?p=prodi_si">Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="index.php?p=prodi_mi">Manajemen Informatika</a></li>
                        <li><a class="dropdown-item" href="index.php?p=prodi_tk">Teknik Komputer</a></li>
                        <li><a class="dropdown-item" href="index.php?p=prodi_animasi">Animasi</a></li>
                    </ul>
                </li>
            </ul>

            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container my-4">
