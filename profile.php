<?php
// profile.php
include('header.php'); // Agar Navbar muncul
include('koneksi.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$query = $koneksi->query("SELECT * FROM pengguna WHERE id='$id'");
$user = $query->fetch_assoc();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header text-center py-3">
                <h4 class="mb-0">Edit Profil Pengguna</h4>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d1ffd6;">
                        Profil berhasil diperbarui!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="post" action="profile_proses.php">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" 
                               value="<?= htmlspecialchars($user['nama_lengkap']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control bg-light" 
                               value="<?= htmlspecialchars($user['email']); ?>" readonly>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <input type="password" name="password" class="form-control" 
                               placeholder="Kosongkan jika tidak ingin ganti password">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); // Agar script Bootstrap terload ?>