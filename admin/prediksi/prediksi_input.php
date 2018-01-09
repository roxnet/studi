<?php
include_once "../../cekadmin.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Prediksi</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="row">
          <h4 class="page-header">  <p class="navbar-text navbar-right hidden-xs" style="color: black;padding-right: 10px;">
        <a class="navbar-text navbar-right hidden-xs" style="color: black;padding-right: 10px" href="../halaman_admin.php">KEMBALI</a>   

        </p></h4>
        <div class="col-lg-12">
         
          <div class="row justify-content-md-center">
           <div class="col-md-4 col-md-offset-4 well">
              <div id="simpan"></div>
              <center><h3 class="page-header">PERKIRAAN HASIL STUDI </h3></center>
              <div class="form-group">
                <label for="nim">Data Testing</label>
                <select class="form-control" id="nim" name="nim">
                <?php
                   include_once "../../koneksi.php";
                      $koneksi=koneksi();
                    $datatesting=mysqli_query($koneksi,"SELECT distinct A.nim,A.nama_mhs FROM Mahasiswa A
                    INNER JOIN nilai_semester B ON A.nim=B.nim WHERE A.status='BL' ORDER BY A.nim;");
                  while ($data=mysqli_fetch_assoc($datatesting))
                    echo "
                      <option value=".$data['nim'].">".$data['nim']." - ".$data['nama_mhs']."</option>
                  ";

                ?>
               </select>
              </div>
              <div class="form-group">
                <label for="sel1">Nilai K:</label>
                <select class="form-control" id="sel1" name="nilaik">
                  <option value="5">5</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="25">25</option>
                  <option value="40">40</option>
                </select>
              </div>
                <center><button id="hitung" type="button" class="btn btn-primary">HITUNG</button></center>
            </div>
            <!--munculkan hasil -->
            <div id="hasil">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
          $("#hitung").click(function () {
            var nim = $('select[name=nim]').val();
            var nilaik = $('select[name=nilaik]').val();
            $.ajax({
              type: "POST",
              url: "prediksi_proses.php",
              data: 'nim=' + nim + '&nilaik=' + nilaik,
              success: function (respons) {
                $('#hasil').html(respons);
              }
            });
          });
        
      });


              
    </script>
  </body>

</html>
