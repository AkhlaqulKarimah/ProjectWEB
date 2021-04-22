<?php 
session_start();
require 'koneksi.php';

//$conn = mysqli_connect('localhost', 'root', '', 'inventaris');
if(isset($_POST['masuk'])) {

$user = $_POST['username'];
$pass = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$cek = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($cek);
// var_dump($cek);die;
if(mysqli_num_rows($cek) === 1 ) {
	
	$_SESSION['username'] = $data['username'];
	$_SESSION['id'] = $data['id'];
  $_SESSION['nama'] = $data['nama'];

	echo "<script>alert('berhasil login'); window.location.href='home.php'; </script>";



}



}


 ?>

 

<!DOCTYPE html><!-- login.php -->
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
  <link rel="stylesheet" href="inventaris.css">
  <script src="dist/js/jquery.js"></script>
  <script src="dist/js/bootstrap.js"></script>
</head>
<body>


<body style="background: url(images/bg.png) no-repeat; background-size: cover;">
	<div class="container">
	
<form action="" method="post"><p align="center">
      <fieldset style="width: 250px" style="background-color: lightgrey">

        <legend><p align = "left"><img src="images/icon/logo-login.jpg"> Login</p></legend>
        <p>
          <label><font color="black" size="5">Username : </font> </label>
          <input type="text" name="username" placeholder="Masukkan Username">
        </p>

        <p>
          <label><font color="black" size="5"> Password : </font></label>
          <input type="password" name="password" placeholder="Masukkan Password">
        </p>

        <p>
          <label><font color="black" size="5"><input type="checkbox" name="remember" value="remember">
          Remember me</font></label>
        </p>

        <p align="center"><font size="5" color="blue">
          <a href="loginsuccess.php"><input type="reset" value="Cancel"></a>
			<input type="submit" name="masuk" value="Login">
        </font>
        </p>

      </fieldset>
  </p>
    </form>
</div>
</body>


</body>
</html>