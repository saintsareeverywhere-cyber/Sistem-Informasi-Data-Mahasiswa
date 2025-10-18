<?php
    require_once('config/koneksi.php');

    $data = [];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "select * from mahasiswa where id = $id";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Data Mahasiswa | Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Edit Data</h1>
        <div class="d-flex justify-content-end my-2">
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
        <!-- error saat php menangkap args get error -->
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div>' . $_GET['error'] . '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' . '</div>';
        }
        ?>

        <div class="card">
        <form action="proses_edit.php" method="post" class="card-body">
            <input type="hidden" name="id" value=<?= $data['id'] ?> >
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value=<?= $data['nama'] ?> require>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan nim" value=<?= $data['nim'] ?> require>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" value=<?= $data['jurusan'] ?> require>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <button type="submit1" class="btn w-50 btn-primary">Edit</button>
                <button type="reset" class="btn w-50 btn-danger">Reset</button>
            </div>
        </form>
    </div>
    </div>

  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  
</html>