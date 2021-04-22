<!DOCTYPE html>
<html>
<head>
	<title>Menambah Users</title>
</head>
<body>
	<a href="indexpengguna.php">Kembali ke Home</a>
	<br/><br/>

	<form action="addpengguna.php" method="post" name="Form1">
		<table width="25%" border="2">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>

			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>			

			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>

			<tr>
				<td>Foto</td>
				<td><input type="text" name="password"></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Tambahkan">
					<input type="reset" name="Reset">
				</td>
			</tr>
		</table>
	</form>

	<?php
		//mengecek apakah form sudah disubmit, memasukkan form data ke tabel user
		if (isset($_POST['submit'])) {
			$name = $_POST['nama'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$foto = $_POST['foto'];

			//memasukkan file koneksi database
			include_once("config.php");

			//memasukkan data user kedalam tabel
			$result = mysqli_query($mysqli, "INSERT INTO users(nama,username,password,foto) VALUES('$name','$username','$password',$foto)");

			//menampilkan pesan ketika user berhasil ditambahkan
			echo "User telah berhasil ditambahkan, <a href='indexpengguna.php'> Lihat Users </a>";
		}
	?>
</body>
</html>