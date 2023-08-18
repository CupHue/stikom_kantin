<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

    // membuat variabel untuk menampung data dari form 
    $idkaryawan       = $_POST['idkaryawan'];
    $namakaryawan     = $_POST['namakaryawan'];
    $alamat           = $_POST['alamat'];
    $telpon           = $_POST['telpon'];


                // jalankan query UPDATE berdasarkan id pelanggan yg diedit
                $query  = "UPDATE tb_karyawan SET namakaryawan = '$namakaryawan', alamat = '$alamat', telpon = '$telpon'";
                $query .= "WHERE idkaryawan = '$idkaryawan'";
                $result = mysqli_query($mysqli, $query);
                // periksa query apakah ada error 
                    if(!$result){
                        die ("Querry Gagal Dijalankan: ".mysqli_errno($mysqli).
                            " - ".mysqli_error($mysqli));
                    } else {
                        // tampil alert dan akan redirect ke halaman index.php
                        // silahkan ganti index.php sesuai halaman yang akan dtuju 
                        echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewkaryawan.php';</script>";
                    }
?>