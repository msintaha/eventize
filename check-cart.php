
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
        <h3 class="header center pink-text text-accent-3">Purchased Tickets</h3>
        <div class="row center">
<?php
require 'connection.php';

            if(isset($_SESSION['username'])){
            if($_SESSION["itemcount"]>0){
                echo '<p style= "font-size:20px; color:red";> You have selected '. $_SESSION["itemcount"]. ' tickets.</p>';
                echo '<p style="font-size:20px; color: #3C1A1A">The following are the selected tickets with their prices.</p>';
                $total=0;
                $a = array();
                $a = explode(",",$_SESSION["itemlist"]);
                for($i = 0;$i<$_SESSION["itemcount"];$i++){
                  $sql = "SELECT * FROM event WHERE id = '". $a[$i]. "'";
                  $result = mysql_query($sql);
                  while($post = mysql_fetch_array($result)){ 
                    $pid=$post['id'];
                  $total=$total+$post['ticket'];
                     $img=get_img($pid);
                  ?>
                    

  <li id="cards">  <div class="card small">
  <div class="card-image">
              <img src="<?php echo $img[0];?>">
              <span class="card-title"></span>
            </div>
            <div class="card-content">
            <h5><a href="get_event.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'];?></a></h5>
              <p>Price: <?php echo $post['ticket']; ?>></p>
     </div>
  </div></li>
  </ul>
                      <br> <?php
                      } 
                  }?>
                   <footer class="page-footer pink accent-3" style="z-index:0;">
          <div class="container">
            <div class="row">
         
                
           
                <p class="grey-text text-lighten-4">  
<br>Your total bill is Taka. <?php echo $total?></p><p style= "font-size:20px";>We will deliver your requested tickets within 24 hours to your house.</br>Thank you for shopping with us.</p><br/><br/>
              
              
            </div>

          </div>
          <div class="footer-copyright">
            <div class="container">
            </div>
          </div>
      </footer>         
       <?php
   }else{
    echo '<p style=" font-weight:200;font-size:20px; color: #3C1A1A">You have selected 0 tickets.</p>';
      }
  }
    ?>   
        </div>
       
        <br><br>

      </div>
    </div>
   


  <div class="container" id="cont">
    <div class="section m-page scene_element scene_element--fadeinup">
     <br>
 
<script type="text/javascript">
 $(document).ready(function() {
     $('select').material_select(); 
   }); 
</script>
 
  
  
      </div>
  <ul class="collection">



 
  <?php

  
         ?>
  </ul>
 

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
