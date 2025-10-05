<?php
include '../config/config.php';

$sql = "SELECT * FROM robot_logs ORDER BY timestamp DESC LIMIT 5";
$result = $conn->query($sql);

$logs = [];
while ($row = $result->fetch_assoc()) {
  $logs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($logs);
?>
