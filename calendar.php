<?php
require 'connection.php';
session_start();
$user=$_SESSION['username'];
if(!isset($user)){
  header('Location:index.php');
}
?>
<!DOCTYPE html><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>
  <style type="text/css">
  td{
  	border:2px solid pink !important;
    width: 145.222222px;
  height: 123px;
  }
  body{
    background:rgba(238, 238, 238, 0.18);
  }
  #head{
  	padding-top: 0!important;
  	padding-bottom: 0 !important;
  }
  table{
    background:white;
  }
  th{
    padding: 4px 5px !important;
    border:2px solid pink !important;
  	background-color: beige;
  	text-align: center !important;
  }

  </style>
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
  <ul id="slide-out" class="side-nav fixed"><br>
 <center> <img src="assets/images/logo.png" class="circle">
<h5><?php echo $_SESSION['username'];?></h5>
 </center>
    <li><a href="index.php">Search Events</a></li>
    <li><a href="calendar.php" class="active">This month's calendar</a></li>
    <li><a href="settings.php">Settings</a></li>
  </ul>
 
<?php 
 //This gets today's date 
 $date =time () ; 
 //This puts the day, month, and year in seperate variables 
 $day = date('d', $date) ; 
 $month = date('m', $date) ; 
 $year = date('Y', $date) ;
$thedate=$year.'-'.$month.'-'.$day;

 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 $title = date('F', $first_day) ;  //This gets us the month name 
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 



 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

 switch($day_of_week){ 

 case "Sun": $blank = 0; break; 

 case "Mon": $blank = 1; break; 

 case "Tue": $blank = 2; break; 

 case "Wed": $blank = 3; break; 

 case "Thu": $blank = 4; break; 

 case "Fri": $blank = 5; break; 

 case "Sat": $blank = 6; break; 
 }
 //We then determine how many days are in the current month

 $days_in_month = cal_days_in_month(0, $month, $year) ; 

 //Here we start building the table heads 

 echo '<table border=1 style="width:65%;margin-left:26%;margin-right:auto;">';

 echo '<tr><th colspan=7 id="head"><h5>'.$title.' '.$year.'</h5></th></tr>';

 echo '<tr>
 <th>S</th>
 <th>M</th>
 <th>T</th>
 <th>W</th>
 <th>T</th>
 <th>F</th>
 <th>S</th>
 </tr>';
 //This counts the days in the week, up to 7
 $day_count = 1;
 echo "<tr>";
 //first we take care of those blank days
 while ( $blank > 0 ){ 
 echo "<td></td>"; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //sets the first day of the month to 1 
 $day_num = 1;
 //count up the days, untill we've done all of them in the month
 while ( $day_num <= $days_in_month ) {
 $thedate=$year.'-'.$month.'-'.$day_num;
$event=get_event_bydate($thedate,$user); 
//
if($event[0]=='' || $event[1]==''){
echo '<td>'.$day_num.'<br>'.$event[0].'<br>'.$event[1].'</td>';
}
else{
 echo '<td class="woo">'.$day_num.'<br>'.$event[0].'<br>'.$event[1].'</td>'; 
}
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week

 if ($day_count > 7){
 echo "</tr><tr>";
 $day_count = 1;
 }
} 

 //Finaly we finish out the table with some blank details if needed

 while ( $day_count >1 && $day_count <=7 ){ 
 echo "<td> </td>"; 
 $day_count++; 
} 
 echo "</tr></table>"; 
?>

	</body>
</html>