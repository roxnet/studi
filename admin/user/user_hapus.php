<?php
include_once('crudUser.php');
include_once "../../cekadmin.php";
$id_user = $_GET['id_user'];
	$hasil = hapusUser($id_user);
		header("Location: user_tampil.php?hapus=".$hasil);
?>