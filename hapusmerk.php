<?php
	include 'koneksi.php';
	$IDmerk = $_GET['id']; 
	$query = mysqli_query($koneksi,"DELETE FROM merk WHERE IDmerk ='$IDmerk'");
	// var_dump($query);die(); 

	if ($query > 0) {
		?>
		<script type="text/javascript">
			alert('Data Berhasil Dihapus');
			document.location.href = 'merk.php';
		</script>
		<?php
		echo mysqli_error($koneksi);
		exit;
	} else {
		?>
		<script type="text/javascript">
			alert('Data Masih Terhubung dengan Tabel Lain');
			document.location.href = 'merk.php';
		</script>
		<?php
	}
?>