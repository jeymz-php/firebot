<?php
header('Content-Type: application/json');
include '../config/config.php';

$id = intval($_GET['id']);

$threadQuery = $conn->prepare("SELECT * FROM message_threads WHERE id = ?");
$threadQuery->bind_param("i", $id);
$threadQuery->execute();
$threadResult = $threadQuery->get_result();
$thread = $threadResult->fetch_assoc();

$messagesQuery = $conn->prepare("SELECT sender, message, DATE_FORMAT(sent_at, '%b %d %I:%M %p') AS time FROM message_replies WHERE thread_id = ? ORDER BY sent_at ASC");
$messagesQuery->bind_param("i", $id);
$messagesQuery->execute();
$msgResult = $messagesQuery->get_result();

$messages = [];
while ($row = $msgResult->fetch_assoc()) {
  $messages[] = $row;
}

echo json_encode(['thread' => $thread, 'messages' => $messages]);
