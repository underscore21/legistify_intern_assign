<?php
session_start();

include_once 'dbconnect.php';

$l = $_POST["name"];
$s="pending";
echo $l;
if(mysql_query("UPDATE messages SET status='read' WHERE msg_id='$l'"))
		{
			echo "success";
		}
		else
		{
			echo "error,please try again later";
		}

?>
