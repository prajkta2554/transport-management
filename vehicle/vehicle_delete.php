<?php
include("../config/database.php");

$id = $_POST['id'];
mysqli_query($conn,"DELETE FROM vehicles WHERE id='$id'");
echo 1;
