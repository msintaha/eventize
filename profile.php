<?php
require 'connection.php';
session_start();
$username=$_SESSION['username'];
$event=get_events_by_preference($username);
if(!isset($_SESSION['username'])){
  header('Location:index.php');
}
?>
<!DOCTYPE html><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
   <script src="assets/js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>
  <style type="text/css">
  body{
    background:rgba(238, 238, 238, 0.18);
  }
  </style>
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
  <ul id="slide-out" class="side-nav fixed"><br>
 <center> <img src="assets/images/logo.png" class="circle">
<h5><a href="profile.php"><?php echo $_SESSION['username'];?></a></h5>
 </center>
 <center><a href="logout.php">Logout</a></center>
    <li><a href="index.php">Search Events</a></li>
    <li><a href="calendar.php">This month's calendar</a></li>
    <li><a href="settings.php">Settings</a></li>
  </ul>
   <div id="settingform">
<h2>Welcome <?php echo $_SESSION['name']; ?>!</h2>
<h5>Some events you might be interested in:</h5>
<ul>
<?php foreach ($event as $eve) { 
 $eid=$eve['id'];
$img=get_img($eid);
  ?>
  <li id="cards">  <div class="card small">
  <div class="card-image">
              <img src="<?php echo $img[0];?>">
              <span class="card-title"><?php echo $eve['title'];?></span>
            </div>
            <div class="card-content">
            <h5><a href="get_event.php?id=<?php echo $eve['id']; ?>"><?php echo $eve['title'];?></a></h5>
              <p><?php echo $eve['location'];?></p>
     </div>
  </div></li>
<?php }?>
</ul>
</div>
</body>
</html>