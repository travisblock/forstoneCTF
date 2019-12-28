<?php

include 'admin@yusuf32/web-config.php';


$sqlQuotes1  = mysqli_query($con, "SELECT * FROM quotes ORDER BY id ASC LIMIT 1");
while($dataQ1 = mysqli_fetch_array($sqlQuotes1)){

echo "<div class='carousel-item active'>                
        <p class='text-info'>$dataQ1[text]</p>
        <h9>- $dataQ1[author] -</h9>
      </div>";

}

$jml = mysqli_num_rows(mysqli_query($con, "SELECT * FROM quotes"));
$lim = $jml - 1;

$sqlQuotes2  = mysqli_query($con, "SELECT * FROM quotes ORDER BY id DESC LIMIT $lim");
while($dataQ2 = mysqli_fetch_array($sqlQuotes2)){

echo "<div class='carousel-item'>                
        <p class='text-info'>$dataQ2[text]</p>
        <h9>- $dataQ2[author] -</h9>
      </div>";

}