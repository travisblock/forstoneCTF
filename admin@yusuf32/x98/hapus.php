<?php
include "../config.php";
mysqli_query($con, "DELETE FROM user WHERE id='$_GET[id]'");
header('location:../home.php?x=user');
?>