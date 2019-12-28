<?php
include "../admin@yusuf32/web-config.php";
if(isset($_GET['kode'])){
    $error_cod = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pass 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $kode 	= aman($_GET['kode']);
        $cek 	  = mysqli_query($con, "SELECT * from user where code='$kode' ");
        $cekk  	= mysqli_num_rows($cek);
        if($cekk > 0){
        	if(!empty($kode)){
        		$sql 	= mysqli_query($con, "UPDATE user set password='$pass' where code='$kode'");
                if($sql){
                	mysqli_query($con, "UPDATE user set code='' where code='$kode'");
                	$error_cod = "<script>
                      swal({
                          title: 'Success!',
                          text: 'Silahkan Login',
                          icon: 'success',
                          button: 'OK',
                      }). then(function(result){
                          window.location = './';
                          })</script>
                    ";
                }else{
                    $error_cod = "<div class='alert alert-danger'><strong>Error: </strong> Tidak bisa reset password</div>";
                }
        	}else{
        		$error_cod = "<script>
                      swal({
                          title: 'Error!',
                          text: 'Kode Expired',
                          icon: 'error',
                          button: 'OK',
                      }). then(function(result){
                          window.location = './';
                          })</script>
                    ";
        	}
        	
        }else{
        	$error_cod = "<script>
                      swal({
                          title: 'Error!',
                          text: 'Kode Expired',
                          icon: 'error',
                          button: 'OK',
                      }). then(function(result){
                          window.location = './';
                          })</script>
                    ";
        }
    }

        
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Your Password | <?= $title; ?></title>
    <meta name="description" content="Login User <?= $title; ?>">
    <meta name="author" content="ForstoneCTF">
    <meta name="keywords" content="CTF, <?= $title; ?>" />
    <meta name="language" content="indonesia">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.default.css" id="theme-stylesheet">
    <link rel="shortcut icon" href="<?= $logo; ?>">
    <script src="../assets/swal.js"></script>
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">            
            <div class="col-lg-5 bg-white align-items-center">
              <div class="form d-flex align-items-center">              
                <div class="content">
	            <?php echo $error_cod; ?>
                  <form method="POST" class="form-validate">
                    <div class="form-group">
                      <input id="login-username" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-username" class="label-material">New Password</label>
                    </div>
                    <input id="register" type="submit" value="Submit" class="btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
            
            <div class="col-lg-5">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1><a href="" target="_blank">Reset Passwd</a></h1>
                  </div>
                  <p>Reset password</p>
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

<?php
}else{
    echo "<script>
          swal({
              title: 'Error!',
              text: 'Kode Expired',
              icon: 'error',
              button: 'OK',
          }). then(function(result){
              window.location = './';
              })</script>
        ";
}
?>

  </body>
</html>