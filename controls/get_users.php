<?php
header('Content-Type: application/json');
include '../config/config.php';

$sql = "SELECT id, full_name, email, contact_no, address, created_at FROM users ORDER BY id DESC";
$result = $conn->query($sql);

$users = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

echo json_encode($users);
$conn->close();
exit;
?>
