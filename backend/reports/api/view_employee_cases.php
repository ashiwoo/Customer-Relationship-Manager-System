<?php
header("Content-Type: application/json");
include "../../config/db_connection.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $employee_id = $_GET['employee_id'] ?? '';

    if (empty($employee_id)) {
        echo json_encode(["error" => "Missing employee_id"]);
        exit;
    }

    $query = "SELECT  c.id AS case_id, c.customer_name,c.email,c.phone,c.issue, ca.status,ca.assigned_date,ca.remarks
              FROM case_assignments ca
              JOIN cases c ON ca.case_id = c.id
              WHERE ca.employee_id = '$employee_id'";

    $result = mysqli_query($conn, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}
?>
