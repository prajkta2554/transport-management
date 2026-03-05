<?php
include('../config/database.php');

if (!isset($_POST['action'])) {
    exit; 
}

$action = $_POST['action'];

if ($action == 'save') {

    $pickup_point = $_POST['pickup_point'];
    $pickup_id    = $_POST['pickup_id'];

    if ($pickup_id == "") {
        mysqli_query($conn, "INSERT INTO pickup_points (pickup_point) VALUES ('$pickup_point')");
    } else {
        mysqli_query($conn, "UPDATE pickup_points SET pickup_point='$pickup_point' WHERE id='$pickup_id'");
    }

    echo "success";
}

if ($action == 'delete') {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM pickup_points WHERE id='$id'");
    echo "deleted";
}
