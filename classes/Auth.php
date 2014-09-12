<?php

class Auth {
  private $db;

  public function __construct($database){
    $this->db = $database;
  }

  //Function to verify cookie
  public function verifyCookie($cookie){
    //check cookie against the db
    $query = "SELECT id, username, firstname, lastName, token, defaultLocation, userLevel FROM users WHERE identifier = :identifier";
    $query_params = array(
      ':identifier' => $cookie[0]
    );

    try{
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
      die('Failed to run query!');
    }

    while($row = $stmt->fetch()){
      if($row['token'] == $cookie[1]){
        //store the user data in the session
        $_SESSION['user'] = $row;

        return true;
      }else{
        return false;
      }
    }
  }

  //Function to login from the form on the login page
  public function login($form){
    $messages['error'] = '';
    $messages['submitted_username'] = '';

    if(isset($form['rememberMe'])){
      $rememberMe = $form['rememberMe'];
    }else{
      $rememberMe = '';
    }

    //Get user info
    $query = "
      SELECT
        id,
        username,
        password,
        salt,
        token,
        firstName,
        lastName,
        userLevel
      FROM
        users
      WHERE 
        username = :username
      AND 
        active = 1
    ";

    $query_params = array(
      ':username' => $form['username']
    );

    try{
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);
    }catch(PDOException $ex){
      die('Failed to run query!');
    }

    //initialize login_ok switch as false
    $login_ok = false;

    $row = $stmt->fetch();

    if($row){
      //add salt from db to submitted password and then hash to compare
      $check_password = hash('sha256', $form['password'] . $row['salt']);
      if($check_password === $row['password']){
        //if the password hashes match, switch login_ok to true
        $login_ok = true;
      }
    }

    //if the user logged in successfully redirect to index
    if($login_ok){
      //check if the remember me box is checked
      if($rememberMe){
        //create an identifier for the user by sha1'ing their username
        $identifier = sha1($row['username']);

        //create a token for the user
        $token = sha1(uniqid(mt_rand(), true));

        //create tokentifier...se what I did there? :)
        $tokentifier = $identifier.':'.$token;

        //update users record with the token
        $query = "UPDATE users SET identifier = :identifier, token = :token WHERE id = :uid";
        $query_params = array(
          ':identifier' => $identifier,
          ':token' => $token,
          ':uid' => $row['id']
        );

        try{
          $stmt = $this->db->prepare($query);
          $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
          die('Failed to run query!');
        }
        setcookie('saddlehackle', '$tokentifier', time() + 60 * 60 * 24 * 120);
      }

      //just to be safe, remove salt and password from the $row array
      unset($row['salt']);
      unset($row['password']);

      //store the users data in the session
      $_SESSION['user'] = $row;

      //redirect to index
      header("Location: index.php");
      die();
    }else{
      //tell the user the failed
      $messages['error'] .= '<li>Username and/or Password Incorrect!</li>';

      //store submitted username as a local variable using htmlentities for security
      $messages['submitted_username'] = htmlentities($form['username'], ENT_QUOTES, 'UTF-8');
    }
    return $messages;
  }
}