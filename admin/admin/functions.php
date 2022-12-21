<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_shonion");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	};
	return $rows;
};

function edit_petani($data){
	global $conn;

	$id_petani = $data['id_petani'];

	$foto = upload();
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$notelp = $data["notelp"];
	$provinsi = $data["provinsi"];
	$kabupaten = $data["kabupaten"];
	$ketersediaan = $data["ketersediaan"];
	$harga = $data["harga"];

	$query = "UPDATE petani SET
		gambar = '$foto',
		nama = '$nama',
		alamat = '$alamat',
		notelp = '$notelp',
		provinsi = '$provinsi',
		kabupaten = '$kabupaten',
		ketersediaan = '$ketersediaan',
		harga = '$harga'
		WHERE id_petani = $id_petani
		";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function delete_petani($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM petani WHERE id_petani = $id");

	return mysqli_affected_rows($conn);
}

function upload() {
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
    move_uploaded_file($tmpName, '../../assets/imagesdb/' . $namaFileBaru);

    return $namaFileBaru;
}
