<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$res1=mysql_query("SELECT user_name FROM lawyers");
$lawyer=mysql_fetch_array($res1);
$uid=$userRow['user_id'];

?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome Client- <?php echo $userRow['user_email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<style>
#notification_count
{
padding: 0px 3px 3px 7px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left: 77px;
border-radius: 9px;
-moz-border-radius: 9px
-webkit-border-radius: 9px;
position: absolute;
margin-top: -40px;
font-size: 10px;
}
</style>
 

<script>
function funcm(){
$('#mapp').load('data1.php');
if(mapp.style.display=='none')
  {mapp.style.display='block';
 sapp.style.display='none';
napp.style.display='none'}
	
else if(mapp.style.display='block')
   mapp.style.display='none';
}

function funcs(){
$('#sapp').load('data2.php');
if(sapp.style.display=='none'){
   sapp.style.display='block'; 
   napp.style.display='none';
   mapp.style.display='none';}

else if(sapp.style.display='block')
   sapp.style.display='none';
}
function funcn(){
$('#napp').load('data3.php');
if(napp.style.display=='none'){
   napp.style.display='block'; 
   sapp.style.display='none';
   mapp.style.display='none';}

else if(sapp.style.display='block')
   sapp.style.display='none';
}


function func1(p)
{
var user = '<?php echo $uid; ?>';
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      alert(xhttp.responseText);
    }
  };
  xhttp.open("GET", "addapp.php?l="+p+"&u="+user, true);
  xhttp.send();   
}


function func2(id)
{
 var formData = {name:id};
$.ajax({
type: "POST",
url: "upstate.php",
data: formData,
async: true,
cache: false,
timeout:50000,
 
success: function(data){
alert(data);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
alert("error occured");

}
});
}
 
function addmsg(type, msg){
 
$('#notification_count').html(msg);
 
}
 
function waitForMsg(){
var user = '<?php echo $uid; ?>';
var formData = {name:user};
$.ajax({
type: "POST",
url: "select.php",
data: formData,
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});
 
</script>
</head>
<body>
<div id="header">
	<div id="left">
    <label>Legistify</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
<button type="submit" class="t_button" onclick="funcm()">make appointment</button>	
<button type="submit" class="t_button" onclick="funcs()">show my appointments</button>
<button type="submit" class="t_button" onclick="funcn()">notifications</button>
<span id="notification_count"></span>	

</div>
<div style="display:none" id="mapp"> </div>
<div style="display:none" id="sapp"> </div>
<div style="display:none" id="napp"> </div>

</body>
</html>
