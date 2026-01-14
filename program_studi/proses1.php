<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../koneksi.php';

// CREATE
if (isset($_POST['submit'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];
    $pengguna   = $_SESSION['user_id'];

    $sql = "INSERT INTO program_studi (nama_prodi, jenjang, akreditasi, keterangan, pengguna_id)
            VALUES ('$nama_prodi', '$jenjang', '$akreditasi', '$keterangan', '$pengguna')";

    if ($koneksi->query($sql)) {
        header('Location: ../index.php?p=program_studi');
        exit;
    } else {
        echo "Gagal: " . $koneksi->error;
    }
}

// UPDATE
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE program_studi SET 
            nama_prodi='$nama_prodi', jenjang='$jenjang', 
            akreditasi='$akreditasi', keterangan='$keterangan' 
            WHERE id='$id'";

    if ($koneksi->query($sql)) {
        header('Location: ../index.php?p=program_studi');
        exit;
    } else {
        echo "Gagal update: " . $koneksi->error;
    }
}

// DELETE
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM program_studi WHERE id='$id'");
    header('Location: ../index.php?p=program_studi');
    exit;
}
?>