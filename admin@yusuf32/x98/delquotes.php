<?php

include "../config.php";

if(!empty($_GET['id'])){
	$id = intval($_GET['id']);

	$sql = mysqli_query($con, "DELETE FROM quotes WHERE id='$id' ");
	if($sql){
		header('location: ../home.php?x=quotes');
	}
}