<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel untuk Kondisi</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Kondisi.xls");
	?>
 
	<center>
		<h1>Export Data ke Excel untuk Kondisi<br/></h1>
	</center>
 
	<table border="2">
		<tr>
			<th>IDkondisi</th>
			<th>Kondisi</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","inventaris");
 
		// menampilkan data pengguna
		$data = mysqli_query($koneksi,"SELECT * from Kondisi");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['namakondisi']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>