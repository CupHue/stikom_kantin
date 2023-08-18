<!-- KONEKSI -->
<?php
    include('../koneksi.php');
    // session_start();
    // if(!isset($_SESSION['username']))
    // {
    //     header('location:../login.php');
    //     exit();
    // }
?>
<!-- KONEKSI SELESAI -->

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

<html>
    <head>
    <title>view transaksi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
    <!-- CSS W3Css -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    </head>
    
    <style>
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
th
{
    color: white;
}
h2 {
  font-weight: 500;
}
.btn-sm.sus{
    width: 7%;
}
.w3-animate-opacity{animation:opac 1s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-top{position:relative;animation:animatetop 1s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-dark bg-dark w3-animate-top" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM APOTEK</b></a>
            <a href="../../user.php">Home</a>
            <a href="viewpelanggan.php">Pelanggan</a>
            <a  class="topnav2" href="viewtransaksi.php">Transaksi</a>
            <space></space>
            <space></space>
            <space></space>
            <space></space>
    <a href="../logout.php"><button type="button" class="btn btn-outline-primary" onclick="return confirm('anda yakin ingin logout?')">Logout</button></a>
    
    </div>

        <table height="50px" width="100%" class="w3-animate-top">
            <tr><td width="26px"></td>
                <td align="left">
                <button class="btn btn-sm sus btn-dark" disabled>USER</button>
            </td><td width="1%"></td>
        </tr>
        </table>
</nav>
    <!-- NAVBAR SELESAI -->
    
    <br/><br/><br/>
    <div class="container mt-5 w3-animate-bottom w3-animate-opacity">
		<div class="row">
			<div class="col-1">
			</div>
            
        <h2>Data Transaksi Penjualan</h2>
        <br/><br/><br/>


        <table class="table hover" id="myTable">
        <thead>
        <tr class='myclass bg-dark'>
            <th>ID Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Transaksi</th>
            <th>Katagori Pelanggan</th>
            <th>Total Bayar</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th width="105px">Action</th>
        </tr>
        </thead>
    

    <tbody>
        <?php
        $query = "SELECT tbt.*, tbp.namalengkap, tbk.namakaryawan FROM tb_transaksi tbt
                   LEFT JOIN tb_karyawan tbk on tbt.idpelanggan = tbk.idkaryawan 
                   LEFT JOIN tb_pelanggan tbp on tbt.idpelanggan = tbp.idpelanggan
                   ORDER BY idtransaksi ASC";
        $result = mysqli_query($mysqli, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($mysqli).
                " - ".mysqli_error($mysqli));
        }
        while($row = mysqli_fetch_assoc($result))
        {
        ?>

            <tr>
                <td align="center">
                    <?php echo $row['idtransaksi']; ?></td>
                <td><?php echo $row['namalengkap']; ?></td>


                <td><?php echo $row['namakaryawan']; ?></td>



                <td><?php echo $row['tgltransaksi']; ?></td>
                <td><?php echo $row['kategoripelanggan']; ?></td>

                <td>Rp.<?php echo number_format($row['totalbayar'],0,',','.'); ?></td>
                <td>Rp.<?php echo number_format($row['bayar'],0,',','.'); ?></td>
                <td>Rp.<?php echo number_format($row['kembali'],0,',','.'); ?></td>
                <td align="center">

                    <a href="../add/transaksi_detail.php?idtransaksi=<?= $row['idtransaksi']; ?>">
                    <button class="btn btn-primary btn-sm">Detail Transaksi</button></a>

                     <!-- | --><br/>

                    <a href="../delete/deletetransaksi.php?idtransaksi=<?php echo $row['idtransaksi']; ?>"
                            onclick="return confirm('anda yakin akan menghapus data ini?')">
                            <button class="btn btn-secondary btn-sm">&nbsp;Hapus</button></a>

                </td>
            </tr>

        <?php
        }
        ?>

    </tbody>
    </table>
	</div>
    <br/>
    <a href="../add/transaksi.php"><button class="btn btn-primary">Tambah</button></a>
    <a href="../cetak/laporan_transaksi.php"><button class="btn btn-primary">Cetak</button></a>
<!-- CONTENT SELESAI-->

    



 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script scr="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

    <script> 
        $(document).ready( function () {
            let dataTable=<?php echo json_encode($result ->fetch_all()) ?>;
            

            $('#myTable').DataTable();
            $('.Table').DataTable();


        } );
    </script> 

<br/><br/><br/><br/><br/><br/><br/><br/><br/>    
</body>
</html>

