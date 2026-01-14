<?php
// mahasiswa/edit.php
require 'koneksi.php';

// Ambil ID dari URL (sesuaikan jika di URL pakai nama 'key' atau 'id')
$id = $_GET['id'] ?? $_GET['key'] ?? ''; 

if ($id == '') {
    echo "ID tidak ditemukan!";
    exit;
}

// Ambil data mahasiswa berdasarkan ID
$stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE id = ?"); // Sesuaikan nama kolom primary key Anda
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data mahasiswa tidak ditemukan di database!";
    exit;
}
?>

<h3>Edit Data Mahasiswa</h3>
<form method="POST" action="mahasiswa/update.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
</form>