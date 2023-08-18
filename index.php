<?php
session_start();
?>

<html>
<head>
	<title>KANTIN : LOGIN</title>
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
<style type="text/css">
a{text-decoration:none;

    }
.white{
  color: white;
}
.white a:hover {
  color: blue;
}

.topnav {
  background-color: #333;
  overflow: hidden;
}
.topnav a:hover {
  color: blue;
}
.topnav2 {
  font-weight: bold;
  color: black;
}
.navbar-brand
{
	font-family:"agency FB";
    font-size: 24px;
}
input {
  height: 30px;
  width: 100%;
}
#cotax
{
	height: 450px;
	width:600px;
    overflow: hidden;
	margin:5% auto 5% auto;
    background: #fff;
    box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
    border-radius: 18px;
}
#hero .icon-box {
  padding: 40px 35px;
  position: relative;
  overflow: hidden;
  background: #fff;
  box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 1);
  transition: all 0.3s ease-in-out;
  border-radius: 8px;
  z-index: 1;
}
</style>
<body>

<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="topnav navbar fixed-top navbar-dark bg-primary">
    <div class="container-fluid" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <!-- <a class="white" href="welcome.php">Home</a>
            <a class="white" href="view/viewkaryawan.php">Karyawan</a>
            <a class="white" href="view/viewpelanggan.php">Pelanggan</a>
            <a class="white" href="view/viewsupplier.php">Supplier</a>
            <a class="white" href="view/viewmenu.php">Menu</a>
            <a class="white" href="view/viewtransaksi.php">Transaksi</a> -->
    <button class="btn btn-outline-light">Login</button>
    
    </div>
    </nav>
    <!-- NAVBAR SELESAI -->


    <br>
        <div class="container mt-3">
		<div class="row">
			<div class="col-1">
			</div>
		<div class="col-10 mt-4">
        <br>

<div id="cotax">
<form action="login.php" method="POST">
<table align="center" width="50%">
  
	<td align="center">
    <br/><br/>
    <img src="logoitbstikombali.png" width="100px">
    <br/><br/><br/>
    </td>
    </td></tr>
    <tr><td>
    <font size="4" face="Trebuchet MS"><b>Username :</b></font>
    </td></tr>
    <tr><td>
    <input type="text" name="username" placeholder="" required>
    </td></tr>
        <tr><td>
        </td></tr>
    <tr><td>
    <font size="4" face="Trebuchet MS"><b>Password :</b></font>
    </td></tr>
    <tr><td>
    <input type="password" name="password" placeholder="" required>
    </td></tr>
    <tr><td align="right">
      <br/>
    <button type="submit" id="submit" name="submit" value="login" class="btn btn-primary">&nbsp;Login&nbsp;</button>
    </td></tr>
</table>
    
</form>
</div>
</div>
</div>
</div>

</body>
</html>
