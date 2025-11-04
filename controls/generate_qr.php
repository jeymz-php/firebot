<?php
require_once '../config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

/* ============================================================
   🔹 CASE 1: Request from ESP32 (Device Registration)
   ============================================================ */
if (isset($_POST['device_id']) && isset($_POST['device_model'])) {
    $device_id = trim($_POST['device_id']);
    $device_model = trim($_POST['device_model']);

    if (empty($device_id) || empty($device_model)) {
        echo json_encode(["status" => "error", "message" => "Missing device parameters"]);
        exit;
    }

    // Check if device already exists
    $check = $conn->prepare("SELECT * FROM devices WHERE device_id = ?");
    $check->bind_param("s", $device_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "exists", "message" => "Device already registered"]);
        exit;
    }

    // Insert new device (no owner yet)
    $stmt = $conn->prepare("INSERT INTO devices (device_id, device_model) VALUES (?, ?)");
    $stmt->bind_param("ss", $device_id, $device_model);

    if ($stmt->execute()) {
        $qrData = "FireBOT_Device\nID:$device_id\nModel:$device_model";
        echo json_encode(["status" => "success", "qr_data" => $qrData]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $stmt->close();
    $check->close();
    $conn->close();
    exit;
}

/* ============================================================
   🔹 CASE 2: Request from Admin Panel (User QR Creation)
   ============================================================ */
if (isset($_POST['fullname'], $_POST['email'], $_POST['contact'], $_POST['address'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);

    if (empty($fullname) || empty($email) || empty($contact) || empty($address)) {
        echo json_encode(["status" => "error", "message" => "Missing user information"]);
        exit;
    }

    // Check for duplicate email
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(["status" => "exists", "message" => "Email already registered"]);
        exit;
    }

    // Fetch the latest unassigned device (no owner)
    $deviceQuery = $conn->query("SELECT device_id, device_model FROM devices WHERE owner_email IS NULL ORDER BY id DESC LIMIT 1");
    $device = $deviceQuery->fetch_assoc();

    if (!$device) {
        echo json_encode(["status" => "error", "message" => "No available unassigned devices"]);
        exit;
    }

    $device_id = $device['device_id'];
    $device_model = $device['device_model'];

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, contact_no, address, device_id, device_model) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fullname, $email, $contact, $address, $device_id, $device_model);

    if ($stmt->execute()) {
        // Update the device owner
        $updateOwner = $conn->prepare("UPDATE devices SET owner_email = ? WHERE device_id = ?");
        $updateOwner->bind_param("ss", $email, $device_id);
        $updateOwner->execute();

        // Build QR content
        $qrData = "FireBOT_User\n";
        $qrData .= "Name: $fullname\n";
        $qrData .= "Email: $email\n";
        $qrData .= "Contact: $contact\n";
        $qrData .= "Address: $address\n";
        $qrData .= "Device ID: $device_id\n";
        $qrData .= "Device Model: $device_model";
        $filename = str_replace(' ', '_', strtolower($fullname)) . '_qr.png';

        echo json_encode([
            "status" => "success",
            "qrData" => $qrData,
            "filename" => $filename
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $stmt->close();
    $check->close();
    $conn->close();
    exit;
}

echo json_encode(["status" => "error", "message" => "Invalid parameters"]);
?>
