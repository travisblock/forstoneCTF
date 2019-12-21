<?php
include "../config.php";
if(!empty($_POST['password'])){
    
    mysqli_query($con, "UPDATE user SET nick='$_POST[nick]', usrname='$_POST[usrname]', password=md5('$_POST[password]') WHERE id='$_POST[id]'");

    header('location:../home.php?x=user');
}else{
	mysqli_query($con, "UPDATE user SET nick='$_POST[nick]', usrname='$_POST[usrname]' WHERE id='$_POST[id]'");
    header('location:../home.php?x=user');
}