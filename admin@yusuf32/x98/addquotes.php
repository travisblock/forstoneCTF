<?php

include "../web-config.php";

if(!empty($_POST['author']) && !empty($_POST['text'])){
	$author = aman($_POST['author']);
	$text   = aman($_POST['text']);

	$sql = mysqli_query($con, "INSERT INTO quotes(text,author) VALUES('$text', '$author') ");
	if($sql){
		header('location:../home.php?x=quotes');
	}
}