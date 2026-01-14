<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
include('header.php');
?>

  <!-- KONTEN -->
  <div class="container my-4">
    <?php
    $page = $_GET['p'] ?? 'home';

    switch ($page) {

      case 'home':
        include 'home.php';
        break;

      case 'mahasiswa':
        include 'mahasiswa/list.php';
        break;

      case 'mahasiswa_create':
        include 'mahasiswa/create.php';
        break;

      case 'mahasiswa_edit':
        include 'mahasiswa/edit.php';
        break;

      // PROGRAM STUDI
      case 'program_studi':
        include 'program_studi/list1.php';
        break;

      case 'program_studi_create':
        include 'program_studi/create1.php';
        break;

      case 'program_studi_edit':
        include 'program_studi/edit1.php';
        break;

      default:
        include 'home.php';
    }
    ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>