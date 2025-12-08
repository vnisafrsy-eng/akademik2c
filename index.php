<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi DB Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container">
    <a class="navbar-brand" href="#">DB Akademik</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?p=mahasiswa">Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?p=create">Tambah Mahasiswa</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container my-4">
    <?php 
      $page = isset($_GET['p']) ? $_GET['p'] : 'home';
      
      if ($page == 'home') include 'home.php';
      elseif ($page == 'mahasiswa') include 'list.php';
      elseif ($page == 'create') include 'create.php';
      elseif ($page == 'edit') include 'edit.php';
      else include 'home.php';
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>