<?php
include('config.php');
session_start();

if (isset($_POST['diet'])) {
  $diet = $_POST['diet'];

  $query = "DELETE FROM diet WHERE name = '$diet' && user_id =".$_SESSION['id'];
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>
