<?php
require '../koneksi.php';

// CREATE
if (isset($_POST['submit'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
            VALUES ('$nim', '$nama', " . ($tgl ? "'$tgl'" : "NULL") . ", '$alamat')";

    if ($koneksi->query($sql)) {
        header("Location: ../index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal menyimpan data";
    }
}

// UPDATE
if (isset($_POST['update'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET
                nama_mhs='$nama',
                tgl_lahir=" . ($tgl ? "'$tgl'" : "NULL") . ",
                alamat='$alamat'
            WHERE nim='$nim'";

    if ($koneksi->query($sql)) {
        header("Location: ../index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal update data";
    }
}

// DELETE
if (isset($_GET['aksi'], $_GET['nim']) && $_GET['aksi'] === 'hapus') {
    $nim = $_GET['nim'];

    if ($koneksi->query("DELETE FROM mahasiswa WHERE nim='$nim'")) {
        header("Location: ../index.php?p=mahasiswa");
        exit;
    } else {
        echo "Gagal hapus data";
    }
}
