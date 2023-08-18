<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

    // membuat variabel untuk menampung data dari form 
    $idmenu       = $_POST['idmenu'];
    $idsupplier       = $_POST['idsupplier'];
    $namamenu         = $_POST['namamenu'];
    $kategorimenu     = $_POST['kategorimenu'];
    $hargajual        = $_POST['hargajual'];
    $hargabeli        = $_POST['hargabeli'];
    $stok_menu        = $_POST['stok_menu'];
    $keterangan       = $_POST['keterangan'];


                // jalankan query UPDATE berdasarkan id pelanggan yg diedit
                $query  = "UPDATE tb_menu SET idsupplier = '$idsupplier', namamenu = '$namamenu', kategorimenu = '$kategorimenu', hargajual = '$hargajual', hargabeli = '$hargabeli', stok_menu = '$stok_menu', keterangan = '$keterangan'";
                $query .= "WHERE idmenu = '$idmenu'";
                $result = mysqli_query($mysqli, $query);
                // periksa query apakah ada error 
                    if(!$result){
                        die ("Querry Gagal Dijalankan: ".mysqli_errno($mysqli).
                            " - ".mysqli_error($mysqli));
                    } else {
                        // tampil alert dan akan redirect ke halaman index.php
                        // silahkan ganti index.php sesuai halaman yang akan dituju 
                        echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewmenu.php';</script>";
                    }
?>