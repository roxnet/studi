<!doctype html>
<html>
    <head>
        <title>Daftar Hasil Perkiraan Studi</title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.css"/>
    </head> 
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#" style="color: white;" align="center"><b>Daftar Mahasiswa</b></a>
        </div>
        <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p>
      </div>
    </nav>
        <div class="container">
<?php
if(array_key_exists('hapus', $_GET))
$hapus = $_GET['hapus'];
else
$hapus = 1;

?>

<div id='content' >
  <h2 align = 'center'>Daftar Hasil Perkiraan Studi</h2>
  <?php
    if($hapus ==0)
      echo "<span style ='color :red'>gagal hapus data </span>";
      
  ?>
              <table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">NIM</th>
                        <th width="15%">NILAI K</th>
                        <th width="15%">HASIL PREDIKSI</th>
                        <th width="20%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					require_once '../../koneksi.php';
                    $conn = koneksi();                   
                    $sql ="SELECT * FROM prediksi";
                    
					$hasil = mysqli_query($conn, $sql);
					if(mysqli_num_rows($hasil) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nilaiK']; ?></td>
                                              
                        <?php if($r['hasil_prediksi'] == 'LC') {
									$pred = 'Lulus Cepat'; }
									else if ($r['hasil_prediksi'] == 'LT' ){
									$pred = 'Lulus Tepat waktu'; }
										else {
										$pred ='Belum Terlambat';
										}
									?>
                        <td><?php echo  $pred; ?></td>
                        <td>
                            
                            <a button type="button" class="btn btn-danger" href="prediksi_hapus.php?nim=<?php echo  $r['nim']; ?>" >Delete</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
					}
					else{ // if there is no matching rows do following
						echo "hasil tidak ada";
					}
                    ?>
                </tbody>
            </table>  
        </div>
        
        <script src="../../assets/js/jquery-1.11.0.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#mahasiswa").dataTable();
            });
        </script>
    </body>
</html>
