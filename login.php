<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
     <div class="row">
    <form action="" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
 if(isset($_POST['email'])){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    require 'koneksi.php';
    $ceklogin = $koneksi->query("SELECT * FROM pengguna WHERE email ='$email' AND password='$pass'");
    $data = $ceklogin->fetch_assoc();

    //jika email dan password ketemu
    if($ceklogin->num_rows == 1){
        $data = $ceklogin->fetch_assoc();
       // echo "login berhasil";
       session_start();
       $_SESSION['login'] = TRUE;
       $_SESSION['email'] = $email;
       //$_SESSION['nama_lengkap'] = $data['nama_lengkap'];

       header("Location: index.php");
    } else {
        echo "login gagal";
    }
 }
?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>