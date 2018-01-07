<?php
include('crudUser.php');
$id_user 	= $_POST['id_user'];
$nm_user 	= $_POST['nm_user'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$ulangpassword 	= $_POST['ulangpassword'];
$level 		= $_POST['level'];


// lakukan validasi disini
	$data_oke = "YA";
	$pesan = "Masih Ada Kesalahan\\n\\n";
	if (strlen(trim($username)) == 0){
		$data_oke = "TIDAK";
		$pesan .="username Harus Diisi\\n";
	}
	if (strlen(trim($nm_user)) == 0){
		$data_oke = "TIDAK";
		$pesan .="nama user Harus Diisi\\n";
	}
	if (strlen(trim($password))==0){
		$data_oke = "TIDAK";
		$pesan .= "password Harus Diisi \\n";
	}
	if (strlen(trim($ulangpassword))==0){
		$data_oke = "TIDAK";
		$pesan .= "password Harus Diisi \\n";
	}
	
	if( $password != $ulangpassword ){ 
		$data_oke = "TIDAK";
		$pesan .= "password tidak sama \\n";
	}
	if (strlen(trim($level))==0){
		$data_oke = "TIDAK";
		$pesan .= "level Harus Diisi \\n";
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

$hasil = tambahUser($id_user, $nm_user, $username, $password, $level);
if($hasil > 0)
	header("Location: user_tampil.php");
else {
	echo 'gagal tambah data';
}
?>