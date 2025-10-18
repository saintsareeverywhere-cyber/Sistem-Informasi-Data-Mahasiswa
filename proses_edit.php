<?php
    require_once('config/koneksi.php');

    // seluruh data update
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    
    

    $query = 'select * from mahasiswa where id = ' . $id;
    $result = mysqli_query($koneksi, $query);
    $get_data_id = mysqli_fetch_assoc($result);
    
    if (
        ($get_data_id['id'] == $id) &&
        ($get_data_id['nama'] == $nama) &&
        ($get_data_id['nim'] == $nim) &&
        ($get_data_id['jurusan'] == $jurusan)
    ) {
        header('Location: index.php?');
        exit;
    }


    try {
        $query = "update mahasiswa set nama = '$nama', nim = '$nim', jurusan = '$jurusan' where id = $id";
        $result = mysqli_query($koneksi, $query);


    if ($result){
        header('Location: index.php?success=data berhasil diupdate');
    } else {
        throw new Exception('Data gagal diupdate', 500);
    }
    } catch (\Exception $e) {
       header('Location: edit.php?error=data gagal diupdate');
    }


?>