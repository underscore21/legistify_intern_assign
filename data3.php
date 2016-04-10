<?php

session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];
$result = mysql_query("SELECT * FROM messages where user_id='$uid' AND status='unread'");
echo "<table border='1'>
<tr>
<th>msg. id</th>
<th>appointment id.</th>
<th>Message</th>
<th>book</th>
</tr>";
while($row = mysql_fetch_array($result))
{
$varr=$row['msg_id'];
echo "<tr>";
echo "<td>" . $row['msg_id'] . "</td>";
echo "<td>" . $row['app_id'] . "</td>";
echo "<td>" . $row['message'] . "</td>";
echo "<td><form>
<button onclick=\"func2($varr)\" type=\"submit\">mark as read</button>
</form></td></tr>";
}
echo "</table>";
?>
