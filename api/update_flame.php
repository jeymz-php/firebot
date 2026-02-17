<?php
include '../config/config.php';

if (isset($_GET['f']) && isset($_GET['l']) && isset($_GET['r'])) {
    $f = intval($_GET['f']);
    $l = intval($_GET['l']);
    $r = intval($_GET['r']);

    // Update the record with ID 1
    $query = "UPDATE flame_status SET front = $f, left_side = $l, right_side = $r WHERE id = 1";
    mysqli_query($conn, $query);
    echo "OK";
}
?>