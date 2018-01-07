<!DOCTYPE html>
<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");	
}
?>
<html>
<head>
<title>HALAMAN KAPRODI</title>

		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HALAMAN KAPRODI</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <script src="../assets/js/jquery-1.11.1.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="#">
				<?php
				$nama = $_SESSION['nm_user'];
                echo "<img style='height: 30px; margin-top: -5px;' src='../assets/img/icon/$nama.png' class='img-circle'>";
				?> 
				<div class="pull-left">
				<p style="margin: -25px 40px 10px;">Selamat Datang Kaprodi :<i><?php echo $_SESSION['nm_user']; ?></i></p>
				
				</div>
            </a>
        </div>

        <div class="navbar-collapse collaps" id="bs-example-navbar-collapse-1">
        	
            <ul class="nav navbar-nav navbar-right">
				<li></i></li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Dosen Wali<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="wali_tampil.php">Daftar Dosen Wali</a></li>
				
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Mahasiswa<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="mhs_tampil.php">Daftar Mahasiswa</a></li>
				<li><a href="mhs_tambah.php">Input Mahasiswa</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Nilai<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="mahasiswa/nilai_tampil.php">Daftar Nilai</a></li>
				</ul>
				</li>
				<li class="c2 dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Prediksi<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="prediksi_input.php">Prediksi Input</a></li>
				<li><a href="data_training.php">Data Training</a></li>
				<li><a href="data_testing.php">Data Testing</a></li>
				<li><a href="prediksi_tampil.php">Prediksi</a></li>
				<li><a href="akurasi_input.php">Akurasi</a></li>
				</ul>
				</li>
				
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
		
<div class="container" style="margin-top:40px">
  <h2>KOSONG</h2>
  <a href = "http://ilmu-detil.blogspot.co.id/2016/03/cara-update-android-studio-ke-versi.html" class="list-group-item">Update Android Studi ke versi terbaru</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/03/contoh-php-jquery-ajax-dropdown-list.html" class = "list-group-item">Jquery Ajax Dropdown List</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/02/php-deteksi-browser-dan-ip-serta-os.html" class = "list-group-item">Deteksi Browser, IP,OS beserta dengan Iconnya </a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/02/php-format-tanggal-indonesia-dari-database.html" class = "list-group-item">Php Format Tanggal Bahasa Indonesia</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/01/tutorial-searching-dengan-php-mysql.html" class = "list-group-item">Tutorial Searching dengan Php MySQL</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/02/cara-membuat-image-slideshow-pada-web.html" class = "list-group-item">Membuat Image Slidehshow dengan Bootstrap</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/01/membuat-bagan-organisasi-dengan-jquery.html" class = "list-group-item">Membuat Bagan Organisasi dengan Jquery</a>
<a href = "http://ilmu-detil.blogspot.co.id/2016/01/fungsi-php-untuk-cuplikan-berita.html" class = "list-group-item">Membuat Cuplikan Berita dengan Php</a>
</div>				

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