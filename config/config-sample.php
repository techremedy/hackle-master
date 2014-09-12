<?php

//turn on error reporting
//remove this when debugging is done
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//set default timezone / This is setup for Pacific
date_default_timezone_set('America/Los_Angeles');

//path variables setup to see what environment we are in
$path = getcwd();
$bits = explode("/", $path);

if($bits[1] == 'YOUR-DEVELOPMENT-ENVIRONMENT-ROOT-FOLDER'){
  $pathHeadSet = 'FULL-PATH-TO-HACKLE-MASTER-ON-YOUR-DEVELOPMENT-ENVIRONMENT';
  $developmentSet = TRUE;
  $environmentSet = 'NAME-THIS-ENVIRONMENT';
} else if($bits[1] == 'YOUR-STAGING-ENVIRONMENT-ROOT-FOLDER'){
  $pathHeadSet = 'FULL-PATH-TO-HACKLE-MASTER-ON-YOUR-STAGING-ENVIRONMENT';
  $developmentSet = TRUE;
  $environmentSet = 'NAME-THIS-ENVIRONMENT';
} else {
  $pathHeadSet = 'FULL-PATH-TO-HACKLE-MASTER-ON-YOUR-PRODUCTION-ENVIRONMENT';
  $developmentSet = FALSE;
  $environmentSet = 'NAME-THIS-ENVIRONMENT';
}

//save path data to session
$_SESSION['pathHead'] = $pathHead;
$_SESSION['development'] = $development;
$_SESSION['environment'] = $environment;

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