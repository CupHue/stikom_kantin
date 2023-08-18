
<?php
session_start();
include("koneksi.php");

$username = $_POST["username"];
// $password   = md5($_POST['password']);
$password = $_POST["password"];

echo $username;
echo $password;


//$result = mysqli_query($connect,"SELECT username,password FROM tb_login WHERE username='$username' AND password='$password'");
// $chek = mysqli_num_rows($result);
$result = mysqli_query($mysqli,"SELECT * FROM tb_login WHERE username='$username'");
$row = mysqli_fetch_array($result);

// if(mysqli_num_rows($row)==0)
if($username=$row['username'])
{
    if( $password == $row['password'] ) {
        if($row['leveluser'] == "admin")
        {
        // $row = mysql_fetch_assoc($result);
		// if($row['leveluser'] == 1){ 
        $_SESSION['status'] = "masuk";
        $_SESSION['iniusername'] = $username;
        // $_SESSION['iniusername'] = "masuk";
        // $_SESSION = array(
        //     'iniusername' =>  $username,
        // );
        // $_POST["username"] = $username;
        header("location:welcome.php");
        }
        else if($row['leveluser'] == "user")
        {
        // $row = mysql_fetch_assoc($result);
		// if($row['level'] == 1){
        $_SESSION['status'] = "user";
        header("location:user.php");
        }
        else
        {
        header("location:index.php");
        }
    exit;
    }

    else if( $password == $row['password'] ) {
        if ( $level == $row['user'] )
        {
        // $row = mysql_fetch_assoc($result);
		// if($row['level'] == 1){
        $_SESSION['status'] = "user";
        header("location:user.php");
        }
        else
        {
        header("location:index.php");
        }
    exit;
    }

    else
    {
    echo "salah disini 2";
    header("location:index.php");
    }

    // if( $password == $row['password'] ) {
    //     // $_SESSION['username'] = $username;
    //     $_SESSION['status'] = "masuk";
    //     // $_SESSION['username'] = ['username'];
    // header("location:welcome.php");
    // // exit;
    // }
    // else
    // {
    // // header("location:welcome.php"); 
    // echo "salah disini 2";
    // header("location:index.php");
    // }
}

// if($chek>0)
// {
//     header("location:welcome.php");
// }

else
{
    // header("location:welcome.php");
    echo "salah disini 1";
    header("location:index.php");

}



// include 'config.php';

// $username = $_POST["username"];
// $password = md5($_POST["password"]);

// // $login = mysql_query($mysqli, "SELECT * FROM tb_login WHERE username='$username' and password='$password'");
// $login = mysqli_query($mysqli, "SELECT * FROM tb_login WHERE username='$username' and password='$password'");
// $cek = mysqli_num_rows($login);
// if
// ($cek>0){
//     session_start();
//     $_SESSION['username'] = $username;
//     $_SESSION['status'] = "login";
//     header("location: welcome.php");
// }else{
//     header("location:index.php");
// }



// include('koneksi.php');
// if(isset($_POST['login'])){
// 	$user = mysql_real_escape_string(htmlentities($_POST['username']));
// 	$pass = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
 
// 	$sql = mysql_query("SELECT * FROM tb_login WHERE username='$username' AND password='$pass'") or die(mysql_error());
// 	if(mysql_num_rows($sql) == 0){
// 		echo 'User tidak ditemukan';
// 	}else{
// 		$row = mysql_fetch_assoc($sql);
// 		if($row['leveluser'] == 1){
// 			$_SESSION['admin']=$username;
// 			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="welcome.php";</script>';
// 		}else{
// 			$_SESSION['user']=$username;
// 			echo '<script language="javascript">alert("Anda berhasil Login Guest!"); document.location="user.php";</script>';
// 		}
// 	}
// }



