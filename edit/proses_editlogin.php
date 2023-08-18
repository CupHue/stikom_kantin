<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

    // membuat variabel untuk menampung data dari form 
    $username         = $_POST['username'];
    $editusername     = $_POST['editusername'];
    $password         = $_POST['password'];
    $leveluser        = $_POST['leveluser'];


                // jalankan query UPDATE berdasarkan id pelanggan yg diedit
                $query  = "UPDATE tb_login SET username = '$editusername', password = '$password', leveluser = '$leveluser'";
                $query .= "WHERE username = '$username'";
                // UPDATE `tb_login` SET `username` = 'wira' WHERE `tb_login`.`username` = 'qwe';
                $result = mysqli_query($mysqli, $query);
                // periksa query apakah ada error 
                
                if($result){
                    //Berhasil
                    echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewlogin.php';</script>";
                }
                //ID terduplikasi
                else if($editusername = "username" ){
                echo "<script>alert('USERNAME Tidak Boleh Sama');window.location='../add/addlogin.php';</script>";
                } 
                //ID Mencari error coding
                else if(!$result){
                    die ("query gagal dijalankan: ".mysqli_errno($mysqli).
                    " - ".mysqli_error($mysqli));
                } 
                else {
                    //sesuaikan window.location'../folder penyimpanan view/file view.php'
                    echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewlogin.php';</script>";
                }
?>