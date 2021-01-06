<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info">Update Data</div>
		<?php 
		require '../koneksi.php';
		if (isset($_GET['url-nim'])) {
			$input_nim = $_GET['url-nim'];
			$query = "SELECT * FROM mahasiswa WHERE nim='$input_nim'";
			$result = mysqli_query($link, $query);
			$isi = mysqli_fetch_object($result);
		}
		if (isset($_POST['savedata'])){
			$input_nim = $_POST[txtnim];
			$input_nama = $_POST[txtnama];
			$input_alamat = $_POST[txtalamat];

			$query = "UPDATE mahasiswa SET nama_mahasiswa='$input_nama', alamat='$input_alamat'WHERE nim='$input_nim'";

			$result = mysqli_query($link, $query);
			if ($result){
				header('location: index.php');
			} else{
				echo 'Gagal disimpan :' . mysqli_error($link);
			}
		}
		?>
		<form action="" method="post">
			<div class="form-group">
				<label for="">Nim</label>
				<input type="text" class="form-control" name="txtnim" value="<?= $isi->nim; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" class="form-control" name="txtnama" value="<?= $isi->nama_mahasiswa; ?>">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<input type="text" class="form-control" name="txtalamat" value="<?= $isi->alamat; ?>">
			</div>
			<input type="submit" class="btn btn-primary" name="savedata" value="Save">
			<a href="index.php" class="btn btn-warning">Cancel</a>
		</form>
	</body>

	</html>