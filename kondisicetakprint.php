<html>
<head>
	<title>CETAK PRINT DATA KONDISI</title>
</head>
<body>
 
	<center>
 
		<h2>DATA KONDISI</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="2" style="width: 100%">
		<tr>
			<th>IDkondisi</th>
			<th>NamaKondisi</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * from kondisi");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['namakondisi']; ?></td>
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