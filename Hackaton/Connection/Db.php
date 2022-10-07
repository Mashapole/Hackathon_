<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "hackaton"; // Database name 

// Connect to server and select databse.
$connect = mysqli_connect($host, $username, $password, $db_name);
// Check connection
if (!$connect) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error($connect);
}


?>
