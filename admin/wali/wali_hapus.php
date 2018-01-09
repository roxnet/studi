<?php
include_once('crudWali.php');
include_once "../../cekadmin.php";
$id_wali = $_GET['id_wali'];
	$hasil = hapusWali($id_wali);
		header("Location: wali_tampil.php?hapus=".$hasil);
?>