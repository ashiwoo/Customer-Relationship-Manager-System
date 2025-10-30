<?php
include "../../config/db_connection.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c_id = $_POST['id'];

    $deletequery = "delete from cases where id = $c_id";

    if ($conn->query($deletequery) === TRUE) {
        echo json_encode(["success" => true, "message" => "Case deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting case: " . $conn->error]);
    }
}
?>
