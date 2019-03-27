<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Home </title>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header-->
<div class="header">
 <h1> ricehippy </h1>

</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="search.php">Search</a>
  <a href="account.php">Account</a>
  <?php
    if(!isset($_SESSION['login_user'])) { ?>
      <div class="login-container">
        <form method="post" action="login.php">
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
    <form action = "search.php">
    <h3> Ingredients </h3>
    <input type="text" placeholder="Search" name="search"><br>

    <h3> Diets </h3>
    <input type="text" placeholder="Search" name="search"><br>
    <input type="checkbox"> Use My Diet <br>
    <input type="checkbox"> Low Carb <br>
    <input type="checkbox"> Vegetarian <br>
    <input type="checkbox"> Vegan <br>
    <h3> Other </h3>
    <input type="checkbox"> Use My Kitchen <br>
    <input type="checkbox"> Breakfast <br>
    <input type="checkbox"> Lunch <br>
    <input type="checkbox"> Dinner <br>
    <input type="checkbox"> Snacks/Appetizers <br>
    <input type="checkbox"> Drinks <br>
    <input type="checkbox"> Desserts <br>
    <br>
    <input type="submit" value="Apply Filters">
  </form>

  </div>
  <div class="main">
    <?php
      if(isset($_SESSION['login_user'])) {
        echo "Welcome, " . $_SESSION['login_user'] . "!";
      }else {
        echo "Welcome, Guest! Please log in to use your account.";
      }

    ?>
    <hr>

    <form action="search.php">
      <input type="text" placeholder="Search" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>


  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
</div>

<!-- Scripts -->
<script type="text/javascript" src="home.js"> </script>

</body>
</html>
