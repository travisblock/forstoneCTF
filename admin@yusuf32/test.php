<?php

include "config.php";

// $sql = mysqli_query($con, "SELECT * FROM description");
// $get_info = mysqli_fetch_array($sql);

// echo $get_info['judul'];

$info = get_info($con, "SELECT * FROM description");
echo $info['judul'];