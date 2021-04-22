<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  $result = mysqli_query($koneksi, "SELECT * FROM tblbarang ORDER BY IDbarang ASC");
  
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

    <title>tambah barang</title>
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
          DATA BARANG  
        </h3><hr>
  <br>
  <td><a href="daftarbarang.php" class="btn btn-primary"> Kembali ke Home Data Barang </a></td>
  <br/><br/>

	<div class="container">
		<h2 style="text-align: center;">Tambah Data BARANG</h2>
		<form action="prosestambah_daftarbarang.php" method="post" enctype="multipart/form-data">

			 <div class="row">
				<label>Kode :</label>
        <div class="mb-3 col-md-6">
          <input type="text" readonly="" class="form-control" id="ikode" name="ikode">
        </div>
        <div class="mb-3 col-md-6">
          <input type="text" readonly="" class="form-control" id="kode" name="kode">
        </div>
			</div>
      <div class="form-group">
        <label>Jenis Barang :</label>
        <select name="IDjenisbarang" id="jenisbarang" class="form-control mb-3" onchange="ganti(this.value)">
          <option disabled="" selected="">Pilih Jenis Barang</option>
          <?php
            $jenisbarang = mysqli_query($koneksi, "SELECT * FROM jenisbarang");
            $jsArray = "var prdNamer = new Array();\n";
            while ($datajenisbarang = mysqli_fetch_array($jenisbarang)) {
              echo '<option value="'.$datajenisbarang['IDjenisbarang'].'">'.$datajenisbarang['namajenisbarang'].'</option>';
              $jsArray .= "prdNamer['".$datajenisbarang['IDjenisbarang']."']={ikode:'".addslashes($datajenisbarang['kodejenisbarang'])."'};\n";
            }
            ?>
          </select>
      </div>
      <div class="form-group">
        <label>Merk :</label>
        <select name="IDmerk" id="merk" class="form-control mb-3" onchange="ganti1(this.value)">
          <option disabled="" selected="">Pilih Merk</option>
          <?php
            $merk = mysqli_query($koneksi, "SELECT * FROM merk");
            $jsArrays = "var prdName = new Array();\n";
            while ($datamerk = mysqli_fetch_array($merk)) {
              echo '<option value="'.$datamerk['IDmerk'].'">'.$datamerk['namamerk'].'</option>';
              $jsArrays .= "prdName['".$datamerk['IDmerk']."']={kode:'".addslashes($datamerk['kodemerk'])."'};\n";
            }
            ?>
          </select>
      </div>
			<div class="form-group">
				<label class="form-label">Tipe :</label>
				<input type="text" class="form-control" placeholder="Masukkan Tipe" name="tipe" required="required">
			</div>
      <div class="form-group">
        <label>Spesifikasi :</label>
        <input type="text" class="form-control" placeholder="Masukkan Spesifikasi" name="spesifikasi" required="required">
      </div>
      <div class="form-group">
        <label>NomorInventaris :</label>
        <input type="text" class="form-control" placeholder="Masukkan Nomor Inventaris" name="nomorinventaris" required="required">
      </div>
      <div class="form-group">
        <label>TahunPerolehan :</label>
        <input type="text" class="form-control" placeholder="Masukkan Tahun Perolehan" name="tahunperolehan" required="required">
      </div>
      <!-- <div class="form-group">
        <label>TanggalCek :</label>
        <input type="text" class="form-control" placeholder="Masukkan TanggalCek" name="tglcek" required="required">
      </div> -->
			<div class="form-group">
				<label>FotoBarang :</label>
				<input type="file" name="fotobarang" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </p>
			</div>
      <div class="form-group">
        <label>Ruangan :</label>
        <select name="IDruangan" class="form-control mb-3">
          <option selected="" disabled="">Pilih Ruangan</option>
          <?php
          $ruangan = mysqli_query($koneksi, "SELECT * FROM ruangan");
          while ($dataruangan = mysqli_fetch_array($ruangan)) {
            echo '<option value="'.$dataruangan['IDruangan'].'">'.$dataruangan['namaruangan'].'</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Keterangan :</label>
        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="ket" required="required">
      </div>

      <div class="form-group">
        <label>Kondisi :</label>
        <select name="IDkondisi" class="form-control mb-3">
          <option selected="" disabled="">Pilih Kondisi</option>
          <?php
          $kondisi = mysqli_query($koneksi, "SELECT * FROM kondisi");
          while ($datakondisi = mysqli_fetch_array($kondisi)) {
            echo '<option value="'.$datakondisi['IDkondisi'].'">'.$datakondisi['namakondisi'].'</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>User :</label>
        <input type="text" disabled="" class="form-control" value="<?php echo($_SESSION['nama']) ?>">
        <input type="hidden" class="form-control" name="IDuser" value="<?php echo($_SESSION['id']) ?>">
      </div>

      
  <input type="submit" name="" value="Simpan" class="btn btn-primary">
    </form>
  </div>
  <br>

  <script type="text/javascript">
      <?php
      echo $jsArray;
      echo $jsArrays;
      ?>

      function ganti(x) {
        document.getElementById('ikode').value = prdNamer[x].ikode;
      }
      function ganti1(x) {
        document.getElementById('kode').value = prdName[x].kode;
      }
  </script>
</body>
</html>