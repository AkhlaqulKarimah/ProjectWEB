<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:loginsuccess.php');
}else{
	$username = $_SESSION['username'];
}require_once("koneksi.php");
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
	$inventaris = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pengguna</title>
</head>
<body>
<h2>Data Pengguna</h2>
<table>
	<tr>
		<td>IDuser :</td>
		<td><?php echo $inventaris['id']; ?></td>
	</tr>
	<tr>
		<td>Nama :</td>
		<td><?php echo $inventaris['nama']; ?></td>
	</tr>
	<tr>
		<td>Username  :</td>
		<td><?php echo $inventaris['username'];?></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><?php echo $inventaris['password'];?></td>
	</tr>
	<tr>
		<td><img src="images/<?php echo $inventaris['foto'];?>" width="100px" height="150px"></td>
	</tr>
</table>
<script>
	window.print();
</script>
</body>
</html>