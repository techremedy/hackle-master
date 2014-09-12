<?php

session_start();
unset($_SESSION['user']);
session_destroy();

if(isset($_COOKIE['saddlehackle'])){
  setcookie('saddlehackle',false, time() - 3600);
}

header("Location: login.php");
die();

?>