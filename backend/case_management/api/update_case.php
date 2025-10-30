<?php
ob_clean(); 
header("Content-Type: application/json");
include("../../config/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $case_id = $_POST['case_id'] ?? '';
    $customer_name = $_POST['customer_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $issue = $_POST['issue'] ?? '';
    $status = $_POST['status'] ?? '';

    if (empty($case_id)) {
        echo json_encode(["success" => false, "message" => "Missing case ID"]);
        exit;
    }

    $query = "UPDATE cases SET 
                customer_name = '$customer_name',
                email = '$email',
                phone = '$phone',
                issue = '$issue',
                status = '$status'
              WHERE id = '$case_id'";

    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true, "message" => "Case updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>
