<?php
       
// this file returns count of new notifications for user
	session_start();
	include_once 'dbconnect.php';
 	
	$u = $_POST["name"];
        $sql = "SELECT * FROM appointments WHERE lawyer_id='$u' AND status='pending'";
        $res=mysql_query($sql);	
	$row=mysql_fetch_array($res);
	$count = mysql_num_rows($res);
	echo $count;
?>
