<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel untuk Jenis Barang</title>
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
	header("Content-Disposition: attachment; filename=Data Jenis Barang.xls");
	?>
 
	<center>
		<h1>Export Data ke Excel untuk Jenis Barang<br/></h1>
	</center>
 
	<table border="1">
		<tr>
			<th>IDuser</th>
			<th>NamaJenisBarang</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","inventaris");
 
		// menampilkan data pengguna
		$data = mysqli_query($koneksi,"select * from jenisbarang");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['namajenisbarang']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>