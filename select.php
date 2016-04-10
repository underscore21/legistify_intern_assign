<?php
       
//notifcations for a user

	session_start();
	include_once 'dbconnect.php';
 	
	$u = $_POST["name"];
        $sql = "SELECT * from messages where status = 'unread' AND user_id='$u'";
        $res=mysql_query($sql);	
	$row=mysql_fetch_array($res);
	$count = mysql_num_rows($res);
	echo $count;
?>
