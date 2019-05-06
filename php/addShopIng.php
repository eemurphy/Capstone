<?php
include('config.php');
session_start();

if (isset($_POST['ingredient']) and isset($_POST['quantity'])) {
  $shopquery = "SELECT shoppingList_id FROM shopping_list WHERE user_id=".$_SESSION['id'];
  $shop_result = mysqli_query($conn, $shopquery) or die(mysqli_error($conn));
  $shop_row = mysqli_fetch_array($shop_result);
  $shop_id = $shop_row[0];

  $ingquery = "SELECT ingredient_id FROM ingredients WHERE name= '".$_POST['ingredient']."'";
  $ing_result = mysqli_query($conn, $ingquery) or die(mysqli_error($conn));
  $ing_row = mysqli_fetch_array($ing_result);
  $ing_id = $ing_row[0];

  $query = "INSERT INTO shopping_ingredients (amount, shoppingList_id, ingredient_id) VALUES (".$_POST['quantity'].", $shop_id, $ing_id)";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>
