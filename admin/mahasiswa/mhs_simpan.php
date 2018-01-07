<?php
	include_once('crudMahasiswa.php');
	$nim 		= $_REQUEST['nim'];
	$id_wali 	= $_POST['id_wali'];
	$nama_mhs 	= $_POST['nama_mhs'];
	$th_masuk	= $_POST['th_masuk'];
	$status		= $_POST['status'];
	
	$dataValid ="ya";

	echo $nim;
	

	$p ="Masih ada Kesalahan, silahkan perbaiki  \\n\\n";
	if  (empty($nim)){
		$p .="nim Harus Diisi \\n";
		$dataValid ="tidak";
	}
	if  (empty($id_wali)){
		$p .=" ID Wali Harus Diisi \\n";
		$dataValid ="tidak";
	}
	
	
	if  (empty($nama_mhs)){
		$p .="Nama Mahasiswa Harus Diisi \\n";
		$dataValid ="tidak";
	}
		if  (empty($th_masuk)){
		$p .="tahun masuk Harus Diisi \\n";
		$dataValid ="tidak";
	}
	if  (empty($status)){
		$p .="status Mahasiswa Harus Diisi \\n";
		$dataValid ="tidak";
	}
	if  ($dataValid == "tidak"){
	echo "<script>
			alert('$p');
			self.history.back();
			</script>";
	exit;
	}
	
$hasil = tambahMahasiswa($nim, $id_wali, $nama_mhs, $th_masuk, $status);
if($hasil > 0)
	header("Location: mhs_tampil.php");
else {
	echo 'gagal tambah data';
}

?>

