<?php
// Go one level up from 'api' folder to find config.php
include '../config/config.php';

header('Content-Type: application/json');

// Check if $conn was actually initialized in config.php
if (!isset($conn)) {
    echo json_encode(["error" => "Database connection variable not found. Check your config.php path."]);
    exit;
}

try {
    $query = "SELECT barangay_name, address, phone, latitude, longitude FROM barangays";
    $result = mysqli_query($conn, $query);
    
    $barangays = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $barangays[] = $row;
        }
    }
    
    echo json_encode($barangays);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>