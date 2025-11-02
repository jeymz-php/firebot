<?php
header('Content-Type: application/json');
include '../config/config.php';
session_start();

$thread_id = intval($_POST['thread_id']);
$message = trim($_POST['message']);

if (!$thread_id || !$message) {
  echo json_encode(['success' => false, 'error' => 'Invalid input']);
  exit;
}

$stmt = $conn->prepare("INSERT INTO message_replies (thread_id, sender, message) VALUES (?, 'admin', ?)");
$stmt->bind_param("is", $thread_id, $message);

if ($stmt->execute()) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}

$stmt->close();
$conn->close();
