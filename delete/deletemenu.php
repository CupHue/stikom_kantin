<?php
include '../koneksi.php';
$idmenu = $_GET["idmenu"];
// mengambil id yang akan dihapus 

    // jalankan query DELETE untuk menghapus data 
    $query = "DELETE FROM tb_menu WHERE idmenu='$idmenu'";
    $hasil_query = mysqli_query($mysqli, $query);

    // periksa query, apakah ada kesalahan 
    if(!$hasil_query) {
        die ("Gagal Menghapus Data: ".mysqli_errno($mysqli));
    } else {    // pastikan window.location mengarah ke file view yang kalian gunakan untuk memastikan data sudah terhapus atau belum 
        echo "<script>alert('Data Berhasil Di Hapus.');window.location='../view/viewmenu.php';</script>";
    }
?>