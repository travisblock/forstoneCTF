<?php

include "../web-config.php";

if(!empty($_POST['author']) && !empty($_POST['text'])){
	$author = aman($_POST['author']);
	$text   = aman($_POST['text']);
	$id 	= intval($_POST['id']);

	$sql = mysqli_query($con, "UPDATE quotes SET text='$text', author='$author' WHERE id='$id' ");
	if($sql){
		header('location:../home.php?x=quotes');
	}
}