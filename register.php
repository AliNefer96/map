<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	    <label>Vehicle Number</label>
  	    <input type="text" name="vehiclenumber">
  	</div>
      <div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password_1">
  	</div>
      <div class="input-group">
  		<label>Confirm Password</label>
  		<input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already have account?  <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
