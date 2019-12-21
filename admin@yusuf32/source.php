<?php
include "config.php";
$ktg = $_GET["term"];
$sql = mysqli_query($con, "SELECT kategori FROM ctf where kategori like '%$ktg%' limit 1");
while($result = mysqli_fetch_array($sql)){

	$row['value'] 	= $result['kategori'];
	$row_set[] 		= $row;

}
    echo json_encode($row_set);
