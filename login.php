<?php 
  
  require_once('init.php');

  // Start up the session if it hasn't already been started
  if(!isset($_SESSION)){ 
    session_start();
  }

  // Check session to see if user is logged in
  if(!empty($_SESSION['user'])) { 
    // If they are not, we redirect them to the login page. 
    header("Location: index.php"); 
    die(); 
  }

  $messages = array();
   
  // Form handler
  if(!empty($_POST)) { 
    $form = $_POST;
    $messages = $authObj->login($form);
  } 
     
?> 

<!DOCTYPE html>
<html lang="en">
  <head>

  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend>Hackle Master Login</legend>
        <?php if(array_key_exists('error', $messages)){ ?>
          <ul>
            <?php print($messages['error']); ?>
          </ul>
        <?php } ?>
        <div>
          <label>Username: </label>
          <input type="text" name="username" value="<?php if(array_key_exists('submitted_username', $messages)){print($messages['submitted_username']);} ?>" />
        </div>
        <div>
          <label>Password: </label>
          <input type="password" name="password" />
        </div>
        <div>
          <label>Remember Me: </label>
          <input type="checkbox" name="rememberMe">
        </div>
        <div>
          <label>&nbsp;</label>
          <input type="submit" value="Login" />
        </div>
    </form>
  </body>
</html>