<?php
include "../koneksi.php";
// session_start()

if(isset($_POST['input_kategori_pelanggan'])) {
    $kategoripelanggan = $_POST['kategoripelanggan'];
    header("location: transaksi.php?kategoripelanggan=$kategoripelanggan");
}
if(isset($_POST['insert_transaksi'])){
    $idtransaksi    =$_POST['idtransaksi'];
    // $idkasir        =$_SESSION['idkaryawan'];
    $tgltransaksi   =$_POST['tgltransaksi'];
    $kategoripelanggan  =   $_POST['kategoripelanggan'];

    validasiIdTransaksi($mysqli, $idtransaksi);

    if(isset($_POST['idpelanggan'])){
        $idpelanggan    = $_POST['idpelanggan'];
        $query= "INSERT INTO tb_transaksi (idtransaksi, idpelanggan, tgltransaksi, kategoripelanggan)
                 VALUES ('$idtransaksi','$idpelanggan','$tgltransaksi','$kategoripelanggan')";
    }
    else {
        $query= "INSERT INTO tb_transaksi (idtransaksi, idpelanggan, tgltransaksi, kategoripelanggan)
        VALUES ('$idtransaksi', null,'$tgltransaksi','$kategoripelanggan')";
    }

    $result = mysqli_query($mysqli, $query);
    $idbaru = $mysqli->insert_id;

    if($result){
        header("location: transaksi_detail.php?idtransaksi=".$idbaru."&input_menu=true");
    }
    else showErrorMessage($mysqli);
}
if(isset($_POST['insert_detail_transaksi'])){
    $idtransaksi =$_POST['idtransaksi'];

    insertDetailTransaksi($mysqli);
    header("location: transaksi_detail.php?idtransaksi=$idtransaksi&input_menu=true");
}
if(isset($_POST['input_bayar'])){
    $idtransaksi    =$_POST['idtransaksi'];
    $tgltransaksi   =$_POST['tgltransaksi'];
    $idpelanggan    =$_POST['idpelanggan'];
    $kategoripelanggan =$_POST['kategoripelanggan'];

    insertDetailTransaksi($mysqli);
    header("location: transaksi_detail.php?idtransaksi=$idtransaksi&input_bayar=true");
}

if(isset($_POST['simpan_transaksi'])){
    // $idtransaksi    =$_POST['idtransaksi'];
    // $tgltransaksi   =$_POST['tgltransaksi'];
    // $idpelanggan    =$_POST['idpelanggan'];
    // $kategoripelanggan  =$_POST['kategoripelanggan'];
    $idtransaksi    =$_POST['idtransaksi'];
    $bayar          =$_POST['bayar'];
    $totalbayar     =getTotalBayar($mysqli, $idtransaksi);
    $kembali        =(float)$bayar - (float)$totalbayar;

    validasiJumlahBayar($bayar, $totalbayar, $idtransaksi);
    $query  ="UPDATE tb_transaksi SET totalbayar='$totalbayar', bayar='$bayar', kembali='$kembali'
              WHERE idtransaksi='$idtransaksi'";
    $result =mysqli_query($mysqli, $query);

    if($result){
        header("location: transaksi_detail.php?idtransaksi=$idtransaksi");
    }
    else showErrorMessage($mysqli);
}

function validasiIdTransaksi($mysqli, $idtransaksi){
    if(strlen($idtransaksi) > 5){
        echo "<script>
        location.href='transaksi.php';
        alert('ID Transaksi Maksimal 5 karakter!')</script>";
    }

    $query  ="SELECT * FROM tb_transaksi WHERE idtransaksi='$idtransaksi'";
    $id_tersedia = mysqli_num_rows(mysqli_query($mysqli, $query)) != 0;

    if($id_tersedia){
        $kategoripelanggan = $_POST['kategoripelanggan'];
        echo "<script>location:href='transaksi.php';
        alert('ID Transaksi telah digunakan!');window.location='../add/transaksi.php?kategoripelanggan=$kategoripelanggan&input_katagori_pelanggan=';</script>";
    }
}
function getHargaSatuanMenu($mysqli, $idmenu){
    $query = "SELECT * FROM tb_menu WHERE idmenu = $idmenu";
    return mysqli_fetch_assoc(mysqli_query($mysqli, $query))['hargajual'];
}
function showErrorMessage($mysqli){
    die("Query gagal dijalankan: ".mysqli_errno($mysqli).
    " - ".mysqli_error($mysqli));
}
function insertDetailTransaksi($mysqli){
    $idtransaksi    =$_POST['idtransaksi'];

    if(isset($_POST['idmenu']) && isset($_POST['jumlah'])){
        $idmenu     =$_POST['idmenu'];
        $jumlah     =$_POST['jumlah'];
        $hargasatuan=getHargaSatuanMenu($mysqli, $idmenu);
        $totalharga =(float)$jumlah * (float)$hargasatuan;

        validasiKetersediaanStokMenu($mysqli, $idtransaksi,$idmenu,$jumlah);

        $query = "INSERT INTO tb_detail_transaksi (idtransaksi, idmenu, jumlah, hargasatuan, totalharga)
                  VALUES ('$idtransaksi', '$idmenu', '$jumlah', '$hargasatuan','$totalharga')";
        $result= mysqli_query($mysqli, $query);

        updateStokMenu($mysqli, $idmenu, $jumlah);
        
        if(!$result) showErrorMessage($mysqli);
    }
}
function updateStokMenu($mysqli, $idmenu,$jumlah){
    $query = "UPDATE tb_menu SET stok_menu = (SELECT stok_menu WHERE idmenu = '$idmenu') - $jumlah
            WHERE idmenu = '$idmenu'";
    $result = mysqli_query($mysqli, $query);
    if(!$result) showErrorMessage($mysqli);
}
function getTotalBayar($mysqli, $idtransaksi){
    $query  =   "SELECT * FROM tb_detail_transaksi WHERE idtransaksi = '$idtransaksi'";
    $result= mysqli_query($mysqli, $query);
    $total_bayar=0;
    while($data = mysqli_fetch_assoc($result)){
        $total_bayar += $data['totalharga'];
    }
    return $total_bayar;
}
function validasiJumlahBayar($bayar, $totalbayar,$idtransaksi){
    if($bayar < $totalbayar){
        echo "<script>
        location.href='transaksi_detail.php?idtransaksi=$idtransaksi&input_bayar=true';
        alert('Jumlah bayar tidak mencukupi!');
        </script>";
        die;
    }
}
function validasiKetersediaanStokMenu($mysqli,$idtransaksi,$idmenu,$jumlah){
    $query = "SELECT * FROM tb_menu WHERE idmenu = '$idmenu'";
    $stok  = mysqli_fetch_assoc(mysqli_query($mysqli, $query))['stok_menu'];
    if($stok < $jumlah){
        echo "<script>
        location.href='transaksi_detail.php?idtransaksi=$idtransaksi&input_menu=true';
        alert('Stok menu tidak mencukupi!');
        </script>";
        die;
    }
}
?>