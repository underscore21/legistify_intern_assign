<?php

// this file returns list of all apointments of this user
session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];
$result = mysql_query("SELECT * FROM appointments WHERE user_id='$uid'");
echo "<table border='1'>
<tr>
<th>app id</th>
<th>lawyer id</th>
<th>date</th>
<th>status</th>
</tr>";
while($row = mysql_fetch_array($result))
{
$varr=$row['user_id'];
echo "<tr>";
echo "<td>" . $row['app_id'] . "</td>";
echo "<td>" . $row['lawyer_id'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
}
echo "</table>";
?>
