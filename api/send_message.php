<?php
header('Content-Type: application/json');
require_once '../config/config.php'; // ✅ existing DB connection

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit;
}

// Read POST data
$sender   = $_POST['sender']   ?? '';
$receiver = $_POST['receiver'] ?? '';
$message  = $_POST['message']  ?? '';

if (empty($sender) || empty($receiver) || empty($message)) {
    echo json_encode(["status" => "error", "message" => "Missing required fields."]);
    exit;
}

// Prepare and insert message
$stmt = $conn->prepare("INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $sender, $receiver, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message sent successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
}

$stmt->close();
$conn->close();
?>
