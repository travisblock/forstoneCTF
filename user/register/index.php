<?php
  include "../../admin@yusuf32/web-config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register <?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Register User <?= $title; ?>">
    <meta name="author" content="FORSTONE">
    <meta name="keywords" content="Forstone, TKJ, Web TKJ" />
    <meta name="language" content="indonesia">
    <link rel="shortcut icon" href="<?= $logo; ?>">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.default.css" id="theme-stylesheet">
    <script src="<?= $base_url; ?>assets/swal.js"></script>
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center my-4">
        <div class="form-holder has-shadow">
          <div class="row">
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1><a href="/ctf" target="_blank"><?= $title; ?></a></h1>
                  </div>
                  <p>Silahkan register untuk bermain CTF</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $foto   = $_FILES['foto']['name'];
    $size   = $_FILES['foto']['size'];
    $tipe   = pathinfo($foto, PATHINFO_EXTENSION);
    $tmp    = $_FILES['foto']['tmp_name'];
    $path   = "../img";
    $tgl    = date("Y-m-d");
    $nama   = aman($_POST['nama']);
    $user   = aman($_POST['user']);
    $url    = url($_POST['nama']);
    $email  = aman($_POST['email']);
    $passw  = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if(!empty($nama && $user && $email)){
        if(strlen($nama) < 3){
          echo "<div class='alert alert-danger'><strong>Error: </strong> Nick terlalu pendek (min 3 karakter)</div>";
        }elseif(strlen($nama) > 30){
          echo "<div class='alert alert-danger'><strong>Error: </strong> Nick terlalu panjang (max 30 karakter)</div>";
        }else{
            $cekjml = mysqli_query($con, "SELECT * FROM user where nick='$nama' OR url='$url' OR usrname='$user' ");
            $jml    = mysqli_num_rows($cekjml);   
            if($jml > 0){
                echo "<div class='alert alert-danger'><strong>Error: </strong> Username atau Nick sudah digunakan</div>";
              }else{  
                if($foto){        
                  if($tipe === 'jpg' || $tipe === 'png' || $tipe === 'jpeg' ){
                    if($size <= 999999){
                      $temp = explode(".", $_FILES["foto"]["name"]);
                      $nama_baru = round(microtime(true)) . '.' . end($temp);
                        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $path."/" . $nama_baru)){
                          $sql= mysqli_query($con, "INSERT into user (nick,url,usrname,password,foto,nilai,sudah,email,web,facebook,github,quotes,date,code) values ('$nama','$url','$user','$passw','$nama_baru', '0', '0', '$email', '', '', '', '', '$tgl', '')");
                          if($sql){
                            echo "<script>
                            swal({
                                title: 'Success!',
                                text: 'Silahkan Login',
                                icon: 'success',
                                button: 'OK',
                            }). then(function(result){
                                window.location = '../index.php';
                                })</script>";
                          }else{
                            echo "<div class='alert alert-danger'><strong>Error: </strong> Gagal memproses</div>";
                          }
                        }else{
                          echo "<div class='alert alert-danger'><strong>Error: </strong> Gagal upload gambar</div>";
                        }
                    }else{
                      echo "<div class='alert alert-danger'><strong>Error: </strong> Gambar terlalu besar (Max 900kb)</div>";
                    }
                  }else{
                    echo "<div class='alert alert-danger'><strong>Error: </strong> Format tidak diijinkan</div>";
                  }
                }else{
                  $sql= mysqli_query($con, "INSERT into user (nick,url,usrname,password,foto,nilai,sudah,email,web,facebook,github,quotes,date,code) values ('$nama','$url','$user','$passw','', '0', '0', '$email', '', '', '', '', '$tgl', '')");
                  if($sql){
                    echo "<script>
                            swal({
                                title: 'Success!',
                                text: 'Silahkan Login',
                                icon: 'success',
                                button: 'OK',
                            }). then(function(result){
                                window.location = '../index.php';
                            })
                          </script>";
                  }else{
                    echo "<div class='alert alert-danger'><strong>Error: </strong> Gagal memproses</div>";
                  }
                  
            }

}
        }
      }else{
        echo "<div class='alert alert-danger'><strong>Error: </strong> Nick , username dan email tdk boleh kosong</div>";
      }
    }
?>

                  <form class="text-left form-validate" enctype="multipart/form-data" method="POST">
                      <script>
                          function validasiFile(){
                          var inputFile = document.getElementById('foto');
                          var pathFile = inputFile.value;
                          var ekstensiOk = /(\.jpg|\.png|\.jpeg)$/i;
                          if(!ekstensiOk.exec(pathFile)){
                          swal({
                              title: 'Error',
                              text: 'hanya boleh .jpg .png .jpeg',
                              icon: 'error',
                              button: 'OK',
                          })
                              inputFile.value = '';
                              return false;
                              }
                          }
                      </script>
                    <div class="form-group-material">
                      <label for="register-username" class="label-material">Nick Name</label>
                      <input type="text" name="nama" required data-msg="Please enter your nick name" class="input-material">
                    </div>

                    <div class="form-group-material">
                        <label for="register-username" class="label-material">Username</label>
                        <input type="text" name="user" required data-msg="Please enter your username" class="input-material">
                    </div>

                    <div class="form-group-material">
                      <label for="register-username" class="label-material">Email</label>
                      <input type="email" name="email" required data-msg="Please enter email for forget password or etc" class="input-material">
                    </div>

                    <div class="form-group-material">
                      <label for="register-password" class="label-material">Password</label>
                      <input type="password" name="password" required data-msg="Please enter your password" class="input-material">
                    </div>

                    <div class="form-group-material"> 
                      <label for="register-password" class="label-material">Gambar</label>
                      <input type="file" name="foto" id="foto" class="input-material" onchange="return validasiFile()">
                    </div>  

                    <div class="form-group text-center">
                      <input id="register" type="submit" value="Register" class="btn btn-primary">
                    </div>
                  </form><small>Already have an account? </small><a href="../index.php" class="signup">Login</a>
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
        setTimeout(function(){$(".alert").fadeOut('slow');}, 2000);
    </script>
  </body>
</html>