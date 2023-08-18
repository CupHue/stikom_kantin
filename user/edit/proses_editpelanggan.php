<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

    // membuat variabel untuk menampung data dari form 
    $idpelanggan    = $_POST['idpelanggan'];
    $namalengkap    = $_POST['namalengkap'];
    $alamat         = $_POST['alamat'];
    $telpon          = $_POST['telpon'];
    $usia           = $_POST['usia'];
    $picture = $_FILES['picture']['name'];

    // cek dulu jika merubah gambar resep jalankan koding ini 
    if($picture != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg'); // ekstensi file gambar yang bisa di upload
        $x                      = explode('.', $picture); // memisahkan nama file dengan ekstensi yang diupload
        $ekstensi               = strtolower(end($x));
        $file_tmp               = $_FILES['picture']['tmp_name'];
        $nama_gambar_baru       = $picture; // menggabungkan angka acak dengan nama file sebenarnya

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            // memindahkan file gambar ke folder gambar 
            move_uploaded_file($file_tmp, '../../pict/'.$nama_gambar_baru);

                // jalankan query UPDATE berdasarkan id pelanggan yg diedit
                $query = "UPDATE tb_pelanggan SET namalengkap ='$namalengkap', alamat='$alamat', telpon ='$telpon', 
                          usia='$usia', picture='$nama_gambar_baru'";

                $query .= "WHERE idpelanggan = '$idpelanggan'";
                $result = mysqli_query($mysqli, $query);
                // periksa query apakah ada error 
                    if(!$result){
                        die ("Querry Gagal Dijalankan: ".mysqli_errno($mysqli).
                            " - ".mysqli_error($mysqli));
                    } else {
                        // tampil alert dan akan redirect ke halaman index.php
                        // silahkan ganti index.php sesuai halaman yang akan dtuju 
                        echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewpelanggan.php';</script>";
                    }
        } else {
            // jika file ekstensi tidak jpg dan png maka alert ini yang tampil 
            echo "<script>alert('Ekstensi Gambar Yang Boleh Hanya JPG atau PNG.');
            window.location='../view/viewpelanggan.php';</script>";
        }
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit 
        $query  = "UPDATE tb_pelanggan SET namalengkap='$namalengkap', alamat='$alamat', telpon='$telpon', 
        usia='$usia'";

        $query .= "WHERE idpelanggan = '$idpelanggan'";
        $result = mysqli_query($mysqli, $query);
        // periksa query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli)." - ".mysqli_error($mysqli));
        } else {
            // tampil alert dan akan redirect ke halaman index.php
            // silahkan ganti index.php sesuai halaman yang akan dtuju 
            echo "<script>alert('Data Berhasil Diubah.');window.location='../view/viewpelanggan.php';</script>";
        } 
    }
?>