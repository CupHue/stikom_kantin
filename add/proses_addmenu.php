<?php
//memanggil file koneksi.php untuk melakukan koneksi database 
include '../koneksi.php';

  // membuat variabel untuk menampung data dari form supplier 
  // $idpelanggan = $_GET['idpelanggan'] AutoIncrement
  $idmenu = $_POST['idmenu'];
  $idsupplier = $_POST['idsupplier'];
  $namamenu = $_POST['namamenu'];
  $kategorimenu = $_POST['kategorimenu'];
  $hargajual = $_POST['hargajual'];
  $hargabeli = $_POST['hargabeli'];
  $stok_menu = $_POST['stok_menu'];
  $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO tb_menu (idmenu, idsupplier, namamenu, kategorimenu, hargajual, hargabeli, stok_menu, keterangan)
    VALUES ('$idmenu','$idsupplier', '$namamenu', '$kategorimenu','$hargajual', '$hargabeli', '$stok_menu', '$keterangan')";
                    $result = mysqli_query($mysqli, $query);
                    // periksa query apakah ada error

                    if($result){
                      //Berhasil
                      echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewmenu.php';</script>";
                    }
                      //ID terduplikasi
                    else if($idmenu = "idmenu" ){
                      echo "<script>alert('ID Menu Tidak Boleh Sama');window.location='../add/addmenu.php';</script>";
                    } 
                      //ID Mencari error coding
                    else if(!$result){
                        die ("query gagal dijalankan: ".mysqli_errno($mysqli).
                        " - ".mysqli_error($mysqli));
                    } 
                    else {
                        //sesuaikan window.location'../folder penyimpanan view/file view.php'
                        echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewmenu.php';</script>";
                    }
?>
