<?php 
if(isset($_GET['z'])){
    if($_GET['z']=='ctf'){
        include "cetf.php";

    }elseif($_GET['z']=='editprofil'){
        include "editprofil.php";

    }elseif($_GET['z']=='profil'){
        include "profil.php";

    }else{
        echo "<div class='text-center text-white'>Gila lo ndro</div>";
    }
}else{
    $id   = intval($_SESSION['id']);
    $sqli = mysqli_query($con, "SELECT * from user where id='$id'");
    $d    = mysqli_fetch_array($sqli);?>
    
        <div class='col-xl-4 col-lg-12'>
          <div class='card card-chart'>
          <div class='card-header card-header-info'>
            </div>
            <div class='card-body'>
              <h4 class='card-title'>Your Points</h4>
              <p class='card-category'>                                       
                <span class='text-info'><?php echo "$d[nilai]"; ?></span> Points
              </p>
            </div>
            <div class='card-footer'>
              <div class='stats'>
              </div>
            </div>
          </div>
        </div>

        <div class='col-xl-4 col-lg-12'>
          <div class='card card-chart'>
            <div class='card-header card-header-success'>
            </div>
            <div class='card-body'>
              <h4 class='card-title'>Completed Task</h4>
              <p class='card-category'>
                <span class='text-success'><?php echo "$d[sudah]"; ?> </span> Task Completed</p>
            </div>
            <div class='card-footer'>
              <div class='stats'>                      
              </div>
            </div>
          </div>
        </div>
      <?php       
    $hitung = mysqli_query($con, "SELECT * FROM ctf ");
    $jml    = mysqli_num_rows($hitung);
    $blom   = $jml - $d['sudah'];
    ?>
            <div class='col-xl-4 col-lg-12'>
              <div class='card card-chart'>
                <div class='card-header card-header-danger'>
                </div>
                <div class='card-body'>
                  <h4 class='card-title'>Not Completed Task</h4>
                  <p class='card-category'>
                      <span class='text-danger'><?php echo "$blom"; ?> </span> Task Not Completed
                  </p>
                </div>
                <div class='card-footer'>
                  <div class='stats'>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <?php
    }?>