<?php 
require 'connection.php';
session_start();
$eid=$_GET['id'];
$event = get_event($eid); 
$img=get_img($eid);
 $mem=members($eid);
if(isset($_SESSION['username'])){
  $user=$_SESSION['username'];
} else{
  $user=NULL;
}
$comments=get_comments($eid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Eventize</title>
  <link rel="stylesheet" type="text/css" href="assets/css/keyframes.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/pageTransitions.css">
  <script src="assets/js/jquery.smoothState.js"></script>
  <script src="asset/js/functions.js"></script>
<script src="assets/js/jquery.js"></script>
  <script src="assets/js/materialize.js"></script>
  <script src="assets/js/init.js"></script>
  <style type="text/css">
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
<?php
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
<?php
foreach($event as $eve){
  $admin= $eve['admin'];
?>

   <div class="row" style="width:80%;">
      <div class="col s12 pink lighten-2"><br><center><h2 style="color:white;"><?php echo $eve['title']; ?></h2></center><br></div>
      <br>
  <?php $f=is_following($eid,$user);   ?>
    <div class="col s12" style="padding-left:0;padding-right:0;">
      <ul class="tabs">
        <li class="tab col s3 purple lighten-1"><a  href="#test1" style="color:white;">About</a></li>
        <li class="tab col s3 purple lighten-1"><a href="#test2" style="color:white;">Members</a></li>
        <li class="tab col s3 purple lighten-1"><a href="#test3" style="color:white;">Discussion</a></li>
        
        <?php
        if($user===$admin):
          ?>
        <li class="tab col s3 purple lighten-1"><a href="#test4" style="color:white;">Settings</a></li>
          <?php
        endif;
        ?>
        
      </ul>
    </div>
    <div id="test1" class="col s12">

 <div class="row">

      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
      <div class="card purple lighten-5">
        <div class="card-image">
              <img src="<?php echo $img[0]; ?>">
              <span class="card-title"><?php echo $eve['title']; ?></span>
            </div>
            <div class="card-content black-text">
              <span class="card-title" style="color:black;"><?php echo $eve['location']; ?> | <?php echo $eve['city']; ?></span>
              <p><?php echo $eve['contact']; ?></p>

              <p>We're all about: <?php echo $eve['category']; ?></p>
            </div>
<center><a class="waves-effect waves-light btn-large purple lighten-1" href="follow.php?event=<?php echo $eve['id']; ?>"
><i class="material-icons left"></i><?php echo $f; ?></a></center>
  <p>
  <center><h5>JOIN THE EVENT<br><br><i class="material-icons"></i></h5>
  <a href="join.php?event=<?php echo $eve['id']; ?>"
   class="btn-floating btn-large waves-effect waves-light pink accent-3" 
  ><i class="material-icons" title="Join the Event">add</i></a></center>

  </p><br>
          </div>

      </div>

      <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added 
    --><br>
   <h5><?php echo $eve['date_posted']; ?> | Starts at <?php echo $eve['start'] ?></h5>
    <?php echo $eve['description'] ?>

    <form name="sub"  method="POST">
              <input type="hidden" name="buy" value="'.$eid.'" /> </br></br></br></br></br>
                <button class="btn waves-effect waves-light pink accent-3" type="submit" name="action">Buy ticket BDT.<?php echo $eve['ticket'];?>
        <i class="mdi-content-send right"></i>
      </button >
              </form>

      </div>
</div>
    </div>
    <div id="test2" class="col s12">
       <ul class="collection">
      <?php  
        foreach ($mem as $members) {
          ?>
      <li class="collection-item">
        <a href="#">    <span class="title"><?php echo $members['member']; ?></span></a>
      </li>
      
          <?php
        }
      ?>
      </ul>
    </div>
    <div id="test3" class="col s12">
      <br>

  <ul class="collection">
  <?php foreach ($comments as $comment) {
    ?>

    <li class="collection-item avatar">
      <img src="assets/images/avatar.png" alt="" class="circle">
      <span class="title"><b><?php echo $comment['username'] ?></b></span>
      <p><?php echo $comment['comment'] ?>
      </p>
      <a href="#!" class="secondary-content"><?php echo $comment['date_posted'] ?></a>
    </li>
       <?php
  }?>
    </ul><br>
<?php if(isset($_SESSION['username'])): ?>
    <div class="row">
    <form class="col s12" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="comment"></textarea>
          <label for="textarea1">Write Comment</label>
        </div>
         <input type="submit" class="btn waves-effect waves-light pink accent-3" value="Post!">
      </div>
    </form>
  </div>
<?php endif;?>




    </div>
    
    <?php  if($user===$admin): ?>
    <div id="test4" class="col s12">
  <br><br>
    <form action="" method="POST" enctype="multipart/form-data">
       <div class="file-field input-field">
      <input class="file-path validate" type="text"/>
      <div class="btn waves-effect waves-light pink accent-3">
        <span>Pic</span>
        <br><input type="file" name="coverphoto"/>
      </div>
    </div>
    <!-- <input type="file" name="coverphoto" /> -->
    <input type="submit" name="uploadpic" class="btn waves-effect waves-light purple lighten-1" value="Upload Image">
    </form>

    </div>
  <?php endif;?>
      </div>

<?php } ?>
  </body>
</html>
<?php

if(isset($_POST['comment']) && isset($user)){
  if(!empty($_POST['comment'])){
    $comm=$_POST['comment'];
     $eid=(int)$eid;
 $que="INSERT INTO `comments` VALUES ('',{$eid},'{$user}','{$comm}',NOW())";
 if($que= mysql_query($que)){
 header("refresh: 1;");
 } 
  }
}
if (isset($_POST['uploadpic'])) {
        if (((@$_FILES["coverphoto"]["type"]=="image/jpeg") || (@$_FILES["coverphoto"]["type"]=="image/png") || (@$_FILES["coverphoto"]["type"]=="image/gif"))&&(@$_FILES["coverphoto"]["size"] < 1048576)) //1 Megabyte
  {
  // $rand_dir_name = substr(str_shuffle($chars), 0, 15);
  

   if (file_exists("assets/uploaded/".@$_FILES["coverphoto"]["name"]))
   {
    echo @$_FILES["coverphoto"]["name"]." Already exists";
   }
   else
   {
    move_uploaded_file(@$_FILES["coverphoto"]["tmp_name"],"assets/uploaded/".$_FILES["coverphoto"]["name"]);
    //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
    $profile_pic_name = @$_FILES["coverphoto"]["name"];
    $img_id_before_md5 = "$profile_pic_name";
    $img_id = md5($img_id_before_md5);
    $profile_pic_query = mysql_query("INSERT INTO photos VALUES ('','$user',$eid,'assets/uploaded/$profile_pic_name','$img_id')");
    header('Location:index.php');

   }
  }
}
?>
 <?php
            if(isset($_POST['action'])){
              if(isset($_SESSION['username'])){
                $_SESSION["itemcount"]++;
                $_SESSION["itemlist"] .= $eid.",";
                
                
                echo "<script language='javascript'>
                alert('The ticket to this event has been added to your cart');
                window.location='';
                </script>";}

                else{
                echo "<script language='javascript'>
                alert('Please login to enable ticket option');
                window.location = 'login.php';
                </script>";
              
            }
              }
            ?>
