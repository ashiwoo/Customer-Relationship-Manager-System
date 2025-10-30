<?php
session_start();
header("Content-Type: application/json");

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    echo json_encode(["success" => true, "message" => "Session active"]);
} else {
    echo json_encode(["success" => false, "message" => "Session not found"]);
}
?>
