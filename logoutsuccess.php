<?php //logoutsuccess.php
	session_start(); //jalankan session

	$_SESSION['username'] = ''; //set variabel  $_SESSION['username'] dengan variabel kosong
	

	session_destroy(); //menghapus semua data session saat ini (session remain until refresh)

	//tambahkan dibawah ini untuk menunujukan efek langsung setelah menghapus data session
	unset($_SESSION['username']); //menghapus sebuah variabel session yaitu $_SESSION['username']
	//atau
	session_unset();

	header("location: loginsuccess.php"); //redirect menuju halaman loginsuccess.php kembali 
?>