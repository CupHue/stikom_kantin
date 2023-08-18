<?php
    
    $host="localhost";
    $username_host="root";
    $password_host="";
    $db="db_siswa";

    $conn=new mysqli($host, $username_host, $password_host, $db);

    if($conn->connect_error){
        die("Connection failed".$conn->connection_error);
    }
    
?>