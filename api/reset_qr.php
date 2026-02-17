<?php
require_once '../config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit;
}

// We need the device_id to know which robot to reset
if (empty($_POST['device_id'])) {
    echo json_encode(["status" => "error", "message" => "Missing device_id"]);
    exit;
}

$device_id = trim($_POST['device_id']);

// Update qr_verified back to 0 so it can be scanned again
$stmt = $conn->prepare("UPDATE devices SET qr_verified = 0 WHERE device_id = ?");
$stmt->bind_param("s", $device_id);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success", 
        "message" => "Robot reset successfully in database."
    ]);
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Database update failed: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>