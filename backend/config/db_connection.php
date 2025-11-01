<?php
$servername = "localhost";
$username = "if0_40306717";
$password = "if0_40306717";
$dbname = "crm_system_db"; 
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
