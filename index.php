<?php
include_once "admin@yusuf32/web-config.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $description; ?>">
  <meta name="author" content="ForstoneCTF">
  <meta name="keywords" content="CTF" />
  <meta name="language" content="indonesia">  
  <meta name="robots" content="all,follow">
  <link rel="shortcut icon" href="<?= $base_url; ?>img/logo.png">
  <meta content='<?= $img_header; ?>' property='og:image'/>
  <meta content='<?= $description; ?>' property='og:description'/>
  <title><?= $title; ?></title>

  <link href="<?= $base_url; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base_url; ?>vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href="<?= $base_url; ?>assets/agency.css" rel="stylesheet">
  <link href="<?= $base_url; ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?= $base_url; ?>vendor/fontawesome-free/css/all.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= $title; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#play">Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Category</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#quotes">Quotes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="scoreboard">Scoreboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To <?= $title; ?></div>
        <div class="intro-heading text-uppercase">Let's Play</div>
        <a class="btn btn-danger text-uppercase js-scroll-trigger" href="#play" style="margin:10px">Play</a>
        <a class="btn btn-primary text-uppercase js-scroll-trigger" href="#services">Get Started</a>
      </div>
    </div>
  </header>

    <!-- Mainkan -->
    <section id="play" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Lets Play</h2>
          <h3 class="section-subheading text-muted"><?= $title; ?></h3>
        </div>
      </div>
        <div class="col-lg-12 text-center">
         <a href="user/index.php" class="buttonn button4" target="_blank">Play Now</a>
         <a href="user/register" class="buttonn2" target="_blank">Register</a>
        </div>
      </div>
  </section>
  <!-- Kategori -->
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Category</h2>
          <h3 class="section-subheading text-muted">Category in <?= $title; ?></h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-3">
          <p class="text-muted"><img src="user/img/sysctf/web.png" class="avatar3"></p>
          <h4 class="service-heading active"><a data-toggle="tab" href="#webxploit" style="color:#34383d;">Web Exploitation</a></h4>
        </div>
        <div class="col-md-3">    
          <p class="text-muted"><img src="user/img/sysctf/crypto.png" class="avatar3"></p>
          <h4 class="service-heading"><a data-toggle="tab" href="#cryptoxploit" style="color:#34383d;" >Cryptography</a></h4>
        </div>
        <div class="col-md-3">
          <p class="text-muted"><img src="user/img/sysctf/reverse.png" class="avatar3"></p>
          <h4 class="service-heading"><a data-toggle="tab" href="#reversexploit" style="color:#34383d;" >Reverse Engineering</a></h4>
        </div>
        <div class="col-md-3">
            <p class="text-muted"><img src="user/img/sysctf/forensic.png" class="avatar4"></p>
            <h4 class="service-heading"><a data-toggle="tab" href="#forensicxploit" style="color:#34383d;" >Forensic</a></h4>
          </div>
      </div>

      <div class="tab-content text-center">
        <div id="webxploit" class="tab-pane fade">
          <h3>Web exploitation</h3>
          <p>Web Exploitation is the way how unauthorized people can do something with impacting our web security without the usual way eg : User can input a html and triggering an xss, at this category you will learn how to attack website with different exploitation maybe sometimes you need to chain the vulnerability to build another vulnerability! </p>
        </div>
        <div id="cryptoxploit" class="tab-pane fade">
          <h3>Cryptography</h3>
          <p>Cryptography is the practice and study of techniques for secure communication in the presence of third parties. - Wikipedia</p>
        </div>
        <div id="reversexploit" class="tab-pane fade">
          <h3>Reverse Engineering</h3>
          <p>Reverse engineering is the process of discovering the technological principles of a device, object, or system through analysis of its structure, function, and operation. - Wikipedia</p>
        </div>
        <div id="forensicxploit" class="tab-pane fade">
          <h3>Forensic</h3>
          <p>Digital forensics (sometimes known as digital forensic science) is a branch of forensic science encompassing the recovery and investigation of material found in digital devices, often in relation to computer crime - Wikipedia</p>
        </div>
      </div>    
    </div>
  </section>

  
  <section id="quotes" class=" bg-light">
      <div class="mx-auto">
        <div class="text-center">

          <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">                
                <p class="text-info">IoT without security = Internet of Threats</p>
                <h9>- Stephane Nappo -</h9>
              </div>
              <div class="carousel-item">
                <p class="text-info">No System Is Save</p>
                <h9>- Heker Clay -</h9>
              </div>
              <div class="carousel-item">
                <p class="text-info">Makan Bang</p>
                <h9>- Yong Lex -</h9>
              </div>
              <div class="carousel-item">
                <p class="text-info">Maybe You Find Some Knowledge Here</p>
                <h9>- Dwi Mulia -</h9>
              </div>
            </div>       
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-iconn" ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-iconn" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>     
          </div>

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
  <script src="<?= $base_url; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= $base_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= $base_url; ?>assets/agency.js"></script>
  <script>
  $('.carousel').carousel({
  interval: 4500
})
  </script>

</body>

</html>
