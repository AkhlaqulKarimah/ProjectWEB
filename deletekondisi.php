<?php
	include_once('config.php');

	// Mendapatkan ID dari URL Untuk melakukan penghapusan
	$IDkondisi = $_GET['id'];

	// Menghapus baris kondisi pada tabel berdasarkan id
	$result = mysqli_query($mysqli, "DELETE FROM kondisi WHERE IDkondisi = $IDkondisi");

	// Setelah menghapus kembali ke Home, sehingga bisa menampilkan hasil terbaru
	header("Location: kondisi.php");
?>