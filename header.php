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
    <title>Akademik - Pink Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        /* Warna Pink Soft Utama */
        :root {
            --pink-soft: #f8bbd0;
            --pink-dark: #f06292;
            --pink-bg: #fff5f8;
        }

        body {
            background-color: var(--pink-bg);
        }

        .navbar {
            background-color: var(--pink-soft) !important;
            border-bottom: 2px solid var(--pink-dark);
        }

        .navbar-brand, .nav-link {
            color: #5d4037 !important; /* Warna teks kecokelatan agar lembut */
        }

        .nav-link:hover {
            color: var(--pink-dark) !important;
        }

        .card-header {
            background-color: var(--pink-soft) !important;
            color: #5d4037 !important;
            font-weight: bold;
        }

        .btn-primary {
            background-color: var(--pink-dark) !important;
            border-color: var(--pink-dark) !important;
        }

        .btn-primary:hover {
            background-color: #ec407a !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="bi bi-mortarboard-fill"></i> Akademik
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=mahasiswa">Data Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=program_studi">Data Prodi</a></li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <a class="nav-link fw-semibold" href="profile.php">
                            <i class="bi bi-person-circle"></i> Edit Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-danger btn-sm fw-bold shadow-sm">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">