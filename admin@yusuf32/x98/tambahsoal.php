<?php
include "../config.php";
if(!empty($_POST['nama'])){
    $date = date("Y-m-d");
	mysqli_query($con, "INSERT INTO ctf (nama,detail,flag,poin,kategori,tgl) VALUES ('$_POST[nama]', '$_POST[detail]', '$_POST[flag]', '$_POST[poin]', '$_POST[kategori]', '$date')");

	header('location:../home.php?x=ctf');
}else{
	header('location:../home.php?x=ctf');
}
?>