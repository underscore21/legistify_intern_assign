<?php
session_start();

include_once 'dbconnect.php';

$l = $_POST["name"];
$s="pending";
echo $l;

$result = mysql_query("SELECT * FROM appointments WHERE app_id='$l'");
$row = mysql_fetch_array($result);
$data=$row['user_id'];

if(mysql_query("UPDATE appointments SET status='accepted' WHERE app_id='$l'"))
		{
			if(mysql_query("INSERT INTO messages(user_id,app_id,message,status) VALUES('$data','$l','confirmed','unread');"))
				echo "successfully accepted";
			else
				echo "error,please try again later";
		}
		else
		{
			echo "error,please try again later";
		}

?>
