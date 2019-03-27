<?php  //Start the Session
 include('config.php');
 session_start();

 if (isset($_POST['username']) and isset($_POST['password'])) {
   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];
   $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
   $result = mysqli_query($conn, $sql);

   $count = mysqli_num_rows($result);

   if ($count == 1) {
     $_SESSION['login_user'] = $myusername;
     header('Location: index.php');
   }else {
     echo "boo";
   }
 }else {
   echo "fork";
 }



?>
