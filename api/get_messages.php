<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$sender = $_GET['sender'] ?? '';
$receiver = $_GET['receiver'] ?? '';

if ($sender && $receiver) {
    $stmt = $conn->prepare("
        SELECT sender, receiver, message, timestamp
        FROM messages
        WHERE (sender = ? AND receiver = ?)
           OR (sender = ? AND receiver = ?)
        ORDER BY timestamp ASC
    ");
    $stmt->bind_param("ssss", $sender, $receiver, $receiver, $sender);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode(["status" => "success", "data" => $messages]);
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing sender or receiver"]);
}

$conn->close();
?>
