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

<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view transaksi</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
<body>


<!-- CONTENT -->
    <!-- NAVBAR -->
    <nav class="navbar fixed-top navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">SISTEM KANTIN</a>
    <a href="#"><button type="button" class="btn btn-outline-dark">Login</button></a>
    </div>
    </nav>
    <!-- NAVBAR SELESAI -->

        <!-- SIDEBAR -->
        <div class="sidebar">
            <a href="../index.php">Home</a>
            <a href="viewkaryawan.php">Karyawan</a>
            <a href="viewpelanggan.php">Pelanggan</a>
            <a href="viewsupplier.php">Supplier</a>
            <a href="viewmenu.php">Menu</a>
            <a href="viewtransaksi.php">Transaksi</a>
        </div>
        <!-- SIDEBAR SELESAI -->

    <div class="container mt-5">
		<div class="row">
			<div class="col-1">
			</div>
		<div class="col-11 mt-4">
        <h2>Data Transaksi Penjualan</h2><br>
        <table class="table">
        <thead class="table-light">
        <tr>
            <th>Id Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Karyawan</th>
            <th>Tgl Transaksi</th>
            <th>Katagori Pelanggan</th>
            <th>Total Bayar</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Action</th>
        </tr>
        </thead>
    

    <tbody>
        <?php
        $query = "SELECT tbt.*, tbp.namalengkap, tbk.namakaryawan FROM tb_transaksi tbt
                   LEFT JOIN tb_karyawan tbk on tbt.idpelanggan = tbk.idkaryawan
                   LEFT JOIN tb_pelanggan tbp on tbt.idpelanggan = tbp.idpelanggan";
        $result = mysqli_query($mysqli, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($mysqli).
                " - ".mysqli_error($mysqli));
        }
        while($row = mysqli_fetch_assoc($result))
        {
        ?>

            <tr>
                <td><?php echo $row['idtransaksi']; ?></td>
                <td><?php echo $row['namalengkap']; ?></td>
                <td><?php echo $row['namakaryawan']; ?></td>
                <td><?php echo $row['tgltransaksi']; ?></td>
                <td><?php echo $row['kategoripelanggan']; ?></td>

                <td style="text-align: right"><?php echo number_format($row['totalbayar'],0,',','.'); ?></td>
                <td style="text-align: right"><?php echo number_format($row['bayar'],0,',','.'); ?></td>
                <td style="text-align: right"><?php echo number_format($row['kembali'],0,',','.'); ?></td>
                <td>
                    <a href="../add/transaksi_detail.php?idtransaksi=<?= $row['idtransaksi']; ?>">
                    <button class="btn btn-info btn-sm">Detail Transaksi</button></a> |
                    <a href="../delete/deletetransaksi.php?idtransaksi=<?php echo $row['idtransaksi']; ?>"
                            onclick="return confirm('anda yakin akan menghapus data ini?')">
                            <button class="btn btn-info btn-sm">Hapus</button></a>
                </td>
            </tr>

        <?php
        }
        ?>

    </tbody>
    </table>
    <a href="../add/transaksi.php"><button class="btn btn-primary">Tambah</button></a>
    <a href="../cetak/laporan_transaksi.php"><button class="btn btn-primary">Cetak</button></a>
    </div>
	</div>

<!-- CONTENT SELESAI-->

    



 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>
</html>

