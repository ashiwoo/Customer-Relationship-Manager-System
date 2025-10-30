<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $case_id = $_POST['case_id'] ?? '';
    $employee_id = $_POST['employee_id'] ?? '';
    $assigned_date = $_POST['assigned_date'] ?? date('Y-m-d');
    $status = $_POST['status'] ?? 'Pending';
    $remarks = $_POST['remarks'] ?? '';

    if (empty($case_id) || empty($employee_id)) {
        echo json_encode(["success" => false, "message" => "Please select both Case and Employee."]);
        exit;
    }
    
    $insertquery = "INSERT INTO case_assignments (case_id, employee_id, assigned_date, status, remarks)
               VALUES ('$case_id', '$employee_id', '$assigned_date', '$status','$remarks')";

    if (mysqli_query($conn, $insertquery)) {
        echo json_encode(["success" => true, "message" => "Case assigned successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    }
}
?>
