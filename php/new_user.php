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
     echo "error";
   }
   $query = "INSERT INTO user (username, password) VALUES ('$myusername', $mypassword)";
   mysqli_query($conn, $query);
   $_SESSION['login_user'] = $myusername;
   header('Location: ' . $_SERVER['HTTP_REFERER']);

 } else {
   echo "fork";
 }



?>
