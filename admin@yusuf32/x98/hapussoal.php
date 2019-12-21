<?php
include "../config.php";
mysqli_query($con, "DELETE FROM ctf WHERE id='$_GET[id]'");
header('location:../home.php?x=ctf');
?>