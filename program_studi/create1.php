<h1 class="mb-4">Input Program Studi</h1>
<form action="program_studi/proses1.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <select name="nama_prodi" class="form-select" required>
            <option value="">--- Pilih Program Studi ---</option>
            <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Manajemen Informatika">Manajemen Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Animasi">Animasi</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="">--- Pilih Jenjang ---</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S2">S2</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Akreditasi</label>
        <select name="akreditasi" class="form-select" required>
            <option value="Baik">Baik</option>
            <option value="Baik Sekali">Baik Sekali</option>
            <option value="Unggul">Unggul</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan (Opsi)</label>
        <textarea class="form-control" name="keterangan" rows="3"></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?p=program_studi" class="btn btn-secondary">Kembali</a>
</form>