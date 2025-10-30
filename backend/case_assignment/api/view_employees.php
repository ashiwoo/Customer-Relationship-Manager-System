<?php

include "../../config/db_connection.php";
header('Content-Type: application/json');

$query = "SELECT id, name, department FROM employees";
$getEmpResult = mysqli_query($conn,$query);
$employees = [];

if($getEmpResult && mysqli_num_rows($getEmpResult) > 0){
    while($rows= mysqli_fetch_assoc($getEmpResult)){
        $employees[] = $rows;
    }
}
echo json_encode($employees);
?>