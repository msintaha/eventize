<?php
session_start();
//error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

if(logged_in()=== true){
$session_user_id= $_SESSION['user_id'];	
$user_data= user_data($_SESSION['user_id'], 'user_id', 'username', 'password', 'name', 'email');
if(user_exists($user_data['username'])===false){
	session_destroy();
	header('Location: myindex.php');
	exit();
	
}
}
$errors = array();
?>