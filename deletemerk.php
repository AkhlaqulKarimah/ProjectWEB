<?php
	include_once('config.php');

	// Mendapatkan ID dari URL Untuk melakukan penghapusan
	$IDmerk = $_GET['id'];

	// Menghapus baris merk pada tabel berdasarkan id
	$result = mysqli_query($mysqli, "DELETE FROM merk WHERE IDmerk = $IDmerk");

	// Setelah menghapus kembali ke Home, sehingga bisa menampilkan hasil terbaru
	header("Location: merk.php");
?>