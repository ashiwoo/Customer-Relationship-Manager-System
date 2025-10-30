<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if (empty($id)) {
        echo json_encode(["success" => false, "message" => "Assignment ID is required."]);
        exit;
    }

    $deleteQuery = "DELETE FROM case_assignments WHERE id = '$id'";
    
    if (mysqli_query($conn, $deleteQuery)) {
        echo json_encode(["success" => true, "message" => "Assignment deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
