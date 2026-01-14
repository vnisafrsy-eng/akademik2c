<h1 class="mb-4">List Program Studi</h1>
<a href="index.php?p=program_studi_create" class="btn btn-primary mb-4">Input Data Program Studi</a>

<table class="table table-bordered table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Prodi</th>
      <th scope="col">Jenjang</th>
      <th scope="col">Akreditasi</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Gunakan nama tabel 'program_studi' sesuai logika file proses Anda
    $tampil = $koneksi->query("SELECT * FROM program_studi");
    $no = 1;
    while ($data = $tampil->fetch_assoc()) {
    ?>
      <tr>
        <th scope="row"><?= $no++ ?></th>
        <td><?= htmlspecialchars($data['nama_prodi']); ?></td>
        <td><?= htmlspecialchars($data['jenjang']); ?></td>
        <td><?= htmlspecialchars($data['akreditasi']); ?></td>
        <td><?= htmlspecialchars($data['keterangan']); ?></td>
        <td>
          <a href="index.php?p=program_studi_edit&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="program_studi/proses1.php?aksi=hapus&id=<?= $data['id']; ?>"
             onclick="return confirm('Yakin ingin menghapus data ini?')"
             class="btn btn-danger btn-sm">
            Hapus
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>