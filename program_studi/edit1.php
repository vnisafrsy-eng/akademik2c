<h1>Edit Data Mahasiswa</h1>
    <?php 
    require __DIR__ . '/../koneksi.php'; //memasukkan file koneksi.php agar bisa menggunakan variabel $koneksi
    $id = $_GET['key'];
    $edit =$koneksi->query("SELECT * FROM program_studi WHERE id= '$id'");
    $data =$edit->fetch_assoc();
    ?>
   

    <form action="programstudi/proses.php" method="POST"> <!--tidak ditulis default action halaman nya sendiri, kalau method defaultnya get => di gabungkan ke url--> 
        <input type="text" name="id" value="<?= $data['id'] ?>" hidden>
        <div class="mb-3">
                <label class="form-label">Program Studi</label>
                <select name="nama_prodi" class="form-select" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="TRPL" <?= ($data['nama_prodi'] == 'TRPL') ? 'selected' : ''; ?>>Teknologi Rekayasa Perangkat Lunak</option>
                    <option value="TK" <?= ($data['nama_prodi'] == 'TK') ? 'selected' : ''; ?>>Teknik Komputer</option>
                    <option value="MI" <?= ($data['nama_prodi'] == 'MI') ? 'selected' : ''; ?>>Manajemen Informatika</option>
                    <option value="SI" <?= ($data['nama_prodi'] == 'SI') ? 'selected' : ''; ?>>Sistem Informasi</option>
                    <option value="Animasi" <?= ($data['nama_prodi'] == 'Animasi') ? 'selected' : ''; ?>>Animasi</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : ''; ?>>D2</option>
                    <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : ''; ?>>D3</option>
                    <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : ''; ?>>D4</option>
                    <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : ''; ?>>S2</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Akreditasi</label>
                <select name="akreditasi" class="form-select" required>
                    <option value="">-- Akreditasi Program Studi --</option>
                    <option value="Cukup Baik" <?= ($data['akreditasi'] == 'Cukup Baik') ? 'selected' : ''; ?>>Cukup Baik</option>
                    <option value="Baik" <?= ($data['akreditasi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
                    <option value="Baik Sekali" <?= ($data['akreditasi'] == 'Baik Sekali') ? 'selected' : ''; ?>>Baik Sekali</option>
                    <option value="Sangat Baik" <?= ($data['akreditasi'] == 'Sangat Baik') ? 'selected' : ''; ?>>Sangat Baik</option>
                </select>
            </div>

        <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" name = "keterangan" id="exampleFormControlTextarea1" rows="3"><?= $data['keterangan'] ?></textarea>
        </div>
        
        <div class="mb-3">
            <input type="submit" name ="update" class="btn btn-primary" value="Submit" > 
             <a href="programstudi/list.php" class= "btn btn-secondary">List Data Program Studi</a>

        </div>
    </form>