<?php
include "../../config/db_connection.php";
header('Content-Type: application/json');

$displayquery = "select * from cases order BY id desc";
$result = $conn->query($displayquery);

$cases = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cases[] = $row;
    }
}

echo json_encode($cases);
?>

