<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  if (isset($_POST['update'])) {
    $IDkondisi = $_POST['IDkondisi'];
    $ket = $_POST['ket'];
    $IDuser = $_POST['IDuser'];

    mysqli_query($koneksi, "UPDATE tblbarang SET IDkondisi = $IDkondisi, ket = '$ket', IDuser = $IDuser");
    // header('')
  }
  // $result = mysqli_query($koneksi, "SELECT * FROM tblbarang
  // inner join users on tblbarang.IDuser = users.id
  // inner join ruangan using (IDruangan)
  // inner join kondisi using (IDkondisi)
  // inner join jenisbarang using (IDjenisbarang)
  // ORDER BY IDbarang ASC");
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


    <title>cek barang</title>
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
<!-- 
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
    ?> -->

 <!--    <div class=" d-flex justify-content-start">
    <a href="tambah_cekbarang.php" class="btn  btn-primary mb-2"><i class="fas fa-plus-square mr-4"></i>
        TAMBAH DATA BARANG</a>
      </div>
      <div class=" d-flex justify-content-end">
    <a style="margin-top: -33px"  href="cekbarangcetakprint.php" target="_blank" class=" btn  btn-primary mb-2"> CETAK PRINT </a>
    </div>
    <a class="d-flex justify-content-end" target="_blank" href="export_excelcekbarang.php">EXPORT KE EXCEL</a> -->
<br/>
<a href="daftarbarang.php" class="btn btn-primary"> Kembali ke Daftar Barang </a>
<br/>
<br/>
<br/>
<h3 class="text-center"> Cek Barang</h3>
<center>
  <div class="cek">
    <?php $idb = $_GET['id']?>
    <?php $barang1 = mysqli_query($koneksi, "SELECT * FROM tblbarang INNER JOIN jenisbarang ON tblbarang.IDjenisbarang = jenisbarang.IDjenisbarang INNER JOIN users ON tblbarang.IDuser = users.id INNER JOIN kondisi ON tblbarang.IDkondisi = kondisi.IDkondisi INNER JOIN ruangan ON tblbarang.IDruangan = ruangan.IDruangan INNER JOIN merk ON tblbarang.IDmerk = merk.IDmerk
  WHERE IDbarang = $idb");
    $barang = mysqli_fetch_array($barang1); ?>
    <img src="images/<?=$barang['fotobarang']; ?>" alt="" width="100">
<h5>Kode Barang: <?= $barang['kode']; ?></h5>
<h5>Terakhir Dicek Oleh: <?= $barang['username']; ?></h5>
<p>Pada: <?= $barang['tglcek']; ?></p>
<p>Keterangan: <?= $barang['ket']; ?></p>
  </div>
</center>
<br>
<br>

<form action="" method="post" enctype="multipart/form-data">
<!--     <div class="row">
        <label>Kode :</label>
        <div class="mb-3 col-md-6">
          <input type="text" readonly="" class="form-control" id="ikode" name="ikode" value="<?php echo $ikode ?>">
        </div>
        <div class="mb-3 col-md-6">
          <input type="text" readonly="" class="form-control" id="kode" name="kode" value="<?php echo $kode ?>">
        </div>
      </div> -->
      <!-- <div class="form-group">
        <label>Jenis Barang :</label>
        <select name="IDjenisbarang" id="jenisbarang" class="form-control mb-3" onchange="ganti(this.value)">
          <option selected="" value="<?php echo $IDjenisbarang ?>"><?php echo $namajenisbarang ?></option>
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
          <option selected="" value="<?php echo $IDmerk ?>"><?php echo $namamerk ?></option>
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
        <input type="text" class="form-control" name="tipe" value="<?php echo $tipe ?>">
      </div>
      <div class="form-group">
        <label>Spesifikasi :</label>
        <input type="text" class="form-control" name="spesifikasi" value="<?php echo $spesifikasi ?>">
      </div>
      <div class="form-group">
        <label>Nomor Inventaris :</label>
        <input type="text" class="form-control" name="nomorinventaris" value="<?php echo $nomorinventaris ?>">
      </div>
      <div class="form-group">
        <label>Tahun Perolehan :</label>
        <input type="text" class="form-control" name="tahunperolehan" value="<?php echo $tahunperolehan ?>">
      </div> -->
      <!-- <div class="form-group">
        <label>TanggalCek :</label>
        <input type="text" class="form-control" placeholder="Masukkan TanggalCek" name="tglcek" required="required">
      </div> -->
<!--       <div class="form-group">
        <label>Foto Barang :</label>
        <input type="file" name="fotobarang" required="required">
        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg </p>
      </div> -->
      <!-- <div class="form-group">
        <label>Ruangan :</label>
        <select name="IDruangan" class="form-control mb-3">
          <option selected="" value="<?php echo $IDruangan ?>"><?php echo $namaruangan ?></option>
          <?php
          $ruangan = mysqli_query($koneksi, "SELECT * FROM ruangan");
          while ($dataruangan = mysqli_fetch_array($ruangan)) {
            echo '<option value="'.$dataruangan['IDruangan'].'">'.$dataruangan['namaruangan'].'</option>';
          }
          ?>
        </select>
      </div> -->
      <div class="form-group">
        <label>Kondisi :</label>
        <select name="IDkondisi" class="form-control mb-3">
          <option selected="" value="<?php echo $barang['IDkondisi'] ?>"><?php echo $barang['namakondisi'] ?></option>
          <?php
          $kondisi = mysqli_query($koneksi, "SELECT * FROM kondisi");
          while ($datakondisi = mysqli_fetch_array($kondisi)) {
            echo '<option value="'.$datakondisi['IDkondisi'].'">'.$datakondisi['namakondisi'].'</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Keterangan :</label>
        <input type="text" class="form-control" name="ket">
      </div>

      <div class="form-group">
        <label>Dicek Oleh :</label>
        <input type="text" disabled="" class="form-control" value="<?php echo($_SESSION['nama']) ?>">
        <input type="hidden" class="form-control" name="IDuser" value="<?php echo($_SESSION['id']) ?>">
      </div>

      
  <input type="submit" name="update" value="update" class="btn btn-primary">
  </form>
  <br>



<!-- <table class="table table-striped table-bordered">			

		<form action='daftarbarang.php'method="POST">
	<input type='text' value='' name='qcari' placeholder="cari disini">
	<input type='submit' value='cari'><a href='daftarbarang.php' >&nbsp  All</a>
	<br/><br/>
</form>

	<table class="table table-striped table-bordered" border="2">
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Tanggal Cek</th>
        <th>Foto Barang</th>
        <th>Dicek Oleh</th>
        <th>Kondisi</th>
        <th>Ruangan</th>
        <th>Keterangan</th>
        <th>Edit</th>
        <th>Hapus</th>
        <th>Print</th>
        <th colspan="2"> &nbsp  &nbsp  &nbsp  &nbsp  Aksi &nbsp </th>
      </tr>

<?php
include 'koneksi.php';
$query1="SELECT * FROM tblbarang
  left join users on tblbarang.IDuser = users.id
  left join kondisi using (IDkondisi)
  left join ruangan using (IDruangan)
  ORDER BY IDbarang ASC";

if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM tblbarang 
	where kode like '%$qcari%'
  or tglcek like '%$qcari%'
  or nama like '%$qcari%'
  or namakondisi like '%$qcari%'
  or namaruangan like '%$qcari%'  ";

}

$result=mysqli_query($koneksi,$query1) or die(mysql_error());
$no=1; //penomoran 
while($rows=mysqli_fetch_object($result)){
			?>
			<tr>
				<td><?php echo $no
				?></td>
				<td><?php		echo $rows -> kode;?></td>
        <td><?php   echo $rows -> tglcek;?></td>
        <td><img src="images/<?php   echo $rows -> fotobarang;?>" width="50px" height="50px"></td>
        <td><?php   echo $rows -> nama;?></td>
        <td><?php   echo $rows -> namakondisi;?></td>
        <td><?php   echo $rows -> namaruangan;?></td>
        <td><?php   echo $rows -> ket;?></td>

        <td><a href = 'editcekbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i></a></td>

        <td><a href = 'deletecekbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></i></a></td>

        <td><a href = 'cetak_cekbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <i class="fas fa-print bg-info p-2 text-white rounded" data-toggle="tooltip" title="Print"></i></a></td>

        <td><a href = 'cekbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <button>Cek</button>
        </a></td>

          <td><a href = 'detailbarang.php?id=<?php echo $rows-> IDbarang;?>'>
        <button>Detail</button>
        </a></td>

			</tr>
			<?php
$no++;
}?>
		</table>
	</div>
 -->
	</body>
</html>