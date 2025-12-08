<?php
// require: jika file koneksi error, script akan berhenti
require 'koneksi.php';

// blok kode untuk menyimpan data (CREATE)
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat)
            VALUES ('$nim', '$nama', " . ($tgl !== '' ? "'$tgl'" : "NULL") . ", '$alamat')";
    $query = $koneksi->query($sql);

    if ($query) {
        // sukses -> kembali ke daftar mahasiswa
        header('Location: index.php?p=mahasiswa');
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
}

// blok kode untuk update data (UPDATE)
if (isset($_POST['update'])) {
    $nim = $_POST['nim']; // nim dikirim sebagai hidden input
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET
                nama_mhs = '$nama',
                tgl_lahir = " . ($tgl !== '' ? "'$tgl'" : "NULL") . ",
                alamat = '$alamat'
            WHERE nim = '$nim'";
    $query = $koneksi->query($sql);

    if ($query) {
        header('Location: index.php?p=mahasiswa');
        exit;
    } else {
        echo "Gagal mengubah data: " . $koneksi->error;
    }
}

// blok kode untuk delete (DELETE)
// cek apakah parameter aksi=hapus dan nim tersedia
if (isset($_GET['aksi']) && $_GET['aksi'] === 'hapus' && isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = $koneksi->query("DELETE FROM mahasiswa WHERE nim = '$nim'");

    if ($query) {
        header('Location: index.php?p=mahasiswa');
        exit;
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
}
?>