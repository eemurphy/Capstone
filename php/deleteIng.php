<?php
include('config.php');
session_start();

if (isset($_POST['ingredient'])) {
  $kitchenquery = "SELECT kitchen_id FROM kitchen WHERE user_id=".$_SESSION['id'];
  $kitchen_result = mysqli_query($conn, $kitchenquery) or die(mysqli_error($conn));
  $kitchen_row = mysqli_fetch_array($kitchen_result);
  $kitchen_id = $kitchen_row[0];

  $ingquery = "SELECT ingredient_id FROM ingredients WHERE name= '".$_POST['ingredient']."'";
  $ing_result = mysqli_query($conn, $ingquery) or die(mysqli_error($conn));
  $ing_row = mysqli_fetch_array($ing_result);
  $ing_id = $ing_row[0];

  $query = "DELETE FROM kitchen_ingredients WHERE kitchen_id = $kitchen_id && ingredient_id = $ing_id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>
