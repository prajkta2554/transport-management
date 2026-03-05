<?php
include("../config/database.php");

$id = $_POST['id'];
$route_id = $_POST['route_id'];
$pickup = implode(",", $_POST['pickup_id']);

if($id==""){
    mysqli_query($conn,
    "INSERT INTO route_pickups (route_id,pickup_id)
     VALUES ('$route_id','$pickup')");
    echo "Added Successfully";
}else{
    mysqli_query($conn,
    "UPDATE route_pickups
     SET route_id='$route_id', pickup_id='$pickup'
     WHERE id='$id'");
    echo "Updated Successfully";
}
