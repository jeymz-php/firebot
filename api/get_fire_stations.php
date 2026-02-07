<?php
// Use ../ to go up one directory to find config.php
include '../config/config.php'; 

header('Content-Type: application/json');

try {
    $query = "SELECT station_name, address, contact_number, latitude, longitude FROM fire_stations WHERE status = 'Active'";
    $result = mysqli_query($conn, $query);
    
    $stations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $stations[] = $row;
    }
    
    echo json_encode($stations);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>