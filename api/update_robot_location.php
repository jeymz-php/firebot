<?php
// update_robot_location.php
header('Content-Type: application/json');
include '../config/config.php'; // include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $device_id = $_POST['device_id'] ?? '';
    $lat = $_POST['latitude'] ?? '';
    $lng = $_POST['longitude'] ?? '';

    if ($device_id && is_numeric($lat) && is_numeric($lng)) {
        // Check if robot exists
        $stmt = $conn->prepare("SELECT id FROM robots WHERE name = ?");
        $stmt->bind_param("s", $device_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update existing robot
            $stmt = $conn->prepare("UPDATE robots SET latitude=?, longitude=?, last_updated=NOW() WHERE name=?");
            $stmt->bind_param("dds", $lat, $lng, $device_id);
            $stmt->execute();
        } else {
            // Insert new robot
            $stmt = $conn->prepare("INSERT INTO robots (name, latitude, longitude) VALUES (?, ?, ?)");
            $stmt->bind_param("sdd", $device_id, $lat, $lng);
            $stmt->execute();
        }
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
