<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>>Password Reset</title>
        <link rel="stylesheet" href="main.css">
        
    </head>
    <body>
        <form class="login-form" action="enter_email.php" method="post">
            <h2 class="form-title">Reset Password</h2>
            
            <?php include('messages.php'); ?>
            <div class="form-group">
                <label>Your email address</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <button type="submit" name="reset-password" class="login-btn">Submit</button>
                
            </div>
        </form>
    </body>
</html>