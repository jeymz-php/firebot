<?php
header('Content-Type: application/json');
include '../config/config.php';

$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$full_name || !$email || !$password) {
  echo json_encode(["title" => "Error", "message" => "All fields are required.", "icon" => "error"]);
  exit;
}

$hashed = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO admin_users (full_name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $full_name, $email, $hashed);

if ($stmt->execute()) {
  echo json_encode(["title" => "Success", "message" => "Account created successfully!", "icon" => "success"]);
} else {
  echo json_encode(["title" => "Error", "message" => "Email already exists.", "icon" => "error"]);
}
$stmt->close();
$conn->close();
?>
