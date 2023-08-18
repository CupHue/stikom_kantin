<?php 

include_once("koneksi.php");

// mengambil data login
$data_login = mysqli_query($mysqli,"SELECT * FROM tb_login");
$jumlah_login = mysqli_num_rows($data_login);

// mengambil data karyawan
$data_karyawan = mysqli_query($mysqli,"SELECT * FROM tb_karyawan");
$jumlah_karyawan = mysqli_num_rows($data_karyawan);

// mengambil data pelanggan
$data_pelanggan = mysqli_query($mysqli,"SELECT * FROM tb_pelanggan");
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);

// mengambil data supplier
$data_supplier = mysqli_query($mysqli,"SELECT * FROM tb_supplier");
$jumlah_supplier = mysqli_num_rows($data_supplier);

// mengambil data menu
$data_menu = mysqli_query($mysqli,"SELECT * FROM tb_menu");
$jumlah_menu = mysqli_num_rows($data_menu);

// mengambil data transaksi
$data_transaksi = mysqli_query($mysqli,"SELECT * FROM tb_transaksi");
$jumlah_transaksi = mysqli_num_rows($data_transaksi);

?>

<!-- Cek Status Login -->
<?php

session_start();
// if($_SESSION['username'] = !['username'])
$_SESSION['status'] !="user";
if($_SESSION['status'] !="user")
{
    header("location:index.php");
}
else if($_SESSION['status'] =="")
{
    header("location:index.php");
}
else

?>

<html>
    <head>
        <title>KANTIN : MENU</title>
    </head>
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
    <script src="https://kit.fontawesome.com/54fab0f33e.js" crossorigin="anonymous"></script>
    <style type="text/css">
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
.navbar-brand
{
	font-family:"agency FB";
    font-size: 24px;
}
input {
  width: 100%;
}
.bolding
{
  font-weight: 500;
}
#hero {
  width: 100%;
  position: relative;
  background-size: cover;
  position: relative;
}

#hero:before {
  content: "";
  background: rgba(255, 255, 255, 0.8);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#hero .container {
  width: 100%;
}

#hero h1 {
  margin: 0;
  font-size: 56px;
  font-weight: 700;
  line-height: 72px;
  color: #124265;
  font-family: "Poppins", sans-serif;
}

#hero h2 {
  color: #5e5e5e;
  margin: 10px 0 0 0;
  font-size: 22px;
}


#hero .icon-boxes {
  margin-bottom: 20px;
  width: 100%;
}

#hero .icon-box {
  padding: 40px 35px;
  position: relative;
  overflow: hidden;
  background: #1d2124;
  box-shadow: 0 0 12px 0 rgba(18, 66, 101, 1);
  transition: all 0.3s ease-in-out;
  border-radius: 8px;
  z-index: 1;
}

#hero .icon-box .title {
  margin-top: 10px;
  font-weight: 700;
  margin-bottom: 3px;
  font-size: 18px;
}

#hero .icon-box .title a {
  color: #2487ce;
  transition: 0.3s;
}

#hero .icon-box .description {
  font-size: 15px;
  line-height: 28px;
  margin-bottom: 0;
  color: #fff;
}

#hero .icon-box .icon {
  margin-bottom: 5px;
  padding-top: 5px;
  display: inline-block;
  transition: all 0.3s ease-in-out;
  font-size: 36px;
  line-height: 1;
  color: #1E90FF;
}

#hero .icon-box:hover {
  transform: scale(1.08);
}

#hero .icon-box:hover .title a {
  color: #00BFFF;
}
.w3-animate-left{position:relative;animation:animateleft 1.5s}@keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
    </style>
<body>

<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="topnav navbar fixed-top navbar-dark bg-dark">
    <div class="container-fluid W3-animate-left" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <a class="topnav2" href="user.php">Home</a>
            <a href="user/view/viewpelanggan.php">Pelanggan</a>
            <a href="user/view/viewtransaksi.php">Transaksi</a>
            <space></space><space></space><space></space><space></space>
    <a href="logout.php"><button type="button" class="btn btn-outline-primary" onclick="return confirm('anda yakin ingin logout?')">logout</button></a>
    
    </div>
    </nav>
    <!-- NAVBAR SELESAI -->
    <div class="container mt-5">
		<div class="row">
			<!-- <div class="col-1">
			</div> -->
		<div class="col-10 mt-4">
      <table border="0" class="bolding W3-animate-left">
        <tr><td>
        <font size="3"><i>Welcome</i>
        <?php
        //  echo $_SESSION['iniusername']; 
        ?>
      </font><br>
        </td></tr>
        <tr><td>
        <h1>USER</h1><br>
        <tr><td>
      </table>
    </div>

  <br/>
  <br/>
  <br/>

     <!-- ======= Hero Section Bottom ======= -->
     <table border="0" class="W3-animate-left">        <tr><td>
     <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
      </div>
      
      <div class="row icon-boxes button">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
          <div class="icon"><i class="far fa-user"></i></div>
            <h4 class="title"><a href="">Data Pelanggan</a></h4>
            <p class="description">
               Jumlah data pelanggan : <b><?php echo $jumlah_pelanggan; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
              <p align="right">
            <a href="user/view/viewpelanggan.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
              </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
          <div class="icon"><i class="far fa-address-card"></i></div>
            <h4 class="title"><a href="">Data Transaksi</a></h4>
            <p class="description">
               Jumlah data transaksi : <b><?php echo $jumlah_transaksi; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
              <p align="right">
            <a href="user/view/viewtransaksi.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
              </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
          <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <h4 class="title"><a href="">LAKUKAN TRANSAKASI</a></h4>
            <p class="description">
            Transaksi
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
</br>
</br>
</br>
              <p align="right">
            <a href="user/add/transaksi.php"><button type="button" class="btn btn-outline-primary">TRANSAKASI</button></a>
              </p>
          </div>
        </div>



      </div>
      
      
    </div>
  </section></td></tr></table><!-- End Hero -->
  

      <!-- <div class="col-1">
      </div> -->
	  </div>
  </div>


</body>
</html>