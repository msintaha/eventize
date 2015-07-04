<?php
require 'connection.php';
//include('login.php');
 session_start();

if(isset($_GET['event'])){
	$event_id=(int) $_GET['event'];
   if (isset($_SESSION['username'])) {
   	 $blah=$_SESSION['username'];
   	 //echo $blah;
   	 $query="INSERT into attendees (event_id,member)
   	 	SELECT {$event_id},'{$blah}' FROM
   	 	event WHERE EXISTS (
   	 		SELECT id 
   	 		FROM event
   	 		WHERE id={$event_id})
		AND NOT EXISTS (
			SELECT id FROM attendees
			WHERE member='{$blah}'
			AND event_id={$event_id})
		LIMIT 1";
		if($q=mysql_query($query)){
			header('Location:get_event.php?id='.$event_id);
		} else{
         echo 'blah';
      }
   } else{
   	header('Location:login.php');
   }
}
?>