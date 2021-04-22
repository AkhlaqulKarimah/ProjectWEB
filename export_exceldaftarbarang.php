<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel untuk Barang </title>
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
	header("Content-Disposition: attachment; filename=Data Barang.xls");
	?>
 
	<center>
		<h1>Export Data ke Excel untuk Barang <br/></h1>
	</center>
 
	<table border="2">
		<tr>
			<th>IDbarang</th>
			<th>NamaBarang</th>
			<th>Kode</th>
			<th>Tipe</th>
			<th>Nomor Inventaris</th>
			<th>Tahun Perolehan</th>
			<th>Foto Barang</th>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","inventaris");
 
		// menampilkan data pengguna
		$data = mysqli_query($koneksi,"SELECT * from tblbarang");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['namabarang']; ?></td>
			<td><?php echo $d['kode']; ?></td>
			<td><?php echo $d['tipe']; ?></td>
			<td><?php echo $d['nomorinventaris']; ?></td>
			<td><?php echo $d['tahunperolehan']; ?></td>
			<td><img src="images/<?php echo $d['fotobarang']; ?>" width="50px" height="50px"></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>