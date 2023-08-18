<?php
include '../koneksi.php';
$idtransaksi = $_GET['idtransaksi'];
$iddetailtransaksi = $_GET["iddetailtransaksi"];
// mengambil id yang akan dihapus 

    // jalankan query DELETE untuk menghapus data 
    $query = "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi='$iddetailtransaksi'";
    $hasil_query = mysqli_query($mysqli, $query);

    // periksa query, apakah ada kesalahan 
    if(!$hasil_query) {
        die ("Gagal Menghapus Data: ".mysqli_errno($mysqli));
    } else {    // pastikan window.location mengarah ke file view yang kalian gunakan untuk memastikan data sudah terhapus atau belum 
        echo "<script>alert('Pembelian telah dibatalkan.');window.location='../add/transaksi_detail.php?idtransaksi=$idtransaksi&input_menu=true';</script>";
    }
?>