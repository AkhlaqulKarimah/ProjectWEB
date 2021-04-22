<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  $result = mysqli_query($koneksi, "SELECT * FROM jenisbarang ORDER BY IDjenisbarang ASC");
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


    <title>jenis barang</title>
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
          DATA JENIS BARANG 
         </h3><hr>  

<br/>

    <div class=" d-flex justify-content-start">
    <a href="addjenisbarang.php" class="btn  btn-primary mb-2"><i class="fas fa-plus-square mr-4"></i>
        TAMBAH DATA JENIS BARANG</a>
      </div>
      <div class=" d-flex justify-content-end">
    <a style="margin-top: -33px"  href="jenisbarangcetakprint.php" target="_blank" class=" btn  btn-primary mb-2"> CETAK PRINT </a>
    </div>
    <a class="d-flex justify-content-end" target="_blank" href="export_exceljenisbarang.php">EXPORT KE EXCEL</a>

    <br>

<table class="table table-striped table-bordered">			

		<form action='jenisbarang.php'method="POST">
	<input type='text' value='' name='qcari' placeholder="cari disini">
	<input type='submit' value='cari'><a href='jenisbarang.php' >&nbsp  All</a>
	<br/><br/>
</form>

	<table class="table table-striped table-bordered">
      <tr>
        <th>No.</th>
        <th>Nama Jenis Barang</th>
        <th>Kode Jenis Barang</th>
        <th>Edit</th>
        <th>Hapus</th>
      </tr>

<?php
include 'koneksi.php';
$query1="SELECT * from jenisbarang";


if(isset($_POST['qcari'])){
  $qcari=$_POST['qcari'];
  $query1="SELECT * FROM  jenisbarang 
  where IDjenisbarang like '%$qcari%'
  or namajenisbarang like '%$qcari%'  ";
}

$result=mysqli_query($koneksi,$query1) or die(mysql_error());
$no=1; //penomoran 
while($rows=mysqli_fetch_object($result)){
      ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php   echo $rows -> namajenisbarang;?></td>
        <td><?php   echo $rows -> kodejenisbarang;?></td>

        <td><a href = 'editjenisbarang.php?id=<?php echo $rows-> IDjenisbarang;?>'>
        <i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>

        <td><a href = 'deletejenisbarang.php?id=<?php echo $rows-> IDjenisbarang;?>'>
        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>

			</tr>
			<?php
$no++;
}?>
		</table>
	</div>

	</body>
</html>
