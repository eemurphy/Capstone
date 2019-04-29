<?php  //Start the Session
 include('config.php');
 session_start();

$mydiet = '';
$mykitchen = '';
$arrkitchen = array();

if (isset($_POST['mydiet'])) {
  if (isset($_SESSION['id'])) {
    $sql = "SELECT diet.name
            FROM user, diet
            WHERE user.user_id = diet.user_id
                  && user.user_id=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result->num_rows > 0) {
      $mydiet = '';
      while($row = $result->fetch_assoc()) {
        $mydiet .= "&health=" . $row["name"];
      };
    }

  }
  else {
    //error
  }
}
if ( isset($_POST['mykitchen'])) {
  if (isset($_SESSION['id'])) {
    $sql = "SELECT ingredients.name
            FROM ingredients, kitchen_ingredients, kitchen, user
            WHERE user.user_id=kitchen.user_id && kitchen_ingredients.kitchen_id=kitchen.kitchen_id
                  && kitchen_ingredients.kitchen_id=kitchen.kitchen_id
                  && ingredients.ingredient_id=kitchen_ingredients.ingredient_id
                  && user.user_id=".$_SESSION['id'];
    $kitchenresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($kitchenresult->num_rows > 0) {
      while($kitrow = $kitchenresult->fetch_assoc()) {
        $mykitchen .= $kitrow["name"] . "+";
      }
      $mykitchen =substr($mykitchen, 0, -1);
    }
  }
  else {
    //error
  }
}

$returnStr = $mykitchen . "&app_id=c8ff4e69&app_key=4e95c1dd3483dcda4d0d618341222ddf" . $mydiet;
echo $returnStr;

?>
