<?php  //Start the Session
 include('config.php');
 session_start();

if (isset($_POST['recipe'])) {
   if (isset($_SESSION['id'])) {
     $recipe = $_POST['recipe'];
     $sql = "SELECT recipe.title
            FROM recipe, board_recipes, board, user
            WHERE user.user_id=board.user_id && board_recipes.board_id=board.board_id
                  && recipe.recipe_id=board_recipes.recipe_id
                  && recipe.title = '$recipe'
                  && user.user_id=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result->num_rows > 0) {
      echo "true";
    }
    else {
      echo $recipe;
      echo "false";
    }
  }
  else {
    echo "super false";
  }
}


 ?>
