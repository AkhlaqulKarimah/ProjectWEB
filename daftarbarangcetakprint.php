<html>
<head>
	<title>CETAK PRINT DATA BARANG</title>
</head>
<body>
 
	<center>
 
		<h2>DATA BARANG</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="2" style="width: 100%">
		<tr>
			<th>No.</th>
			<th>Kode</th>
			<th>Tipe</th>
			<th>Nomor Inventaris</th>
			<th>Tahun Perolehan</th>
			<th>Foto Barang</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * from tblbarang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['kode']; ?></td>
			<td><?php echo $data['tipe']; ?></td>
			<td><?php echo $data['nomorinventaris']; ?></td>
			<td><?php echo $data['tahunperolehan']; ?></td>
			<td><img src="images/<?php echo $data['fotobarang']; ?>" width="50px" height="50px"></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>