<?php
header("Content-Type: application/json");
include '../config/config.php';
$result = mysqli_query($conn, "SELECT front, left_side, right_side FROM flame_status WHERE id = 1");
echo json_encode(mysqli_fetch_assoc($result));
?>