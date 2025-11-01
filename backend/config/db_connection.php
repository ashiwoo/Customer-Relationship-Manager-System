<?php
$servername = "sql100.infinityfree.com";
$username = "if0_40306717";
$password = "Rm2G960pZFLf";
$dbname = "if0_40306717_crm_system_db"; 
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
