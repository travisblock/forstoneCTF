<?php
session_start();
if(!isset($_SESSION['login'])){
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ForstoneCTF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../assets/swal.js"></script>
    <style>
    body{
        background:#1f283d;
    }
    </style>
</head>
<body>
<?php 
include_once("../admin@yusuf32/config.php");
$idu      =       intval($_SESSION['id']);
$nick     =      aman($_POST['nick']);
$username =  aman($_POST['usrname']);
$password =  md5($_POST['password']);
$email    =     aman($_POST['email']);
$web      =       aman($_POST['web']);
$facebook =  aman($_POST['facebook']);
$github   =    aman($_POST['github']);
$quotes   =    aman($_POST['quotes']);
if(!empty($nick && $username)){
  if(strlen($nick) < 3){
    echo "<script>
        swal({ title: 'Error!', text: 'Nick minimal 3 karakter', icon: 'error', button: 'OK', }). then(function(result){ window.location = 'user.php?z=editprofil'; })
        </script>";
  }elseif(strlen($nick) > 30){
    echo "<script>
        swal({ title: 'Error!', text: 'Nick maksimal 30 karakter', icon: 'error', button: 'OK', }). then(function(result){ window.location = 'user.php?z=editprofil'; })
        </script>";
  }else{
    
if(!empty($_POST['password']) && !empty($_FILES['foto']['name'])){
    $foto   = $_FILES['foto']['name'];  
    $tmp    = $_FILES['foto']['tmp_name'];
    $path   = "img/";
    $tipe   = pathinfo($foto, PATHINFO_EXTENSION);
    $size   = $_FILES['foto']['size'];        
        if($tipe === 'jpg' || $tipe === 'png'){
            if($size <= 900000){
            $temp      = explode(".", $_FILES["foto"]["name"]);
            $foto_baru = round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $path."/" . $foto_baru)){
                $idusr  = $_SESSION['id'];
                $tm     = mysqli_query($con, "SELECT * FROM user where id='$idusr'");
                $dpq    = mysqli_fetch_array($tm);  
                if(is_file("img/".$dpq['foto'])){   
                    unlink("img/".$dpq['foto']);
                }
                $sql = mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$username', password='$password', foto='$foto_baru', email='$email', web='$web', facebook='$facebook', github='$github', quotes='$quotes' WHERE id='$idu' ");
                if($sql){
                    echo "<script>
                          swal({
                              title: 'Success!',
                              text: 'Berhasil Edit Profil',
                              icon: 'success',
                              button: 'OK',
                          }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                              })</script>";
                }else{
                    echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
                }
            }else{
                echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
            }
        }else{
            echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Gambar terlalu gede, Max 900kb',
                    icon: 'error',
                    button: 'OK',
                }). then(function(result){
                    window.location = 'user.php?z=editprofil';
                })</script>";
        }
    }else{
            echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Gambar hanya boleh jpg, png, jpeg',
                    icon: 'error',
                    button: 'OK',
                }). then(function(result){
                    window.location = 'user.php?z=editprofil';
                })</script>";
        }
    }elseif(!empty($_FILES['foto']['name'])){
        $foto   = $_FILES['foto']['name'];  
        $tmp    = $_FILES['foto']['tmp_name'];
        $path   = "img/";
        $tipe   = pathinfo($foto, PATHINFO_EXTENSION);  
        $size   = $_FILES['foto']['size'];    
        if($tipe === 'jpg' || $tipe === 'png' || $tipe === 'jpeg'){
            if($size <= 900000){
            $temp = explode(".", $_FILES["foto"]["name"]);
            $foto_baru = round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $path."/" . $foto_baru)){
                $idusr  = $_SESSION['id'];
                $tm     = mysqli_query($con, "SELECT * FROM user where id='$idusr'");
                $dpq    = mysqli_fetch_array($tm);  
                if(is_file("img/".$dpq['foto'])){   
                    unlink("img/".$dpq['foto']);
                }
                $sql= mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$username', foto='$foto_baru', email='$email', web='$web', facebook='$facebook', github='$github', quotes='$quotes' WHERE id='$idu' ");
                if($sql){
                    echo "<script>
                          swal({
                              title: 'Success!',
                              text: 'Berhasil Edit Profil',
                              icon: 'success',
                              button: 'OK',
                          }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                              })</script>";
                }else{
                    echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
                }
            }else{
                echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
            }
        }else{
            echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Gambar terlalu besar, Max 900kb',
                    icon: 'error',
                    button: 'OK',
                }). then(function(result){
                    window.location = 'user.php?z=editprofil';
                })</script>";
        }
        }else{
            echo "<script>
                swal({
                    title: 'Error!',
                    text: 'Gambar hanya boleh jpg, png, jpeg',
                    icon: 'error',
                    button: 'OK',
                }). then(function(result){
                    window.location = 'user.php?z=editprofil';
                })</script>";
        }

    }elseif(!empty($_POST['password'])){
        $sql= mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$username', password='$password', email='$email', web='$web', facebook='$facebook', github='$github', quotes='$quotes' WHERE id='$idu' ");
        if($sql){
            echo "<script>
                          swal({
                              title: 'Success!',
                              text: 'Berhasil Edit Profil',
                              icon: 'success',
                              button: 'OK',
                          }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                              })</script>";
        }else{
            echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
        }
    }else{
        $sqliq= mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$username', email='$email', web='$web', facebook='$facebook', github='$github', quotes='$quotes' WHERE id='$idu' ");
        if($sqliq){
            echo "<script>
                          swal({
                              title: 'Success!',
                              text: 'Berhasil Edit Profil',
                              icon: 'success',
                              button: 'OK',
                          }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                              })</script>";
        }else{
            echo "<script>
                          swal({
                              title: 'Error!',
                              text: 'Gagal',
                              icon: 'error',
                              button: 'OK',
                        }). then(function(result){
                              window.location = 'user.php?z=editprofil';
                        })</script>";
        }
    }
  }
}else{
  echo "<script>
        swal({ title: 'Error!', text: 'Nick or Username tdk boleh kosong', icon: 'error', button: 'OK', }). then(function(result){ window.location = 'user.php?z=editprofil'; })
        </script>";
}
    ?>
</body>
</html>
