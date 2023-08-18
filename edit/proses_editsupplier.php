<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

    // membuat variabel untuk menampung data dari form 
    $idsupplier      = $_POST['idsupplier'];
    $perusahaan       = $_POST['perusahaan'];
    $telpon           = $_POST['telpon'];
    $alamat           = $_POST['alamat'];
    $keterangan       = $_POST['keterangan'];

                // jalankan query UPDATE berdasarkan id pelanggan yg diedit
                $query = "UPDATE tb_supplier SET perusahaan = '$perusahaan', telpon = '$telpon', alamat = '$alamat', keterangan = '$keterangan'";
                $query .= "WHERE idsupplier = '$idsupplier'";
                $result = mysqli_query($mysqli, $query);
                // periksa query apakah ada error 
                    if(!$result){
                        die ("Querry Gagal Dijalankan: ".mysqli_errno($mysqli).
                            " - ".mysqli_error($mysqli));
                    } else {
                        // tampil alert dan akan redirect ke halaman index.php
                        // silahkan ganti index.php sesuai halaman yang akan dtuju 
                        echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewsupplier.php';</script>";
                    }
?>