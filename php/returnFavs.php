<?php  //Start the Session
 include('config.php');
 session_start();
$recipe = array();
   if (isset($_SESSION['id'])) {

     $sql = "SELECT recipe.title, recipe.servings, recipe.url, recipe.img, recipe.calories
            FROM recipe, board_recipes, board, user
            WHERE user.user_id=board.user_id && board_recipes.board_id=board.board_id
                  && recipe.recipe_id=board_recipes.recipe_id
                  && user.user_id=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $recipe[] = array(
          'title' => $row['title'],
          'servings' => $row['servings'],
          'url' => $row['url'],
          'img' => $row['img'],
          'calories' => $row['calories']
        );

      }
    }
    else {
      echo $recipe;
      echo "false";
    }
  }
  else {
    echo "super false";
  }


echo json_encode($recipe);

 ?>
