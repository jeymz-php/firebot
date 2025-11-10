<?php
require_once '../config/config.php';
header('Content-Type: application/json');

/*
------------------------------------------------------------
 🔁 FireBOT Device Reset System (FOR MOBILE APP)
------------------------------------------------------------
 Triggered when the user presses “Forget Robot”
 -> Verifies device_id and user_id match
 -> Resets qr_verified = 0
------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit;
}

$device_id = $_POST['device_id'] ?? '';
$user_id   = $_POST['user_id'] ?? '';

if (empty($device_id) || empty($user_id)) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit;
}

// Check if device exists and belongs to this user
$stmt = $conn->prepare("SELECT device_id FROM devices WHERE device_id = ? AND owner_email = (SELECT email FROM users WHERE id = ?)");
$stmt->bind_param("si", $device_id, $user_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    // Reset the QR lock
    $update = $conn->prepare("UPDATE devices SET qr_verified = 0 WHERE device_id = ?");
    $update->bind_param("s", $device_id);

    if ($update->execute()) {
        echo json_encode(["status" => "success", "message" => "Device successfully unlinked."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to reset device."]);
    }
    $update->close();
} else {
    echo json_encode(["status" => "invalid", "message" => "Device not found or doesn’t belong to this user."]);
}

$stmt->close();
$conn->close();
?>
