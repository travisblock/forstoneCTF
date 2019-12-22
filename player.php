<?php
include "./admin@yusuf32/config.php";
error_reporting(0);
$id   = mysqli_escape_string($con, $_GET['nick']);
$sql  = mysqli_query($con, "SELECT * FROM user where url='$id'");
$ono  = mysqli_num_rows($sql);
$ok   = mysqli_fetch_array($sql);

$rank = mysqli_query($con, "SELECT rank from (select @rownum:=@rownum+1 rank, p.* from user p, (SELECT @rownum:=0) r order by nilai desc) q where url = '$id'");
$renk = mysqli_fetch_array($rank);
if($ono > 0){
?>
<!DOCTYPE html>
<html lang="id">

<style>
    @media only screen and (max-width: 600px) {
        .penting a{
            font-size:13px;
            
        }
        .ptg{
            display:none;
        }
    } 
</style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ForstoneCTF - <?php echo aman($ok['nick'])?> Profiles, <?php echo "Rank $renk[rank], $ok[nilai] Points,  Since ";echo date('j F Y', strtotime($ok['date'])); ?> ">
  <meta content='ForstoneCTF - <?php echo aman($ok['nick'])?> Profiles, <?php echo "Rank $renk[rank], $ok[nilai] Points,  Since ";echo date('j F Y', strtotime($ok['date'])); ?> ' property='og:description'/>
  <meta content='http://forstone.web.id/ctf/user/img/<?php echo $ok['foto']; ?>' property='og:image'/>
  <meta name="author" content="FORSTONE">
  <meta name="keywords" content="Forstone, TKJ, Web TKJ" />
  <meta name="language" content="indonesia">  
  <meta name="robots" content="all,follow">
  <link rel="shortcut icon" href="/img/logo.png">
  <title><?php echo aman($ok['nick']);?> Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/ctf/assets/agensi.css" rel="stylesheet">
  <link href="/ctf/assets/css/custom.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/ctf">ForstoneCTF</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/ctf/scoreboard">Scoreboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/ctf/user/">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/ctf/user/register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Profile -->
  <section class="bg-light" id="team">
    <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Player Profile</h2><br>
        </div>
      <div class="row">
        <div class="col-md-4 text-center">        
          <div class="panel panel-custom">
            <div class="panel panel-heading">            
            <h5 class="panel-title">Profile</h5>
            </div>
            <div class="team-member">
              <?php 
              if($ok['foto'] == 'kosong'){
                  $nik = aman($ok['nick']);
                echo "<img class='mx-auto rounded-circlee' src='/ctf/user/img/dev.png' alt='ForstoneCTF - $nik Profile' title='ForstoneCTF - $nik Profile'>";
              }else{
                echo "<img class='mx-auto rounded-circlee' src='/ctf/user/img/$ok[foto]' alt='ForstoneCTF - $nik Profile' title='ForstoneCTF - $nik Profile'>";
              }
              ?>
                <h4><?php echo aman($ok['nick']); ?></h4>                
                <p class="text-info">Since <?php echo date('j F Y', strtotime($ok['date'])); ?></p>            
                <div class="col-sm-9 mx-auto text-center">
                  <p class="text-muted"><pre><?php echo aman($ok['quotes']); ?></pre></p>
                </div>
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                      <a href="//<?php echo aman($ok['github']); ?>" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="//<?php echo aman($ok['facebook']); ?>" target="_blank" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="//<?php echo aman($ok['web']); ?>" target="_blank" title="web">
                        <i class="fas fa-globe"></i>
                      </a>
                    </li>
                </ul>
            </div>                    
          </div>
        </div>
        
        <div class="col-md-8">
          <div class="panel panel-custom scroll">
            <div class="panel panel-heading text-center">
              <h5 class="panel-title">Solves</h5>
            </div>
            <div class="panel-kategori-custom scroll">
              <table class="table table-hover">
              <thead style="border:none">
                <tr style="border:none">
                  <th width="5%">No.</th>
                  <th width="10%">Challenge</th>
                  <th width="10%">Category</th>
                  <th width="10%">Date</th>					
                </tr>
            </thead>
            <?php
            
              $idusr = intval($ok['id']);
              $sql= mysqli_query($con, "SELECT done.*, ctf.nama, ctf.poin, ctf.kategori from done inner join ctf on done.id_soal = ctf.id where done.id_user = '$idusr'");
              $no= 1;
              while($op= mysqli_fetch_array($sql)){
                echo "
                <div class='exphp'>
                  <tbody>
                    <tr>
                      <td width='5%'>
                        $no
                      </td>
                      <td width='10%'>
                      $op[nama]
                      </td>              
                      <td width='10%'>
                      $op[kategori]
                      </td>
                      <td width='10%'>
                      $op[tgl]
                      </td>
                    </tr>			
                  </tbody>
                </div>"; 
                $no ++; 
              }
            ?>
            </table>        
      </div>    
      </div> 
               
      </div>
      <div class="col-md-6">
          <div class="panel panel-custom">
                <div class="panel panel-heading text-center">            
                  <h5 class="panel-title">Rank</h5>
                </div>
                <div class="panel-kategori-custom text-center">
                <div class="team">
                  <div class="mx-auto rank"><h6 class="text-center">Rank  <?php echo $renk['rank']; ?></h6></div>
                </div>
                </div>
          </div>
      </div>
              
      <div class="col-md-6">
          <div class="panel panel-custom">
                <div class="panel panel-heading text-center">            
                  <h5 class="panel-title">Points</h5>
                </div>
                <div class="panel-kategori-custom text-center">
                <div class="team">
                  <div class="mx-auto rank"><h6 class="text-center"><?php echo $ok['nilai'];?> Points</h6></div>
                </div>
                </div>
          </div>
      </div>
      </div><br>
    <div class="text-center">
      <button class="btn btn-info" onClick='history.back();'><i class="fas fa-arrow-left"></i> Back</button>
    </div>      
    </div>
    </section>

  <!-- Footer -->
  <div class="text-center  text-white penting">
    <a href="/sitemap" target="_blank">Sitemap</a>
    <a href="/about" target="_blank">About</a>
    <a href="/privacy-policy" target="_blank">Privacy</a>
    <a href="/disclaimer" target="_blank">Disclaimer</a>
    <a href="/contact" target="_blank">Contact</a>
  </div>
  <footer class=" bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Forstone 2019</span>
        </div>
        <div class="col-md-4 ptg">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="https://twitter.com/@ajidstark" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.facebook.com/ajidstark" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>            
          </ul>
        </div>
        <div class="col-md-4 ptg">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="http://www.indexattacker.web.id" target="_blank">Powered by Index Attacker</a>
            </li>
          </ul>
        </div>
      </div><br>In colaboration with : <a href="https://www.alternate-csec.io/" target="_blank">alternate-csec.io</a>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/agency.js"></script>

</body>

</html>
<?php
}else{
  ?>
  <!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forstone - 404 Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">
	<link rel="shortcut icon" href="http://pluspng.com/img-png/world-wide-web-png-web-development-computer-icons-world-wide-web-900.jpg" type="image/x-icon">
		<link rel="icon" href="img/logo.png" type="image/x-icon">
<style type="text/css">
	* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {

  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
  background: transparent;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 767px;
  width: 100%;
  line-height: 1.4;
  text-align: center;
}

.notfound .notfound-404 {
  position: relative;
  height: 180px;
  margin-bottom: 20px;
  z-index: -1;
}

.notfound .notfound-404 h1 {
    font-family: 'Montserrat', sans-serif;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50% , -50%);
    -ms-transform: translate(-50% , -50%);
    transform: translate(-50% , -50%);
    font-size: 224px;
    font-weight: 900;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-left: -12px;
    color: #030200;
    text-transform: uppercase;
    text-shadow: -1px -1px 0px #96561f, 1px 1px 0px #9c7331;
    letter-spacing: -20px;
}


.notfound .notfound-404 h2 {
  font-family: 'Montserrat', sans-serif;
  position: absolute;
  left: 0;
  right: 0;
  top: 110px;
  font-size: 42px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  text-shadow: 0px 2px 0px #9a521b;
  letter-spacing: 13px;
  margin: 0;
}

.notfound h3 {
  font-family: 'Montserrat', sans-serif;
  position: absolute;
  left: 0;
  right: 0;
  padding-top:30px;
  font-size: 12px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  margin: 0;
}

.notfound a {
  font-family: 'Montserrat', sans-serif;
  display: inline-block;
  text-transform: uppercase;
  color: #ffffff;
  text-decoration: none;
  border: 2px solid #9a521b;
  background: #9a521b;
  padding: 10px 40px;
  font-size: 14px;
  font-weight: 700;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
  border-radius: 20px;
}

.notfound a:hover {
  color: #fff;
  border:2px solid #9a521b;
  background: transparent;
}

@media only screen and (max-width: 767px) {
    .notfound .notfound-404 h2 {
        font-size: 24px;
    }
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 h1 {
      font-size: 182px;
  }
}
</style>
</head>

<body style="background:url('/img/ss.jpeg') no-repeat center;background-size:cover;">

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
				<h2>Page Not Found</h2>
			</div>
			<a onClick='history.back();'>Back To Home</a>
			
		</div>
	</div>


</body>
</html>
<?php
}
?>