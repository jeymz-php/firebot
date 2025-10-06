<?php
session_start();
header('Content-Type: application/json');
include '../config/config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
  echo json_encode(["title" => "Error", "message" => "All fields are required.", "icon" => "error"]);
  exit;
}

$stmt = $conn->prepare("SELECT id, full_name, email, password FROM admin_users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();

  if (password_verify($password, $user['password'])) {
    $_SESSION['admin_id'] = $user['id'];
    $_SESSION['admin_name'] = $user['full_name'];
    $_SESSION['admin_email'] = $user['email'];
    $_SESSION['last_login'] = date("F d, Y g:i A");

    echo json_encode([
      "title" => "Welcome!",
      "message" => "Login successful.",
      "icon" => "success"
    ]);
  } else {
    echo json_encode(["title" => "Error", "message" => "Invalid password.", "icon" => "error"]);
  }
} else {
  echo json_encode(["title" => "Error", "message" => "No account found with that email.", "icon" => "error"]);
}

$stmt->close();
$conn->close();
?>
