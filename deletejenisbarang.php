<?php
	include_once('config.php');

	// Mendapatkan ID dari URL Untuk melakukan penghapusan
	$IDjenisbarang = $_GET['id'];

	// Menghapus baris user pada tabel berdasarkan id
	$result = mysqli_query($mysqli, "DELETE FROM jenisbarang WHERE IDjenisbarang = $IDjenisbarang");

	// Setelah menghapus kembali ke Home, sehingga bisa menampilkan hasil terbaru
	header("Location: jenisbarang.php");
?>