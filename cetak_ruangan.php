<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:loginsuccess.php');
}else{
	$username = $_SESSION['username'];
}require_once("koneksi.php");
$IDruangan = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE IDruangan ='$IDruangan'");
	$inventaris = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Ruangan</title>
</head>
<body>
<h2>Data Ruangan</h2>
<table>
	<tr>
		<td>IDruangan :</td>
		<td><?php echo $inventaris['IDruangan']; ?></td>
	</tr>
	<tr>
		<td>NamaRuangan :</td>
		<td><?php echo $inventaris['namaruangan']; ?></td>
	</tr>
	<tr>
		<td>KeteranganRuangan  :</td>
		<td><?php echo $inventaris['keteranganruangan'];?></td>
	</tr>
	<tr>
		<td><img src="images/<?php echo $inventaris['fotoruangan'];?>" width="100px" height="150px"></td>
	</tr>
</table>
<script>
	window.print();
</script>
</body>
</html>