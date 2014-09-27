<?php

$name=$_POST['name'];
$ticket=$_POST['ticketid'];
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('d$m$Y$H$i$s');

if(($ticket!=NULL)&&($name!=NULL))
{
	$expire=time()+60*60*25;
	setcookie("ticketid", $ticket,$expire);
	setcookie("date", $date,$expire);
$con = mysql_connect('localhost','root','root');
	if (!$con)
  	{
  	die('Could not connect to database : ' . mysql_error());
  	}
	mysql_select_db("oth", $con);

	$level=0;
	
	$sql="INSERT INTO score_sheet VALUES('$_POST[ticketid]','$_POST[name]',0,'0')";

	if (!mysql_query($sql,$con))
	{
		die('Error: ' . mysql_error());
	}

	mysql_close($con);
header('location:level'.($level+1).'.php');

}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> OTH! </title>
</head>
<body bgcolor= "#000000">
<font size="5" style="arial" color="#1E90FF">
<h1><center>Welcome To The Online Treasure Hunt</center></h1>
<p>Crawl the web to find secret troves of knowledge, and unlock the next clue!
Play Sherlock Holmes on the expanse of the Internet.</p>
<b>Links :</b></br>
<a href="score.php">CLICK HERE</a> to view Real Time Scores.Open the score page on your browser to keep a track of the scores.<br/>
<a href="rules.php">CLICK HERE</a> to view the Rules .<br/>
Need Any more help ? Post on the facebook wall<center>
<font size="10" style="arial" color="#1E90FF">
<form METHOD="post" ACTION="main.php">
</br>
<table cellpadding=4>
  <tr>
    <th><font size="5" style="arial" color="#1E90FF"> USN : </font></th>
    <td><input type="text" name='ticketid'></input> </td>
  </tr>
  <tr>
    <th><font size="5" style="arial" color="#1E90FF"> Name : </font></th>
    <td><input type="text" name='name'></input></td>
  </tr>
  <tr><td colspan=2><center><input TYPE="submit" VALUE="START"></center></td></tr>
</table></form></font>
Hosted By PESSE ACM Student Chapter
</center></body></html>
