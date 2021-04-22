<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  // $result = mysqli_query($koneksi, "SELECT * FROM tblbarang ORDER BY IDbarang ASC");
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


    <title>detail barang</title>
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
<a href="daftarbarang.php" class="btn btn-primary"> Kembali ke Daftar Barang </a>

<br/>
<br/>
<br/>

  <!-- <div class="container">
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
 -->
<!--     <div class=" d-flex justify-content-start">
    <a href="tambah_detailbarang.php" class="btn  btn-primary mb-2"><i class="fas fa-plus-square mr-4"></i>
        TAMBAH DATA BARANG</a>
      </div> -->
      <div class=" d-flex justify-content-end">
    <a style="margin-top: -33px"  href="detailbarangcetakprint.php?id=<?php echo $_GET['id'] ?>" target="_blank" class=" btn  btn-primary mb-2"> CETAK PRINT </a>
    </div>
<!--     <a class="d-flex justify-content-end" target="_blank" href="export_exceldetailbarang.php">EXPORT KE EXCEL</a> -->

    <br>

<!-- <table class="table table-striped table-bordered" border="2">			

		<form action='daftarbarang.php'method="POST">
	<input type='text' value='' name='qcari' placeholder="cari disini">
	<input type='submit' value='cari'><a href='daftarbarang.php' >&nbsp  All</a>
	<br/><br/>
</form> -->

	<table class="table table-striped table-bordered" border="2">
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Tipe</th>
        <th>Spesifikasi</th>
        <th>Nomor Inventaris</th>
        <th>Tahun Perolehan</th>
        <th>Tanggal Cek</th>
        <th>Foto Barang</th>
        <th>Keterangan</th>
        <th>Nama User</th>
        <th>Jenis Barang</th>
        <th>Merk</th>
        <th>Ruangan</th>
        <th>Kondisi</th>
      </tr>

<?php
$IDbarang = $_GET['id'];
$query1="SELECT * FROM tblbarang INNER JOIN jenisbarang ON tblbarang.IDjenisbarang = jenisbarang.IDjenisbarang INNER JOIN users ON tblbarang.IDuser = users.id INNER JOIN kondisi ON tblbarang.IDkondisi = kondisi.IDkondisi INNER JOIN ruangan ON tblbarang.IDruangan = ruangan.IDruangan INNER JOIN merk ON tblbarang.IDmerk = merk.IDmerk
  WHERE IDbarang = $IDbarang ORDER BY IDbarang ASC";


// if(isset($_POST['qcari'])){
// 	$qcari=$_POST['qcari'];
// 	$query1="SELECT * FROM tblbarang 
// 	where IDbarang like '%$qcari%'
//   or namabarang like '%$qcari%'
// 	or kode like '%$qcari%'
//   or tipe like '%$qcari%'
//   or spesifikasi like '%$qcari%'
//   or nomorinventaris like '%$qcari%'
//   or tahunperolehan like '%$qcari%'
//   or tglcek like '%$qcari%'
//   or fotobarang like '%$qcari%'
//   or nama like '%$qcari%'
//   or namajenisbarang like '%$qcari%'
//   or namamerk like '%$qcari%'
//   or namakondisi like '%$qcari%'
//   or namaruangan like '%$qcari%'  ";

// }

$result=mysqli_query($koneksi,$query1) or die(mysql_error());
$no=1; //penomoran 
$rows=mysqli_fetch_object($result);
			?>
			<tr>
				<td><?php echo $no
				?></td>
				<td><?php		echo $rows -> kode;?></td>
        <td><?php   echo $rows -> tipe;?></td>
        <td><?php   echo $rows -> spesifikasi;?></td>
        <td><?php   echo $rows -> nomorinventaris;?></td>
        <td><?php   echo $rows -> tahunperolehan;?></td>
        <td><?php   echo $rows -> tglcek;?></td>
        <td><img src="images/<?php   echo $rows -> fotobarang;?>" width="50px" height="50px"></td>
        <td><?php   echo $rows -> ket;?></td>
        <td><?php   echo $rows -> nama;?></td>
        <td><?php   echo $rows -> namajenisbarang;?></td>
        <td><?php   echo $rows -> namamerk;?></td>
        <td><?php   echo $rows -> namaruangan;?></td>
        <td><?php   echo $rows -> namakondisi;?></td>
<!-- 
        <td><a href = 'editdetailbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>

        <td><a href = 'deletedetailbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>

        <td><a href = 'cetak_detailbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-print bg-info p-2 text-white rounded" data-toggle="tooltip" title="Print"></i></a></td>

        <td><a href = 'cekbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <button>Cek</button>
        </a></td>

          <td><a href = 'detailbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <button>Detail</button>
        </a></td> -->

			</tr>
			<?php
$no++;
?>
		</table>
	</div>

	</body>
</html>