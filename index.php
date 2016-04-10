<?php
session_start();
include_once 'dbconnect.php';
// if user is already logined
if(isset($_SESSION['user'])!="")
{	
	if($_SESSION['type']=='user')
	header("Location: home_user.php");
	if($_SESSION['type']=='lawyer')
	header("Location: home_lawyer.php");
		
}

//if user presses login button 
if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$uprof = mysql_real_escape_string($_POST['profile']);
	$email = trim($email);
	$upass = trim($upass);
	$uprof = trim($uprof);

	if($uprof=='user')
		$res=mysql_query("SELECT * FROM users WHERE user_email='$email'");
	else
		$res=mysql_query("SELECT * FROM lawyers WHERE user_email='$email'");
			
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	$_SESSION['user'] = $row['user_id'];
        	
	echo $row['user_id'];
	if($count == 1 && $row['user_pass']==md5($upass))
	{
			
	if($uprof=='user'){
		header("Location: home_user.php");
	$_SESSION['type'] = 'user';}
	else
	    {header("Location: home_lawyer.php");
             $_SESSION['type'] = 'lawyer';}
	
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Legistify Intern Assign.</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input class="class1" type="text" name="email" placeholder="Your Email" required /></td>
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
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
