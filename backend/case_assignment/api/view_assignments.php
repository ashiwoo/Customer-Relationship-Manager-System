<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

$query = "SELECT ca.id,c.customer_name AS case_name, e.name AS employee_name, e.department, ca.assigned_date,ca.status,ca.remarks
    FROM case_assignments ca
    JOIN cases c ON ca.case_id = c.id
    JOIN employees e ON ca.employee_id = e.id
    ORDER BY ca.id DESC
";

$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
