<html>
<head>
	<title>CETAK PRINT DATA JENIS BARANG</title>
</head>
<body>
 
	<center>
 
		<h2>DATA JENIS BARANG</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th>IDjenisbarang</th>
			<th>NamaJenisBarang</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * from jenisbarang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['namajenisbarang']; ?></td>
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