<h1 class="mb-4">List Program Studi</h1>
  <a href="index.php?p=program_studi_create" class= "btn btn-primary mb-4">Input Data Program Studi</a>

<table class="table table-bordered table-striped>">
    
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
        require __DIR__ . '/../koneksi.php';
        $tampil = $koneksi->query("SELECT * FROM program_studi");
        $no = 1;
        while($data = mysqli_fetch_assoc($tampil)) {
           // $time = $data['date_centered'];

             //$data=array();
       // while($row=$tampil->fetch_assoc()){
           // $data[]=$row;
        //}
       // $data =$tampil->fetch_all();
       // var_dump($data);
        //die;
        //foreach($tampil as $row) :
          //$time = $row['date_centered'];
    ?>
    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td><?= $data['nama_prodi']; ?></td>
      <td><?= $data['jenjang']; ?></td>
      <td><?= $data['akreditasi']; ?></td>
      <td><?= $data['keterangan']; ?></td>

      <td>
        <a href="index.php?key=<?=$data['id']?>&p=ubah" class = "btn btn-warning btn-sm">Edit</a>
        <a  onclick="return confirm('Apakah Anda Yakin?')" href="programstudi/proses.php?id=<?= $data['id']?>&aksi=hapus" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    
    <?php 
        }
    ?>
  </tbody>
</table>