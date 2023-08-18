<?php
    // memanggil file koneksi.php untuk membuat koneksi 
include '../koneksi.php';

    // mengecek apakah di url ada nilai GET id 
    if (isset($_GET['username'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $username = ($_GET["username"]);

        // menampilkan data dari database yang mempunyai idpelanggan=$idpelanggan
        $query = "SELECT * FROM tb_login WHERE username='$username'";
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
                echo "<script>alert('Data Tidak Di Temukan Pada Database.');window.location='../view/viewlogin.php';</script>";
            }
    } else {
        // apabila tidak ada data GET id , akan di redirect ke viewpelanggan.php
        echo "<script>alert('Masukan Data Username.');window.location='../view/viewlogin.php';</script>";
    }
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

<!-- FORM UNTUK EDIT DATA SUPPLIER -->
       
<html>
    <head>
    <title>edit karyawan</title>
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
select {
    width: 100%;
    height: 30px;
}
.btn-sm.sus{
    width: 7%;
}
.btn-light.border{
	border: 24px;
}
.upper{
  text-transform: uppercase;
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
            <a class="topnav2" href="../view/viewlogin.php">Login</a>
            <a href="../view/viewkaryawan.php">Karyawan</a>
            <a href="../view/viewpelanggan.php">Pelanggan</a>
            <a href="../view/viewsupplier.php">Supplier</a>
            <a href="../view/viewmenu.php">Menu</a>
            <a href="../view/viewtransaksi.php">Transaksi</a>
    <a href="../view/viewlogin.php"><button type="button" class="btn btn-secondary">&nbsp;&nbsp;BACK&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></button></a>
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
        <h2>Edit Data Login</h2><br>
 
        <form method="POST" action="proses_editlogin.php" enctype="multipart/form-data" >
        <section class="base">

            <!-- MENAMPUNG NILAI ID PRODUK YANG AKAN DI EDIT -->
            <div>
                <input type="text" name="username" value="<?php echo $data['username']; ?>" autofocus="" hidden>
            </div>
            <div>
                <label>USERNAME</label>
                <input type="text" name="editusername" value="<?php echo $data['username']; ?>" placeholder=" HARUS UNIK - TIDAK BOLEH SAMA " autofocus="" required="" />
            </div>
            <div>
                <label>PASSWORD</label>
                <input type="text" name="password" value="<?php echo $data['password']; ?>" autofocus="" required="" />
            </div>
            <div>
                <label>USER LEVEL</label>

                <select name="leveluser" required="">
                <?php
                            $query = "SELECT * FROM tb_login WHERE username='$username'";
                            $result = mysqli_query($mysqli, $query);
                            if(!$result){
                                die("Query error: ".mysqli_errno($mysqli).
                                " - ".mysqli_error($mysqli));
                            }
                            while($row = mysqli_fetch_assoc($result)){
                ?>
                            <option value="<?php $data['leveluser'];?>" disabled selected>Level Saat ini : <?php echo $data['leveluser']; ?></option>
                <?php
                }
                ?>
                            <!-- <option disabled selected>Pilih Level User</option> -->
                            <option value="admin">ADMIN</option>
                            <option value="user">USER</option>
                </select>
            </div>
                <br/>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </section>
        </form>
        </div>
        <div class="col-1">
			</div>
        </div>
    </body>
</html>