<?php
	include 'koneksi.php';
	
	session_start();
	if (isset($_SESSION['username'])) {
		
		$id = $_GET['id'];
		//var_dump($_SESSION['id_user']);die;
		$cekData = mysqli_query($koneksi,"SELECT * FROM users WHERE id ='$id'");
		//var_dump($cekData);die;
		$data = mysqli_fetch_array($cekData);

		if ($_SESSION['id'] == $data['id']) {

					?>
				<script type="text/javascript">
					alert('User Sedang Login');
					document.location.href = 'datapengguna.php';
				</script>
				<?php
				exit;
		} else {		
			
			$query = mysqli_query($koneksi,"DELETE FROM users WHERE id ='$id'"); 

			if ($query > 0) {
				?>
				<script type="text/javascript">
					alert('Data Berhasil Dihapus');
					document.location.href = 'datapengguna.php';
				</script>
				<?php
				echo mysqli_error($con);
				exit;
			} else {
				?>
				<script type="text/javascript">
					alert('Data Masih Terhubung dengan Tabel Lain');
					document.location.href = 'datapengguna.php';
				</script>
				<?php
			}
		}
	}
?>