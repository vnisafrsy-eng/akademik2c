<h1>Data Mahasiswa</h1>

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
    <label class="form-label">Program Studi</label>
    <select name="prodi_id" class="form-select" required>
        <option value="">-- Pilih Program Studi --</option>
        <?php
        // Query untuk mengambil data prodi
        $query_prodi = $koneksi->query("SELECT * FROM program_studi ORDER BY nama_prodi ASC");
        
        // Looping data prodi menjadi pilihan (option)
        while ($prodi = $query_prodi->fetch_assoc()) {
            // Gunakan ID sebagai value untuk memudahkan relasi tabel
            echo "<option value='" . $prodi['id'] . "'>" . htmlspecialchars($prodi['nama_prodi']) . " (" . $prodi['jenjang'] . ")</option>";
        }
        ?>
    </select>
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