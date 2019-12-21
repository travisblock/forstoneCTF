<?php
include "../config.php";
if(!empty($_POST['nama'])){
    
    mysqli_query($con, "UPDATE ctf SET nama='$_POST[nama]', detail='$_POST[detail]', flag='$_POST[flag]', poin='$_POST[poin]', kategori='$_POST[kategori]' WHERE id='$_POST[id]'");

    header('location:../home.php?x=ctf');
}else{
    header('location:../home.php?x=ctf');
}