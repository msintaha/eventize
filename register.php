 <!DOCTYPE html>
 <html>
 <head>
  <script src="assets/js/jquery.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>
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
        <li><a href="register.php" class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a  href="login.php" class="waves-effect waves-light btn pink accent-3">Login</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="popular.php">Popular</a></li>
        <li><a href="latest.php">Latest</a></li>
        <li><a href="organize">Organize</a></li>
          <li><a class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a class="waves-effect waves-light btn pink accent-3">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
 <?php 
 include 'core/init.php';
 //include 'includes/overall/header.php';
 
 if(empty($_POST)===false){
	 $required_fields =array('username','password','password_again','name','email');
	 foreach($_POST as $key=>$value){
		 if(empty($value) && in_array($key, $required_fields)=== true){
			 $errors[]='Fields marked with an asterisk are required.';
			 break 1;
		 }
	 }
	 if(empty($errors)=== true){
		 if(user_exists($_POST['username'])=== true){
			 $errors[]='Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		 }
		 if(preg_match("/\\s/", $_POST['username'])== true){
		$errors[]='Your username must not contain spaces';	 
		 }
		 
		 if(strlen($_POST['password']) < 6){
			 $errors[]='Your password must have at least 6 characters';
		 }
		 if($_POST['password'] !== $_POST['password_again']){
			 $errors[]= 'Your password do not match';
		 }
		 if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false){
			 $errors[]= 'A valid email address is required.';
		 }
		 if(email_exists($_POST['email']) === true){
			 $errors[]= 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
		 }
	 }
 }
 
 ?> 

<div id="err">
 <?php
 if(isset($_GET['success']) && empty($_GET['success'])){
	 echo 'You have been registered successfully!';
 }else{
 
 if(empty($_POST) === false && empty($errors)=== true){
	 $register_data = array(
	 'username' => $_POST['username'],
	 'password' => $_POST['password'],
	 'name' => $_POST['name'],
	 'email' => $_POST['email'],
	  );
	  register_user($register_data);
	  header('Location: register.php?success');
	exit();
 }else if(empty($errors)=== false){
	 echo output_errors($errors);
 }
 
 ?>
 </div>
 <br><center><h4>Register</h4></center>
 <form id="register" class="col s12 l6" action="" method="post">
  <div class="row">
	 <div class="input-field col s6"> 
	 
	 <input name="username" id="username" type="text" class="validate"> 
	 <label for="username">Username*</label>
	 </div> 
	 <div class="input-field col s6"> 

	 <input name="email" type="text" id="email" class="validate"> 
	 <label for="email">Email*</label>
	 </div> 
	 </div>
  <div class="row"> 
	 <div class="input-field col s12"> 

	 <input name="name" id="name" type="text" class="validate">
	<label for="name">Name*</label>
	 </div> 
	 </div> 
  <div class="row"> 
	 <div class="input-field col s12"> 

	 <input name="password" type="password" id="password" class="validate">
	 <label for="password">Password*</label>
	 </div> 
	 </div> 
 <div class="row"> 
	 <div class="input-field col s12"> 
	 
	 <input name="password_again" id="password_agn" type="password" class="validate">
	 <label for="password_agn">Password again</label>
	 </div> 
	 </div> 
  <input type="submit" value="Register" class="btn waves-effect waves-light purple lighten-1"> 
 
 </form>          
      
<?php

 }?> 
</body>
</html>

