<html>
<head>
	<title>CETAK PRINT DATA PENGGUNA</title>
</head>
<body>
 
	<center>
 
		<h2>DATA PENGGUNA</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th>IDuser</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Foto</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"SELECT * from users");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><img src="images/<?php echo $data['foto']; ?>" width="50px" height="50px"></td>
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