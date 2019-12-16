<?php
session_start();
/*if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}*/
    include'functions.php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Demo source code dengan E-Voting pemilihan umum berbasis web dengan PHP dan MySQL."/>
    <meta name="keywords" content="E-Voting, Pemilihan Umum, Pemilihan Presiden, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery"/>
    <meta name="author" content="RozorTech.net"/>
    <link rel="icon" href="assets/images/favicon2.ico"/>
    
    <title>E-Voting</title>

    <!-- Template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">


        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/slick-theme.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/bootsnav.css">
        <link rel="stylesheet" href="assets/css/animate1.css">
        <link rel="stylesheet" type="assets/css/slidecss.css">
        <link rel="stylesheet" type="assets/css/docs.min.css">
        <link rel="stylesheet" type="aseets/css/navbar.css">


        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script  src="assets/js/index.js"></script>
        <script type="assets/js/slidejs.js"></script>
        <script type="assets/js/docs.min.js"></script>
        <script type="assets/js/navbar.js"></script>

    <!-- End Template  -->
    <link href="assets/css/journal-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/fontawesome.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>       
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>              
  </head>  
<body color="#4e73df">

    <div class="container"> 
       
            <div class="row" >
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </header>
        <div class="navigasi">
        <nav class="navbar navbar-default navbar-static-top" style="border-radius:4px;">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="?">E-Voting</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse" id="navbar-menu" style="font-size:15px; ">
              <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">  
              <?php if($_SESSION['level']!='admin' || !$_SESSION['login']):?>
              <li><a href="?m=pilkada"><span class="glyphicon glyphicon-calendar"></span> Pilkada</a></li>
              <li><a href="?m=tanda_terima"><span class="glyphicon glyphicon-glyphicon glyphicon-cloud"></span> Pemilih</a></li>
              <li><a href="?m=daftar_peserta"><span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Daftar Peserta</a></li>
              <li><a href="?m=hasil_voting"><span class="glyphicon glyphicon-glyphicon glyphicon-signal"></span> Hasil Voting</a></li>    
              <?php endif?>

              <?php if($_SESSION['level']!='pemilih' && !$_SESSION['login']):?>
              <?php endif?>        

              <?php if($_SESSION['level']=='admin'):?>
                <li><a href="?m=pencalon"><span class="glyphicon glyphicon-user"></span> Pencalon</a></li>
                <li><a href="?m=pemilih"><span class="glyphicon glyphicon-th-large"></span> Pemilih</a></li> 
                <li><a href="?m=desa"><span class="glyphicon glyphicon-th-large"></span> Desa</a></li>
                <li><a href="?m=kecamatan"><span class="glyphicon glyphicon-th-large"></span> Kecamatan</a></li>  
                <li><a href="?m=daftar_peserta"><span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Daftar Peserta</a></li>
                <li><a href="?m=hasil_voting"><span class="glyphicon glyphicon-glyphicon glyphicon-signal"></span> Hasil Voting</a></li> 
                <li><a href="?m=login_pemilih"><span class="glyphicon glyphicon-glyphicon glyphicon-signal"></span> Login Pemilih</a></li> 
                        
              <?php endif ?>  
                                      
                                 
              </ul>          
              <ul class="nav navbar-nav navbar-right">
              <?php if($_SESSION['login']):?>
                <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
                <li></li>
                <li></li>
              <?php endif ?> 
              </ul>
            </div><!--/.nav-collapse -->
        </div>        
        </nav> 
        </div> 

        <div class="">
            <?php
                if(file_exists($mod.'.php')){
                    if($mod=='tanda_terima' && $_SESSION['level']!='pemilih'){
                        redirect_js('?m=login_pemilih');
                    } else {
                        include $mod.'.php';
                    }                                
                }else
                    include 'images.php';
            ?>
        </div>                          
    </div>
    <footer class="footer">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> RozorTech.net <em class="pull-right">Di Perbarui 3 Januari 2019</em></p>
      </div>
    </footer>
    </body>
</html>