<html>
<head>

<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/highcharts.js" type="text/javascript"></script>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.css"/>

</head>

    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
                    <a class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px" href="../halaman_admin.php">Dasboard</a>
                </p>
            </div>
        </nav>
        <div class="container">

<center><h3><b> HASIL PREDIKSI MAHASISWA </b></h3></center>            
            <!-- Awal Form search-->
            <br/><form name="form" action="#" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nilaik">Nilai Kedekatan:</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="nilaik" name="nilaik">
                        <option >--Select--</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                          
                        </select>
                        <br/>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">TAMPIL</button>
            </form>

<?php
if(array_key_exists('nilaik',$_POST)){
$nilaik = $_POST['nilaik'];

?>

<table id="mahasiswa" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th width="10%">NOMOR</th>
                        <th width="15%">NIM</th>
                        <th width="15%">NAMA MAHASISWA</th>
                        <th width="15%">HASIL PREDIKSI</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
					include_once "../koneksi.php";
                          $conn=koneksi();
                     $sql1   = "SELECT * FROM prediksi inner join mahasiswa 
           			on prediksi.nim = mahasiswa.nim 
           			 where mahasiswa.status = 'BL' AND prediksi.nilaik = '$nilaik'
           			 ";
                    
					$hasil1 = mysqli_query($conn, $sql1);
					if(mysqli_num_rows($hasil1) > 0){
					$no = 1;
						while ($r = mysqli_fetch_array($hasil1)) {
                                     
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nim']; ?></td>
                        <td><?php echo  $r['nama_mhs']; ?></td>
                                              
                        <?php if($r['hasil_prediksi'] == 'LC') {
									$pred = 'Lulus Cepat'; }
									else if ($r['hasil_prediksi'] == 'LT' ){
									$pred = 'Lulus Tepat waktu'; }
										else {
										$pred ='Belum Terlambat';
										}
									?>
                        <td><?php echo  $pred; ?></td>
                        
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


<script type="text/javascript">
var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Hasil Perkiraan Studi '
         },
         xAxis: {
            categories: ['Hasil Prediksi']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 

           $sql   = "SELECT hasil_prediksi FROM prediksi inner join mahasiswa 
           			on prediksi.nim = mahasiswa.nim 
           			 where mahasiswa.status = 'BL' AND prediksi.nilaik = '$nilaik'
           			 GROUP BY prediksi.hasil_prediksi";

            $query = mysqli_query($conn, $sql )  or die(mysqli_error($conn));

            while( $ret = mysqli_fetch_array( $query ) ){
            	$hasil=$ret['hasil_prediksi'];  

                 $sql_jumlah   = "SELECT count(hasil_prediksi) jumlah FROM prediksi inner join mahasiswa
                 				on prediksi.nim = mahasiswa.nim 
                 				 WHERE mahasiswa.status = 'BL' and hasil_prediksi='$hasil'  AND nilaik = '$nilaik'";        
                 $query_jumlah = mysqli_query($conn, $sql_jumlah ) or die(mysqli_error($conn));
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $hasil; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
</div>
<?php
 }
 ?>
</body>
</html>