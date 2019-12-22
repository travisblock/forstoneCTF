<?php
include "./admin@yusuf32/config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  
  <meta name="description" content="Informasi tentang update score dari ForstoneCTF">
  <meta name="author" content="FORSTONE">
  <meta name="keywords" content="Forstone, TKJ, Web TKJ" />
  <meta name="language" content="indonesia">
  <link rel="shortcut icon" href="/img/logo.png">  
  <meta name="robots" content="all,follow">
  <title>ForstoneCTF - Scoreboard</title>

  <!-- Bootstrap  CSS -->
  <link href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href="assets/agency.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
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
</head>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavi">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/">ForstoneCTF</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#score">Scoreboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user">Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user/register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="mastheadz">
    <div class="container">
      <div class="intro-text">
        <div class="intro-heading">ForstoneCTF</div>
        <a class="btn btn-primary text-uppercase js-scroll-trigger" href="#score">./Scoreboard</a>
      </div>
    </div>
  </header>

  <!-- score -->
  <section class="bg-light" id="score">
    <div class="container">
      <h3 class="text-center">./scoreboard</h3>
      <div class=" text-center">
          <table class="table table-hover my-2" style="color:#333333">
            <thead style="background:#343a40;color:#ababab;" >
                <tr>
                  <th width="5%">Rank</th>
                  <th width="10%"><img src="user/img/sysctf/person.png" width="30%"></th>
                  <th width="10%">Nick</th>
                  <th>Score</th>				
                </tr>
            </thead>
              <?php 
              $page = (isset($_GET['page']))? $_GET['page'] : 1;
              $limit = 15;
              $limit_start = ($page - 1) * $limit;
              
              $sql= mysqli_query($con, "SELECT * FROM user ORDER BY nilai desc LIMIT ".$limit_start.",".$limit);
              $no = $limit_start + 1;
              while($ok= mysqli_fetch_array($sql)){
                $nick = aman($ok['nick']);
                echo "
                  <tbody>
                    <tr>
                      <td width='5%'>
                        $no
                      </td>
                      <td width='10%'>
                      <a href='player/$ok[url]' class='no-style'>"; 
                      $poto= mysqli_query($con, "SELECT foto from user ");
                      if($ok['foto'] == 'kosong'){
                        echo "<img class='avatar' src='user/img/dev.png' alt='ForstoneCTF - $nick' title='ForstoneCTF - $nick Photo profile'>";
                       }else{
                         echo "<img class='avatar' src='user/img/$ok[foto]' alt='ForstoneCTF - $nick' title='ForstoneCTF - $nick Photo profile'>";
                        }echo"</a>
                      </td> 
                
                      <td width='20%' class='text-center'>
                        <a href='/player/$ok[url]' class='no-style'>$nick</a>
                      </td>
              
                      <td>
                        $ok[nilai]
                      </td>
                    </tr>			
                  </tbody>"; 
                  $no ++; 
              }?>
          </table>          
      </div>
      
       <?php
       $jikasql = mysqli_query($con, "SELECT * from user");
       $jml = mysqli_num_rows($jikasql);
       if($jml < 16){
        echo "<style>.hx32{display:none}</style>";
       }else{
       ?>
      <nav class="hx32" aria-label="Page navigation example">
      <ul class="pagination justify-content-center ">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){
        ?>
          <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        <?php
        }else{
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li class="page-item"><a class="page-link" href="scoreboard/1">First</a></li>
          <li class="page-item"><a class="page-link" href="scoreboard/<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        
        $sql2 = mysqli_query($con, "SELECT COUNT(*) AS jumlah FROM user");
        $get_jumlah = mysqli_fetch_array($sql2);
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="page-item active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a class="page-link" href="scoreboard/<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        if($page == $jumlah_page){
        ?>
          <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
        <?php
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li class="page-item" ><a class="page-link" href="scoreboard/<?php echo $link_next; ?>">&raquo;</a></li>
          <li class="page-item" ><a class="page-link" href="scoreboard/<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
      }
        ?>
      </ul>
    </nav>
    </div>
  </section>

  <!-- Footer -->
  <div class="text-center  text-white penting">
    <a href="sitemap" target="_blank">Sitemap</a>
    <a href="about" target="_blank">About</a>
    <a href="privacy-policy" target="_blank">Privacy</a>
    <a href="disclaimer" target="_blank">Disclaimer</a>
    <a href="contact" target="_blank">Contact</a>
  </div>
  <footer class=" bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ">
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
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/agensi.js"></script>
</body>
</html>
