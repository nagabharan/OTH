<meta http-equiv="refresh" content="30" />
<?php
   $con = mysql_connect('localhost','root','root');
   $i=1;
   if (!$con)
    	die('Could not connect to database : ' . mysql_error());
   mysql_select_db("oth", $con);
  
   $query="select * from score_sheet order by level desc,date asc";

   if (!($result=mysql_query($query,$con)))
    	die('Error: ' . mysql_error());

   echo "<html><head><title>Score Sheet</title></head>";
   echo "<body bgcolor=\"#0D0F0F\"><center><h1><font color=\"#1E90FF\">Scores</font></h1><table cellpadding=5 cellspacing=5>
   <tr>
   <th><font color=\"#1E90FF\"><center> Ticket ID </center></font></th>
   <th><font color=\"#1E90FF\"><center> Name </center></font></th>
   <th><font color=\"#1E90FF\"><center> Level </center></font></th>
   <th><font color=\"#1E90FF\"><center> Elapsed Time </center></font></th>
   </tr>";
   while($row = mysql_fetch_array($result))
   {
	   if($i==1){
	   echo "<tr>";
	   echo "<td><font color=\"#00FF00\"><center>" . $row['ticketid'] . "</center></font></td>";
	   echo "<td><font color=\"#00FF00\"><center>" . $row['name'] . "</center></font></td>";
	   echo "<td><font color=\"#00FF00\"><center>" . $row['level'] . "</center></font></td>";
	   if($row['date'] < 60)
		   echo "<td><font color=\"#00FF00\"><center>" . $row['date'] . " seconds </center></font></td>";
	   else if($row['date'] >= 60 && $row['date'] < 3600)
	   {
		   $min= $row['date']/60;
		   $sec= $row['date']%60;
		   echo "<td><font color=\"#00FF00\"><center>" . intval($min) . " minutes ". $sec ." seconds </center></font></td>";
	   }
	   else  if($row['date'] >= 3600 )
	   {
		   $hr= $row['date']/3600;
		   $remsecs= $row['date']%3600;
		   $min=$remsecs/60;
		   $sec=$remsecs%60;
		   echo "<td><font color=\"#00FF00\"><center>" . intval($hr) . " hours ". intval($min) ." minutes " .$sec." seconds </center></font></td>";
	   }
	   $i++;echo "</tr>";
	   }
	   else{
	   echo "<tr>";
	   echo "<td><font color=\"#1E90FF\"><center>" . $row['ticketid'] . "</center></font></td>";
	   echo "<td><font color=\"#1E90FF\"><center>" . $row['name'] . "</center></font></td>";
	   echo "<td><font color=\"#1E90FF\"><center>" . $row['level'] . "</center></font></td>";
	   if($row['date'] < 60)
		   echo "<td><font color=\"#1E90FF\"><center>" . $row['date'] . " seconds </center></font></td>";
	   else if($row['date'] >= 60 && $row['date'] < 3600)
	   {
		   $min= $row['date']/60;
		   $sec= $row['date']%60;
		   echo "<td><font color=\"#1E90FF\"><center>" . intval($min) . " minutes ". $sec ." seconds </center></font></td>";
	   }
	   else  if($row['date'] >= 3600 )
	   {
		   $hr= $row['date']/3600;
		   $remsecs= $row['date']%3600;
		   $min=$remsecs/60;
		   $sec=$remsecs%60;
		   echo "<td><font color=\"#1E90FF\"><center>" . intval($hr) . " hours ". intval($min) ." minutes " .$sec." seconds </center></font></td>";
	   }
	   $i++;echo "</tr>";
	   }
   }
   
   echo "</table></center></body></html>"; 

   mysql_close($con);
?>


