<?php
//memanggil file koneksi.php untuk melakukan koneksi database 
include '../koneksi.php';

  // membuat variabel untuk menampung data dari form supplier 
  // $idpelanggan = $_GET['idpelanggan'] AutoIncrement
  $username = $_POST['username'];
  $password = $_POST['password'];
  $leveluser = $_POST['leveluser'];

    $query = "INSERT INTO tb_login (username, password, leveluser)
    VALUES ('$username','$password', '$leveluser')";
                    $result = mysqli_query($mysqli, $query);
                    // periksa query apakah ada error

                    if($result){
                      //Berhasil
                      echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewlogin.php';</script>";
                    }
                      //ID terduplikasi
                    else if($username = "username" ){
                      echo "<script>alert('USERNAME Tidak Boleh Sama');window.location='../add/addlogin.php';</script>";
                    } 
                      //ID Mencari error coding
                    else if(!$result){
                        die ("query gagal dijalankan: ".mysqli_errno($mysqli).
                        " - ".mysqli_error($mysqli));
                    } 
                    else {
                        //sesuaikan window.location'../folder penyimpanan view/file view.php'
                        echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewlogin.php';</script>";
                    }
?>