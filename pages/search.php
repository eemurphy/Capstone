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
<link rel="stylesheet" href="../css/search.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../js/createRecipeCards.js"> </script>
<script src="https://developer.edamam.com/attribution/badge.js"></script>
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
    <div class = "filters">
    <button class = 'collapse'> Ingredients</button>
    <div class = 'ingrs'>
    <input type="text" placeholder="Search" name="ingsearch"><br>
    <h3> Maximum Number of Ingredients </h3>
    <div class="IngNum-slider">
      <input class="maxIngRange" id="maxIngRange" name = "ingr" type="range" min="3" value="25" max="25" step="1">
      <span class="maxIngAns"></span>
    </div>
    <script type="text/javascript">
      var range = $('.maxIngRange'),
          value = $('.maxIngAns');

      value.html(range.attr('value'));

      range.on('input', function(){
        value.html(this.value);
      });
    </script>
    </div>
    <button class = 'collapse'>Calories</button>
    <div class="IngNum-slider">
      <h6> Minimum </h6>
      <input class="minCal" id="minCal" type="range" min="0" value="0" max="2000" step="1">
      <span class="minCalAns"></span>
      <h6> Maximum </h6>
      <input class="maxCal" id="maxCal" type="range" min="0" value="2000" max="2000" step="1">
      <span class="maxCalAns"></span>
    </div>
    <script type="text/javascript">
      var range3 = $('.minCal'),
          value3 = $('.minCalAns');

      value3.html(range3.attr('value'));

      range3.on('input', function(){
        value3.html(this.value);
      });

      var range2 = $('.maxCal'),
          value2 = $('.maxCalAns');

      value2.html(range2.attr('value'));

      range2.on('input', function(){
        value2.html(this.value);
      });
    </script>

    <button class = 'collapse'>Time</button>
    <div class="IngNum-slider">
      <h6> Minimum </h6>
      <input class="minTime" id="minTime" type="range" min="0" value="0" max="500" step="1">
      <span class="minTimeAns"></span>
      <h6> Maximum </h6>
      <input class="maxTime" id="maxTime" type="range" min="3" value="500" max="500" step="1">
      <span class="maxTimeAns"></span>
    </div>
    <script type="text/javascript">
      var min = $('.minTime'),
          minval = $('.minTimeAns');

      minval.html(min.attr('value'));

      min.on('input', function(){
        minval.html(this.value);
      });

      var max = $('.maxTime'),
          maxval = $('.maxTimeAns');

      maxval.html(max.attr('value'));

      max.on('input', function(){
        maxval.html(this.value);
      });
    </script>

    <div class='checks' id='checks'>
    <button class = 'collapse'>Diet</button>
    <div class = 'diets'>
    <input type="checkbox" name = "health" value="paleo"> Paleo <br>
    <input type="checkbox" name = "health" value="vegan"> Vegan <br>
    <input type="checkbox" name = "health" value="vegetarian"> Vegetarian <br>
    <input type="checkbox" name = "health" value="gluten-free"> Gluten-free <br>
    <input type="checkbox" name = "health" value="kosher"> Kosher <br>
    <input type="checkbox" name = "health" value="alcohol-free"> Alcohol-free <br>
    <input type="checkbox" name = "health" value="dairy-free"> Dairy-free <br>
    <input type="checkbox" name = "health" value="fish-free"> Fish-free <br>
    <input type="checkbox" name = "health" value="shellfish-free"> Shellfish-free <br>
    <input type="checkbox" name = "health" value="low-sugar"> Sugar-free <br>
    <input type="checkbox" name = "health" value="peanut-free"> Peanut-free <br>
    <input type="checkbox" name = "health" value="pescatarian"> Pescatarian <br>
    <input type="checkbox" name = "health" value="pork-free"> Pork-free <br>
    <input type="checkbox" name = "health" value="red-meat-free"> Red meat-free <br>
    <input type="checkbox" name = "health" value="soy-free"> Soy-free <br>
    <input type="checkbox" name = "health" value="sugar-conscious"> Less than 4g sugar <br>
    <input type="checkbox" name = "health" value="wheat-free"> Wheat-free <br>
    <input type="checkbox" name = "health" value="celery-free"> Celery-free <br>
    <input type="checkbox" name = "health" value="crustacean-free"> Crustacean-free <br>
    <input type="checkbox" name = "health" value="kidney-friendly"> Kidney friendly <br>
    <input type="checkbox" name = "health" value="egg-free"> Egg-free <br>
    <input type="checkbox" name = "health" value="low-potassium"> Low-potassium <br>
    <input type="checkbox" name = "health" value="lupine-free"> Lupine-free <br>
    <input type="checkbox" name = "health" value="mustard-free"> Mustard-free <br>
    <input type="checkbox" name = "health" value="No-oil-added"> No oil added <br>
    <input type="checkbox" name = "health" value="sesame-free"> Sesame-free <br>
    <input type="checkbox" name = "health" value="tree-nut-free"> Tree nut-free <br>
    </div>
    <button class = 'collapse'>Cuisine</button>
    <div class = 'cuisines'>
    <input type="checkbox" name = "cuisineType" value="mexican"> Mexican <br>
    <input type="checkbox" name = "cuisineType" value="italian"> Italian <br>
    <input type="checkbox" name = "cuisineType" value="indian"> Indian <br>
    <input type="checkbox" name = "cuisineType" value="thai"> Thai <br>
    <input type="checkbox" name = "cuisineType" value="greek"> Greek <br>
    <input type="checkbox" name = "cuisineType" value="chinese"> Chinese <br>
    <input type="checkbox" name = "cuisineType" value="japanses"> Japanese <br>
    <input type="checkbox" name = "cuisineType" value="american"> American <br>
    <input type="checkbox" name = "cuisineType" value="mediterranean"> Mediterranean<br>
    <input type="checkbox" name = "cuisineType" value="korean"> Korean <br>
    <input type="checkbox" name = "cuisineType" value="caribbean"> Caribbean <br>
    <input type="checkbox" name = "cuisineType" value="spanish"> Spanish <br>
    <input type="checkbox" name = "cuisineType" value="french"> French <br>
    <input type="checkbox" name = "cuisineType" value="seafood"> Seafood <br>
    </div>
    <button class = 'collapse'>Meal Type</button>
    <div class = 'meals'>
    <input type="checkbox" name = "cuisineType" value="breakfast"> Breakfast <br>
    <input type="checkbox" name = "cuisineType" value="lunch"> Lunch <br>
    <input type="checkbox" name = "cuisineType" value="dinner"> Dinner <br>
    <input type="checkbox" name = "cuisineType" value="snack"> Snacks <br>
    <input type="checkbox" name = "cuisineType" value="appetizer"> Appetizers <br>
    <input type="checkbox" name = "cuisineType" value="dessert"> Desserts <br>
    </div>
    </div>
    <div class = 'checks' id='mychecks'>
    <h3> Users Only </h3>
    <input type="checkbox" name = "mykitchen"> Use My Kitchen <br>
    <input type="checkbox" name = "mydiet"> Use My Diet <br>
    <br>
    <button onclick="filtersApplied()" value="Apply Filters">Apply Filters </button>
    </div>
    <script>
      var coll = document.getElementsByClassName("collapse");
      var i;

      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
    </script>
  </div>

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

      <input type="text" placeholder="Search" id = "search_simple">
      <button id="simple_search" onclick="createCard()"><i class="fa fa-search"></i></button>
    <div id="results"> </div>

  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
  <div id="edamam-badge" data-color="white"></div>
</div>


</body>
</html>
