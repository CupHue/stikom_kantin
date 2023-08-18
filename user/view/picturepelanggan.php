<?php
    // memanggil file koneksi.php untuk membuat koneksi 
include '../koneksi.php';

    // mengecek apakah di url ada nilai GET id 
    if (isset($_GET['idpelanggan'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $idpelanggan = ($_GET["idpelanggan"]);

        // menampilkan data dari database yang mempunyai idpelanggan=$idpelanggan
        $query = "SELECT * FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'";
        $result = mysqli_query($mysqli, $query);

        // jika data gagal diambil maka akan tampil error berikut 
        if(!$result){
            die ("Querry Error: ".mysqli_errno($mysqli).
        " - ".mysqli_error($mysqli));
        }

        // mengambil data dari database 
        $data = mysqli_fetch_assoc($result);
            // apabila data tidak ada pada database maka akan dijalankan perintah ini 
            if (!count($data)) {
                echo "<script>alert('Data Tidak Di Temukan Pada Database.');window.location='../view/viewpelanggan.php';</script>";
            }
    } else {
        // apabila tidak ada data GET id , akan di redirect ke viewpelanggan.php
        echo "<script>alert('Masukan Data Id.');window.location='../view/viewpelanggan.php';</script>";
    }
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


<!-- FORM UNTUK EDIT DATA PELANGGAN -->
       
<html>
    <head>
    <title>picture</title>
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
input {
            width: 100%;
            height: 30px;
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
.shadowimg
{
    box-shadow: 2px 2px 13px 1px rgba(18, 66, 150, 1);
    margin-bottom: 20px;
    margin-top: 20px;
}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-dark bg-dark w3-animate-top" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM MENU</b></a>

    <table>
        <tr><td>
    <a href="javascript:window.print()"><button type="button" class="btn btn-secondary">&nbsp;&nbsp;PRINT&nbsp;&nbsp;<i class="fas fa-print"></i></button></a>
        </td>
        <td>&nbsp;</td>
        <td>
    <a href="../view/viewpelanggan.php"><button type="button" class="btn btn-danger">&nbsp;BACK&nbsp;<i class="fas fa-sign-out-alt"></i></button></a>
        </td></tr>
    </table>
    
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

    </br></br>
        <div class="container mt-5">
		<div class="row">
		<div class="col-10 mt-4">
        <h2>picture : <?php echo $data['namalengkap']; ?></h2><br>
 
        <table width="700px"><tr><td>
        <IMG class="shadowimg" src="../../pict/<?php echo $data['picture']; ?>" alt="picture" style="width: 100%;float: left; margin-bottom: 10px;"/>   
        <br/><br/>
                <i style="float: left;font-size: 21px;color: blue"><?php echo $data['picture']; ?></i>
        </td></tr></table>
        </div>
        </div>
        </div>
        </div>

        </br></br>

    </body>
</html>