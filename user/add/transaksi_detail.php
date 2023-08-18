<!-- KONEKSI -->
<?php
    include('../koneksi.php');
    
?>
<!-- Cek Status Login -->
<?php

session_start();
// if($_SESSION['username'] = !['username'])
$_SESSION['status'] !="user";
if($_SESSION['status'] !="user")
{
    header("location:../../index.php");
}
else if($_SESSION['status'] =="")
{
    header("location:../../index.php");
}
else

?>
<?php

    // session_start();
    // if(!isset($_SESSION['username']))
    // {
    //     header('location:../login.php');
    //     exit();
    // }


    // $query="SELECT tbt.*, tbp.namalengkap FROM tb_transaksi tbt
    // LEFT JOIN tb_pelanggan tbp ON tbp.idpelanggan = tbt.idpelanggan
    // WHERE tbt.idtransaksi='$idtransaksi'";
    // $result = mysqli_query($mysqli, $query);
    // if(!$result){
    //     die("Query error: ".mysqli_errno($mysqli).
    //     " - ".mysqli_error($mysqli));
    // }
    $idtransaksi = $_GET['idtransaksi'];
    $query = "SELECT tbt.*, tbp.namalengkap, tbk.namakaryawan FROM tb_transaksi tbt
    LEFT JOIN tb_karyawan tbk on tbt.idpelanggan = tbk.idkaryawan
    LEFT JOIN tb_pelanggan tbp on tbt.idpelanggan = tbp.idpelanggan
    WHERE tbt.idtransaksi = $idtransaksi";
    $result = mysqli_query($mysqli, $query);
    if(!$result){
    die ("Query Error: ".mysqli_errno($mysqli).
    " - ".mysqli_error($mysqli));
    }
    $datatransaksi = mysqli_fetch_assoc($result);
?>
<!-- KONEKSI SELESAI -->

<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/dfea1d4379.js" crossorigin="anonymous"></script>
    <title>Detail Transaksi</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    
    <style>
            select{
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            border-radius:2px;
            outline:none;
            margin-top:3px;
            margin-bottom:3px;
    }
a{text-decoration:none;
    }

.topnav {
  background-color: #333;
  overflow: hidden;
}
.topnav a:hover {
  color: white;
}
.topnav2 {
  font-weight: bold;
  color: white;
}
.btn-sm{
    width: 100%;
}
.navbar-brand
{
	font-family:"agency FB";
    font-size: 24px;
}
.bg-dark
{
    color: white;
}
h2 {
  font-weight: 500;
}
.btn-sm.sus{
    width: 7%;
}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-dark bg-dark" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <a href="../../user.php">Home</a>
            <a href="../view/viewpelanggan.php">Pelanggan</a>
            <a  class="topnav2" href="../view/viewtransaksi.php">Transaksi</a>
            <space></space>
            <space></space>
            <space></space>
            <space></space>
            <a href="../view/viewtransaksi.php"><button type="button" class="btn btn-danger">&nbsp;BACK&nbsp;<i class="fas fa-sign-out-alt"></i></button></a>
    
    </div>

        <table height="50px" width="100%">
            <tr><td width="26px"></td>
                <td align="left">
                <button class="btn btn-sm sus btn-dark" disabled>USER</button>
            </td><td width="1%"></td>
        </tr>
        </table>
</nav>
    <!-- NAVBAR SELESAI -->

    <br/><br/>
        <div class="container mt-5">
		<div class="row">
			<div class="col-1">
			</div>
		<div class="col-11 mt-4">
        <h2>Data  Detail Transaksi Penjualan</h2><br>
        <table class="table table-bordered">
                <td>Tanggal transaksi</td>
                <td><?php echo $datatransaksi["tgltransaksi"]; ?></td>
                <tr>
                    <td>Pelanggan</td>
                    <td><?php echo $datatransaksi["namalengkap"]; ?></td>
                </tr>
                <tr>
                    <td>Kategori Pelanggan</td>
                    <td><?php echo $datatransaksi["kategoripelanggan"]; ?></td>
                </tr>
            </table>
        <table class="table">
        <thead class="table bg-dark">
            
            <tr>
                <th width="100px" align="center">Action</th>
                <th>&nbsp; Nama Menu</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Total Harga</th> 
            </tr>
        </thead>
            <!-- PHP -->
            <tbody>
                 <?php
                    $queryc = "SELECT tbt.*, tbo.namamenu FROM tb_detail_transaksi tbt
                    LEFT JOIN tb_menu tbo on tbt.idmenu = tbo.idmenu WHERE tbt.idtransaksi='$idtransaksi'";
                    $results = mysqli_query($mysqli, $queryc);
                    if(!$results){
                        die("Query error: ".mysqli_errno($mysqli).
                        " - ".mysqli_error($mysqli));
                    }
                    while($row = mysqli_fetch_assoc($results)){
                ?>                                   
                    <tr>
                    <td align="center">
                        <a href="../delete/deletenamamenu.php?iddetailtransaksi=<?php echo $row['iddetailtransaksi']; ?>&idtransaksi=<?php echo $row['idtransaksi']; ?>"
                            onclick="return confirm('anda yakin akan membatalkan pembelian ini?')">
                            <button class="btn btn-secondary btn-sm">Batal</button></a>
                    </td>

                        <td>&nbsp; <?php echo $row['namamenu']; ?></td>
                        <td>Rp. <?php echo number_format($row['hargasatuan'],0,',','.'); ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td>Rp. <?php echo number_format($row['totalharga'],0,',','.'); ?></td>

                    </tr>
                <?php
                }
                ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>
                            Grand total
                        </td>
                        <td></td>
                        <td></td>
                        <td>Rp.
                        <?php
                            $query="SELECT totalharga FROM tb_detail_transaksi WHERE idtransaksi='$idtransaksi'";
                            $result = mysqli_query($mysqli, $query);
                            if(!$result){
                                die("Query error: ".mysqli_errno($mysqli).
                                " - ".mysqli_error($mysqli));
                            }
                            $grandtotal=0;
                            while($row= mysqli_fetch_assoc($result)){
                                $grandtotal=$grandtotal+$row["totalharga"];
                            }
                            echo number_format($grandtotal,0,',','.'); 
                            
                        ?></td>
                    </tr>
                </tfoot>
                <!-- PHP SELESAI -->
        </table>
                    <!-- FORM INSERT -->
                    <?php if(isset($_GET["input_menu"])){?>
                    <form action="proses_transaksi.php" method="POST">
                    <div class="row mb-2">
                    <input type="hidden" name="insert_detail_transaksi" value="A">
                    <input type="hidden" name="idtransaksi" value="<?= $idtransaksi?>">
                    <label for="inputText3" class="col-sm-2 col-form-label">Nama Menu</label>
                    <div class="col-sm-5">
                        <select name="idmenu">
                            <option disabled selected>Pilih Menu</option>
                            <?php
                            $query = "SELECT * FROM tb_menu";
                            $result = mysqli_query($mysqli, $query);
                            if(!$result){
                                die("Query error: ".mysqli_errno($mysqli).
                                " - ".mysqli_error($mysqli));
                            }
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?= $row['idmenu'] ?>"><?= $row['namamenu']?>    ||   Rp.<?php echo number_format($row['hargajual'],0,',','.'); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputText3" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-5">
                            <input type="number" min="1" name="jumlah" class="form-control" id="inputText3" Required="">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div>
                            <br/>
                            <td><button type="submit" name="Submit" value="Tambah" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<i class="fas fa-shopping-basket">&nbsp; </i> &nbsp;Beli&nbsp;&nbsp;&nbsp;</button></td>
                            <td><a href="transaksi_detail.php?idtransaksi=<?= $idtransaksi;?>&input_bayar=true" type="submit" name="Selanjutnya" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-calculator">&nbsp; </i> &nbsp;Hitung Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td> 
                        </div>
                    </div>
                </form>
                <?php } ?>
            <!-- FORM INSERT SELESAI -->
            <!-- FORM BAYAR -->
            <?php if(isset($_GET["input_bayar"])){?>
                    <form action="proses_transaksi.php" method="POST">
                    <div class="row mb-2">
                    <input type="hidden" name="simpan_transaksi" value="A">
                    <input type="hidden" name="idtransaksi" value="<?= $idtransaksi?>">
                    <label for="inputText3" class="col-sm-2 col-form-label">Total Bayar</label>
                    <div class="col-sm-5">
                        <input type="text" name="totalbayar" readonly class="form-control setabil" value="<?php echo $grandtotal; ?>">        
                    </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputText3" class="col-sm-2 col-form-label">Bayar</label>
                        <div class="col-sm-5">
                            <input type="number" name="bayar" class="form-control" id="inputText3">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div>
                            <br/>
                            <td><a href="transaksi_detail.php?idtransaksi=<?= $idtransaksi;?>&input_menu=true" type="submit" name="Selanjutnya" class="btn btn-primary">&nbsp;&nbsp;&nbsp;<i class="fas fa-sign-out-alt">&nbsp; </i> &nbsp;Kembali&nbsp;&nbsp;&nbsp;</a></td>
                            <td><button type="submit" name="Selanjutnya" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-cash-register">&nbsp; </i> &nbsp;Bayar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></td> 
                        </div>
                    </div>
                </form>
                <?php } ?>
            <!-- FORM BAYAR SELESAI -->
            <!-- VIEW KEMBALIAN -->
            <?php 
            if(!isset($_GET["input_bayar"])){
                if(!isset($_GET["input_menu"])){
            ?>
                    <table class="table table-bordered">
                        <td>Total Bayar</td>
                        <td>Rp. <?php echo number_format($datatransaksi["totalbayar"],0,',','.'); ?></td>
                        <tr>
                            <td>Bayar</td>
                            <td>Rp. <?php echo number_format($datatransaksi["bayar"],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td>Kembali</td>
                            <td>Rp. <?php echo number_format($datatransaksi["kembali"],0,',','.'); ?></td>
                        </tr>
                    </table>
                    <div class="row mb-2">
                        <div>
                            <td><a href="transaksi_detail.php?idtransaksi=<?= $idtransaksi;?>&input_menu=true" type="submit" name="Selanjutnya" class="btn btn-primary">Tambah</a></td>
                            <td><a href="../view/viewtransaksi.php" name="Selanjutnya" class="btn btn-primary">Selesai</a></td>
                            <td><a href="../cetak/laporan_transaksi_detail.php?idtransaksi=<?= $idtransaksi;?>" type="submit" name="Selanjutnya" class="btn btn-primary">Cetak</a></td>
                            <!-- <a href="../cetak/laporan_transaksi_detail.php?idtransaksi=<?= $row['idtransaksi']; ?>">
                            <button class="btn btn-primary">Cetak</button></a> -->
                        </div>
                    </div>
                    <?php }
                    } ?>
            <!-- VIEW KEMBALIAN SELESAI -->
            <!-- ACTION PHP -->
            <br/><br/><br/><br/><br/>
            <?php
                 if(isset($_POST['Submit'])) {
					$idmenu = $_POST['idmenu'];
                    $hargasatuan = $_POST['hargasatuan'];
					$totalharga = $_POST['totalharga'];
							
					// Insert user data into table
					$result = mysqli_query($mysqli, "INSERT INTO tb_detail_transaksi(idmenu,hargasatuan,totalharga) 
                    VALUES('$idmenu','$hargasatuan','$totalharga')");
				}
			?>
<!-- ACTION PHP SELESAI -->
        
            </div>
            </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>
</html>