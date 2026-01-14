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
    $pengguna   = $_SESSION['user_id'] ?? 0; // Pastikan session ada

    // Menggunakan Prepared Statement untuk keamanan
    $stmt = $koneksi->prepare("INSERT INTO program_studi (nama_prodi, jenjang, akreditasi, keterangan, pengguna_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nama_prodi, $jenjang, $akreditasi, $keterangan, $pengguna);

    if ($stmt->execute()) {
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

    $stmt = $koneksi->prepare("UPDATE program_studi SET nama_prodi=?, jenjang=?, akreditasi=?, keterangan=? WHERE id=?");
    $stmt->bind_param("ssssi", $nama_prodi, $jenjang, $akreditasi, $keterangan, $id);

    if ($stmt->execute()) {
        header('Location: ../index.php?p=program_studi');
        exit;
    } else {
        echo "Gagal update: " . $koneksi->error;
    }
}

// DELETE
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    
    $stmt = $koneksi->prepare("DELETE FROM program_studi WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('Location: ../index.php?p=program_studi');
        exit;
    }
}
?>