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

<!-- Side and Main Content -->
<div class="row">
  <div class="side">
    <h1> My Kitchen </h1>
    <br>
    <h1> My Boards </h1>
    <br>
    <h1> Shopping List </h1>
    <br>
    <h1> My Diet </h1>


  </div>
  <div class="main">
    <h1> Account </h1>
    <br>
    <?php
      if(isset($_SESSION['login_user'])) {
        echo "Welcome, " . $_SESSION['login_user'] . "!";
      }else {
        echo "Welcome, Guest! Please log in to use your account.";
      }

      ?>

  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
</div>

<!-- Scripts -->
<script type="text/javascript" src="home.js"> </script>

</body>
</html>
