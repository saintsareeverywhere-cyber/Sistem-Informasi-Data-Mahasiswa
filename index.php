<?php
    require_once('config/koneksi.php');

    session_start();
    $button;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "select nama_l, username from users where username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $data_auth = mysqli_fetch_assoc($result);

        $button = "<a role=\"button\" href=\"proses_logout.php\" class=\"btn btn-outline-success\">$data_auth[nama_l]</a>'";

    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="js/index.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <?= $button??'<a role="button" href="login.php" class="btn btn-outline-success">Login</a>' ?>
            </div>
        </div>
    </nav>
    <main class="container">
        <h1 class="text-center">Manajemen Data Mahasiswa</h1>
        <div class="d-flex justify-content-end my-2">
            <a href="tambah.php" class="btn btn-primary">➕ Tambah</a>
        </div>
        <!-- Success alert -->
        <?php
         if (isset($_GET['success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <div>' . $_GET['success'] . '</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' . '</div>';
        }
        ?>
        <!-- end success alert -->
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
                        <th colspan="2" class="text-center">Aksi</th>
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
                        echo '<td class="text-end"><a href="edit.php?id=' . $row['id'] . '"class="btn btn-primary">Edit</a></td>';
                        echo '<td><button id="hapus" type="button" data-id="' . $row['id'] . '" class="btn btn-danger">
                        Hapus
                        </button>
                        </td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </main>
    
    <!-- Modal -->
    <div class="modal fade" id="ModalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Apakah kamu yakin ingin menghapus id <span id="number"></span></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="hapusModal" class="btn btn-danger">OK</button>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>