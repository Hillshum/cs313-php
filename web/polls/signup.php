<?php // signup.php


require('header.php');
require 'pageHeader.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // do some validation
  
 	$ERRORS = array();
  print_r($_POST);
  $USERNAME = $_POST['username'];
  if ( $USERNAME === '') {
    $ERRORS['username'] = 'Username is required';
    // should really do a db query to check for username already in use
  }
  $PASSWORD1 = $_POST['password1'];
  if ($PASSWORD1 === '') {
    $ERRORS['password2'] = 'Password is required';
  }
  $PASSWORD2 = $_POST['password2'];
  if ($PASSWORD2 === '') {
    $ERRORS['password2'] = 'Confirm password is required';
  }

  if ($PASSWORD1 !== $PASSWORD2) {
    $ERRORS['password2'] = 'Passwords do not match';
  }
  
  if (count($ERRORS) == 0) { // on success
    
     // insert into db
    $hashedPassword = password_hash($PASSWORD, PASSWORD_BCRYPT);
    $user_statement = $db->prepare("insert into user_ (username, password) values (:username, :password)" );
    try {
      $user_statement->execute(array("username"=>$USERNAME, "password"=>$hashedPassword));
    }
    catch (Exception $ex)
    {
      // Please be aware that you don't want to output the Exception message in
      // a production environment
      echo "Error with DB. Details: $ex";
      die();
    }

    header("Location: index.php");
    $_SESSION['user_id'] = $db->lastInsertId();
    die();
  }
  
  
  
}
	
?> 

<html>
  <head>
    <title>Signup</title>
    <style type='text/css'>
      .error{
        color: red;
      }
    </style>
  </head>
  <body>
  	<form id="signup-form" action="signup.php" method=POST>
      <div class="error"><?php echo $ERRORS['username'] ?></div>
    	<input type=text name="username" placeholder=Username>
      <div class="error"><?php echo $ERRORS['password1'] ?></div>
      <input type=password name="password1" placeholder=Password>
      <div class="error"><?php echo $ERRORS['password2'] ?></div>
      <input type=password name="password2" placeholder="Confirm Password">
      <input type=submit value="Sign up">
    </form>
  </body>
</html>

