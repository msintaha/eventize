<?php
require 'connection.php';
session_start();
$user=$_SESSION['username'];
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
   <script src="assets/js/jquery.js"></script>
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
    <li><a href="index.php">Search Events</a></li>
    <li><a href="calendar.php">This month's calendar</a></li>
    <li class="activeh"><a href="settings.php" >Settings</a></li>
  </ul>

 <div id="settingform">
 	<form  method="POST">
 		 <div class="row">
          <div class="input-field col s12" style="z-index:9999;">
         <h5> What category events do you want to be notified about?</h5>
      <p>
      <input type="checkbox" name="chk[]" class="filled-in"  value="Arts & Culture" id="Arts_Culture" />
      <label for="Arts_Culture">Arts & Culture</label>&nbsp;
   
      <input type="checkbox" name="chk[]" class="filled-in" id="Education_Learning" value="Education & Learning" />
      <label for="Education_Learning">Education & Learning</label>&nbsp;
   
      <input type="checkbox" name="chk[]" class="filled-in" id="Career_Business" value="Career & Business" />
      <label for="Career_Business">Career & Business</label>&nbsp;
   
      <input type="checkbox" name="chk[]" class="filled-in" id="Fashion_Beauty" value="Fashion & Beauty" />
      <label for="Fashion_Beauty">Fashion & Beauty</label>
   &nbsp;
      <input type="checkbox" name="chk[]" class="filled-in" id="Technology_IT" value="Technology & IT" />
      <label for="Technology_IT">Technology & IT</label>&nbsp;
   
      <input type="checkbox" name="chk[]" class="filled-in" id="Food_Drink" value="Food & Drink" />
      <label for="Food_Drink">Food & Drink</label>&nbsp;
 
      <input type="checkbox" name="chk[]" class="filled-in" id="Outdoors_Adventure" value="Outdoors & Adventure" />
      <label for="Outdoors_Adventure">Outdoors & Adventure</label>&nbsp;
   
      <input type="checkbox" name="chk[]" class="filled-in" id="Comicon" value="Comicon" />
      <label for="Comicon">Comicon</label>&nbsp;

      <input type="checkbox" name="chk[]" class="filled-in" id="Sports_Games" value="Sports & Games" />
      <label for="Sports_Games">Sports & Games</label>&nbsp;

      <input type="checkbox" name="chk[]" class="filled-in" id="Concerts_Music" value="Concerts & Music" />
      <label for="Concerts_Music">Concerts & Music</label>&nbsp;
      <input type="checkbox" name="chk[]" class="filled-in" id="Conferences_Seminar" value="Conferences & Seminar" />
      <label for="Conferences_Seminar">Conferences & Seminar</label>
    </p>
    <br>
    <input type="submit" name="Submit" class="btn waves-effect waves-light pink accent-3" >
<?php
if(isset($_POST['chk'])){
$check=$_POST['chk'];
}
if(isset($check)){
	for ($i=0; $i <sizeof($check); $i++) { 
		$query="INSERT INTO cat_preference VALUES('','$user','".$check[$i]."')";
		mysql_query($query) ;
	}
	echo "<br><br>We've recorded your preference!";
}
?>
          </div>
          </div>
 	</form>
 </div>

	</body>
</html>
