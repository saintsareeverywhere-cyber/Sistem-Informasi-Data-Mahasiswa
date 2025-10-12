<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_akademik';

$koneksi = mysqli_connect(
    hostname: $host,
    username: $user,
    password: $pass,
    database: $database
);

if (!$koneksi){
    die("koneksi gagal: " . mysqli_connect_error());
}
?>