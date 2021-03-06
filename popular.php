<head>
 
 <script src="assets/js/jquery.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>

  <!-- CSS  -->
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>
</head>
<?php
require 'connection.php';
$events=get_popular();
?>
<html>

<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo" style="color:#f50057;">eventize</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="popular.php" style="color:#ab47bc;">POPULAR</a></li>
        <li><a href="latest.php" style="color:#ab47bc;">LATEST</a></li>
        <li><a href="organize.php" style="color:#ab47bc;">ORGANIZE AN EVENT</a></li>
         <?php
  session_start();
       if(!isset($_SESSION['username'])){?>
           <li><a href="register.php" style="top:18px;" class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a  href="login.php" style="top:18px;" class="waves-effect waves-light btn pink accent-3">Login</a></li>
      </ul>
<?php } 
else {

  echo "<li><a href='profile.php'><u> ".$_SESSION['username']."</u></a> </li>  ";
    //    echo"<li> <a  style='color:#ab47bc'> Cart(". $_SESSION['itemcount'].")</li>";
    echo "<li><a href='check-cart.php' style='top:18px;' class='waves-effect waves-light btn purple lighten-1' target='_blank'>Check-cart</a></li>";
    echo "<li><a href='logout.php' style='top:18px;' class='waves-effect waves-light btn purple lighten-1' >Logout</a></li> </ul>";
        }
?>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
   <div id="index-banner" class="parallax-container" style="background:#660066;min-height:250px;">
  
      <div class="container">
        <br><br>
        <h1 class="header center white-text text">Popular Events</h1>
        <div class="row center">
          <h5 class="header col s12 light">Events that are followed by most people</h5>
        </div>   
      </div>
  </div>
  <div class="container">
  <ul class="collection">
<?php      
foreach ($events as $event) {
     $eid=$event['id'];
      $img=get_img($eid);
?>

    <li class="collection-item avatar m-page scene_element scene_element--fadeinup">
      <img src="<?php echo $img[0];?>" class="circle">
  <a href="get_event.php?id=<?php echo $event['id']; ?>">    <span class="title"><strong><?php echo $event['title'];?></strong></span></a>
      <p><?php echo $event['location']; ?> | <?php echo $event['date_posted']?>
      </p>
      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
    </li>
  

<?php   
}
?>
</ul>
</div>
</body>
</html>