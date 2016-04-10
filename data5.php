<?php

// this file returns list of all appointment requests of this lawyer
session_start();
include_once 'dbconnect.php';
$res=mysql_query("SELECT * FROM lawyers WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];
$result = mysql_query("SELECT * FROM appointments WHERE lawyer_id='$uid' AND status='pending'");
echo "<table border='1'>
<tr>
<th>app_id</th>
<th>user_id.</th>
<th>date</th>
<th>action</th>
<th>reject</th>
</tr>";
while($row = mysql_fetch_array($result))
{
$varr=$row['app_id'];
echo "<tr>";
echo "<td>" . $row['app_id'] . "</td>";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td><form>
<button onclick=\"func3($varr)\" type=\"submit\">ACCEPT</button>
</form></td>";
echo "<td><form>
<button onclick=\"func4($varr)\" type=\"submit\">REJECT</button>
</form></td></tr>";
}
echo "</table>";
?>
