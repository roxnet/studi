<?php
include_once "header_mhs.php";
include_once "../cekadmin.php";
?>
<div class="container" style="margin-top:40px">
  
<div class="">
 <div class="col-lg-12">
          <h1 class="page-header"></h1>
          <div class="row justify-content-md-center">
		  <center><h3 class="page-header">PERKIRAAN HASIL STUDI </h3></center>
           <div class="col-md-4 col-md-offset-4 well">
              <div id="simpan"></div>
              
              <div class="form-group">
                <label for="nim">NIM </label>
                <input type="text" value ="<?php echo $_SESSION['username']; ?> "class="form-control" id="nim" name="nim" readonly>
                
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
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
          $("#hitung").click(function () {
            var nim = $('input[name=nim]').val();
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
<script>
$(document).ready(function(){
$(".dropdown").hover(            
function() {
$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
$(this).toggleClass('open');        
},
function() {
$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
$(this).toggleClass('open');       
}
);
});
</script>