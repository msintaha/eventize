<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['username'])){
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
<h5><?php echo $_SESSION['username'];?></h5>
 </center>
    <li><a href="index.php">Search Events</a></li>
    <li><a href="calendar.php">This month's calendar</a></li>
    <li><a href="settings.php">Settings</a></li>
  </ul>
 


	</body>
</html>