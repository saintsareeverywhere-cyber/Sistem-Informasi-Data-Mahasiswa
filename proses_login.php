<?php
require_once('config/koneksi.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $query = "select * from users where username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php?success=berhasil login');
        } else {
            throw new Exception('Username atau Password salah', 500);
        }
    } catch (\Exception $e) {
        header("Location: login.php?error={$e->getMessage()}");
    }
}


?>