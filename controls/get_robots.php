<?php
include '../config/config.php';

$sql = "SELECT * FROM robots";
$result = $conn->query($sql);

$robots = [];
while ($row = $result->fetch_assoc()) {
    $robots[] = $row;
}

header('Content-Type: application/json');
echo json_encode($robots);
?>
