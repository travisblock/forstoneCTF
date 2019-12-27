<?php 
ob_start();
session_start();
include_once "../admin@yusuf32/web-config.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?= $title; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../../vendor/fontawesome-free/css/all.css">
  <link href="../assets/css/material-dashboard-x.css" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="/style.css" rel="stylesheet" />
  
  <script src="../assets/swal.js"></script> 
</head>
<body class="dark-edition">
    <?php
    if(!isset($_SESSION['login'])){
        echo "<script>
            swal({
                title: 'Gagal',
                text: 'Login Dulu Gan',
                icon: 'error',
                button: 'OK',
            }). then(function(result){
                window.location = 'index.php';
            })</script>";
    exit;
    }
    ?>
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black" >
      <div class="logo">
        <a  class="simple-text logo-normal" href="<?= $base_url; ?>" target="_blank">
          <?= $title; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?z=ctf">
              <p>Challenges</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?z=editprofil">
              <p>Edit profil</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?z=profil">
              <p>My Profil</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-uppercase" href="logout.php" style="color:red" onClick="return confirm('Anda Yakin Akan Keluar?');">
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" >
              <?php 
                $id   = intval($_SESSION['id']);
                $sqp  = mysqli_query($con, "SELECT * FROM user where id='$id'");
                $dg   = mysqli_fetch_array($sqp);
                $nick = aman($dg['nick']);
                $poin = $dg['nilai'];
                echo "Welcome $nick   -   <font class='text-success'>$poin poin </font>";
                ?>
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
              
              <?php 
                      $sql= mysqli_query($con, "SELECT * from user where id='$id'");
                      while($d= mysqli_fetch_array($sql)){
                          $nickk = aman($d['nick']);
                        echo "
              <li class='nav-item'>
                <a class='nav-link'>";
                if(empty($d['foto'])){
                  echo "<img class='avatar' src='img/dev.png' alt='$title - $nickk' title='$title - $nickk'>";
                }else{
                  echo "<img class='avatar' src='img/$d[foto]' alt='$title - $nickk' title='$title - $nickk'>";
                }echo "
                  <p class='d-lg-none d-md-block'>
                    
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class='content'>
        <div class='container-fluid'>
          <div class='row'>
            "; }
            include "user-config.php";
            
            ?>
    </div>
  </div>
  
  
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>\
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <script src="../assets/demo/demo.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#show').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'getDetail='+ getDetail,
                success : function(data){
                $('.modal-data').html(data);
                }
            });
         });
    });
  </script>

</body>

</html>