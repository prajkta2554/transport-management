<?php
include("../config/database.php");

// ADD + EDIT
if(isset($_POST['route_name'])){
    $route_name = $_POST['route_name'];
    $route_id   = $_POST['route_id'];

    if($route_id == ''){
        // ADD
        $sql = "INSERT INTO routes (route_name) VALUES ('$route_name')";
        echo mysqli_query($conn,$sql) ? 1 : 0;
    }else{
        // EDIT
        $sql = "UPDATE routes SET route_name='$route_name' WHERE id='$route_id'";
        echo mysqli_query($conn,$sql) ? 1 : 0;
    }
    exit;
}

// DELETE
if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM routes WHERE id='$id'";
    echo mysqli_query($conn,$sql) ? 1 : 0;
    exit;
}

echo 0;
