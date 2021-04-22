<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include_once('config.php');

  $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
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

    <title>home</title>
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
          <i class="fas fa-tachometer-alt mt=5"></i>
          HOME 
        </h3><hr>

        <div class="col-md-10 p-5 pt-2">
        <h3>
          <i class="fas fa-book-reader"></i>  Report Data
        </h3><hr>
        </div>
        
        <div class="row text-white">
          
            <div class="card bg-info mt-2 ml-5 mr-5 mb-3 text-white text-center" style="width: 18rem;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-desktop mr-2"></i> 
                </div>
                <h5 class="card-title">JUMLAH BARANG BERDASARKAN JENIS BARANG</h5>
                <br>
                <a href="jumlahjenisbarang.php"><p class="card-text text-white">Lihat Detail <i class="fas  fa-angle-double-right ml-2"></i></p></a>
              </div>
          </div>

           <div class="card bg-success mt-2 ml-5 mr-5 mb-3 text-white text-center" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fas fa-certificate mr-2"></i> 
              </div>
              <h5 class="card-title">JUMLAH BARANG BERDASARKAN KONDISI
              <br>
              <br/>
              <a href="jumlahkondisi.php"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

           <div class="card bg-danger mt-2 ml-5 mr-5 mb-3 text-white text-center" style="width: 18rem;">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fas fa-thumbtack mr-2"></i>
              </div>
              <h5 class="card-title">JUMLAH BARANG BERDASARKAN RUANGAN</h5>
              <br>
              <a href="jumlahruangan.php"><p class="card-text text-white">Lihat Detail <i class="fas  fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>
        </div>

        <div class="col-md-10 p-5 pt-2">
        <h3>
          <i class="fas fa-photo-video"></i>  Sosial Media
        </h3><hr>
        </div>
      <div class="row text-white">

          <div class="card mt-3 mr-5 text-white text-center" style="width: 18rem;">
            <div class="card-header bg-danger display-4 pb-4 pt-4">
              <i class="fab fa-instagram"></i>
            </div>
          <div class="card-body">
          <h5 class="card-title text-danger">INSTAGRAM</h5>
          <a href="https://www.instagram.com/uptblksurabaya" class="btn btn-danger">Follow</a>
          </div>
          </div>


          <div class="card mt-3 ml-5 text-white text-center" style="width: 18rem;">
            <div class="card-header bg-info display-4 pb-4 pt-4">
              <i class="fab fa-facebook"></i>
            </div>
          <div class="card-body">
          <h5 class="card-title text-info">FACEBOOK</h5>
          <a href="https://www.facebook.com/profile.php?id=356238621181985&ref=content_filter" class="btn btn-info">LIKE</a>
          </div>
          </div>

      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <!-- <script type="text/javascript" src="admin.js"></script> -->

  </body>
</html>