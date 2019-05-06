<?php  //Start the Session
 include('config.php');
 session_start();

 if (isset($_POST['username'])) {
   $myusername = $_POST['username'];
   $mypassword = $_POST['psw'];
   $passwordrepeat = $_POST['psw-repeat'];
   if ($mypassword != $passwordrepeat) {
     //ERROR
     echo "error";
   }
   $sql = "SELECT * FROM user WHERE username = '$myusername'";
   $result = mysqli_query($conn, $sql);

   $user = mysqli_fetch_assoc($result);

   if ($user) {
     //ERROR
     echo "user already exists\n";
   }
   $query = "INSERT INTO user (username, password) VALUES ('$myusername', '$mypassword')";
   mysqli_query($conn, $query) or die(mysqli_error($conn));
   $userquery = "SELECT user_id FROM user WHERE username='$myusername'";
   $user_result = mysqli_query($conn, $userquery) or die(mysqli_error($conn));
   $user_row = mysqli_fetch_array($user_result);
   $user_id = $user_row[0];
   $kitchen = "INSERT INTO kitchen (ing_amt, user_id) VALUES (0, $user_id)";
   $shoppinglist = "INSERT INTO shopping_list (user_id) VALUES ($user_id)";
   $diet = "INSERT INTO diet (user_id) VALUES ($user_id)";
   $board = "INSERT INTO board (user_id) VALUES ($user_id)";
   mysqli_query($conn, $kitchen) or die(mysqli_error($conn));
   mysqli_query($conn, $board) or die(mysqli_error($conn));
   mysqli_query($conn, $shoppinglist) or die(mysqli_error($conn));
   mysqli_query($conn, $diet) or die(mysqli_error($conn));
   $_SESSION['login_user'] = $myusername;
   $_SESSION['id'] = $user_id;
   header('Location: ' . $_SERVER['HTTP_REFERER']);

 } else {
   echo "username isn't a set\n";
 }



?>
