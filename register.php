<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$uprof = mysql_real_escape_string($_POST['profile']);
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$uprof = trim($uprof);
	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		if($uprof=='user')
		{
		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
			?>
			<script>alert('successfully registered as a user');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
		}
		else
		{
		if(mysql_query("INSERT INTO lawyers(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
			?>

			<script>alert('successfully registered as a lawyer');</script>

			<?php

		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
		}
				
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input class="class1" type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input class="class1" type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input class="class1" type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td>
I am a:-
<input type="radio" name="profile" value="lawyer">Lawyer
<input type="radio" name="profile" value="user"> User
</td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
