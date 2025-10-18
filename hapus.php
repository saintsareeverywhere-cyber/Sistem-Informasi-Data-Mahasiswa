<?php require_once('config/koneksi.php');

$id = $_GET['id'];
try {
    $query = "delete from mahasiswa where id = $id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header('Location: index.php?success=data berhasil dihapus');
} else {
    header('Location: index.php?error=data gagal dihapus');
}
} catch (\Throwable $e) {
    if($e) {
        header('Location: index.php?error=data gagal dihapus');
    }
}
