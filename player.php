<?php
include "./admin@yusuf32/web-config.php";
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

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $title . " - " . aman($ok['nick'])?> Profiles, <?php echo "Rank $renk[rank], $ok[nilai] Points,  Since ";echo date('j F Y', strtotime($ok['date'])); ?> ">
  <meta content='<?php echo $title . " - " . aman($ok['nick'])?> Profiles, <?php echo "Rank $renk[rank], $ok[nilai] Points,  Since ";echo date('j F Y', strtotime($ok['date'])); ?> ' property='og:description'/>
  <meta content='http://forstone.web.id/ctf/user/img/<?php echo $ok['foto']; ?>' property='og:image'/>
  <meta name="author" content="ForstoneCTF, <?= $title; ?>">
  <meta name="keywords" content="CTF" />
  <meta name="language" content="indonesia">  
  <meta name="robots" content="all,follow">
  <link rel="shortcut icon" href="<?= $logo; ?>">
  <title><?php echo aman($ok['nick']);?> Profile</title>

  <link href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= $base_url; ?>assets/agensi.css" rel="stylesheet">
  <link href="<?= $base_url; ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?= $base_url; ?>vendor/fontawesome-free/css/all.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

</head>

<body id="page-top">


  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?= $base_url; ?>"><?= $title; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= $base_url; ?>scoreboard">Scoreboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= $base_url; ?>user/">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= $base_url; ?>user/register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


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
              if(empty($ok['foto'])){
                  $nik = aman($ok['nick']);
                echo "<img class='mx-auto rounded-circlee' src='" . $base_url . "user/img/dev.png' alt='" . $title . " - $nik Profile' title='" . $title . " - $nik Profile'>";
              }else{
                echo "<img class='mx-auto rounded-circlee' src='" . $base_url . "user/img/$ok[foto]' alt='" . $title . " - $nik Profile' title='" . $title . " - $nik Profile'>";
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


  <footer class=" bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; <?= $title; ?></span>
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
              <a href="http://www.indexattacker.web.id" target="_blank">Powered by ForstoneCTF</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?= $base_url; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $base_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= $base_url; ?>assets/agency.js"></script>

</body>

</html>
<?php
}else{
  include '404.html';
}
?>