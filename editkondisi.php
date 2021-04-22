<?php
	include_once('config.php');

	// Mengecek apakah form dikirim untuk mengupdate kondisi, maka langsung dihubungkan ke Homepage setelah data berhasil diupdate
	if (isset($_POST['update'])) {
		$IDkondisi = $_POST['IDkondisi'];

		$namakondisi = $_POST['namakondisi'];

		// Mengupdate data kondisi
		$result = mysqli_query($mysqli, "UPDATE kondisi SET namakondisi = '$namakondisi' WHERE IDkondisi = $IDkondisi");

		// Menghubungkan ke homepage untuk menampilkan hasil update kondisi di list
		header('Location: kondisi.php');		
	}
?>

<?php
	//Menampilkan data kondisi yang dipilih berdasarkan id kondisi
	$IDkondisi = $_GET['id'];

	$result = mysqli_query($mysqli, "SELECT * FROM kondisi WHERE IDkondisi = $IDkondisi");

	// fetch data merk berdasarkan id kondisi
	while ($inventaris = mysqli_fetch_array($result)) {
		$namakondisi = $inventaris['namakondisi'];
	}
?>

<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include_once('config.php');

  $result = mysqli_query($mysqli, "SELECT * FROM kondisi ORDER BY IDkondisi ASC");
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


    <title>kondisi</title>
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
          <i class="fas fa-certificate mr-2"></i>
          DATA KONDISI
         </h3><hr>

	      <td><a href="kondisi.php" class="btn btn-primary"> Kembali ke Home Data Kondisi </a></td><br/><br/>

	<form name="update_merk" method="post" action="editkondisi.php">
		<table border="1">
			<tr>
				<td>NamaKondisi</td>
				<td>
					<input type="text" name="namakondisi" value=<?php echo $namakondisi; ?>>
				</td>
			</tr>

			<tr>
				<td>
					<input type="hidden" name="IDkondisi" value=<?php echo $_GET['id']; ?>>
				</td>
				<td>
					<input type="submit" name="update" value="UPDATE">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>