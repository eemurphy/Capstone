<!DOCTYPE html>
<?php
session_start();
?>


<html lang="en">
<head>
<title> Home </title>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- Header-->
<div class="header">
 <h1> ricehippy </h1>
</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="../index.php">Home</a>
  <a href="search.php">Search</a>
  <a href="account.php">Account</a>
  <?php
    if(!isset($_SESSION['login_user'])) { ?>
      <div class="login-container">
        <form method="post" action="../php/login.php">
          <input type="text" placeholder="Username" name="username">
          <input type="password" placeholder="Password" name="password">
          <button type="submit">Login</button>
        </form>
      </div>
  <?php
    }else { ?>
      <div class="login-container">
        <form method="post" action="../php/logout.php">
          <button type="submit">Logout</button>
        </form>
      </div>
  <?php
    }

 ?>


</div>




<div class="row">
  <div class="main">

    <form method = "post" action="../php/new_user.php">
      <h2>Sign Up</h2>
      <p>Please fill in this form to create an account.</p>
      <br>
      <label name="username"><b>Username</b></label>
      <input type="text" placeholder="Username" name="username" >
      <br>
      <label name="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" >
      <br>
      <label name="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" >
      <br><br>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
</div>

</body>
</html>
