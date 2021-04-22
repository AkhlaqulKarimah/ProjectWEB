<?php
	include_once('config.php');

	// Mengecek apakah form dikirim untuk mengupdate ruangan, maka langsung dihubungkan ke Homepage setelah data berhasil diupdate
	if (isset($_POST['update'])) {
		$IDruangan = $_POST['IDruangan'];
		$namaruangan = $_POST['namaruangan'];
		$keteranganruangan = $_POST['keteranganruangan'];
    $fotolama = $_POST['fotolama'];

    $rand = rand();
    $filebaru = $_FILES['fotobaru']['tmp_name'];
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['fotobaru']['name'];
    $ukuran = $_FILES['fotobaru']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(empty($filebaru)) {
    // Mengupdate data ruangan
    $result = mysqli_query($mysqli, "UPDATE ruangan SET namaruangan = '$namaruangan', keteranganruangan = '$keteranganruangan', fotoruangan = '$fotolama' WHERE IDruangan = $IDruangan");
    
    // Menghubungkan ke homepage untuk menampilkan hasil update ruangan di list
    if(!$result) {
      header('Location: ruangan.php?id='.$id.'&alert=3');  
    }else{
      header('Location: ruangan.php?id='.$id.'&alert=0');  
    }	
	}
  //kalau foto diganti
  elseif(!in_array($ext, $ekstensi)) {
    header('Location: ruangan.php?id='.$id.'&alert=1');
  }
  elseif($ukuran > 2097152) {
    header('Location: ruangan.php?id='.$id.'&alert=2');
  }
  else{
    unlink('images/'.$fotolama);
    $xx = $rand.'_'.$filename;
    move_uploaded_file($filebaru, 'images/'.$xx);
    $result2 = mysqli_query($mysqli, "UPDATE ruangan SET namaruangan = '$namaruangan', keteranganruangan = '$keteranganruangan', fotoruangan = '$xx' WHERE IDruangan = $IDruangan");

    //menampilkan pesan ketika ruangan berhasil diedit
    if(!$result2){
      header('Location: ruangan.php?id='.$id.'&alert=3');  
    }else{
      header('Location: ruangan.php?id='.$id.'&alert=0');  
    }
  }
}
?>

<?php
	//Menampilkan data ruangan yang dipilih berdasarkan id ruangan
	$IDruangan = $_GET['id'];

	$result = mysqli_query($mysqli, "SELECT * FROM ruangan WHERE IDruangan = $IDruangan");

	// fetch data ruangan berdasarkan id ruangan
	while ($inventaris = mysqli_fetch_array($result)) {
		$namaruangan = $inventaris['namaruangan'];
		$keteranganruangan = $inventaris['keteranganruangan'];
		$fotoruangan = $inventaris['fotoruangan'];
	}
?>

<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include_once('config.php');

  $result = mysqli_query($mysqli, "SELECT * FROM ruangan ORDER BY IDruangan ASC");
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

    <title>edit ruangan</title>
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
          <i class="fas fa-thumbtack mr-2"></i>
          DATA RUANGAN
          <br/><br/>

	<a href="ruangan.php"> Kembali ke Home Data Ruangan </a>
	<br/><br/>

	<form name="update_ruangan" method="post" action="editruangan.php" enctype="multipart/form-data">
		<table border="2">
			<tr>
				<td>NamaRuangan</td>
				<td>
					<input type="text" name="namaruangan" value=<?php echo $namaruangan; ?>>
				</td>
			</tr>

			<tr>
				<td>KeteranganRuangan</td>
				<td>
          <textarea name="keteranganruangan" rows="3"><?php echo $keteranganruangan; ?>
          </textarea>
				</td>
			</tr>

			<tr>
			   <td><label>FotoRuangan :</label></td>
          <td><input type="hidden" name="fotolama" value="<?php echo $fotoruangan; ?>"></td>
      </tr>

      <tr>
				<td><input type="file" name="fotobaru"></td>
				<td><small style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </small></td>
			</tr>


			<tr>
				<td>
					<input type="hidden" name="IDruangan" value=<?php echo $_GET['id']; ?>>
				</td>
				<td>
					<input type="submit" name="update" value="UPDATE">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>