<?php
  include '../koneksi.php';
?>

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

<!-- 
<!DOCTYPE html>
<html>
    <head>
        <title>Proses Tambah Pelanggan</title>

        <style type="text/css">
          * {
              font-family: "trebuchet MS";
          }
          h1 {
            text-transform: uppercase;
            color:salmon;
          }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }  
        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        div {
            width: 100%;
            height: auto;
        }

        </style>
    </head>


    <body>
        <center>
            <h1>Tambah Pelanggan</h1>
        </center> -->

                
<html>
    <head>
    <title>tambah pelanggan</title>
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

    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-light bg-light" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <a href="../welcome.php">Home</a>
            <a href="../view/viewlogin.php">Login</a>
            <a href="../view/viewkaryawan.php">Karyawan</a>
            <a class="topnav2" href="../view/viewpelanggan.php">Pelanggan</a>
            <a href="../view/viewsupplier.php">Supplier</a>
            <a href="../view/viewmenu.php">Menu</a>
            <a href="../view/viewtransaksi.php">Transaksi</a>
    <a href="../view/viewpelanggan.php"><button type="button" class="btn btn-secondary">&nbsp;&nbsp;BACK&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></button></a>
    </div>

        <table height="50px" width="100%">
            <tr><td width="26px"></td>
                <td align="left">
                <button class="btn btn-sm sus btn-light border" disabled><b>ADMIN</b></button>
            </td><td width="1%"></td>
        </tr>
        </table>
</nav>
    <!-- NAVBAR SELESAI -->

    <br>
        <div class="container mt-5">
		<div class="row">
			<div class="col-1">
			</div>
		<div class="col-10 mt-4">
        <h2>Proses Tambah Pelanggan</h2><br>
            
        <form method="POST" action="proses_addpelanggan.php" enctype="multipart/form-data" >
        <!-- <section class="base">
          <div>
              <label>Id Pelanggan</label>
              <input type="text" name="idpelanggan" required="" readonly="" value="sudah terisi otomatis" />
          </div>
          <div>
              <label>Nama Lengkap</label>
              <input type="text" name="namalengkap" autofocus="" required="" />
          </div>
          <div>
              <label>Alamat</label>
              <input type="text" name="alamat" required="" />
          </div>
          <div>
              <label>Telp</label>
              <input type="text" name="telp" />
          </div>
          <div>
              <label>usia</label>
              <input type="text" name="usia" />
          </div>
          <div>
              <label>Picture</label>
              <input type="file" name="picture" />
          </div>
          <div>
              <button type="submit">Simpan Data Pelanggan</button>
          </div>
        </section>     -->
        <section class="base">
        <table width="75%">
            <tr><td width="30%">
          <div>
              <label>ID Pelanggan</label></td><td>
              <input type="text" name="idpelanggan" placeholder=" HARUS UNIK - TIDAK BOLEH SAMA "  autofocus="" />
          </div>
            </td></tr>
            <tr><td>
          <div>
              <label>Nama Lengkap</label></td><td>
              <input type="text" name="namalengkap" required="" />
          </div>
            </td></tr>
            <tr><td>
          <div>
              <label>Alamat</label></td><td>
              <input type="text" name="alamat" required="" />
          </div>
            </td></tr>
            <tr><td>
          <div>
              <label>Telepon</label></td><td>
              <input type="text" name="telpon" required=""/>
          </div>
            </td></tr>
            <tr><td>
          <div>
              <label>Usia</label></td><td>
              <input type="number" name="usia" min="4" max="99" required=""/>
          </div>
            </td></tr>
            <tr><td>
          <div>
              <label>picture</label></td><td>
              <input type="file" name="Picture"/>
          </div>
            </td></tr>
            <tr><td>
          <div><br/>
            </td></tr>
            <tr><td>
              <button type="submit" class="btn btn-primary">Simpan Data Pelanggan</button>
          </div>
          </td></tr>
        </table>
        </section>
        </form>

        
    </body>
</html>