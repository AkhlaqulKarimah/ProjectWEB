<?php
session_start();
if(!$_SESSION['username']) {
  header('location: loginsuccess.php');
} 
  include 'koneksi.php';

  // $result = mysqli_query($koneksi, "SELECT * FROM tblbarang ORDER BY IDbarang ASC");
?>
<html>
<head>
	<title>CETAK PRINT DATA BARANG</title>
</head>
<body>
 
	<center>
 
		<h2>DATA BARANG</h2>
 
	</center>
 
	
 
	<table border="2" style="width: 100%">
	<tr>
		<td>IDbarang</td>
        <td>Kode</td>
        <td>Tipe</td>
        <td>Spesifikasi</td>
        <td>Nomor Inventaris</td>
        <td>Tahun Perolehan</td>
        <td>Tanggal Cek</td>
        <td>Foto Barang</td>
        <td>Nama User</td>
        <td>Jenis Barang</td>
        <td>Merk</td>
        <td>Kondisi</td>
        <td>Ruangan</td>
	</tr>
		<?php 
		$no = 1;
		$IDbarang = $_GET['id'];
		$sql = mysqli_query($koneksi,"SELECT * FROM tblbarang INNER JOIN jenisbarang ON tblbarang.IDjenisbarang = jenisbarang.IDjenisbarang INNER JOIN users ON tblbarang.IDuser = users.id INNER JOIN kondisi ON tblbarang.IDkondisi = kondisi.IDkondisi INNER JOIN ruangan ON tblbarang.IDruangan = ruangan.IDruangan INNER JOIN merk ON tblbarang.IDmerk = merk.IDmerk
  WHERE IDbarang = $IDbarang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['kode']; ?></td>
			<td><?php echo $data['tipe']; ?></td>
			<td><?php echo $data['spesifikasi']; ?></td>
			<td><?php echo $data['nomorinventaris']; ?></td>
			<td><?php echo $data['tahunperolehan']; ?></td>
			<td><?php echo $data['tglcek']; ?></td>
			<td><img src="images/<?php echo $data['fotobarang']; ?>" width="50px" height="50px"></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['namajenisbarang']; ?></td>
			<td><?php echo $data['namamerk']; ?></td>
			<td><?php echo $data['namakondisi']; ?></td>
			<td><?php echo $data['namaruangan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>