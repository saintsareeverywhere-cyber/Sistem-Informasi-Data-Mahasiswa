<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Data Mahasiswa | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
     <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card card-register shadow-sm p-4">
            <div class="card-body">
                <?php
                if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div>' . $_GET['error'] . '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' . '</div>';
                }
                ?>
                <div class="text-center mb-4">
                     <div class="brand bg-success text-white mb-2">Sistem Data Mahasiswa</div>
                     <h4 class="card-title mb-0">Daftar Akun</h4>
                     <small class="text-muted">Isi data berikut untuk mendaftar</small>
                </div>
                <form action="proses_registrasi.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" name="name" placeholder="Nama Lengkap" required>
                            <label for="floatingName">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingEmail" name="username" placeholder="joniblack" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingConfirm" name="confirmPassword" placeholder="Konfirmasi Password" required>
                        <label for="floatingConfirm">Konfirmasi Password</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="agree" value="1" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">
                        Saya menyetujui <a href="#">syarat & ketentuan</a>
                        </label>
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-success btn-lg" type="submit">Daftar</button>
                    </div>
                    <div class="text-center">
                        <small class="text-muted">Sudah punya akun? <a href="login.php">Masuk</a></small>
                    </div>
                </form>
            </div>
        </div>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>