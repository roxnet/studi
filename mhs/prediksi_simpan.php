<?php
include_once "../../koneksi.php";

    $nim=$_POST["nim"];
    $hasil=$_POST['hasil'];
	$nilaik=$_POST['nilaik'];
    $koneksi=koneksi();

    $simpan=mysqli_query($koneksi,"INSERT INTO PREDIKSI (nim, nilaik, hasil_prediksi) VALUES (".$nim.",'".$nilaik."','".$hasil."')");
    if($simpan){
			echo "<div class='alert alert-success' role='alert'>DATA BERHASIL DISIMPAN</div>";
			
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>GAGAL SIMPAN DATA</div>";
		}
?>