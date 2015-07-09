<?php
function get_events($cat,$loc){
	$events = array();
	$query = "SELECT id,title,location,start,end,date_posted,city FROM event 
	WHERE `category`='{$cat}' and `location`='{$loc}'";
	

	if (isset($date) ){
		$query .= " and `date_posted` = {$date}";
	}
	$q= mysql_query($query);
	while ($row = mysql_fetch_assoc($q)) {
		$events[] = $row;
	}
	return $events;
}

function get_events_bydate($cat,$loc,$date){
	$events = array();
	$query = "SELECT id,title,location,date_posted,city FROM event 
	WHERE `category`='{$cat}' and `location`='{$loc}' and `date_posted` = '{$date}'";
	$q= mysql_query($query);
	while ($row = mysql_fetch_assoc($q)) {
		$events[] = $row;
	}
	return $events;
}
function get_event($id){
		$events = array();
	$query = "SELECT id,title,start,end,description,organizer,
	location,date_posted,city,category,contact FROM event 
	WHERE `id`={$id}";
	$q= mysql_query($query);
	while ($row = mysql_fetch_assoc($q)) {
		$events[] = $row;

	}
	return $events;
}
function get_event_bydate($date,$user){
	$events = array();
	//$query = "SELECT title,start,end FROM `event` WHERE `date_posted`='{$date}'";
	// $query="SELECT `event.title`,`event.start`,`event.end` from `event` INNER JOIN 
	// `follow` ON `event.id`=`follow.event` AND `event.date_posted`='{$date}'
	//  AND `follow.user`='{$user}'";
	$query="SELECT title,start,end from event,follow WHERE 
	 event.id=follow.event AND event.date_posted='{$date}' AND follow.user='{$user}'";
	$q= mysql_query($query);
	$row = mysql_fetch_row($q) ;
	return $row;
}
function get_img($eid){
	$events = array();

	$query = "SELECT `path` FROM `photos` WHERE `event_id`={$eid}";

	$q= mysql_query($query);
	$row = mysql_fetch_row($q) ;
	return $row;
}
function is_following($event_id,$user){
	$follow="Follow";
	$following="Following";
	$query="SELECT COUNT(`event`) AS `count` FROM follow WHERE event={$event_id} AND user='{$user}'";
	$query=mysql_query($query);
	while($row=mysql_fetch_assoc($query)) {
		$count=$row['count'];
	}
	if($count>0){
		return $following;
	} else{
		return $follow;
	}
}
function num_followers($event_id){
	$query="SELECT COUNT(`event`) AS `followers` FROM follow WHERE event={$event_id}";
	$query=mysql_query($query);
	$return=array();
	while($row=mysql_fetch_assoc($query)) {
		$return[]=$row;
	}
	return $return;
}
function members($event_id){
	$query="SELECT member FROM attendees WHERE event_id={$event_id}";
	$query=mysql_query($query);
	$return=array();
	while($row=mysql_fetch_assoc($query)) {
		$return[]=$row;
	}
	return $return;
}

?>