<?php
	include_once('config.php');

	// Mendapatkan ID dari URL Untuk melakukan penghapusan
	$IDruangan = $_GET['id'];

	// Menghapus baris user pada tabel berdasarkan id
	$result = mysqli_query($mysqli, "DELETE FROM ruangan WHERE IDruangan = $IDruangan");

	// Setelah menghapus kembali ke Home, sehingga bisa menampilkan hasil terbaru
	header("Location: ruangan.php");
?>