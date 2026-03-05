<?php
include('../config/database.php');

$id = $_POST['id'];

$result = mysqli_query($conn, "SELECT * FROM pickup_points WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

echo json_encode($row);
