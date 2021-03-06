
<!DOCTYPE html>
<html lang="en">
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
<body class="m-scene" id="main">
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
           <li><a href="register.php" class="waves-effect waves-light btn purple lighten-1">Register</a></li>
      <li><a  href="login.php" class="waves-effect waves-light btn pink accent-3">Login</a></li>
      </ul>
<?php } 
else {

  echo "<li><a href='profile.php'><u> ".$_SESSION['username']."</u></a> </li>  ";
    //    echo"<li> <a  style='color:#ab47bc'> Cart(". $_SESSION['itemcount'].")</li>";
    echo "<li><a href='check-cart.php' class='waves-effect waves-light btn purple lighten-1' target='_blank'>Check-cart</a></li>";
    echo "<li><a href='logout.php' class='waves-effect waves-light btn purple lighten-1' >Logout</a></li> </ul>";
        }
    

?>

     
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center pink-text text-accent-3">Eventize</h1>
        <div class="row center">
          <h5 class="header col s12 light">A place to organize and search for events</h5>
        </div>
        <div class="row center">
          <a href="#cont" id="download-button" class="btn-large waves-effect waves-light purple lighten-1">Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="assets/images/background1.jpg" alt="Unsplashed background img 2"></div>
  </div>


  <div class="container" id="cont">
    <div class="section m-page scene_element scene_element--fadeinup">
     <br>
 
<script type="text/javascript">
 $(document).ready(function() {
     $('select').material_select(); 
   }); 
</script>
 
   <form class="col s12" method="POST" >
    <div class="row">
          <div class="input-field col s4" style="z-index:9999;">
       <select name="category" style="z-index:9999;">
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
         <div class="input-field col s4" style="z-index:9999;">
    <select name="location">
      <option value="" disabled selected>Select Location</option>
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

           <div class="input-field col s4">
              <input type="date" class="datepicker" name="date">
          </div>
      </div>
       <input type="submit" value="Search!" class="btn waves-effect waves-light purple lighten-1">
   </form>
     <form class="col s12" method="GET" >
      <div class="row">
        <div class="input-field col s6">
          <i class="mdi-editor-mode-edit prefix"></i>
          <input type="text" id="icon_prefix2" name="element" class="materialize-textarea"></textarea>
          <label for="icon_prefix2">Search by name</label>
        </div>
      </div>
    </form>
  
      </div>
  <ul class="collection">

<?php
require 'connection.php';
if(isset($_POST['category']) && isset($_POST['location']) || isset($_POST['date'])){
   if(!empty($_POST['category']) && !empty($_POST['location'])){
    $cat=$_POST['category'];
    $loc=$_POST['location'];
    $date=$_POST['date'];
    if(!empty($date)){
    $events = get_events_bydate($cat,$loc,$date);
    }else{
    $events = get_events($cat,$loc); 
    }
     if(!empty($events)){
    foreach($events as $event){ 
      $eid=$event['id'];
      $img=get_img($eid);
?>
    <li class="collection-item avatar m-page scene_element scene_element--fadeinup">
      <img src="<?php echo $img[0];?>" class="circle">
  <a href="get_event.php?id=<?php echo $event['id']; ?>">    <span class="title"><?php echo $event['title'];?></span></a>
      <p><?php echo $event['location']; ?>
      </p>
      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
    </li>

  <?php
 }
}  else{//empty if statement
  $text="There are no events matching this search";
    }
  }
}
 ?>

  <?php
 if(isset($_GET["element"])){
    $r=true;
      $sql = "SELECT * FROM event";
      $result = mysql_query($sql);
      $i = 0;
      $name = array();
      while($row = mysql_fetch_array($result)){
          $name[$i] = $row['title'];
          $i++;
      }
      $size = count($name);
      $j = 0;
      while($j<$size){
        $pos = stripos($name[$j], $_GET['element']);
            if ($pos !== false) {
            $r=false;
                $sql1 = "SELECT * FROM event WHERE title= '".$name[$j] ."'";
            $result1 = mysql_query($sql1);
            while($event = mysql_fetch_array($result1)){
              $eid=$event['id'];
      $img=get_img($eid);
?>
    <li class="collection-item avatar m-page scene_element scene_element--fadeinup">
      <img src="<?php echo $img[0];?>" class="circle">
  <a href="get_event.php?id=<?php echo $event['id']; ?>">    <span class="title"><?php echo $event['title'];?></span></a>
      <p><?php echo $event['location']; ?>
      </p>
      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
    </li>
<?php
         }     
        }
        $j++;
      }
      if($r)
  {echo "<script language='javascript'>
                alert('The event you are looking for is currently not available.');
          
                </script>";}
  }
  
         ?>
  </ul>
  <footer class="page-footer pink accent-3" style="z-index:0;">
          <div class="container">
            <div class="row">
         
                <h5 class="white-text m-page scene_element scene_element--fadeinright"> <?php if(isset($text)){echo $text;} ?></h5>
           
                <p class="grey-text text-lighten-4">  Start something new
<br>We'll guide you through a quick process to kick things off.</p>
              
              <br><a href="organize.php" id="download-button" class="btn-large waves-effect waves-light purple lighten-1" style="z-index:0;">Organize an Event!</a>
            </div>

          </div>
          <div class="footer-copyright">
            <div class="container">
            </div>
          </div>
      </footer>

<br><br>

</div>
  <!--  Scripts-->

  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>

  </body>
  <style type="text/css">
  form{
      background-color: beige;
  padding: 15px;
  border: 2px solid beige;
  border-radius: 10px;
  }
  </style>
</html>
