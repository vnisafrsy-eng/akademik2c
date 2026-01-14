<?php
// include  jika file yang dimasukkan eror kode lain ttp dijalankan | require jika file yang dimasukkan eror kode lain nya juga eror| 
//include_once yg dipanggil yg pertama | require_once

session_start();

require __DIR__ . '/../koneksi.php'; 

if(isset($_POST['submit'])){
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];  
    $akreditasi = $_POST['akreditasi']; 
    $keterangan = $_POST['keterangan'];
    $pengguna = $_SESSION['user_id'];



    $sql ="INSERT INTO program_studi(nama_prodi,jenjang,akreditasi,keterangan,pengguna_id)
            VALUES ('$nama_prodi','$jenjang','$akreditasi','$keterangan','$pengguna')";
    $query = $koneksi->query($sql); 
    if($query){
        header('Location: ../index.php?p=programstudi'); 
    }
    else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }    
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];  
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];
    

    $sql ="UPDATE program_studi SET
            nama_prodi='$nama_prodi',
            jenjang='$jenjang',
            akreditasi='$akreditasi',
            keterangan='$keterangan'
            WHERE id= '$id'";
    $query = $koneksi->query($sql); //eksekusi perintah sql(query))
    if($query){
        header('Location: ../index.php?p=programstudi'); //mengalihkan ke halaman list.php
    }
    else {
        echo "Gagal menyimpan data";
    }    
}


//blok kode untuk menghapus data
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $query = $koneksi->query("DELETE FROM program_studi WHERE id = '$id'");

    if ($query) {
        header('Location: ../index.php?p=programstudi');
        exit;
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
}
?>