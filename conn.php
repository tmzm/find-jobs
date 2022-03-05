<?php
include 'variables.php';
// Database configuration
$host  = "localhost";
$dbuser = "root";
$dbpass = "tmzm2020";
$dbname = "usersjobs";
 
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
  
// Check connection
if(mysqli_connect_error())
{
 echo "Connection establishing failed!";
}

?>