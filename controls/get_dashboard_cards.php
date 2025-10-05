<?php
include '../config/config.php';

// Default response values
$response = [
  'robotsDeployed' => 0,
  'totalUsers' => 0,
  'fireIncidents' => 0,
  'unreadMessages' => 0
];

// ✅ Count robots deployed (Active)
$sql = "SELECT COUNT(*) AS count FROM robots WHERE status = 'Active'";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
  $response['robotsDeployed'] = (int)$row['count'];
}

if ($conn->query("SHOW TABLES LIKE 'users'")->num_rows > 0) {
  $sql = "SELECT COUNT(*) AS count FROM users";
  $result = $conn->query($sql);
  if ($result && $row = $result->fetch_assoc()) {
    $response['totalUsers'] = (int)$row['count'];
  }
}

// ✅ Count fire incidents (from robot_logs)
if ($conn->query("SHOW TABLES LIKE 'robot_logs'")->num_rows > 0) {
  $sql = "SELECT COUNT(*) AS count FROM robot_logs WHERE status = 'Emergency'";
  $result = $conn->query($sql);
  if ($result && $row = $result->fetch_assoc()) {
    $response['fireIncidents'] = (int)$row['count'];
  }
}

// ✅ Count unread messages (if you have a messages table)
if ($conn->query("SHOW TABLES LIKE 'messages'")->num_rows > 0) {
  $sql = "SELECT COUNT(*) AS count FROM messages WHERE is_read = 0";
  $result = $conn->query($sql);
  if ($result && $row = $result->fetch_assoc()) {
    $response['unreadMessages'] = (int)$row['count'];
  }
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
