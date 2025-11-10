<?php
require_once '../config/config.php';
header('Content-Type: application/json');

/*
------------------------------------------------------------
 🔍 FireBOT QR Verification System
------------------------------------------------------------
 Handles two types of QR:
   - FireBOT_User (for registered users)
   - FireBOT_Device (for linked ESP32/Arduino devices)
 Adds device QR locking:
   -> qr_verified = 1 means already scanned
------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    exit;
}

if (empty($_POST['qr_data'])) {
    echo json_encode(["status" => "error", "message" => "Missing QR data"]);
    exit;
}

$qrData = trim($_POST['qr_data']);

// === USER QR VERIFICATION ===
if (strpos($qrData, 'FireBOT_User') !== false) {
    preg_match('/Email:\s*(.+)/', $qrData, $emailMatch);
    $email = isset($emailMatch[1]) ? trim($emailMatch[1]) : '';

    if (empty($email)) {
        echo json_encode(["status" => "error", "message" => "Invalid user QR format"]);
        exit;
    }

    $stmt = $conn->prepare("SELECT full_name, email, device_id, device_model FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        
        // ✅ ADD THIS: Also verify the associated device QR
        $device_id = $user['device_id'];
        $updateDevice = $conn->prepare("UPDATE devices SET qr_verified = 1 WHERE device_id = ?");
        $updateDevice->bind_param("s", $device_id);
        $updateDevice->execute();
        $updateDevice->close();
        
        echo json_encode([
            "status" => "valid_user",
            "message" => "User QR verified successfully. Device activated.",
            "data" => $user
        ]);
    } else {
        echo json_encode(["status" => "invalid", "message" => "No user found for this QR."]);
    }

    $stmt->close();
    $conn->close();
    exit;
}

// === DEVICE QR VERIFICATION ===
elseif (strpos($qrData, 'FireBOT_Device') !== false) {
    preg_match('/ID:(.+)/', $qrData, $idMatch);
    $device_id = isset($idMatch[1]) ? preg_replace('/\s+/', '', $idMatch[1]) : '';

    if (empty($device_id)) {
        echo json_encode(["status" => "error", "message" => "Invalid device QR format"]);
        exit;
    }

    // Check if device exists
    $stmt = $conn->prepare("SELECT device_id, device_model, owner_email, qr_verified FROM devices WHERE device_id = ?");
    $stmt->bind_param("s", $device_id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        echo json_encode(["status" => "invalid", "message" => "No device found for this QR."]);
        $stmt->close();
        $conn->close();
        exit;
    }

    $device = $res->fetch_assoc();
    $stmt->close();

    if ((int)$device['qr_verified'] === 1) {
        echo json_encode([
            "status" => "locked",
            "message" => "QR already scanned on another mobile. Access denied.",
            "data" => $device
        ]);
        $conn->close();
        exit;
    }

    // Mark QR as verified
    $update = $conn->prepare("UPDATE devices SET qr_verified = 1 WHERE device_id = ?");
    $update->bind_param("s", $device_id);

    if (!$update->execute()) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to update QR verified: " . $update->error
        ]);
        $update->close();
        $conn->close();
        exit;
    }

    $update->close();

    // Return updated device info
    $stmt = $conn->prepare("SELECT device_id, device_model, owner_email, qr_verified FROM devices WHERE device_id = ?");
    $stmt->bind_param("s", $device_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $updatedDevice = $res->fetch_assoc();
    $stmt->close();
    $conn->close();

    echo json_encode([
        "status" => "valid_device",
        "message" => "Device QR verified successfully and locked.",
        "data" => $updatedDevice
    ]);
    exit;
}

// === UNKNOWN QR TYPE ===
else {
    echo json_encode(["status" => "error", "message" => "Unrecognized QR type"]);
    exit;
}
?>
