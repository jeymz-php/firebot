<?php
header('Content-Type: application/json');
require_once '../config/config.php';

$result = $conn->query("
    SELECT t.id, t.name, t.email, t.subject,
           (SELECT message FROM message_replies 
            WHERE thread_id = t.id 
            ORDER BY sent_at DESC LIMIT 1) AS last_message,
           (SELECT DATE_FORMAT(sent_at, '%b %d %I:%M %p') 
            FROM message_replies 
            WHERE thread_id = t.id 
            ORDER BY sent_at DESC LIMIT 1) AS updated_at
    FROM message_threads t
    ORDER BY t.created_at DESC
");

$threads = [];
while ($row = $result->fetch_assoc()) {
    $threads[] = $row;
}

echo json_encode(["status" => "success", "data" => $threads]);
