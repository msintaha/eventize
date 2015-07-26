<?php
include 'core/init.php';


if (empty($_POST)===false) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if (empty($username)===true|| empty($password)===true){
		$errors[]='You need to enter a username and password';
	}else if(user_exists($username)===false){
		$errors[]='we cannot find the username. have you registered?';
	} else {
		if(strlen($password)>32){
			$errors[]= 'Password too long';
		}
		
		$login= login($username, $password);
    $theName=get_name($username);
		if($login === false){
			$errors[]= 'That username/password combination is incorrect.';
		}else{
		$_SESSION['user_id']= $login;
    $_SESSION['username']=$username;
    $_SESSION['name']= $theName[0];
     $_SESSION["itemcount"] = 0;
    $_SESSION["itemlist"] = "";
		header('Location: profile.php');
		exit();
		}
	}
	
}
//include 'includes/overall/header.php';
if(empty($errors)===false){
	?>
	<h2>We tried to log you in, but...</h2>
	<?php
	echo output_errors($errors);
}
//include 'includes/overall/footer.php';
?>
<!DOCTYPE html>
<html>
 <head>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>

  <!-- CSS  -->
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>

</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo" style="color:#f50057;">eventize</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="popular.php" style="color:#ab47bc;">POPULAR</a></li>
        <li><a href="latest.php" style="color:#ab47bc;">LATEST</a></li>
        <li><a href="organize.php" style="color:#ab47bc;">ORGANIZE AN EVENT</a></li>
        <li><a class="waves-effect waves-light btn purple lighten-1" href="register.php">Register</a></li>
      <li><a class="waves-effect waves-light btn pink accent-3" href="login.php">Login</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="popular.php">Popular</a></li>
        <li><a href="latest.php">Latest</a></li>
        <li><a href="organize.php">Organize</a></li>
          <li><a href="register.php" class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a href="login.php" class="waves-effect waves-light btn pink accent-3">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav><br>
<div class= "widgets">
<div class= "inner"> 
<center><h4>Login</h4></center>
<form id="login" class="col s12 l6" action="" method="POST" > 
  <div class="row"> 
	 <div class="input-field col s12"> 
	
	 <input id="username" name="username" type="text" class="validate">
	 <label for="username">Username</label>
	 </div> 
 </div> 
  <div class="row"> 
	 <div class="input-field col s12"> 
	 
	  <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
	 </div> 
 </div> 
  <input type="submit" value="Log in" class="btn waves-effect waves-light purple lighten-1"> <br>
 <br> Don't have an account? <a href="register.php">Register</a> here!
 </form>
 </div>
 </div>
 </body>
</html>
 
 
 
 
