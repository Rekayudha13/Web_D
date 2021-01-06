<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info">Tambah Data</div>
		<?php 
		require '../koneksi.php';
		if (isset($_POST['savedata'])){
			$input_nim = $_POST[txtnim];
			$input_nama = $_POST[txtnama];
			$input_alamat = $_POST[txtalamat];

			$query = "INSERT INTO mahasiswa VALUES('$input_nim','$input_nama','$input_alamat')";
			$result = mysqli_query($link, $query);
			if ($result){
				header('location: index.php');

			}else{
				echo 'Gagal disimpan :' . mysqli_error($link);
			}

		}
		?>
		<form action="" method="post">
			<div class="form-group">
				<label for="">Nim</label>
				<input type="text" class="form-control" name="txtnim">
			</div>
			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" class="form-control" name="txtnama">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<input type="text" class="form-control" name="txtalamat">
			</div>
			<input type="submit" class="btn btn-primary" name="savedata" value="Save">
			<a href="index.php" class="btn btn-warning">Cancel</a>
		</form>
	</body>

	</html>