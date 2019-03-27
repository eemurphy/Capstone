<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
<title> Home </title>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header-->
<div class="header">
 <h1> ricehippy </h1>
 <p> A website created by Erin Murphy </p>
 <?php
  if(isset($_SESSION['login_user'])) {
    echo "Welcome: " . $_SESSION['login_user'];
  }else {
    echo "Welcome: Guest";
  }

 ?>
 <p id="demo"></p>
</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="index.html">Home</a>
  <a href="account.html">Account</a>
  <a href="search.html">Recipe Search</a>
  <a href="list.html">Shopping List</a>
  <?php
    if(!isset($_SESSION['login_user'])) { ?>
      <div class="login-container">
        <form method="post" action="login.php">
          <input type="text" placeholder="Username" name="username">
          <input type="text" placeholder="Password" name="password">
          <button type="submit">Login</button>
        </form>
      </div>
  <?php
    }else { ?>
      <div class="login-container">
        <form method="post" action="logout.php">
          <button type="submit">Logout</button>
        </form>
      </div>
  <?php
    }

 ?>


</div>

<!-- Side and Main Content -->
<div class="row">
  <div class="side">
    <h1> About </h1>
    <p> Rice Hippy is a website where people trying to follow a diet,
      or even those who just want to eat healthier, can manage their
      recipes and find new ones in a community that values the same
      things as themselves.
    </p>
  </div>
  <div class="main">
    <h1> Main Section </h1>
    <p> This is where recipes will be. </p>
  </div>
</div>

<div class="footer">
  <h2>figure out how to lock to bottom</h2>
</div>

<!-- Scripts -->
<script type="text/javascript" src="home.js"> </script>

</body>
</html>
