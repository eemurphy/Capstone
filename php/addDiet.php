<?php
include('config.php');
session_start();

if (isset($_POST['submit'])) {
  if (isset($_POST['diet_list'])) {
    foreach($_POST['diet_list'] as $selected) {

      $query = "INSERT INTO diet (name, user_id) VALUES ('$selected', ".$_SESSION['id'].")";
      mysqli_query($conn, $query) or die(mysqli_error($conn));
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
}

?>
