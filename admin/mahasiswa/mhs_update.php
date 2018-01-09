<!doctype html>
<html>
    <head>
        <title>Form Update Data Mahasiswaa</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Form Update Data Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="mhs_tampil.php">KEMBALI</a>   

        </p>
      </div>
        </nav>

<?php
include ('crudMahasiswa.php');
$nim = $_GET['nim'];
$data = cariMahasiswa($nim);
$nama 	= $data['nama_mhs'];
$tahun 	= $data['th_masuk'];
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

?>


<div class="container">   
    <form class="form-horizontal" method="post" action="proses_update.php">
           

     <div class="form-group">
        <label class="control-label col-sm-3" for="nim">NIM:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nim" maxlength="9" value='<?php echo $data['nim']; ?>'/>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3" for="nama_wali">NAMA DOSEN WALI:</label>
        <div class="col-sm-6">
                <select name='id_wali' required class="form-control">
                <?php
						require_once("../../koneksi.php");
            $conn = koneksi();
            include_once "../../cekadmin.php";
						$sql  = "select * from wali";
						$result = mysqli_query($conn, $sql);
						if (!$result) die("Gagal Query hotel".mysqli_error($conn));
						// sampe sini berarti berhasil query
						while($data = mysqli_fetch_array($result)){
						   echo "<option value='{$data['id_wali']}'>{$data['nama_wali']}</option>";
						   if ($dt['id_wali'] == $dt['id_wali']) 
								 echo "selected = 'selected'";
                                        echo "> $nama_wali</option>";
						}
													
				?>
                </select>
                    
		</div>
      </div>
	  
      <div class="form-group">
        <label class="control-label col-sm-3" for="nama_mhs">NAMA MAHASISWA:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nama_mhs" maxlength="9" value='<?php echo $nama; ?> ' required/>
        </div>
	
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="th_masuk">TAHUN:</label>
        <div class="col-sm-6">
          <input  class="form-control" type="text" name="nim" maxlength="9" value='<?php echo $tahun; ?>'/>
        </div>
      </div>
            
            <div class="form-group">
        <label class="control-label col-sm-3" for="dosen">Tahun Masuk:</label>
        <div class="col-sm-6">

        <select class="form-control" name="th_masuk" required>
					   <option value="">Select tahun</option>
                    <?php
                    $sql = mysqli_query($conn, "SELECT distinct th_masuk from mahasiswa order by th_masuk desc");
                    $row = mysqli_num_rows($sql);
					    
                    while ($row = mysqli_fetch_array($sql)){
                    echo "<option value='{$row['th_masuk']}'>{$row['th_masuk']}</option>";
						if ($row['th_masuk'] == $row['th_masuk']) 
						echo "> $th_masuk</option>";
					}
					
                    ?>
					
                    </select>
                    
               </div>
      </div>
        <div class="form-group">
         <label class="control-label col-sm-3" for="dosen">STATUS:</label>
            <div class="col-sm-6">
                        <select class="form-control" name="status" required>
                            <option value="LC"  <?php if($data['status'] == 'LC'){ echo 'selected'; } ?> >LULUS CEPAT</option>
                            <option value="LT"  <?php if($data['status'] == 'LT'){ echo 'selected'; } ?> >LULUS TEPAT</option>
                            <option value="LL"  <?php if($data['status'] == 'LL'){ echo 'selected'; } ?> >LULUS LAMBAT</option>
                            <option value="BL"  <?php if($data['status'] == 'BL'){ echo 'selected'; } ?> >BELUM LULUS</option>
                        </select>
            </div>
        </div>
                       
      <label class="control-label col-sm-5" ></label>
      <button type="submit" class="btn btn-success">Update</button>
      <button type="reset" class="btn btn-danger" >Reset</button>
      <button type="button" class="btn btn-warning" onclick='history.back()'>Kembali</button>
    </form>  
  </div>


  </body>
</html>
