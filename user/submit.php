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
</head>
<body bgcolor="#1f283d">
    
</body>
</html>
<?php 
include "../admin@yusuf32/config.php";
if(isset($_POST['submitFlag'])){
    $idflag     = intval($_POST['id']);    
    $sql        = mysqli_query($con, "SELECT * FROM ctf where id=$idflag");
    while($ap   = mysqli_fetch_array($sql)){
    $jawaban    = $ap['flag'];
    $poin       = intval($ap['poin']);
    $sesi       = intval($_SESSION['id']);
    $tgl        = date("y-m-d");
    $submitflag = mysqli_escape_string($con, $_POST['flag']);
    $ctf        = mysqli_query($con, "SELECT * FROM done WHERE id_user='$sesi' and id_soal='$idflag'");
    $bnr        = mysqli_num_rows($ctf);
    if($bnr > 0){
        echo "<script>
        swal({
            title: 'OK',
            text: 'Soal sudah dijawab',
            icon: 'success',
        }). then(function(result){
            window.location = 'user.php?z=ctf';
            })</script>";
        exit;
    }elseif($submitflag == $jawaban){
        mysqli_query($con, "UPDATE user set nilai=nilai+$poin where id=$sesi");
        mysqli_query($con, "UPDATE user set sudah=sudah+1 where id=$sesi");
        mysqli_query($con, "INSERT INTO done(id_user, id_soal,tgl) VALUES ('$sesi', '$idflag', '$tgl')");
        echo "<script>
        swal({
            title: 'Success',
            text: 'Selamat $_SESSION[nama] Flag Benar',
            icon: 'success',
        }). then(function(result){
            window.location = 'user.php?z=ctf';
            })</script>";
    }else{
        echo "<script>
        swal({
            title: 'Gagal!',
            text: 'Coba lagi bro',
            icon: 'error',
        }). then(function(result){
            window.location = 'user.php?z=ctf';
            })</script>";
    }
}
}