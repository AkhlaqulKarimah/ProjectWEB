<?php
	include_once('config.php');

	// Mendapatkan ID dari URL Untuk melakukan penghapusan
	$IDbarang = $_GET['id'];

	// Menghapus baris barang pada tabel berdasarkan id
	$result = mysqli_query($mysqli, "DELETE FROM tblbarang WHERE IDbarang = $IDbarang");

	// Setelah menghapus kembali ke Home, sehingga bisa menampilkan hasil terbaru
	header("Location: daftarbarang.php");
?>