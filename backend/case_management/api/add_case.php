<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $issue = $_POST['issue'] ?? '';
    $status = $_POST['status'] ?? 'Open';

    // Validation
    if (empty($customer_name) || empty($email) || empty($phone) || empty($issue)) {
        echo json_encode(["success" => false, "message" => "All fields are required"]);
        exit;
    }

    $insertquery = "INSERT INTO cases (customer_name, email, phone, issue, status)
                    VALUES ('$customer_name', '$email', '$phone', '$issue', '$status')";

    if ($conn->query($insertquery) === TRUE) {
        echo json_encode(["success" => true, "message" => "Case added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
    }

    $conn->close();
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>
