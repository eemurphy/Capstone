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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script type="text/javascript" src="../js/openTabs.js"> </script>
<script type="text/javascript" src="../js/ingrLiveSearch.js"> </script>
<script type="text/javascript" src="../js/createRecipeCards.js"> </script>
<script type="text/javascript" src="../js/favoriteRecipe.js"> </script>
<script src="../js/createFavs.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>
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
    <button class="tablinks" onclick="openTab(event, 'Account')" id="TabAccount" >Account</button>
    <button class="tablinks" onclick="openTab(event, 'Kitchen')" id ="TabKitchen">Kitchen</button>
    <button class="tablinks" onclick="openTab(event, 'Boards')" id ="TabBoards">Boards</button>
    <button class="tablinks" onclick="openTab(event, 'Shopping')" id ="TabShopping">Shopping List</button>
    <button class="tablinks" onclick="openTab(event, 'Diet')" id ="TabDiet">Diet</button>

  </div>
  <div class="main">
    <div id="Account" class="tab">
      <h1> Account </h1>
      <br>
      <?php
        include('../php/config.php');
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
          <input type="text" placeholder="ingredient" name="ingredient" onkeyup="showResult(this.value)">
					<div id="livesearch"></div>
          <button type="submit">Add</button>
        </form>
        <h4> What's In My Kitchen </h4>

        <?php

          if (isset($_SESSION['id'])) {
            $sql = "SELECT ingredients.name
                    FROM ingredients, kitchen_ingredients, kitchen, user
                    WHERE user.user_id=kitchen.user_id && kitchen_ingredients.kitchen_id=kitchen.kitchen_id
                          && kitchen_ingredients.kitchen_id=kitchen.kitchen_id
                          && ingredients.ingredient_id=kitchen_ingredients.ingredient_id
                          && user.user_id=".$_SESSION['id'];
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo $row["name"]. '<input type="checkbox" name="priority" value=' . $row["name"] . ' onclick="prioritizeChange(this);"> Prioritized
                    <form method="post" action="../php/deleteIng.php"> <input type="hidden" name="ingredient" value=' . $row["name"] . '> <button type="submit">Delete</button></form>';
              }
            } else {
              echo "0 results";
            }
          } else {
            echo "You must be logged in to add ingredients to your kitchen.";
          }


        ?>

      </div>
      <div id="Boards" class="tab">
        <h3>Boards</h3>
        <p>This is your favorite recipes.</p>
				<div id='favorites'></div>
				<script>
    			favCreation();
				</script>


        </div>

      <div id="Shopping" class="tab">
        <h3>Shopping List</h3>
        <h4> Add Ingredient </h4>
        <form method="post" action="../php/addShopIng.php">
          <label name="ingredient">Ingredient: </label>
          <input type="text" placeholder="ingredient" name="ingredient">
					<label name="quantity">Quantity: </label>
          <input type="text" placeholder="Quantity" name="quantity">
          <button type="submit">Add</button>
        </form>

        <?php

          if (isset($_SESSION['id'])) {
            $sql = "SELECT ingredients.name, shopping_ingredients.amount
                    FROM ingredients, shopping_ingredients, shopping_list, user
                    WHERE user.user_id=shopping_list.user_id
                          && shopping_ingredients.shoppingList_id=shopping_list.shoppingList_id
                          && ingredients.ingredient_id=shopping_ingredients.ingredient_id
                          && user.user_id=".$_SESSION['id'];
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo $row["amount"]. " " .$row["name"]. '<form method="post" action="../php/deleteShopIng.php"> <input type="hidden" name="ingredient" value=' . $row["name"] . '> <button type="submit">Delete</button></form>';
              }
            } else {
              echo "0 results";
            }
          } else {
            echo "You must be logged in to add ingredients to your shopping list.";
          }


        ?>




      </div>
      <div id="Diet" class="tab">
        <h3>Diet</h3>
        <p>This is your diet.</p>

        <button class = 'collapse'>Diet</button>
        <div class = 'diets'>
        <form action="../php/addDiet.php" method="post">
        <input type="checkbox" name = "diet_list[]" value="paleo"> Paleo <br>
        <input type="checkbox" name = "diet_list[]" value="vegan"> Vegan <br>
        <input type="checkbox" name = "diet_list[]" value="vegetarian"> Vegetarian <br>
        <input type="checkbox" name = "diet_list[]" value="gluten-free"> Gluten-free <br>
        <input type="checkbox" name = "diet_list[]" value="kosher"> Kosher <br>
        <input type="checkbox" name = "diet_list[]" value="alcohol-free"> Alcohol-free <br>
        <input type="checkbox" name = "diet_list[]" value="dairy-free"> Dairy-free <br>
        <input type="checkbox" name = "diet_list[]" value="fish-free"> Fish-free <br>
        <input type="checkbox" name = "diet_list[]" value="shellfish-free"> Shellfish-free <br>
        <input type="checkbox" name = "diet_list[]" value="low-sugar"> Sugar-free <br>
        <input type="checkbox" name = "diet_list[]" value="peanut-free"> Peanut-free <br>
        <input type="checkbox" name = "diet_list[]" value="pescatarian"> Pescatarian <br>
        <input type="checkbox" name = "diet_list[]" value="pork-free"> Pork-free <br>
        <input type="checkbox" name = "diet_list[]" value="red-meat-free"> Red meat-free <br>
        <input type="checkbox" name = "diet_list[]" value="soy-free"> Soy-free <br>
        <input type="checkbox" name = "diet_list[]" value="sugar-conscious"> Less than 4g sugar <br>
        <input type="checkbox" name = "diet_list[]" value="wheat-free"> Wheat-free <br>
        <input type="checkbox" name = "diet_list[]" value="celery-free"> Celery-free <br>
        <input type="checkbox" name = "diet_list[]" value="crustacean-free"> Crustacean-free <br>
        <input type="checkbox" name = "diet_list[]" value="kidney-friendly"> Kidney friendly <br>
        <input type="checkbox" name = "diet_list[]" value="egg-free"> Egg-free <br>
        <input type="checkbox" name = "diet_list[]" value="low-potassium"> Low-potassium <br>
        <input type="checkbox" name = "diet_list[]" value="lupine-free"> Lupine-free <br>
        <input type="checkbox" name = "diet_list[]" value="mustard-free"> Mustard-free <br>
        <input type="checkbox" name = "diet_list[]" value="No-oil-added"> No oil added <br>
        <input type="checkbox" name = "diet_list[]" value="sesame-free"> Sesame-free <br>
        <input type="checkbox" name = "diet_list[]" value="tree-nut-free"> Tree nut-free <br>
        <input type="submit" name="submit" value="Submit"/>
        </form>
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
        <br>
        <br>
          <?php

          if (isset($_SESSION['id'])) {
            $sql = "SELECT diet.name
                    FROM diet, user
                    WHERE user.user_id=diet.user_id
                          && user.user_id=".$_SESSION['id'];
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo $row["name"]. '<form method="post" action="../php/deleteDiet.php"> <input type="hidden" name="diet" value=' . $row["name"] . '> <button type="submit">Delete</button></form>';
              }
            } else {
              echo "0 results";
            }
          } else {
            echo "You must be logged in to have a personal diet";
          }


        ?>


      </div>

  </div>
</div>

<div class="footer">
  <h2>created by Erin Murphy</h2>
</div>

<script>

var active = localStorage.getItem("activeTab");
console.log(active);
if (active) {
  document.getElementById(active).click();

}
else {
  document.getElementById("TabAccount").click();
}

</script>

</body>
</html>
