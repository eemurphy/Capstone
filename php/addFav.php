<?php
 include('config.php');
 session_start();

if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $img = $_POST['img'];
  $url = $_POST['url'];
  $servings = $_POST['servings'];
  $calories = $_POST['calories'];
  if (!empty($_SESSION['id'])) {
    $sql = "SELECT recipe.recipe_id
           FROM recipe, board_recipes, board, user
           WHERE user.user_id=board.user_id && board_recipes.board_id=board.board_id
                 && recipe.recipe_id=board_recipes.recipe_id
                 && recipe.title = '$title'
                 && user.user_id=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result->num_rows > 0) {
      $recid = mysqli_fetch_array($result)[0];

      $boardqry = "SELECT board.board_id
                  FROM board, user
                  WHERE user.user_id=board.user_id && user.user_id=".$_SESSION['id'];
      $board_result = mysqli_query($conn, $boardqry) or die(mysqli_error($conn));
      $board_row = mysqli_fetch_array($board_result);
      $board_id = $board_row[0];

      $query = "DELETE FROM board_recipes WHERE recipe_id = $recid && board_id = $board_id";
      mysqli_query($conn, $query) or die(mysqli_error($conn));

    }
    else {
      $ask = "SELECT recipe.recipe_id
              FROM recipe
              WHERE recipe.title='$title'";
      $result = mysqli_query($conn, $ask) or die(mysqli_error($conn));
      $ask_row = mysqli_fetch_array($result);
      $recipe_id = $ask_row[0];
      if (empty($recipe_id)) {
        $query = "INSERT INTO recipe (title, servings, url, img, calories) VALUES ('$title', '$servings', '$url', '$img', '$calories')";
        $result3 = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $ask2 = "SELECT recipe.recipe_id
                FROM recipe
                WHERE recipe.title='$title'";
        $result2 = mysqli_query($conn, $ask2) or die(mysqli_error($conn));
        $ask_row2 = mysqli_fetch_array($result2);
        $recipe_id = $ask_row2[0];
      }
      $boardqry = "SELECT board.board_id
                  FROM board, user
                  WHERE user.user_id=board.user_id && user.user_id=".$_SESSION['id'];
      $board_result = mysqli_query($conn, $boardqry) or die(mysqli_error($conn));
      $board_row = mysqli_fetch_array($board_result);
      $board_id = $board_row[0];
      $sqlf = "INSERT INTO board_recipes (board_id, recipe_id) VALUES ('$board_id', '$recipe_id')";
      $resultf = mysqli_query($conn, $sqlf) or die(mysqli_error($conn));
      if($result) {
        echo "Success";
      }
      else {
        echo "Error";
      }
    }
  }
  else {
    echo "id not set";
  }
}


 ?>
