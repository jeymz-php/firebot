<?php
require_once '../config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

if (isset($_POST['fullname'], $_POST['email'], $_POST['device_id'], $_POST['device_model'])) {
    
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $device_id = trim($_POST['device_id']);
    $device_model = trim($_POST['device_model']);

    // 1. Double check uniqueness
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    if ($check->get_result()->num_rows > 0) {
        echo json_encode(["status" => "exists", "message" => "User Email already registered!"]);
        exit;
    }

    // 2. Insert into Devices Table
    $stmtDev = $conn->prepare("INSERT INTO devices (device_id, device_model, owner_email) VALUES (?, ?, ?)");
    $stmtDev->bind_param("sss", $device_id, $device_model, $email);
    $stmtDev->execute();

    // 3. Insert into Users Table
    $stmtUser = $conn->prepare("INSERT INTO users (full_name, email, contact_no, address, device_id, device_model) VALUES (?, ?, ?, ?, ?, ?)");
    $stmtUser->bind_param("ssssss", $fullname, $email, $contact, $address, $device_id, $device_model);

    if ($stmtUser->execute()) {
        // 4. Create the final QR String for the Mobile App
        $qrData = "FireBOT_Auth\n";
        $qrData .= "Name:$fullname\n";
        $qrData .= "Email:$email\n";
        $qrData .= "DeviceID:$device_id\n";
        $qrData .= "Model:$device_model";

        echo json_encode([
            "status" => "success",
            "qrData" => $qrData
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $stmtUser->close();
    $conn->close();
    exit;
}
?>