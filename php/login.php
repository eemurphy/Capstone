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

     $userquery = "SELECT user_id FROM user WHERE username='$myusername'";
     $user_result = mysqli_query($conn, $userquery) or die(mysqli_error($conn));
     $user_row = mysqli_fetch_array($user_result);
     $user_id = $user_row[0];

     $_SESSION['id'] = $user_id;

     header('Location: ' . $_SERVER['HTTP_REFERER']);
   }else {
     echo "boo";
   }
 }else {
   echo "fork";
 }



?>
