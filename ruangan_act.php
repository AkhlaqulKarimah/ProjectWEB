<?php //ruangan_act.php
include 'koneksi.php';
$IDruangan = $_POST['IDruangan'];
$namaruangan = $_POST['namaruangan'];
$keteranganruangan = $_POST['keteranganruangan'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['fotoruangan']['name'];
$ukuran = $_FILES['fotoruangan']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
	header("location:ruangan.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 1044070) {
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['fotoruangan']['tmp_name'],'images/'.$xx);
		mysqli_query($koneksi,"INSERT INTO ruangan VALUES(NULL, '$namaruangan','$keteranganruangan','$xx')");
		header("location:ruangan.php?alert=berhasil");
	}else{
		header("location:ruangan.php?alert=gagal_ukuran");
	}
}
?>