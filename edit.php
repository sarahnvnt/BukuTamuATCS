<!DOCTYPE html>
<html>
<title>CRUD </title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="card">
		<h5 class="card-header">Edit Data</h5>
		<div class="card-body">
			<h3>Update Data Tamu</h3>
			<?php
			include "koneksi.php";
			$id = $_GET['id'];
			$koneksi = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE id = '$id' ");
			while ($data = mysqli_fetch_array($koneksi)) {
			?>
				<form action="update.php" method="post">
					<table>
						<tr>
							<div class="form-group">
								<td>Nama</td>
								<td>
									<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
									<input type="text" name="nama" value="<?php echo $data['nama']; ?>">
								</td>
						</tr>
						<tr>
							<div class="form-group">
								<td>Alamat</td>
								<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
						</tr>
						<tr>
							<div class="form-group">
								<td>No Handphone </td>
								<td><input type="text" name="nope" value="<?php echo $data['nope']; ?>"></td>
						</tr>
						<tr>
							<div class="form-group">
								<td>tanggal </td>
								<td><input type="text" name="tanggal" value="<?php echo $data['tanggal']; ?>"></td>
						</tr>
						<tr>
							<div class="form-group">
								<td>Keterangan</td>
								<td><input type="text" name="keterangan" value="<?php echo $data['keterangan']; ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Simpan"></td>
						</tr>
					</table>
				</form>
		</div>
	</div>
	</div>
<?php } ?>
</body>

</html>