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

<?php

session_start();
// $_SESSION['iniusername'] = $username;
// $_SESSION['iniusername'] == $_POST["username"];
// if($_SESSION['username'] = !['username'])
$_SESSION['status'] !="masuk";
if($_SESSION['status'] !="masuk")
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
  color: black;
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
  width: 100%;
}
.btn-sm.sus{
    width: 7%;
}
.btn-light.border{
	border: 24px;
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
  background: #fff;
  box-shadow: 2px 2px 5px 0 rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease-in-out;
  border-radius: 8px;
  z-index: 1;
}

#hero .icon-box .title {
  font-weight: 700;
  margin-bottom: 3px;
  font-size: 18px;
}

#hero .icon-box .title a {
  color: #124265;
  transition: 0.3s;
}

#hero .icon-box .description {
  font-size: 15px;
  line-height: 28px;
  margin-bottom: 0;
}

#hero .icon-box .icon {
  margin-bottom: 20px;
  padding-top: 5px;
  display: inline-block;
  transition: all 0.3s ease-in-out;
  font-size: 36px;
  line-height: 1;
  color: #2487ce;
}

#hero .icon-box:hover {
  transform: scale(1.08);
}

#hero .icon-box:hover .title a {
  color: #2487ce;
}
.w3-animate-opacity{animation:opac 0.5s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-top{position:relative;animation:animatetop 1.5s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
.w3-animate-left{position:relative;animation:animateleft 1.5s}@keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
.w3-animate-right{position:relative;animation:animateright 1s}@keyframes animateright{from{right:-300px;opacity:0} to{right:0;opacity:1}}
.w3-animate-bottom{position:relative;animation:animatebottom 1.5s}@keyframes animatebottom{from{bottom:-300px;opacity:0} to{bottom:0;opacity:1}}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-light bg-light w3-animate-left" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM KANTIN</b></a>
            <a class="topnav2" href="welcome.php">Home</a>
            <a href="view/viewlogin.php">Login</a>
            <a href="view/viewkaryawan.php">Karyawan</a>
            <a href="view/viewpelanggan.php">Pelanggan</a>
            <a href="view/viewsupplier.php">Supplier</a>
            <a href="view/viewmenu.php">Menu</a>
            <a href="view/viewtransaksi.php">Transaksi</a>
            <a href="logout.php"><button type="button" class="btn btn-outline-primary" onclick="return confirm('anda yakin ingin logout?')">Logout</button></a>
    </div>
</nav>
    <!-- NAVBAR SELESAI -->
  <div class="container mt-5">
		<div class="row">
			<!-- <div class="col-1">
			</div> -->
		<div class="col-10 mt-4">
      <table border="0" class="bolding w3-animate-left">
        <tr><td>
        <font size="3"><i>Welcome</i>
        <?php
        //  echo $_SESSION['iniusername']; 
        ?>
      </font><br>
        </td></tr>
        <tr><td>
        <h1>ADMIN</h1><br>
        <tr><td>
      </table>
    </div>
      
      
   <!-- ======= Hero Section Top ======= -->
   <table border="0" class="w3-animate-left">        <tr><td>
   <section id="hero" class="d-flex align-items-center">
   <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
      </div>


      <div class="row icon-boxes button">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-users-cog"></i></div>
            <h4 class="title"><a href="">Data Login</a></h4>
            <p class="description">
               Jumlah data login : <b><?php echo $jumlah_login; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewlogin.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-id-badge"></i></div>
            <h4 class="title"><a href="">Data Karyawan</a></h4>
            <p class="description">
               Jumlah data karyawan : <b><?php echo $jumlah_karyawan; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewkaryawan.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-users"></i></div>
            <h4 class="title"><a href="">Data Pelanggan</a></h4>
            <p class="description">
               Jumlah data pelanggan : <b><?php echo $jumlah_pelanggan; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewpelanggan.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-truck-loading"></i></div>
            <h4 class="title"><a href="">Data Supplier</a></h4>
            <p class="description">
               Jumlah data supplier : <b><?php echo $jumlah_supplier; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewsupplier.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>

      </div>
      
      
    </div>
  </section></td></tr></table><!-- End Hero -->

  <br/>
  <br/>
  <br/>

     <!-- ======= Hero Section Bottom ======= -->
     <table border="0" class="w3-animate-left">        <tr><td>
     <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
      </div>
      
      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-briefcase-medical"></i></div>
            <h4 class="title"><a href="">Data Obat</a></h4>
            <p class="description">
               Jumlah data menu : <b><?php echo $jumlah_menu; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewmenu.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-address-card"></i></div>
            <h4 class="title"><a href="">Data Transaksi</a></h4>
            <p class="description">
               Jumlah data transaksi : <b><?php echo $jumlah_transaksi; ?></b>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </p>
            <a href="view/viewtransaksi.php"><button type="button" class="btn btn-outline-primary">VIEW</button></a>
          </div>
        </div>


        <div class="col-md-4 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
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
            <a href="add/transaksi.php"><button type="button" class="btn btn-outline-primary">TRANSAKASI</button></a>
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