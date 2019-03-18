<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost:8080";
$username = "root";
$password = "icecubes97";
$dbname = "capstone";

/* Attempt to connect to MySQL database */
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

echo "Connected successfully";

?>
