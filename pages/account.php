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
<link rel="stylesheet" href="../css/accounts.css">
<link rel="stylesheet" href="../css/boards.css">
<script type="text/javascript" src="../js/openTabs.js"> </script>
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
    <button class="tablinks" onclick="openTab(event, 'Account')" id="defaultOpen" >Account</button>
    <button class="tablinks" onclick="openTab(event, 'Kitchen')" >Kitchen</button>
    <button class="tablinks" onclick="openTab(event, 'Boards')">Boards</button>
    <button class="tablinks" onclick="openTab(event, 'Shopping List')">Shopping List</button>
    <button class="tablinks" onclick="openTab(event, 'Diet')">Diet</button>


  </div>
  <div class="main">
    <div id="Account" class="tab">
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
      <div id="Kitchen" class="tab">
        <h2>Kitchen</h2>
        <h4> Add Ingredient </h4>
        <form method="post" action="../php/addIng.php">
          <label name="ingredient">Ingredient: </label>
          <input type="text" placeholder="ingredient" name="ingredient">
          <label name="quantity">Quantity: </label>
          <input type="text" placeholder="Quantity" name="quantity">
          <button type="submit">Add</button>
        </form>
        <h4> What's In My Kitchen </h4>
        <!-- List current ingredients here -->

      </div>
      <div id="Boards" class="tab">
        <h3>Boards</h3>
        <p>This is your boards.</p>
        <div class="board-row">
          <div class="board-column">
            <div class="board">
              <h3>Create Board</h3>
            </div>
          </div>
          <div class="board-column">
            <div class="board">
              <h3>Create Board</h3>
            </div>
          </div>

        </div>

      </div>
      <div id="Shopping List" class="tab">
        <h3>Shopping List</h3>
        <!-- List shopping list items here -->
      </div>
      <div id="Diet" class="tab">
        <h3>Diet</h3>
        <p>This is your diet.</p>
      </div>

  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
</div>

<script> document.getElementById("defaultOpen").click(); </script>

</body>
</html>
