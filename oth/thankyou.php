<?php
$ticket=$_COOKIE['ticketid'];
$name=$_COOKIE['name'];
$level=21;

$con = mysql_connect('localhost','root','root');
	if (!$con)
  	{
  	die('Could not connect to database : ' . mysql_error());
  	}
	mysql_select_db("oth", $con);


$nameq="select name from score_sheet where ticketid='$ticket'";
if (!($resultn=mysql_query($nameq,$con)))
{
  	die('Error: ' . mysql_error());
}
$rown=mysql_fetch_array($resultn);
$name=$rown['name'];

$query="select level from score_sheet where ticketid='$ticket'";
if (!($result=mysql_query($query,$con)))
{
  	die('Error: ' . mysql_error());
}
$row=mysql_fetch_array($result);

$prevlevel=$row['level'];
if($level!=($prevlevel+1))
{
         header('location: cheaters_end_up.html');
}

$query="insert into winners values('','$ticket','$name')";
if (!($result=mysql_query($query,$con)))
{
  	die('Error: ' . mysql_error());
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Congratulations!</title>
</head>
<body bgcolor= "#000000"><center>
<font size="5" color="#1E90FF">
<h1>Congratulations!</h1>
<img src="done.jpg" height=50% width=50%/>
<br/>
<p>You have managed to complete the entire treasure hunt.</p>
<p>Thank You for playing!</p>
</center>
</body>
</html>
