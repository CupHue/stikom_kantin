<?php
    include('../koneksi.php');
    $idtransaksi = $_GET['idtransaksi'];
// mengambil id yang akan dihapus 

    // jalankan query DELETE untuk menghapus data 
    $query = "DELETE FROM tb_transaksi WHERE idtransaksi ='$idtransaksi'";
    $hasil_query = mysqli_query($mysqli, $query);

    // periksa query, apakah ada kesalahan 
    if(!$hasil_query) {
        die ("Gagal Menghapus Data: ".mysqli_errno($mysqli));
    } else {    // pastikan window.location mengarah ke file view yang kalian gunakan untuk memastikan data sudah terhapus atau belum 
        echo "<script>alert('Data Berhasil Di Hapus.');window.location='../view/viewtransaksi.php';</script>";
    }
?>
<?php
// include database connection file
// include('../koneksi.php');
 
// // Get id from URL to delete that user
// $idtransaksi = $_GET['idtransaksi'];
 
// // Delete user row from table based on given id
// $result = mysqli_query($mysqli, "DELETE FROM tb_transaksi WHERE idtransaksi=$idtransaksi");
 
// // After delete redirect to Home, so that latest user list will be displayed.

// echo "<script>alert('Data Berhasil Di Hapus.');window.location='../view/viewtransaksi.php';</script>";
// header("Location:'../view/viewtransaksi.php'");
?>