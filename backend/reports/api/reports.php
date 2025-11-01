<?php
header("Content-Type: application/json");
include "../../config/db_connection.php";

$response = [];

try {
    $totalCases = $conn->query("SELECT COUNT(*) AS total FROM cases")->fetch_assoc()['total'];

    $assignedCases = $conn->query("SELECT COUNT(*) AS total FROM case_assignments")->fetch_assoc()['total'];

    $pendingCases = $conn->query("SELECT COUNT(*) AS total FROM case_assignments WHERE status='Pending'")->fetch_assoc()['total'];

    $completedCases = $conn->query("SELECT COUNT(*) AS total FROM case_assignments WHERE status='Completed'")->fetch_assoc()['total'];

    $totalEmployees = $conn->query("SELECT COUNT(*) AS total FROM employees")->fetch_assoc()['total'];

    $employeeStats = [];
    $result = $conn->query("SELECT e.id, e.name, COUNT(ca.id) AS total_assigned 
                        FROM employees e 
                        LEFT JOIN case_assignments ca ON e.id = ca.employee_id 
                        GROUP BY e.id");

    while ($row = $result->fetch_assoc()) {
        $employeeStats[] = $row;
    }

    $response = [
        "success" => true,
        "data" => [
            "total_cases" => $totalCases,
            "assigned_cases" => $assignedCases,
            "pending_cases" => $pendingCases,
            "completed_cases" => $completedCases,
            "total_employees" => $totalEmployees,
            "employee_stats" => $employeeStats
        ]
    ];

} catch (Exception $e) {
    $response = ["success" => false, "message" => $e->getMessage()];
}

echo json_encode($response);
?>
