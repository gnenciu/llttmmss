<?php 
// error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
   session_start();
   $length = 32;
   $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length); 
   $hash = $_SESSION['token'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liceul Teoretic Mihail Sadoveanu</title>
	<?php include("html/head.html");?>
</head>

<body>
	<div class="container">
	<?php $page="contact";?>
	<?php include("html/header.php");?>
	<?php include("html/contact.html");?>
	<?php include("html/footer.html");?>
	</div>
</body>
</html>