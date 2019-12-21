<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host		= "localhost";
$user		= "root";
$password 	= "root";
$db_name 	= "ctf";
$base_url 	= "/";


$con = mysqli_connect($host,$user,$password,$db_name);
if(!$con) die("G");

// $lama = 1;
// mysqli_query($con, "DELETE FROM tbl_reset WHERE DATEDIFF(CURDATE(), tgl) > $lama ");

function aman($data){
    $filter=addslashes(htmlentities(htmlspecialchars(stripslashes(strip_tags($data,ENT_QUOTES)))));
    return $filter;
}

function get_info($que){
	$sql = mysqli_query($que);
	$get_info = mysqli_fetch_array($sql);
	$result[] = $get_info;
	return $result;
}

function url($data){
	$pattern = '/([^a-zA-Z0-9 ]+)/';
	$ok = preg_replace($pattern,'', $data);
	$filter_url = str_replace(' ', '-', $ok);
	return $filter_url;
}

// function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
//     if (isset($_SERVER['HTTP_HOST'])) {
//         $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
//         $hostname = $_SERVER['HTTP_HOST'];
//         $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
//         $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
//         $core = $core[0];
//         $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
//         $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
//         $base_url = sprintf( $tmplt, $http, $hostname, $end );
//     }
//     else $base_url = '/';
//     if ($parse) {
//         $base_url = parse_url($base_url);
//         if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
//     }
//     return $base_url;
// }
// $base_url = base_url();
// echo $base_url;
?>
