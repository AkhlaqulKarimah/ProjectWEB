<html>
<head>
	<title>CETAK PRINT DATA RUANGAN</title>
</head>
<body>
 
	<center>
 
		<h2>DATA RUANGAN</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="2" style="width: 100%">
		<tr>
			<th>IDruangan</th>
			<th>NamaRuangan</th>
			<th>KeteranganRuangan</th>
			<th>Foto</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * from ruangan");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['namaruangan']; ?></td>
			<td><?php echo $data['keteranganruangan']; ?></td>
			<td><img src="images/<?php echo $data['fotoruangan']; ?>" width="50px" height="50px"></td>
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