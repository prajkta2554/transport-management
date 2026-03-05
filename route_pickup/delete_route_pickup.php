<?php
include("../config/database.php");

$id=$_POST['id'];
mysqli_query($conn,"DELETE FROM route_pickups WHERE id='$id'");
echo "Deleted Successfully";
