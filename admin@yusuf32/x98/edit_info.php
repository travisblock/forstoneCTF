<?php

include "../config.php";
$title  = aman($_POST['title']);
$desc   = aman($_POST['desc']);
$foto   = $_FILES['foto']['name'];
$tmp_f  = $_FILES['foto']['tmp_name'];
$type_f = pathinfo($foto, PATHINFO_EXTENSION);
$size_f = $_FILES['foto']['size'];
$logo 	= $_FILES['logo']['name'];
$tmp_l	= $_FILES['logo']['tmp_name'];
$type_l = pathinfo($logo, PATHINFO_EXTENSION);
$size_l = $_FILES['foto']['size'];
$path   = "../../user/img/sysctf/";
if(!empty($_POST['title']) && !empty($_POST['desc'])){
	if(!empty($foto) && empty($logo)){
		if($type_f === 'png' || $type_f === 'jpg' || $type_f === 'jpeg'){
			if(move_uploaded_file($tmp_f, $path.$foto)){
				$sql_del = mysqli_query($con, "SELECT image FROM description");
				$data_sql= mysqli_fetch_assoc($sql_del);
				if(is_file("../../user/img/sysctf/" . $data_sql['image'])){
					unlink("../../user/img/sysctf/" . $data_sql['image']);
				}
				$sql = mysqli_query($con, "UPDATE description set judul='$title', description='$desc', image='$foto' ");
				if($sql){
					header('location:../home.php?x=web');
				}else{
					echo "<script>alert('GGL');</script>";
				}
			}
		}
	}elseif(!empty($logo) && empty($foto)){
		if($type_l === 'png' || $type_l === 'jpg' || $type_l === 'jpeg'){
			if(move_uploaded_file($tmp_l, $path.$logo)){
				$sql_del = mysqli_query($con, "SELECT logo FROM description");
				$data_sql= mysqli_fetch_assoc($sql_del);
				if(is_file("../../user/img/sysctf/" . $data_sql['logo'])){
					unlink("../../user/img/sysctf/" . $data_sql['logo']);
				}
				$sql = mysqli_query($con, "UPDATE description set judul='$title', description='$desc', logo='$logo' ");
				if($sql){
					header('location:../home.php?x=web');
				}else{
					echo "<script>alert('GGL');</script>";
				}
			}
		}
	}elseif(!empty($logo) && !empty($foto)){
		if($type_f === 'png' || $type_f === 'jpg' || $type_f === 'jpeg' || $type_l === 'png' || $type_l === 'jpg' || $type_l === 'jpeg'){
			if(move_uploaded_file($tmp_l, $path.$logo) && move_uploaded_file($tmp_f, $path.$foto)){
				$sql = mysqli_query($con, "UPDATE description set judul='$title', description='$desc', image='$foto', logo='$logo' ");
				if($sql){
					header('location:../home.php?x=web');
				}else{
					echo "<script>alert('GGL');</script>";
				}
			}
		}
	}else{
		$sql = mysqli_query($con, "UPDATE description set judul='$title', description='$desc' ");
		if($sql){
			header('location:../home.php?x=web');
		}
	}
}