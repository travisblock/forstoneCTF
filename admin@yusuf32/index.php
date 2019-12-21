<?php
ob_start();
?>
<!doctype html>
<html>
	<head>
		<title>Silahkan Login</title>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
body
{
	
	background: #2d3035;
	background-attachment:fixed;
	font-family: Ubuntu;
} 

.loginbox
{
position: absolute;
top: 50%;
left: 50%; 
transform: translate(-50%, -50%);
width: 360px;
height: 420px;
padding: 40px 40px;
box-sizing: border-box;
background:rgba(0, 5, 5, .5);
}




h2
{
padding: 0 0 30px;
color: #916ec8;
text-align: center;
}

.loginbox input
{
width: 100%;
margin-bottom: 20px;
}

form
{
color: black;
}

.loginbox input[type="text"],
.loginbox input[type="password"]
{
border: none;
border-bottom: 2px solid #916ec8;
background: transparent;
color:white;
}
.loginbox input[type="submit"]
{

border: none;
outline: none;
height: 30px;
width: 200px;
color: black;
font-size: 16px;
background: #916ec8;
cursor: pointer;
border-radius: 100px;
margin-left: 30px;
}
.loginbox input[type="submit"]:hover
{
background: #41276b;
color: black;
}
.loginbox a
{
color:#916ec8;
text-decoration: none;
}
.ajid{
color:white;
font-size:15px;
}

.gagal{
     position: fixed;
     color:#000;
     font-weight: bolder;
     border-radius: 20px;
     width: 200px;
     top: 60px;
     left: 80px;
     padding: 5px 10px;
     background-color: rgba(96, 73, 145,0.9);
     text-align: center;;
}
	</style>
	</head>
<body>
<div class="loginbox">

	<?php
	//www.indexattacker.tech
	
define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.'Action for '.$log."".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}
	include"config.php";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$pass= addslashes(trim(md5($_POST['password'])));
		$usr = addslashes(trim($_POST['user']));
		$sqlcek=mysqli_query($con, "select * from logo where usrname='$usr' AND password='$pass'");
		$jml=mysqli_num_rows($sqlcek);
		$d=mysqli_fetch_array($sqlcek);

		if($jml > 0) {
			session_start();
			$_SESSION['loginadm']			= TRUE;
			$_SESSION['usrname']			= $d['usrname'];
			$_SESSION['id']					= $d['id'];
			write_log("login success");
			header('location:home.php');
		}else{
			echo "<div class='gagal'>Maaf anda wibu</div>";			
			write_log("login fail");
		}
	}
	?>

<h2>Login dulu</h2>
<form method="post">
<P class="ajid">Username</p>
<input  type="text" name="user" placeholder="username">
<P class="ajid">Password</p>
<input type="password" name="password" placeholder="password">
<input type="submit"  value="Gass !!!">
</P></form>
</div>
	
<script src="jquery.min.js"></script>
<script>
     $(document).ready(function(){
     	setTimeout(function(){$(".gagal").fadeIn('slow');}, 200);});
      setTimeout(function(){$(".gagal").fadeOut('slow');}, 2000);
</script>
</body>
</html>
