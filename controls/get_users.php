<?php
header('Content-Type: application/json');
include '../config/config.php';

// If an ID is provided → Fetch one user
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT id, full_name, email, contact_no, address FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'User not found']);
    }

    $stmt->close();
    $conn->close();
    exit; // ✅ stop here to prevent running the "fetch all" part below
}

// Otherwise → Fetch all users for DataTables
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($query);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode(['data' => $users]); // ✅ DataTables expects "data" key

$conn->close();
?>
