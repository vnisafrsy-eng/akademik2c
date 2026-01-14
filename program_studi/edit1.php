<?php 
    // Koneksi sudah ada dari index.php
    $id = $_GET['id'] ?? '';
    $edit = $koneksi->query("SELECT * FROM program_studi WHERE id= '$id'");
    $data = $edit->fetch_assoc();

    if (!$data) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
        return;
    }
?>

<h1 class="mb-4">Edit Data Program Studi</h1>
<form action="program_studi/proses1.php" method="POST"> 
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    
    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <select name="nama_prodi" class="form-select" required>
            <?php
            $prodi_list = ["Teknologi Rekayasa Perangkat Lunak", "Teknik Komputer", "Manajemen Informatika", "Sistem Informasi", "Animasi"];
            foreach($prodi_list as $p) {
                $selected = ($data['nama_prodi'] == $p) ? 'selected' : '';
                echo "<option value='$p' $selected>$p</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : ''; ?>>D2</option>
            <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : ''; ?>>D3</option>
            <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : ''; ?>>D4</option>
            <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : ''; ?>>S2</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Akreditasi</label>
        <select name="akreditasi" class="form-select" required>
            <option value="Cukup Baik" <?= ($data['akreditasi'] == 'Cukup Baik') ? 'selected' : ''; ?>>Cukup Baik</option>
            <option value="Baik" <?= ($data['akreditasi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
            <option value="Baik Sekali" <?= ($data['akreditasi'] == 'Baik Sekali') ? 'selected' : ''; ?>>Baik Sekali</option>
            <option value="Sangat Baik" <?= ($data['akreditasi'] == 'Sangat Baik') ? 'selected' : ''; ?>>Sangat Baik</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="3"><?= htmlspecialchars($data['keterangan']) ?></textarea>
    </div>
    
    <button type="submit" name="update" class="btn btn-primary">Update Data</button> 
    <a href="index.php?p=program_studi" class="btn btn-secondary">Batal</a>
</form>