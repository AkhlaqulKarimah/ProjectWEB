<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include_once('config.php');

  $result = mysqli_query($mysqli, "SELECT * FROM merk ORDER BY IDmerk ASC");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <!-- Bootstrap js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>


    <title>merk</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="loginsuccess.php">
      <marquee> <B> SELAMAT DATANG <?= $_SESSION['username']; ?> DI UPT BLK SURABAYA </B></a></marquee>

          <td>
            <a href="logoutsuccess.php" class="btn btn-primary" onclick="return confirm('apakah kamu yakin mau keluar?');"> 
              <i class="fas fa-sign-out-alt ml-3" data-toggle="tooltip" title="Sign Out">
              </i>
            </a>
          </td>
        </h5>
      </div>
    </div>
    </div>
    </nav>


    <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a class="nav-link active text-white" href="home.php"><i class="fas fa-tachometer-alt mt=7"></i>  Home</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="datapengguna.php"><i class="fas fa-user mr-2"></i>  Data Pengguna</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="jenisbarang.php"><i class="fas fa-desktop mr-2"></i>  Jenis Barang</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="merk.php"><i class="fas fa-laptop mr-2"></i>  Merk</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="kondisi.php"><i class="fas fa-certificate mr-2"></i>  Kondisi</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="ruangan.php"><i class="fas fa-thumbtack mr-2"></i>  Ruangan</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="daftarbarang.php"><i class="fas fa-desktop mr-2"></i>  Daftar Barang</a><hr class="bg-secondary">
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-5 pt-5">
        <h3>
          <i class="fas fa-desktop mr-2"></i>
          DATA MERK
         </h3><hr>          	
         <form>
			<tr>
				<td></td>
				<td><a href="merk.php" class="btn btn-primary"> Kembali ke Home Data Merk</a></td><br/><br/>
			</tr>
			</form>

	<form action="addmerk.php" method="post" name="Form1">
		<table width="25%" border="0">
			<p align="center">
			<tr>
				<td>Nama Merk</td>
				<td><input type="text" name="namamerk"></td>
			</tr>
      <tr>
        <td>Kode Merk</td>
        <td><input type="text" name="kodemerk"></td>
      </tr>

			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Tambahkan">
					<input type="reset" name="Reset">
				</td>
			</tr>
			</p>
		</table>
	</form>

	<a href="merk.php">Lihat Tampilan Merk</a>
	<br/><br/>

	<?php
		//mengecek apakah form sudah disubmit, memasukkan form data ke tabel merk
		if (isset($_POST['submit'])) {
			$namamerk = $_POST['namamerk'];
      $kodemerk = $_POST['kodemerk'];

			//memasukkan data merk kedalam tabel
			$result = mysqli_query($mysqli, "INSERT INTO merk VALUES(NULL, '$namamerk', '$kodemerk')");

			//menampilkan pesan ketika merk berhasil ditambahkan
			echo "Merk telah berhasil ditambahkan, <a href='merk.php'> Lihat Merk </a>";
		}
	?>
</body>
</html>