<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $nama_db = "db_kantin"; //nama database
    $mysqli = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutanya seperti ini jangan tertukar



    if(!$mysqli){ //jika tidak terkoneksi maka akan tampil error 
        die ("koneksi database gagal: ".mysqli_connect_error());
    }

?>