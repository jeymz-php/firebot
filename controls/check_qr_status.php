<?php
require_once '../config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit;
}

if (empty($_GET['device_id'])) {
    echo json_encode(["status" => "error", "message" => "Missing device_id"]);
    exit;
}

$device_id = trim($_GET['device_id']);

$stmt = $conn->prepare("SELECT qr_verified FROM devices WHERE device_id = ?");
$stmt->bind_param("s", $device_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    $device = $res->fetch_assoc();
    echo json_encode([
        "qr_verified" => $device['qr_verified'],
        "device_id" => $device_id
    ]);
} else {
    echo json_encode(["status" => "error", "message" => "Device not found"]);
}

$stmt->close();
$conn->close();
?>