<?php
include '../koneksi.php';
$idpelanggan = $_GET["idpelanggan"];
// mengambil id yang akan dihapus 

    // jalankan query DELETE untuk menghapus data 
    $query = "DELETE FROM tb_pelanggan WHERE idpelanggan='$idpelanggan' ";
    $hasil_query = mysqli_query($mysqli, $query);

    // periksa query, apakah ada kesalahan 
    if(!$hasil_query) {
        die ("Gagal Menghapus Data: ".mysqli_errno($mysqli));
    } else {    // pastikan window.location mengarah ke file view yang kalian gunakan untuk memastikan data sudah terhapus atau belum 
        echo "<script>alert('Data Berhasil Di Hapus.');window.location='../view/viewpelanggan.php';</script>";
    }
?>