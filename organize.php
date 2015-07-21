
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
   <script src="assets/js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>
  <!-- CSS  -->
  <style type="text/css">
  body{ 
    background-image:url("assets/images/background2.jpg");
    background-size: cover;
 }
 form{
  opacity: 0.6;
 }
  </style>
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="m-scene" id="main">
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo" style="color:#f50057;">eventize</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="popular.php" style="color:#ab47bc;">POPULAR</a></li>
        <li><a href="latest.php" style="color:#ab47bc;">LATEST</a></li>
        <li><a href="organize.php" style="color:#ab47bc;">ORGANIZE AN EVENT</a></li>
        <li><a class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a class="waves-effect waves-light btn pink accent-3">Login</a></li>
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
  </nav>

  <div id="index-banner" class="parallax-container" style="background:#f50057;min-height:250px;">
  
      <div class="container">
        <br><br>
        <h1 class="header center white-text text">Eventize</h1>
        <div class="row center">
          <h5 class="header col s12 light">A place to organize and search for events</h5>
        </div>   
      </div>
  </div>


  <div class="container" id="cont">
    <div class="section">
    <h4 class="header center white-text text">Organize an Event</h4>
   <form class="col s12 m-page scene_element scene_element--fadeinup" id="reg" method="POST">
   <div class="row">
        <div class="input-field col s6">
          <input placeholder="Name of the Event" id="first_name" name="title" type="text" class="validate">
          <label for="first_name">Name of the Event</label>
        </div>
        <div class="input-field col s6">
          <input type="date" class="datepicker" name="date">
        </div>
      </div>

    <div class="row">
            <div class="input-field col s6">
    <select class="browser-default" name="category">
    <option value="" disabled selected>Select Type of Event</option>
      <option value="Arts & Culture">Arts & Culture</option>
      <option value="Education & Learning">Education & Learning</option>
      <option value="Career & Business">Career & Business</option>
       <option value="Fashion & Beauty">Fashion & Beauty</option>
        <option value="Technology & IT">Technology & IT</option>
       <option value="Food & Drink">Food & Drink</option>
       <option value="Outdoors & Adventure">Outdoors & Adventure</option>
        <option value="Comicon">Comicon</option>
         <option value="Sports & Games">Sports & Games</option>
      <option value="Concerts & Music">Concerts & Music</option>
      <option value="Conferences & Seminar">Conferences & Seminar</option> 
    </select>
      </div>
          <div class="input-field col s6">
    <select class="browser-default" name="location">
      <option value="" disabled selected>Select location</option>
      <option value="Gulshan">Gulshan</option>
      <option value="Banani">Banani</option>
      <option value="Bashundhara">Bashundhara</option>
      <option value="Dhanmondi">Dhanmondi</option>
      <option value="Old town Dhaka">Old town Dhaka</option>
      <option value="Lalmatia">Lalmatia</option>
      <option value="Motijheel">Motijheel</option>
      <option value="Mirpur">Mirpur</option>
      <option value="Kalabagan">Kalabagan</option>
      <option value="Science Laboratory">Science Laboratory</option>
      <option value="Baily Road">Baily Road</option>
      <option value="Mohakhali">Mohakhali</option>
      <option value="Baridhara">Baridhara</option>
    </select>
      </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
           Start Time: <input type="time" name="start">
         </div>
          <div class="input-field col s6">
           End Time: <input type="time" name="end">
         </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <i class="mdi-editor-mode-edit prefix"></i>
          <textarea id="textarea1" class="materialize-textarea" name="desc"></textarea>
          <label for="textarea1">Description of the Event</label>
        </div>
      </div>

     <div class="row">
          <div class="input-field col s6">
          <input placeholder="Organizer" id="first_name" type="text" name="organizer" class="validate">
          <label for="first_name">Organizer</label>
        </div>
        <div class="input-field col s6">
        <input placeholder="Leave blank if none" id="first_name" type="text" name="city" class="validate">
          <label for="first_name">City</label>
      </div>
     </div>
    
        <div class="row">
          <div class="input-field col s6">
          <input placeholder="Ticket Price" id="first_name" type="text" class="validate" name="ticket">
          <label for="first_name">Ticket Price or Registration form link</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Mobile and Address both" id="first_name" type="text" class="validate" name="contact">
          <label for="first_name">Contact Information</label>
        </div>
     </div>

     <input type="submit" class="btn waves-effect waves-light purple lighten-1" >
   </form>
   <?php
require 'connection.php';
if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['category']) && isset($_POST['location']) && isset($_POST['desc']) && isset($_POST['ticket']) && isset($_POST['contact']) && isset($_POST['sponsors']) && isset($_POST['organizer'])){
  if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['desc']) && !empty($_POST['category'])){
      $name= $_POST['title'];
      $date = $_POST['date'];
      $desc = $_POST['desc'];
      $start=$_POST['start'];
      $end=$_POST['end'];
      $category = $_POST['category'];
      $location = $_POST['location'];
      $contact = $_POST['contact'];
      $ticket=$_POST['ticket'];
      $organizer=$_POST['organizer'];
      $city=$_POST['city'];
      
        $insert="INSERT INTO event values ('','{$name}','{$desc}','{$organizer}','{$location}','{$date}','{$category}','{$city}','{$contact}');";
     
        if($query=mysql_query($insert)){
          echo '<br><h5 class="header center white-text text">Event Registration Complete!</h5>';
        }
        else{
          echo '<br><h5 class="header center white-text text">Sorry, there was an error. Please try again.</h5>';
        }
      
    }
  }
  
?>
 </div>

<br>

</div>
  <!--  Scripts-->
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>

  </body>
</html>
