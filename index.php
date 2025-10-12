<?php
    require_once('config/koneksi.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Manajemen Data Mahasiswa</h1>
        <div class="d-flex justify-content-end my-2">
            <a href="tambah.php" class="btn btn-primary">➕ Tambah</a>
        </div>
        <?php
         if (isset($_GET['success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <div>' . $_GET['success'] . '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' . '</div>';
        }
        ?>
        <?php
        $query = 'select * from mahasiswa';
        $result = mysqli_query(mysql: $koneksi, query: $query);
        // print_r(value: mysqli_fetch_all(result: $result));
        ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc(result: $result)) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . $row['nama'] . '</td>';
                        echo '<td>' . $row['nim'] . '</td>';
                        echo '<td>' . $row['jurusan'] . '</td>';
                        echo '<td><a href="edit.php?id=' . $row['id'] . '"class="btn btn-primary">Edit</a></td>';
                        echo '<td><a href="hapus.php?id=' . $row['id'] . '"class="btn btn-danger">Hapus</a></td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>