<?php
session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM lawyers WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];
$result = mysql_query("SELECT * FROM appointments WHERE lawyer_id='$uid' AND status!='pending'");

echo $_SESSION['user'];
echo "<table border='1'>
<tr>
<th>app id</th>
<th>user id</th>
<th>date</th>
<th>status</th>
</tr>";
while($row = mysql_fetch_array($result))
{
$varr=$row['user_id'];
echo "<tr>";
echo "<td>" . $row['app_id'] . "</td>";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
}
echo "</table>";
?>
