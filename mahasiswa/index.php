<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="alert alert-info">Data Mahasiswa</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				require '../koneksi.php';
				$query = "SELECT * FROM Mahasiswa";
				$result = mysqli_query($link, $query);
				$no = 1;
				while ($isi = mysqli_fetch_object($result)){
					?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?php echo $isi->nim; ?></td>
						<td><?= $isi->nama_mahasiswa; ?></td>
						<td><?= $isi->alamat; ?></td>
						<td>
							<a href="" class="btn btn-danger">Delete</a>
							<a href="" class="btn btn-warning">Edit</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>

</body>
</html>