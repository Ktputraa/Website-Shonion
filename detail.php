<?php

include 'functions.php';
$nama = $_GET['nama'];

$petani = mysqli_query($conn, "SELECT * FROM petani WHERE provinsi = '$nama'");


?>

<!DOCTYPE html>
<html>

<head>
	<title>DETAIL DATA</title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}

		body {
			/* width: 100%; */
			min-height: 100%;
			/*background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(images/bg5.jpg);*/
			background-image: url(./assets/images/bgcobaa.jpg);
			background-position: cover;
			background-size: cover;
			/* display: flex; */
			justify-content: center;
			align-items: center;
		}

		a {
			background-color: #30241c;
			color: #fff;
			padding: 10px;
			text-decoration: none;
			font-size: 12px;
			border-radius: 10px;
		}

		h1 {
			text-transform: uppercase;
			color: rgb(15, 14, 13);
			/* margin-right: 50px; */

		}

		table {
			color: #DDEEEE;
			border: solid 3px #110404;
			background-color: #573c3c;
			border-collapse: collapse;
			border-spacing: 0;
			width: 90%;
			margin: 10px auto 10px auto;

		}

		table thead th {
			background-color: #DDEFEF;
			border: solid 3px #000000;
			color: #336B6B;
			padding: 10px;
			text-align: left;
			/* text-shadow: 1px 1px 1px #fff; */
			text-decoration: none;

		}

		table tbody td {
			border: solid 3px #000000;
			color: rgb(255, 255, 255);
			padding: 10px;
			/* text-shadow: 1px 1px 1px #fff; */

		}

		.container {
			margin-left: 580px;
			margin-top: 50px;
		}
	</style>
</head>

<body>

	<div class="container">
		<h1>Data Panen</h1>
		<br>
	</div>
	<a href="index.php#Restaurant" style="float : left; margin: 7px 0 0 5px;">Kembali </a>


	<table border="1">
		<thead>
			<tr>
				<th scope="col">NO</th>
				<th scope="col">Foto</th>
				<th scope="col">Nama</th>
				<th scope="col">Alamat</th>
				<th scope="col">No Telepon</th>
				<th scope="col">Provinsi</th>
				<th scope="col">Kabupaten</th>
				<th scope="col">Ketersediaan</th>
				<th scope="col">Harga/Kg</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			<?php foreach ($petani as $p) : ?>
				<tr>
					<th scope="row"><?php $i++;
									echo $i; ?></th>
					<td> <img src="assets/imagesdb/<?= $p['gambar']; ?>" style="width: 100px; max-height: 100px;border-radius: 100%;"></td>
					<td><?= $p['nama']; ?></td>
					<td><?= $p['alamat']; ?></td>
					<td><?= $p['notelp']; ?></td>
					<td><?= $p['provinsi']; ?></td>
					<td><?= $p['kabupaten']; ?></td>
					<td><?= $p['ketersediaan']; ?></td>
					<td><?= number_format($p['harga'], 0); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>

</html>