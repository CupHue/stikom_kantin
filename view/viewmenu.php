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
$_SESSION['status'] !="masuk";
if($_SESSION['status'] !="masuk")
{
    header("location:../index.php");
}
else if($_SESSION['status'] =="")
{
    header("location:../index.php");
}
else

?>

<html>
    <head>
    <title>view menu</title>
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
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/dfea1d4379.js" crossorigin="anonymous"></script>

    </head>
    
    <style>
a{text-decoration:none;
    }

.topnav {
  background-color: #333;
  overflow: hidden;
}
.topnav a:hover {
  color: black;
}
.topnav2 {
  font-weight: bold;
  color: black;
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
.btn-light.border{
	border: 24px;
}
.w3-animate-opacity{animation:opac 1s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-top{position:relative;animation:animatetop 1s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-light bg-light w3-animate-top" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <a href="../welcome.php">Home</a>
            <a href="viewlogin.php">Login</a>
            <a href="viewkaryawan.php">Karyawan</a>
            <a href="viewpelanggan.php">Pelanggan</a>
            <a href="viewsupplier.php">Supplier</a>
            <a class="topnav2" href="viewmenu.php">Menu</a>
            <a href="viewtransaksi.php">Transaksi</a>
    <a href="../logout.php"><button type="button" class="btn btn-outline-primary" onclick="return confirm('anda yakin ingin logout?')">Logout</button></a>
    
    </div>

        <table height="50px" width="100%" class="w3-animate-top">
            <tr><td width="26px"></td>
                <td align="left">
                <button class="btn btn-sm sus btn-light border" disabled><b>ADMIN</b></button>
            </td><td width="1%"></td>
        </tr>
        </table>
</nav>
    <!-- NAVBAR SELESAI -->

    <br/><br/><br/>
    <div class="container mt-5 w3-animate-opacity">
		<div class="row">
			<div class="col-1">
			</div>
        <h2>Data Menu</h2><br><br/><br/>
        
        
        <table class="table hover" id="myTable">
        <thead>
        <tr class='myclass bg-dark'>
            <th>ID Menu</th>
            <th>ID Supplier</th>
            <th>Nama Menu</th>
            <th>Kategori Menu</th>
            <th>Harga jual</th>
            <th>Harga Beli</th>
            <th>Stok Menu</th>           
            <th>Keterangan</th>
            <th width="105px">Action</th>
        </tr>
        </thead>
    

    <tbody>
        <?php
        $query = "SELECT tbo.*, tbs.idsupplier FROM tb_menu tbo LEFT JOIN tb_supplier tbs on tbo.idsupplier = tbs.idsupplier
                  ORDER BY idmenu ASC";
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
                    <?php echo $row['idmenu']; ?></td>
                <td align="center">
                    <?php echo $row['idsupplier']; ?></td>
                <td><?php echo $row['namamenu']; ?></td>
                <td><?php echo $row['kategorimenu']; ?></td>
                <td>Rp.<?php echo number_format($row['hargajual'],0,',','.'); ?></td>
                <td>Rp.<?php echo number_format($row['hargabeli'],0,',','.'); ?></td>
                <td><?php echo number_format($row['stok_menu'],0,',','.'); ?></td>
                <td><?php echo $row['keterangan']; ?></td>


                <td align="center">
                    <a href="../edit/editmenu.php?idmenu=<?= $row['idmenu']; ?>">
                    <button class="btn btn-primary btn-sm">Edit</button></a>
                     <!-- | --><br/>
                    <a href="../delete/deletemenu.php?idmenu=<?php echo $row['idmenu']; ?>"
                            onclick="return confirm('anda yakin akan menghapus data ini?')">
                            <button class="btn btn-secondary btn-sm">Hapus</button></a>
                </td>
            </tr>

        <?php
        }
        ?>

    </tbody>
    </table>
    </div>
    <a href="../add/addmenu.php"><button class="btn btn-primary">Tambah</button></a>
    <a href="../cetak/laporan_menu.php"><button class="btn btn-primary">Cetak</button></a>
	

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

<br/><br/><br/>
</body>
</html>

