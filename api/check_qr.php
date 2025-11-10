<?php
include "../config/config.php";
header('Content-Type: application/json');

$device_id = $_POST['device_id'] ?? '';

if (empty($device_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing device_id']);
    exit;
}

$sql = "SELECT qr_verified FROM devices WHERE device_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $device_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['status' => 'success', 'qr_verified' => $row['qr_verified']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Device not found']);
}
?>
