<?php
require_once '../config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit;
}

if (empty($_POST['qr_data'])) {
    echo json_encode(["status" => "error", "message" => "Missing QR data"]);
    exit;
}

$qrData = trim($_POST['qr_data']);

// === UPDATED: FIREBOT AUTH VERIFICATION ===
if (strpos($qrData, 'FireBOT_Auth') !== false) {
    // Extract Email and DeviceID using regex
    preg_match('/Email:(.+)/', $qrData, $emailMatch);
    preg_match('/DeviceID:(.+)/', $qrData, $idMatch);
    
    $email = isset($emailMatch[1]) ? trim($emailMatch[1]) : '';
    $device_id = isset($idMatch[1]) ? trim($idMatch[1]) : '';

    if (empty($email) || empty($device_id)) {
        echo json_encode(["status" => "error", "message" => "Invalid QR content format"]);
        exit;
    }

    // Check if the user exists and is linked to this device
    $stmt = $conn->prepare("SELECT full_name, email, device_id, device_model FROM users WHERE email = ? AND device_id = ?");
    $stmt->bind_param("ss", $email, $device_id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        
        // Check if device is already verified (locked)
        $checkLock = $conn->prepare("SELECT qr_verified FROM devices WHERE device_id = ?");
        $checkLock->bind_param("s", $device_id);
        $checkLock->execute();
        $lockRes = $checkLock->get_result()->fetch_assoc();

        if ($lockRes && (int)$lockRes['qr_verified'] === 1) {
             echo json_encode(["status" => "locked", "message" => "Device already bound to another phone."]);
             exit;
        }

        // Lock the device to this phone
        $updateDevice = $conn->prepare("UPDATE devices SET qr_verified = 1 WHERE device_id = ?");
        $updateDevice->bind_param("s", $device_id);
        $updateDevice->execute();
        
        echo json_encode([
            "status" => "valid_user", // Matches your Android logic
            "message" => "Authentication successful!",
            "data" => $user
        ]);
    } else {
        echo json_encode(["status" => "invalid", "message" => "Unauthorized User or Device mismatch."]);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(["status" => "error", "message" => "Unrecognized FireBOT QR Type"]);
    exit;
}