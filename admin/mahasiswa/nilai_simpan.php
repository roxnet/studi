<?php
include_once '../../koneksi.php';
$conn 		= koneksi();

$id_nilai 	= $_POST['id_nilai'];
$nim 		= $_POST['nim'];
$semester 	= $_POST['semester'];
$sks 		= $_POST['sks'];
$ips 		= $_POST['ips'];


$p ="Masih ada Kesalahan, silahkan perbaiki  \\n\\n";
$dataValid = "ya";

	if  (empty($nim)){
		$p .="nim Harus Diisi \\n";
		$dataValid ="tidak";
	}

	$ceknilai = mysqli_query($conn, "SELECT * FROM nilai_semester where nim = '$nim' AND semester = '$semester'");
	if ($a = mysqli_fetch_assoc($ceknilai) > 0) {
	
	$dataValid = "tidak";
	$pesan .="DATA SEMESTER INI SUDAH ADA\\n";
	}
	

	if  ($dataValid == "tidak"){
	echo "<script>
			alert('$p');
			self.history.back();
			</script>";
	exit;
	}

$hasil = mysqli_query($conn, "INSERT INTO nilai_semester VALUES ('$id_nilai', '$nim' , '$semester', '$sks' , '$ips')");

if($hasil > 0)
	echo "<div class='alert alert-danger' role='alert'>BERHSIL SIMPAN DATA</div>";
	header("Location: nilai_permhs.php?nim=$nim");
else {
	echo 'gagal tambah data' . mysqli_error($conn);
}
?>
