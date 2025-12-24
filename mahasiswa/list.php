<h1>List Data Mahasiswa</h1>
<a href="index.php?p=create" class="btn btn-primary">Tambah Data</a>
<br></br>

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
      require 'koneksi.php';
      $tampil = $koneksi->query("SELECT * FROM mahasiswa");
      $no = 1;
      while ($data = mysqli_fetch_assoc($tampil)) {
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $data['nim']; ?></td>
      <td><?= $data['nama_mhs']; ?></td>
      <td><?= $data['tgl_lahir'] ? $data['tgl_lahir'] : '-' ?></td>
      <td><?= $data['alamat']; ?></td>
      <td>
        <a href="index.php?key=<?= $data['nim']; ?>&p=edit" class="btn btn-warning btn-sm">Edit</a>
        <a href="proses.php?nim=<?= $data['nim'];?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>