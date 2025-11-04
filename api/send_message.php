<?php
header('Content-Type: application/json');
require_once '../config/config.php';

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit;
}

$thread_id = $_POST['thread_id'] ?? '';
$sender = $_POST['sender'] ?? 'User';
$message = $_POST['message'] ?? '';

if (empty($thread_id) || empty($sender) || empty($message)) {
    echo json_encode(["status" => "error", "message" => "Missing required fields."]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO message_replies (thread_id, sender, message, sent_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("iss", $thread_id, $sender, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message sent successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
}

$stmt->close();
$conn->close();
?>
