<?php
session_start();

include_once 'dbconnect.php';

$l = $_REQUEST["l"];
$u= $_REQUEST["u"];
$s="pending";
if(mysql_query("INSERT INTO appointments(user_id,lawyer_id,status) VALUES('$u','$l','$s')"))
		{
			$last_id = mysql_insert_id();
			echo "successfully booked appointment, your appointment id is:-".$last_id;
		}
		else
		{
			echo "error,please try again later";
		}

?>
