<?php

$level=9;
$ticket=$_COOKIE['ticketid'];
$sdate=$_COOKIE['date'];

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
if($level>($prevlevel+1))
{
    header('location:cheaters_end_up.html');
}
else if($level<($prevlevel+1))
{
    header('location:level'.($level+1).'.php');
}

$ans=$_POST['answer'];
$correct1 = "highway to hell";

if(strcasecmp($ans,$correct1)==0)
{
	$timezone = "Asia/Calcutta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$date=date('d$m$Y$H$i$s');

	$day1 = strtok($sdate, "$");
	$month1= strtok("$");
	$year1= strtok("$");

	$hr1 = strtok("$");
	$min1= strtok("$");
	$sec1= strtok("$");

	$day2 = strtok($date,"$");
	$month2= strtok("$");
	$year2= strtok("$");

	$hr2 = strtok("$");
	$min2= strtok("$");
	$sec2= strtok("$");

	$is_dst=0;
	$epoch1 = mktime ( $hr1, $min1, $sec1, $month1, $day1, $year1, $is_dst );
	$epoch2 = mktime ( $hr2, $min2, $sec2, $month2, $day2, $year2, $is_dst );
	$diff=$epoch2-$epoch1;
	$date=$diff;

	$sql="update score_sheet set level=9,date='$date' where ticketid='$ticket'";

	if (!mysql_query($sql,$con))
  	{
		die('Error: ' . mysql_error());
  	}

	header('Location:level10.php'); 
		
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>LEVEL 9 </title>
</head>

<body bgcolor= "#000000">
<font size="6" style="arial" color="#1E90FF">
<form action="level9.php" method="post">
<center>
CONNECT<br/>
<img src="9.jpg" height="500" width="500"/>
<br/>
ANSWER : <input type="text" name="answer">
</center>
</form>

</body>
</html>
