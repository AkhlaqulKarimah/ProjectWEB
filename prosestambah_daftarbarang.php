<?php //prosestambah_daftarbarang.php
include 'koneksi.php';
//$IDbarang = $_POST['IDbarang'];
// $namabarang = $_POST['namabarang'];
$ikode = $_POST['ikode'];
$kode = $_POST['kode'];
$kodebarang = $ikode.'-'.$kode;
$tipe = $_POST['tipe'];
$spesifikasi = $_POST['spesifikasi'];
$nomorinventaris = $_POST['nomorinventaris'];
$tahunperolehan = $_POST['tahunperolehan'];
$ket = $_POST['ket'];
$IDuser = $_POST['IDuser'];
$IDjenisbarang = $_POST['IDjenisbarang'];
$IDmerk = $_POST['IDmerk'];
$IDruangan = $_POST['IDruangan'];
$IDkondisi = $_POST['IDkondisi'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['fotobarang']['name'];
$ukuran = $_FILES['fotobarang']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
	header("location:daftarbarang.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 1044070) {
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['fotobarang']['tmp_name'],'images/'.$xx);
		// var_dump(mysqli_query($koneksi,"INSERT INTO tblbarang SET kode = '$kodebarang', tipe = '$tipe', spesifikasi = '$spesifikasi', nomorinventaris = $nomorinventaris, tahunperolehan = $tahunperolehan, fotobarang = '$xx', IDuser = $IDuser, IDjenisbarang = $IDjenisbarang, IDmerk = $IDmerk, IDruangan = $IDruangan, IDkondisi = $IDkondisi"));die;
		mysqli_query($koneksi,"INSERT INTO tblbarang SET kode = '$kodebarang', tipe = '$tipe', spesifikasi = '$spesifikasi', nomorinventaris = $nomorinventaris, tahunperolehan = $tahunperolehan, fotobarang = '$xx', ket = '$ket', IDuser = $IDuser, IDjenisbarang = $IDjenisbarang, IDmerk = $IDmerk, IDruangan = $IDruangan, IDkondisi = $IDkondisi");
		
		header("location:daftarbarang.php?alert=berhasil");
	}else{
		header("location:daftarbarang.php?alert=gagal_ukuran");
	}
}
?>