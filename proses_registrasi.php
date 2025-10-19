<?php
require_once('config/koneksi.php');

if (
isset($_POST['username']) && 
isset($_POST['password']) && 
isset($_POST['confirmPassword']) && 
isset($_POST['name']) &&
isset($_POST['agree'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $name = $_POST['name'];
    $agree = $_POST['agree'];

    try {
        // jika password tidak sama eksekusi kode di dalam kondisi ini
        if ($password !== $confirmPassword) {
            throw new Exception('Kata sandi tidak sama, 500');
        }
        // jika tidak setuju eksekusi kode di dalam kondisi ini
        if ($agree !== '1') {
            throw new Exception('Harap menyetujui syarat & ketentuan, 500');
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "insert into users (username, password, nama_l) values ('$username', '$password', '$name')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: login.php?success=berhasil mendaftar");
        } else {
            throw new Exception('Gagal mendaftar', 500);
        }

    } catch (\Exception $e) {
        header("Location: register.php?error={$e->getMessage()}");
    }
}
?>