<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm_system_db"; 
=======
$servername = "sql100.infinityfree.com";
$username = "if0_40306717";
$password = "Rm2G960pZFLf";
$dbname = "if0_40306717_crm_system_db"; 
>>>>>>> e3976ccd41a60aea5d314afc985ffc6a3c4ce48d
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
