<h1>List Data Mahasiswa</h1>

<a href="index.php?p=mahasiswa_create" class="btn btn-primary mb-3">
    Tambah Data
</a>

<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama Mahasiswa</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    <?php
      // koneksi SUDAH dari index.php
      $result = $koneksi->query("SELECT * FROM mahasiswa");
      $no = 1;

      while ($data = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $data['nim']; ?></td>
      <td><?= $data['nama_mhs']; ?></td>
      <td><?= $data['tgl_lahir'] ?: '-'; ?></td>
      <td><?= $data['alamat']; ?></td>
      <td>
        <!-- EDIT -->
        <a href="index.php?p=mahasiswa_edit&nim=<?= $data['nim']; ?>"
           class="btn btn-warning btn-sm">
           Edit
        </a>

        <!-- HAPUS (INI KUNCI) -->
        <a href="mahasiswa/proses.php?aksi=hapus&nim=<?= $data['nim']; ?>"
           onclick="return confirm('Yakin ingin menghapus data ini?')"
           class="btn btn-danger btn-sm">
           Hapus
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
