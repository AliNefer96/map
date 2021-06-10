<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', '', '', '');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input form values 
  $vehiclenumber = mysqli_real_escape_string($db, $_POST['vehiclenumber']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly
  
  if (empty($vehiclenumber)) { array_push($errors, "Vehicle number is require");}
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (vehiclenumber, email, password)
  			  VALUES('$vehiclenumber', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


if(isset($_GET['token'])) {
$_SESSION['token']=mysqli_real_escape_string($db,$_GET['token']);
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}
//Reset password
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT email FROM users WHERE email='$email'";
    $results= mysqli_query($db, $query);
    
    if (empty($email)) {
        array_push($errors, "Your email is required");
    } else if(mysqli_num_rows($results) <=0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }
    $token = bin2hex(random_bytes(50));
    if (count($errors) == 0) {
        $sql = "INSERT INTO password_reset(email, token) VALUES ('$email','$token')";
        $results = mysqli_query($db, $sql);
        
        $to = $email;
        $subject = "Reset your password on bhxpress.com";
        $msg = "Hi there, click on this to reset your password on our site <a href=\"https://www.bhxpress.com/driverportal/new_password.php?token=" . $token . "\">link </a> ";
        $msg = wordwrap($msg,70);
        $headers = "From: info@bhxpress.com";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
    }
}

//Enter new password

if(isset($_POST['new-password'])) {
   
    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
    
    $token = $_GET['token'];
    
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    
    if (count($errors) == 0) {
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        
        $results = mysqli_query($db, $sql);
        
        $email = mysqli_fetch_assoc($results)['email'];
       
        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: index.php');
        }
    }
}

?>
