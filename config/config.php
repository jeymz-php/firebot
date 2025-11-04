<?php
$host = "localhost";      
$user = "u776997507_firebot";         
$pass = "7gtMRMq/B";                
$dbname = "u776997507_firebot_db";     

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
