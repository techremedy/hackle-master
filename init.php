<?php

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

  if(!isset($_SESSION['user'])){
    header("Location: login.php");
    die();
  }
}