<?php
include("../config/database.php");

// UPLOAD PATH
$upload_dir = "../uploads/";

$vehicle_id = $_POST['vehicle_id'];
$vehicle_name = $_POST['vehicle_name'];
$route_ids = implode(",", $_POST['route_ids']);
$driver_name = $_POST['driver_name'];

// IMAGE UPLOAD
$vehicle_image = '';
if(isset($_FILES['vehicle_image']) && $_FILES['vehicle_image']['name'] != ''){
    $filename = time() . "_" . $_FILES['vehicle_image']['name'];
    move_uploaded_file($_FILES['vehicle_image']['tmp_name'], $upload_dir.$filename);
    $vehicle_image = $filename;
}

if($vehicle_id == ''){
    // ADD
    $sql = "INSERT INTO vehicles (vehicle_name, route_ids, driver_name, vehicle_image)
            VALUES ('$vehicle_name','$route_ids','$driver_name','$vehicle_image')";
    echo mysqli_query($conn,$sql) ? 1 : 0;
}else{
    // EDIT
    if($vehicle_image != ''){
        $sql = "UPDATE vehicles SET vehicle_name='$vehicle_name', route_ids='$route_ids', driver_name='$driver_name', vehicle_image='$vehicle_image' WHERE id='$vehicle_id'";
    }else{
        $sql = "UPDATE vehicles SET vehicle_name='$vehicle_name', route_ids='$route_ids', driver_name='$driver_name' WHERE id='$vehicle_id'";
    }
    echo mysqli_query($conn,$sql) ? 1 : 0;
}
