<?php
  include '../koneksi.php';

$idpelanggan = $_POST['idpelanggan'];
$namalengkap = $_POST['namalengkap'];
$alamat     = $_POST['alamat'];
$telpon       = $_POST['telpon'];
$usia       = $_POST['usia'];
$picture  = $_FILES['picture']['name'];

if($picture !=""){
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$x        = explode('.',$picture);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['picture']['tmp_name'];
$nama_gambar_baru =$picture;

    if(in_array($ekstensi,$ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp,'../../pict/'.$nama_gambar_baru);
        $query = "INSERT INTO tb_pelanggan (idpelanggan, namalengkap, alamat , telpon, usia, picture)
        VALUES ('$idpelanggan', '$namalengkap', '$alamat', '$telpon','$usia','$nama_gambar_baru')";
        $result = mysqli_query($mysqli, $query);

        if($result){
            //Berhasil
            echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewpelanggan.php';</script>";
          }
            //ID terduplikasi
          else if($idpelanggan = "idpelanggan" ){
            echo "<script>alert('ID Pelanggan Tidak Boleh Sama');window.location='../add/addpelanggan.php';</script>";
          } 
            //ID Mencari error coding
          else if(!$result){
              die ("query gagal dijalankan: ".mysqli_errno($mysqli).
              " - ".mysqli_error($mysqli));
          } 
          else {
              //sesuaikan window.location'../folder penyimpanan view/file view.php'
              echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewpelanggan.php';</script>";
          }
}   

else{
        echo"<script>alert('ektensi yang diperbolehkan hanya jpg,png dan jpeg.');
        window.location='../add/proses_addpelanggan.php';</script>";
}
}

else{
    $query = "INSERT INTO tb_pelanggan (idpelanggan, namalengkap, alamat , telpon, usia)
        VALUES ('$idpelanggan', '$namalengkap', '$alamat', '$telpon','$usia')";
         $result = mysqli_query($mysqli, $query);

         if($result){
            //Berhasil
            echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewpelanggan.php';</script>";
          }
            //ID terduplikasi
          else if($idpelanggan = "idpelanggan" ){
            echo "<script>alert('ID Pelanggan Tidak Boleh Sama');window.location='../add/addpelanggan.php';</script>";
          } 
            //ID Mencari error coding
          else if(!$result){
              die ("query gagal dijalankan: ".mysqli_errno($mysqli).
              " - ".mysqli_error($mysqli));
          } 
          else {
              //sesuaikan window.location'../folder penyimpanan view/file view.php'
              echo "<script>alert('Data Berhasil Ditambah.');window.location='../view/viewpelanggan.php';</script>";
          }
}



   
?>