<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:loginsuccess.php');
}else{
	$username = $_SESSION['username'];
}require_once("koneksi.php");
$IDbarang = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM tblbarang WHERE IDbarang =$IDbarang");
	$inventaris = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
</head>
<body>
<h2>Data Barang</h2>
<table>
	<tr>
		<td>IDbarang :</td>
		<td><?php echo $inventaris['IDbarang']; ?></td>
	</tr>
	<tr>
		<td>NamaBarang :</td>
		<td><?php echo $inventaris['namabarang']; ?></td>
	</tr>
	<tr>
		<td>Kode :</td>
		<td><?php echo $inventaris['kode']; ?></td>
	</tr>
	<tr>
		<td>Tipe :</td>
		<td><?php echo $inventaris['tipe']; ?></td>
	</tr>
	<tr>
		<td>NomorInventaris :</td>
		<td><?php echo $inventaris['nomorinventaris']; ?></td>
	</tr>
	<tr>
		<td>TahunPerolehan :</td>
		<td><?php echo $inventaris['tahunperolehan']; ?></td>
	</tr>
	<tr>
		<td><img src="images/<?php echo $inventaris['fotobarang'];?>" width="50px" height="50px"></td>
		</td>
	</tr>
	
</table>
<script>
	window.print();
</script>
</body>
</html>