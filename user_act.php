<?php //user_act.php
include 'koneksi.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
	header("location:datapengguna.php?alert=gagal_ekstensi");
}else{
	if ($ukuran < 1044070) {
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'],'images/'.$rand.'_'.$filename);
		$inventaris = mysqli_query($koneksi,"INSERT INTO users VALUES('','$nama','$username','$password','$xx')");
		header("location:datapengguna.php?alert=berhasil");
	}else{
		header("location:datapengguna.php?alert=gagal_ukuran");
	}
}
?>