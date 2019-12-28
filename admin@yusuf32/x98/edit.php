<?php
include "../config.php";
if(!empty($_POST['usrname']) && !empty($_POST['nick'])){
	$id 	= intval($_POST['id']);
	$nick 	= aman($_POST['nick']);
	$user 	= aman($_POST['usrname']);
	$pass 	= password_hash($_POST['password'], PASSWORD_DEFAULT);

	if(!empty($_POST['password'])){
		$sql = mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$user', password='$pass' WHERE id='$id' ");
		if($sql){
			header('location: ../home.php?x=user');
		}
	}else{
		$sql = mysqli_query($con, "UPDATE user SET nick='$nick', usrname='$user' WHERE id='$id' ");
		if($sql){
			header('location: ../home.php?x=user');
		}
	}
}