<?php

//path variables setup to see what environment we are in
$path = getcwd();
$bits = explode("/", $path);

if($bits[1] == 'YOUR-DEVELOPMENT-ENVIRONMENT-ROOT-FOLDER'){
  $config = array(
    'host'      => 'your-development-environment-database-host',
    'username'  => 'your-development-environment-database-username',
    'password'  => 'your-development-environment-database-password',
    'dbname'    => 'your-development-environment-database-name'
  );
} else if($bits[1] == 'YOUR-STAGING-ENVIRONMENT-ROOT-FOLDER'){
  $config = array(
    'host'      => 'your-staging-environment-database-host',
    'username'  => 'your-staging-environment-database-username',
    'password'  => 'your-staging-environment-database-password',
    'dbname'    => 'your-staging-environment-database-name'
  );
} else {
  $config = array(
    'host'      => 'your-production-environment-database-host',
    'username'  => 'your-production-environment-database-username',
    'password'  => 'your-production-environment-database-password',
    'dbname'    => 'your-production-environment-database-name'
  );
}

//Connect to the database and create the db object
$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);

//setup the error mode of the db object...this will be changed after debugging
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>