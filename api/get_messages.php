<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$thread_id = $_GET['thread_id'] ?? '';

if (empty($thread_id)) {
    echo json_encode(["status" => "error", "message" => "Missing thread_id"]);
    exit;
}

$stmt = $conn->prepare("
    SELECT sender, message, sent_at 
    FROM message_replies 
    WHERE thread_id = ? 
    ORDER BY sent_at ASC
");
$stmt->bind_param("i", $thread_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode(["status" => "success", "data" => $messages]);

$stmt->close();
$conn->close();
?>
