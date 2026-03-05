<?php
// Include database connection
include "../config/database.php";
include "../includes/auth_check.php";
include "../includes/header.php";


// Get vehicle count
$vehicle = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM vehicles"))[0];

// Get route count
$route = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM routes"))[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center p-4">
                <h3>Vehicles</h3>
                <p class="fs-2"><?= $vehicle ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center p-4">
                <h3>Routes</h3>
                <p class="fs-2"><?= $route ?></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
