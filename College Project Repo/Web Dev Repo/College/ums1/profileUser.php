<?php
session_start(); 
if (!isset($_SESSION['login_user'])){
	echo "You need to login";
	header("Location: login.php");
}
	
?>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i>
<?php 
echo $_SESSION['role'] ;
?>
</i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>