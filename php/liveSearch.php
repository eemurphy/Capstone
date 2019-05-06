
<?php
include('config.php');
session_start();

$hint="";

//lookup all links from the xml file if length of q>0
if (isset($_POST['string'])) {
  $string = $_POST['string'];

  $query = "SELECT ingredients.name FROM ingredients WHERE ingredients.name LIKE '$string%'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $hint .= $row["name"] . "<br />";
    };
  }
  else {
    $hint = "no suggestion";
  }
}
else {
  $hint = "no suggestion";
}


  echo $hint;

?>
