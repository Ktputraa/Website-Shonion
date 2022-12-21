<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_shonion");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	};
	return $rows;
};

function registrasi($data)
{
	global $conn;
	$email = mysqli_real_escape_string($conn, $data['email']);
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	$data_user = mysqli_query($conn, "SELECT * FROM user");

	foreach ($data_user as $us) {
	}

	if ($us['email'] === $email) {
		echo "
		<script>
			alert('Username sudah ada!'); history.go(-1);
		</script>
		";
		exit;
	} else {
		if ($password === $password2) {
			echo "";
		} else {
			echo "
			<script>
				alert('Password tidak sesuai konfirmasi nya!'); history.go(-1);
			</script>
			";
			exit;
		}
	}


	$password = password_hash($password2, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$email', '$password', 'user')");


	return mysqli_affected_rows($conn);
}

function tambah_provinsi($data)
{
	global $conn;

	$nama = mysqli_real_escape_string($conn, $data["nama"]);
	$foto = upload();

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO daerah VALUES(NULL, '$nama', '$foto')");
	return mysqli_affected_rows($conn);
}


function cari_daerah($keyword)
{
	$query = "SELECT * FROM daerah
				WHERE
			 nama LIKE '%$keyword%'
		    ";
	return query($query);
}

function tambah_petani($data)
{
	global $conn;

	$foto = upload();
	$nama = mysqli_real_escape_string($conn, $data["nama"]);
	$alamat = mysqli_real_escape_string($conn, $data["alamat"]);
	$notelp = mysqli_real_escape_string($conn, $data["notelp"]);
	$provinsi = mysqli_real_escape_string($conn, $data["provinsi"]);
	$kabupaten = mysqli_real_escape_string($conn, $data["kabupaten"]);
	$ketersediaan = mysqli_real_escape_string($conn, $data["ketersediaan"]);
	$harga = mysqli_real_escape_string($conn, $data["harga"]);

	// Masukkan Data ke Database
	mysqli_query($conn, "INSERT INTO petani VALUES(NULL, '$foto', '$nama', '$alamat', '$notelp', '$provinsi', '$kabupaten', '$ketersediaan', '$harga')");

	return mysqli_affected_rows($conn);
}

function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'assets/imagesdb/' . $namaFileBaru);

	return $namaFileBaru;
}
