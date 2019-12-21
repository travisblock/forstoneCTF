<?php

include "../config.php";
if(!empty($_POST['title'])){

	$title = aman($_POST['title']);
	$desc  = aman($_POST['desc']);

	$sql = mysqli_query($con, "UPDATE description set judul='$title', description='$desc' ");
	if($sql){
		header('location:../home.php?x=web');
	}

}


