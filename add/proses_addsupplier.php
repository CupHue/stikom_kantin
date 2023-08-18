<?php
//memanggil file koneksi.php untuk melakukan koneksi database 
include '../koneksi.php';

  // membuat variabel untuk menampung data dari form supplier 
  // $idpelanggan = $_GET['idpelanggan'] AutoIncrement
  $idsupplier = $_POST['idsupplier'];
  $perusahaan = $_POST['perusahaan'];
  $telpon = $_POST['telpon'];
  $alamat = $_POST['alamat'];
  $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO tb_supplier (idsupplier, perusahaan, telpon, alamat, keterangan)
    VALUES ('$idsupplier','$perusahaan', '$telpon', '$alamat', '$keterangan')";
                    $result = mysqli_query($mysqli, $query);
                    // periksa query apakah ada error

                    if($result){
                      //Berhasil
                      echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewsupplier.php';</script>";
                    }
                      //ID terduplikasi
                    else if($idsupplier = "idsupplier" ){
                      echo "<script>alert('ID Supplier Tidak Boleh Sama');window.location='../add/addsupplier.php';</script>";
                    } 
                      //ID Mencari error coding
                    else if(!$result){
                        die ("query gagal dijalankan: ".mysqli_errno($mysqli).
                        " - ".mysqli_error($mysqli));
                    } 
                    else {
                        //sesuaikan window.location'../folder penyimpanan view/file view.php'
                        echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewsupplier.php';</script>";
                    }
?>