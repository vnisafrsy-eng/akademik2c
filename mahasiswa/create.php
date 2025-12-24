<h1>Tambah Mahasiswa</h1>

<form action="mahasiswa/proses.php" method="post">
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text" name="nim" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama_mhs" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" rows="3" class="form-control"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
  <a href="index.php?p=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>