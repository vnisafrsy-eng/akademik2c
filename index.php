<?php
// index.php
include('header.php');
include('koneksi.php'); 

// Menangkap parameter 'p' dari URL, default-nya adalah 'home'
$page = $_GET['p'] ?? 'home';

echo '<div class="container my-4">';
switch ($page) {
    case 'home':
        include 'home.php';
        break;

    // MAHASISWA
    case 'mahasiswa':
        include 'mahasiswa/list.php';
        break;
    case 'mahasiswa_create':
        include 'mahasiswa/create.php';
        break;
    case 'mahasiswa_edit': // Link Edit harus mengarah ke sini
        include 'mahasiswa/edit.php';
        break;

    // PROGRAM STUDI
    case 'program_studi':
        include 'program_studi/list1.php';
        break;
    case 'program_studi_create':
        include 'program_studi/create1.php';
        break;
    case 'program_studi_edit':
        include 'program_studi/edit1.php';
        break;

    default:
        include 'home.php';
}
echo '</div>';

include('footer.php');
?>