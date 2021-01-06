<!DOCTYPE html>
<html>
<head>
	<title>Data Dosen</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info">Update Data</div>
		<?php 
		require '../koneksi.php';
		if (isset($_GET['url-nip'])) {
			$input_nip = $_GET['url-nip'];
			$query = "SELECT * FROM dosen WHERE nip='$input_nip'";
			$result = mysqli_query($link, $query);
			$isi = mysqli_fetch_object($result);
		}
		if (isset($_POST['savedata'])){
			$input_nip = $_POST[txtnip];
			$input_nama = $_POST[txtnama];
			$input_alamat = $_POST[txtalamat];

			$query = "UPDATE dosen SET nama_dosen='$input_nama', alamat='$input_alamat'
			WHERE nip='$input_nip'";

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
				<label for="">Nip</label>
				<input type="text" class="form-control" name="txtnip" value="<?= $isi->nip; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" class="form-control" name="txtnama" value="<?= $isi->nama_dosen; ?>">
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