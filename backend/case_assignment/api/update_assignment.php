<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $employee_id = $_POST['employee_id'] ?? '';
    $assigned_date = $_POST['assigned_date'] ?? '';
    $status = $_POST['status'] ?? '';

    if (empty($id) || empty($employee_id)) {
        echo json_encode(["success" => false, "message" => "Missing required fields."]);
        exit;
    }

    $query = "UPDATE case_assignments 
              SET employee_id='$employee_id', assigned_date='$assigned_date', status='$status'
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true, "message" => "Assignment updated successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    }
}
?>
