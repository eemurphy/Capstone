<!DOCTYPE html>
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
 <?php echo '<p>Hello World</p>'; ?>
 <p id="demo"></p>
</div>

<!-- Navigation Bar -->
<div class="navbar">
  <a href="index.html">Home</a>
  <a href="account.html">Account</a>
  <a href="search.html">Recipe Search</a>
  <a href="list.html">Shopping List</a>
  <!-- Login -->
  <!-- Button to open the modal login form -->
  <button class="login" onclick="document.getElementById('id01').style.display='block'" style="width:auto; float: right;">Login</button>
  <!-- The Modal -->
  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>
    <!-- Modal Content -->
    <form class="modal-content animate" action="login.php">

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
      <div class="container" style="background-color: #E8FFE8">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw"><a href="#">Forgot password?</a></span>
      </div>
    </form>
  </div>
  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
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
