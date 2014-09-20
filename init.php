<?php

//check for config file
if(!file_exists('config/config.php')){
  header('Location: setupConfig.php');
  die();
}

//check for database file
if(!file_exists('config/database.php')){
  header('Location: setupDatabase.php');
  die();
}

//start users session
session_start();

//require config file
require('config/config.php');

//require class files
require ''.$_SESSION['pathHead'].'classes/Auth.php';
require ''.$_SESSION['pathHead'].'classes/Flies.php';
require ''.$_SESSION['pathHead'].'classes/Materials.php';

$authObj = new Auth($db);
$fliesObj = new Flies($db);
$materialsObj = new Materials($db);

$errors = array();

//check for saddlehackle token in users cookies for auth
if(basename($_SERVER['PHP_SELF']) != 'login.php'){
  if(isset($_COOKIE['saddlehackle'])){
    //split the tokentifier into a token and identifier
    $saddlehackle = explode(':', $_COOKIE['saddlehackle']);
    $authObj->verifyCookie($saddlehackle);
  }

  if(!isset($_SESSION['user']['username'])){
    header("Location: login.php");
    die();
  }

  //check if the logged in user is an administrator
  if($_SESSION['user']['userLevel'] == 0){
    $isAdmin = true;
  }
}