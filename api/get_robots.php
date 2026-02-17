<?php
// get_robots.php
include '../config/config.php';

$result = $conn->query("SELECT id, name, latitude, longitude, status FROM robots");
$robots = [];
while ($row = $result->fetch_assoc()) {
    $robots[] = $row;
}

header('Content-Type: application/json');
echo json_encode($robots);
?>
