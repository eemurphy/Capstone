<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
<title> Home </title>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header-->
<div class="header">
 <h1> ricehippy </h1>

</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="pages/search.php">Search</a>
  <a href="pages/account.php">Account</a>
  <?php
    if(!isset($_SESSION['login_user'])) { ?>
      <div class="login-container">
        <form method="post" action="php/login.php">
          <input type="text" placeholder="Username" name="username">
          <input type="password" placeholder="Password" name="password">
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
    <p> Don't have an account? </p>
    <a href = "pages/signup.php"> Sign up here! </a>

  </div>
</div>

<div class="footer">
  <h2>figure out how to lock to bottom</h2>
</div>

<!-- Scripts -->
<script type="text/javascript" src="home.js"> </script>

</body>
</html>
