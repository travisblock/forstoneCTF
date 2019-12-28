<?php
session_start();
if(!isset($_SESSION['loginadm'])){
  header('location:index.php');
  exit;
}
include "web-config.php";
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adm00n</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap1.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/font.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/custom1.css">
    <link rel="shortcut icon" href="<?= $base_url; ?>assets/img/logo.png">
    <link rel="shortcut icon" href="<?= $logo; ?>">
    <script src="<?= $base_url; ?>vendor/jquery/jquery.js"></script>
    <script src="<?= $base_url; ?>assets/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/jquery-ui.css">
    <script src="<?= $base_url; ?>vendor/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({ 
      selector:'textarea', 
      height: 200,
      themes:'modern',
      plugins: 'image link code textcolor'
    });
    </script>


  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><?= $title; ?></div>
              <div class="brand-text brand-sm"><strong class="text-primary"></strong></div></a>
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item logout">
              <a id="logout" href="logout.php" class="nav-link">Logout <i class="icon-logout"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
        </div>
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="home.php"><i class="icon-home"></i>Home </a></li>
                <li><a href="?x=ctf"> <i class="icon-bill"></i>CTF</a></li>
                <li><a href="?x=user"> <i class="icon-user-1"></i>User</a></li>
                <li><a href="?x=web"> <i class="icon-info"></i>Web Info</a></li>
                <li><a href="?x=quotes"> <i class="icon-contract"></i>Quotes</a></li>

        </ul>
      </nav>      
      <div class="page-content">
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom"><a><?= $title; ?></a></h2>
          </div>
        </div>
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">CTF</li>
          </ul>
        </div>
        <?php include "content.php"; ?>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom">Powered by ForstoneCTF</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="<?= $base_url; ?>vendor/ckeditor/ckeditor.js"></script>
    <script src="<?= $base_url; ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $base_url; ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= $base_url; ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= $base_url; ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= $base_url; ?>assets/js/front.js"></script>


    <script type="text/javascript">
      $( "#kategori" ).autocomplete({
          source: "source.php",
          minLength :1
      });
    </script>
  </body>
</html>