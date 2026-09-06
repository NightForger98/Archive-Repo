<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}else{
		include "inc/connection.php";
		$username=$_POST['username'];
		$password=$_POST['password'];		
		$sql="select * from login where password='".$password."' AND username='".$username."'";
		$result=mysqli_query($conn,$sql);
		$rows=mysqli_num_rows($result);//count the rows
		if ($rows == 1) { //username is matching with the password
			$_SESSION['login_user']=$username; // Set the Session
			$res = mysqli_fetch_array($result);
			if ($res['roleId'] ==1){		
				$_SESSION['role']= "admin";//assign a role
				header("location:admin/profileAdmin.php"); // Redirecting To Other Page
			}else if ($res['roleId'] ==2){
				$_SESSION['role']= "user";//assign a role
				header("location: profileUser.php"); // Redirecting To Other Page
			
			}else
			$error = "Username or Password is invalid";
		} else {
			$error = "Username or Password is invalid";
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>PHP Login </h1>
<div id="login">
<h2>Login Form</h2>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
<A Href="registerForm.php"> Sign up </A>
</body>
</html>