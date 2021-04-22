<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  $result = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>hitung jumlah barang berdasarkan ruangan</title>
</head>
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
        <ul class="nav flex-column ml-5 mb-5">
          <li class="nav-item">
            <a class="nav-link active text-white" href="home.php"><i class="fas fa-tachometer-alt mr-2"></i>  Home</a><hr class="bg-secondary">
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
          <i class="fas fa-laptop mr-2"></i>
          Report Data Jumlah Barang Berdasarkan Ruangan
         </h3><hr>  


<table class="table table-striped table-bordered">
<thead>

<tr>
  <th scope="col"><p align="center">Ruangan</p></th>
  <th scope="col"><p align="center">Jumlah</p></th>
</tr>

</thead>
<tbody>
<?php
  $ruangan = mysqli_query($koneksi, "SELECT * FROM ruangan LEFT JOIN hitungruangan ON ruangan.IDruangan = hitungruangan.IDruangan");
  foreach ($ruangan as $row):
  ?>
  <tr>
    <th scope="row"> <?= $row['namaruangan']; ?></th>
    <td><?= $row['jumlah']; ?></td>
  </tr>

<?php endforeach; ?>

<br/>
<td><a href="home.php" class="btn btn-primary"> Kembali ke Home </a></td>

</tbody>
</table>

</body>
</html>