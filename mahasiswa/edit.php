<?php
require 'koneksi.php';

// ambil NIM dari URL
$nim = $_GET['nim'] ?? '';

if ($nim == '') {
    echo "NIM tidak ditemukan!";
    exit;
}

// ambil data mahasiswa
$stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
$stmt->bind_param("s", $nim);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data mahasiswa tidak ditemukan!";
    exit;
}
?>

<h3>Edit Data Mahasiswa</h3>

<form method="POST" action="mahasiswa/proses.php">
    <input type="hidden" name="nim" value="<?= $data['nim']; ?>">

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control"
               value="<?= htmlspecialchars($data['nama_mhs']); ?>" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control"
               value="<?= $data['tgl_lahir']; ?>">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= htmlspecialchars($data['alamat']); ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">
        Update Data
    </button>
</form>
