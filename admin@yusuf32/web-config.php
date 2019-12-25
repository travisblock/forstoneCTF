<?php

include "config.php";
$sql = mysqli_query($con, "SELECT * FROM description");
$fetch = mysqli_fetch_array($sql);

$title = aman($fetch['judul']);
$description = aman($fetch['description']);
$img_header = $fetch['image'];