<?php
function koneksi(){
	$servername = "localhost";
	$username 	= "root";
	$password 	= "";
	$db 		= "kelulusan";

	// menciptakan koneksi
	$koneksi = mysqli_connect($servername, $username, $password, $db);

	// Cek koneksi
	if (!$koneksi) {
		die("Koneksi gagal: " . mysqli_connect_error());
	}
	return $koneksi;
}
?>