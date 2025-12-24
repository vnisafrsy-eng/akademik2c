<h1>Input Mahasiswa</h1>
<?php 
require 'koneksi.php'; //memasukkan file koneksi.php agar bisa menggunakan variabel $koneksi
$id = $_GET['key'];
$edit = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$id'");
$data = $edit->fetch_assoc();
?>
 
<form action="proses.php" method="POST">
    <input type="text" name="nim" value="<?= $data['nim'] ?>" hidden>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" required>
    </div>
    <div class="mb-3">
      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $data['alamat'] ?></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" name="update" class="btn btn-primary" value="Submit"> 
        <a href="list.php" class="btn btn-secondary">List Mahasiswa</a>
    </div>
</form>