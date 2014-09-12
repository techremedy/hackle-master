<?php

//turn on error reporting
//remove this when debugging is done
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//set default timezone / This is setup for Pacific
date_default_timezone_set('America/Los_Angeles');

//set up application path variables

//include additional config files here
require_once('database.php');

//start up the session if it hasn't already been started
if(!isset($_SESSION)){
  session_start();
}

//check the session to see if user is logged in
if(empty($_SESSION['user'])){
  //if they are not, we redirect them to login.php
  header("Location: login.php");
  die("Redirecting to login.php");
}

//check if the logged in user is an administrator
if($_SESSION['user']['userLevel'] == 0){
  $isAdmin = true;
}

?>