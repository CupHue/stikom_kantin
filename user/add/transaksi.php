<?php
    include('../koneksi.php');
    // session_start();
    // if(!isset($_SESSION['username']))
    // {
    //     header('location:../login.php');
    //     exit();
    // }
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
    <title>Proses Transaksi</title>
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
.btn-sm.sus{
    width: 7%;
}
    </style>
<body>



<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="fixed-top">
    <div class="container-fluid topnav navbar navbar-dark bg-dark" >

    <a class="navbar-brand" href="#"><b>&nbsp;&nbsp;SISTEM APOTEK</b></a>
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

    <br>
            <div class="container mt-5">
            <div class="row">
                <div class="col-1">
                </div>
            <div class="col-11 mt-4">

        <!-- FORM INSERT -->
        <h1>Tambah Transaksi</h1>
        <?php if(isset($_GET['kategoripelanggan'])):?>
            <form action="proses_transaksi.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kategoripelanggan" value="<?= $_GET['kategoripelanggan'] ?>">
                <section class="base">
                    <div>
                        <label for="inputText3" class="col-sm-2 col-form-label">ID Transaksi</label>
                        <div class="col-sm-5">
                        <input type="text" name="idtransaksi" class="form-control" id="inputText3" placeholder=" HARUS UNIK - TIDAK BOLEH SAMA " autofocus="" />
                        </div>
                    </div>

                    <div>
                        <label for="inputText3" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-5">
                        <input type="date" name="tgltransaksi" class="form-control" id="inputText3" value="<?= date('Y-m-d') ?>" required=""/>
                        </div>
                    </div>
                   
                        <div>
                        <label for="inputText3" class="col-sm-2 col-form-label">Pelanggan</label>
                        <div class="col-sm-5">

                            <select name="idpelanggan" class="form-control" id="inputText3" required="">
                                <option value="" disabled selected>Pilih Pelanggan</option>
                                <?php
                                $query = "SELECT * FROM tb_pelanggan";
                                $result = mysqli_query($mysqli, $query);
                                if(!$result){
                                    die("Query error: ".mysqli_errno($mysqli).
                                    " - ".mysqli_error($mysqli));
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?= $row['idpelanggan'] ?>"><?= $row['idpelanggan']?> |<?= $row['namalengkap']?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                        </div>
                
                    <div>
                        <br>
                        <a href="transaksi.php" class="btn btn-primary">Kembali</a>
                        <button class="btn btn-primary"  type="submit">Selanjutnya</button>
                    </div>



                    <input type="hidden" name="insert_transaksi" value="a">

                </section>
            </form>
        <?php else: ?>
            <form action="transaksi.php" method="GET" enctype="multipart/form-data">
            <section class="base">
                <div>
                    <label for="inputText3" class="col-sm-2 col-form-label">katagori pelanggan</label>
                    <div class="col-sm-5">
                        <select name="kategoripelanggan" class="form-control" id="inputText3">
                            <option value="Umum">Umum</option>
                            <option value="Khusus">Khusus</option>
                        </select>
                    </div> 
                </div>
                <div><br>
                    <button name="input_katagori_pelanggan" type="Submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </section>
        </form>
        <?php endif ?>  

        <!-- FORM INSERT SELESAI -->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>
</html>