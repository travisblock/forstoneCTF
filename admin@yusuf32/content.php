<?php
if(isset($_GET['x'])){
	if($_GET['x']=='ctf'){
		include "x98/ctf.php";

	}elseif($_GET['x']=='user'){
		include "x98/user.php";

	}elseif($_GET['x']=='web'){
    include "x98/info_web.php";

  }else{
		echo "";
	}
}else{
  $querycekusr = mysqli_query($con, "SELECT nick from user");
  $jmlusr = mysqli_num_rows($querycekusr);

  $queryceksoal = mysqli_query($con, "SELECT nama FROM ctf");
  $jmlsoal = mysqli_num_rows($queryceksoal);

  $querycekktg = mysqli_query($con, "SELECT DISTINCT kategori from ctf");
  $jmlktg = mysqli_num_rows($querycekktg);
	echo"
	<section class='no-padding-top no-padding-bottom'>
          <div class='container-fluid'>
            <div class='row'>
              <div class='col-md-4 col-sm-6'>
                <div class='statistic-block block'>
                  <div class='progress-details d-flex align-items-end justify-content-between'>
                    <div class='title'>
                      <div class='icon'><i class='icon-user-2'></i></div>
                      <strong><a href='?x=user'>Total User</a> : $jmlusr</strong>
                    </div>
                  </div>
                  <div class='progress progress-template'>
                    <div role='progressbar' style='width: 20%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' class='progress-bar progress-bar-template dashbg-1'></div>
                  </div>
                </div>
              </div>
              <div class='col-md-4 col-sm-6'>
                <div class='statistic-block block'>
                  <div class='progress-details d-flex align-items-end justify-content-between'>
                    <div class='title'>
                      <div class='icon'><i class='icon-user-2'></i></div>
                      <strong><a href='?x=ctf'>Total Soal</a> : $jmlsoal</strong>
                    </div>
                  </div>
                  <div class='progress progress-template'>
                    <div role='progressbar' style='width: 10%' aria-valuenow='10' aria-valuemin='0' aria-valuemax='100' class='progress-bar progress-bar-template dashbg-1'></div>
                  </div>
                </div>
              </div>

              <div class='col-md-4 col-sm-6'>
                <div class='statistic-block block'>
                  <div class='progress-details d-flex align-items-end justify-content-between'>
                    <div class='title'>
                      <div class='icon'><i class='icon-user-2'></i></div>
                      <strong><a href='?x=ctf'>Total kategori</a> : $jmlktg</strong>
                    </div>
                  </div>
                  <div class='progress progress-template'>
                    <div role='progressbar' style='width: 10%' aria-valuenow='10' aria-valuemin='0' aria-valuemax='100' class='progress-bar progress-bar-template dashbg-1'></div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </section>
		";
}

?>