<?php
session_start();
$errors=[];
$email= "";

$db = mysqli_connect('localhost', 'oldenlil_golden', '7hDGJ7K', 'odlenlil_db');

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
        $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link </a> to reset your password on our site";
        $msg = wordwrap($msg, 70);
        $headers = "From: info@bhxpress.com";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
    }
}

//Enter a new password

if(isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
    
    $token = $_SESSION['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_fetch_assoc($results)['email'];
        
        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: index.php');
        }
    }
}
?>