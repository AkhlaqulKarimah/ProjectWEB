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
    <style type="text/css">
      th {
        text-align: center;
      }
    </style>


    <title>daftar barang</title>
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

<br/>

  <div class="container">
    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert']=='gagal_ekstensi') {
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
          x
        </button>
        <h4>
          <i class="icon fa fa-warning"></i>
        Peringatan !</h4>
        Ekstensi Tidak Diperbolehkan
        </h4>
      </div>
      <?php
      }elseif ($_GET['alert']=="gagal_ukuran") {
        ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            x
          </button>
          <h4><i class="icon fa fa-check"></i>Peringatan !</h4>
          Ukuran File terlalu Besar
        </div>
        <?php
      }elseif ($_GET['alert']=="berhasil") {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          <h4><i class="icon fa fa-check"></i>Success</h4>
          Berhasil Disimpan
        </div>
        <?php
      }
    }
    ?>

    <div class=" d-flex justify-content-start">
    <a href="tambah_daftarbarang.php" class="btn  btn-primary mb-2"><i class="fas fa-plus-square mr-4"></i>
        TAMBAH DATA BARANG</a>
      </div>
      <div class=" d-flex justify-content-end">
    <a style="margin-top: -33px"  href="daftarbarangcetakprint.php" target="_blank" class=" btn  btn-primary mb-2"> CETAK PRINT </a>
    </div>
    <a class="d-flex justify-content-end" target="_blank" href="export_exceldaftarbarang.php">EXPORT KE EXCEL</a>

    <br>

<table class="table table-striped table-bordered">			

		<form action='daftarbarang.php'method="POST">
	<input type='text' value='' name='qcari' placeholder="cari disini">
	<input type='submit' value='cari'><a href='daftarbarang.php' >&nbsp  All</a>
	<br/><br/>
</form>

	<table class="table table-striped table-bordered" border="2">
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Tipe</th>
        <th>Nomor Inventaris</th>
        <th>Tahun Perolehan</th>
        <th>Foto Barang</th>
        <th>Edit</th>
        <th>Hapus</th>
        <th>Print</th>
        <th colspan="2">Aksi</th>
      </tr>

<?php
include 'koneksi.php';
$query1="SELECT * from tblbarang ";


if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM tblbarang 
	where kode like '%$qcari%'
	or kode like '%$qcari%'
  or tipe like '%$qcari%'
  or nomorinventaris like '%$qcari%'
  or tahunperolehan like '%$qcari%'  ";

}

$result=mysqli_query($koneksi,$query1) or die(mysqli_error());
$no=1; //penomoran 
while($rows=mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $no
				?></td>
				<td><?php	echo $rows['kode'];?></td>
        <td><?php echo $rows['tipe'];?></td>
        <td><?php echo $rows['nomorinventaris'];?></td>
        <td><?php echo $rows['tahunperolehan'];?></td>
        <td><img src="images/<?php   echo $rows['fotobarang'];?>" width="50px" height="50px"></td>

        <td><a href = "editdaftarbarang.php?id=<?php echo $rows['IDbarang'];?>">
        <i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>

        <td><a href = 'deletedaftarbarang.php?id=<?php echo $rows['IDbarang'];?>'>
        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>

        <td><a href = 'cetak_daftarbarang.php?id=<?php echo $rows['IDbarang'];?>'>
        <i class="fas fa-print bg-info p-2 text-white rounded" data-toggle="tooltip" title="Print"></i></a></td>

        <td><a href = 'cekbarang.php?id=<?php echo $rows['IDbarang'];?>'>
        <button>Cek</button>
        </a></td>

          <td><a href = 'detailbarang.php?id=<?php echo $rows['IDbarang'];?>'>
        <button>Detail</button>
        </a></td>

			</tr>
			<?php
$no++;
}?>
		</table>
	</div>

	</body>
</html>