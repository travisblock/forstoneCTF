<?php
ob_start();
include "../admin@yusuf32/web-config.php";
$error  = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $pass   = $_POST['password'];
  $usr    = addslashes(trim($_POST['user']));
  $sqlcek = mysqli_query($con, "select * from user where usrname='$usr'");
  $jml    = mysqli_num_rows($sqlcek);
  $d      = mysqli_fetch_array($sqlcek);
  
  if($jml > 0) {
    if(password_verify($pass, $d['password'])){
      session_start();
      $_SESSION['login']  = TRUE;
      $_SESSION['user']   = $d['usrname'];
      $_SESSION['id']     = $d['id'];
      $_SESSION['nama']   = $d['nick'];
      $_SESSION['foto']   = $d['foto'];
      header('location:user.php');
    }else{
      $error = "<div class='alert alert-danger'><strong>Error: </strong> Username atau password tdk cocok</div>";
    }
  }else{
    $error = "<div class='alert alert-danger'><strong>Error: </strong> Username atau password tdk cocok</div>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login <?= $title; ?></title>
    <meta name="description" content="Login User <?= $title; ?>">
    <meta name="author" content="ForstoneCTF">
    <meta name="keywords" content="CTF, <?= $title; ?>" />
    <meta name="language" content="indonesia">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.default.css" id="theme-stylesheet">
    <link rel="shortcut icon" href="<?= $logo; ?>">
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">            
            <div class="col-lg-5 bg-white align-items-center">
              <div class="form d-flex align-items-center">              
                <div class="content">
                  <?php echo "$error"; ?>
                  <form method="POST" class="form-validate">
                    <div class="form-group">
                      
                      <input id="login-username" type="text" name="user" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div><input id="register" type="submit" value="Login" class="btn btn-primary">
                  </form>
                  <br><small style="float:right;margin-top: 29px;"><a href="forgot_pass">Forgot password </a></small>
                  <br><small><a href="register/">Signup</a></small>
                </div>
              </div>
            </div>
            
            <div class="col-lg-5">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1><a href="<?= $base_url; ?>" target="_blank"><?= $title; ?></a></h1>
                  </div>
                  <p>Silahkan login untuk bermain CTF</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="<?= $base_url; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url; ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $base_url; ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= $base_url; ?>assets/js/front.js"></script>
    
  <script>
      $(document).ready(function(){
        setTimeout(function(){$(".alert").fadeIn('slow');}, 150);});
        setTimeout(function(){$(".alert").fadeOut('slow');}, 1000);
  </script>
  </body>
</html>