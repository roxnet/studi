<?php
include('crudMahasiswa.php');
$update = $_POST['update'];
if($update == 'update'){
	$nim 	= $_POST['nim'];
	$id_wali 	= $_POST['id_wali'];
	$nama_mhs 	= $_POST['nama_mhs'];
	$th_masuk 		= $_POST['th_masuk'];
	$status			= $_POST['status'];
	
	echo $id_user;
	// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	if (strlen(trim($nim)) == 0){
		$data_oke = "TIDAK";
		$pesan .="nim Harus Diisi\\n";
	}
	if (strlen(trim($id_wali))==0){
		$data_oke = "TIDAK";
		$pesan .= "id_wali Harus Diisi \\n";
	}
	if (strlen(trim($nama_mhs))==0){
		$data_oke = "TIDAK";
		$pesan .= "nama mahasiswa Harus Diisi \\n";
	}
	
	if (strlen(trim($th_masuk))==0){
		$data_oke = "TIDAK";
		$pesan .= "tahun angkatan mahasiswa Harus Diisi \\n";
	}
	
		if (strlen(trim($status))==0){
		$data_oke = "TIDAK";
		$pesan .= "status mahasiswa Harus Diisi \\n";
	}
	// dicek apakah data yang diisikan OKE atau TIDAK
	if ($data_oke == "TIDAK") {
		// berarti ada kesalahan
		echo "<script>
			alert('$pesan');
			self.history.back();
			</script>";
		exit;	// program berhenti
	}

$hasil = ubahUser($nim, $id_wali, $nama_mhs, $th_masuk, $status);
header("Location: mhs_tampil.php");

}
?>