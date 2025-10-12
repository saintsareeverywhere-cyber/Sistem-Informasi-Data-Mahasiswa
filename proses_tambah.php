<?php
require_once('config/koneksi.php');

if(isset($_POST['nama']) && isset ($_POST['nim']) && isset ($_POST['jurusan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    // print_r(value: [
    //     'nama' => $nama,
    //     'nim' => $nim,
    //     'jurusan' => $jurusan
    // ]);
    try {
        $query = "insert into mahasiswa (nama,nim,jurusan) values ('$nama', '$nim', '$jurusan')"; 
        $result = mysqli_query($koneksi, $query);

    if ($result){
        header('Location: index.php?success=Data berhasil disimpan');
    } else {
        throw new Exception('Data gagal disimpan', 500);
    }
    } catch (\Exception $e) {
        header('Location: tambah.php?error=data gagal disimpan');
    }
    
} else {
    header('Location: tambah.php?error=data tidak lengkap');
}