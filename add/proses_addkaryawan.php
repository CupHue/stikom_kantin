<?php
//memanggil file koneksi.php untuk melakukan koneksi database 
include '../koneksi.php';

  // membuat variabel untuk menampung data dari form supplier 
  // $idpelanggan = $_GET['idpelanggan'] AutoIncrement
  $idkaryawan = $_POST['idkaryawan'];
  $namakaryawan = $_POST['namakaryawan'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];

    $query = "INSERT INTO tb_karyawan (idkaryawan, namakaryawan, alamat, telpon)
    VALUES ('$idkaryawan','$namakaryawan', '$alamat', '$telpon')";
                    $result = mysqli_query($mysqli, $query);
                    // periksa query apakah ada error

                    if($result){
                      //Berhasil
                      echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewkaryawan.php';</script>";
                    }
                      //ID terduplikasi
                    else if($idkaryawan = "idkaryawan" ){
                      echo "<script>alert('ID Karyawan Tidak Boleh Sama');window.location='../add/addkaryawan.php';</script>";
                    } 
                      //ID Mencari error coding
                    else if(!$result){
                        die ("query gagal dijalankan: ".mysqli_errno($mysqli).
                        " - ".mysqli_error($mysqli));
                    } 
                    else {
                        //sesuaikan window.location'../folder penyimpanan view/file view.php'
                        echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewkaryawan.php';</script>";
                    }
?>