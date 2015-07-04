<?php
require 'connection.php';
//include('login.php');
 session_start();

if(isset($_GET['event'])){
	$event_id=(int) $_GET['event'];
   if (isset($_SESSION['username'])) {
   	 $blah=$_SESSION['username'];
   	 //echo $blah;
   	 $query="INSERT into follow (event,user)
   	 	SELECT {$event_id},'{$blah}' FROM
   	 	event WHERE EXISTS (
   	 		SELECT id 
   	 		FROM event
   	 		WHERE id={$event_id})
		AND NOT EXISTS (
			SELECT id FROM follow
			WHERE user='{$blah}'
			AND event={$event_id})
		LIMIT 1";
		if($q=mysql_query($query)){
			header('Location:get_event.php?id='.$event_id);
		} else{
			echo 'You are already following';
		}
   } else{
   	header('Location:login.php');
   }
}
?>