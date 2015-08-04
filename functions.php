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
function add_comment($eid,$user,$body){
 $eid=(int)$eid;
 $user=mysql_real_escape_string($user);
 $body=mysql_real_escape_string($body);
 $que="INSERT INTO `comments` VALUES ('',{$eid},'{user}','{$body}',NOW())";
 mysql_query($que);
}
function get_comments($eid){
 $eid=(int) $eid;
 $sql= "SELECT
  username,comment,date_posted FROM comments WHERE `event_id`={$eid}";
  	$comments=mysql_query($sql);
  	$return=array();
  	while($row=mysql_fetch_assoc($comments)){
  		$return[]=$row;
  	}
  	return $return;
}
function get_event($id){
		$events = array();
	$query = "SELECT id,title,start,end,description,organizer,ticket,admin,
	location,date_posted,city,category,contact FROM event 
	WHERE `id`={$id}";
	$q= mysql_query($query);
	while ($row = mysql_fetch_assoc($q)) {
		$events[] = $row;

	}
	return $events;
}
function fetch_preference($user){
	$events = array();
	$query = "SELECT event.id,title, location,date_posted,category FROM event,cat_preference WHERE event.category=cat_preference.cat_event 
	AND cat_preference.username='{$user}'";
	$q= mysql_query($query);
	while ($row = mysql_fetch_assoc($q)) {
		$events[] = $row;
	}
	return $events;
}
function get_event_bydate($date,$user){
	$events = array();
	$query="SELECT title,start,end FROM event,follow WHERE 
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
function get_latest(){
	$events = array();
	$sql= "SELECT `title`, `date_posted`,`id`,`location` FROM `event` ORDER BY `date_posted` DESC LIMIT 0, 10";
$records= mysql_query($sql);
while ($row = mysql_fetch_assoc($records)) {
		$events[] = $row;
	}
	return $events;
}
function get_popular(){
	$events = array();
	$sql= "SELECT t1.id,t1.title,t1.description,t1.location,t1.date_posted FROM event t1 
	INNER JOIN follow t2 on t1.id=t2.event GROUP BY t1.id ORDER BY COUNT(t2.event) DESC";
$records= mysql_query($sql);
while ($row = mysql_fetch_assoc($records)) {
		$events[] = $row;
	}
	return $events;	
}
function get_events_by_preference($username){
	$events = array();
 $query="SELECT title,location,event.id FROM event,cat_preference WHERE
 cat_preference.username='$username' AND cat_preference.cat_event=event.category";
$query= mysql_query($query);
	while ($row = mysql_fetch_assoc($query)) {
		$events[] = $row;
	}
	return $events;
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