<?php
// this file returns list of all available lawyers
session_start();
include_once 'dbconnect.php';

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];
$result = mysql_query("SELECT * FROM lawyers");
echo "<table border='1'>
<tr>
<th>id</th>
<th>lawyer name</th>
<th>book</th>
</tr>";
while($row = mysql_fetch_array($result))
{
$varr=$row['user_id'];
echo "<tr>";
echo "<td>" . $row['user_id'] . "</td>";
echo "<td>" . $row['user_name'] . "</td>";
echo "<td><form>
<button onclick=\"func1($varr)\" type=\"submit\">book this</button>
</form></td></tr>";
}
echo "</table>";
?>
