<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transport Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .nav-container {
            padding: 10px 0;
        }
    </style>
</head>
<body class="p-3">

<div class="container">
    <div class="nav-container mb-3">
        <a href="../dashboard/dashboard.php" class="btn btn-outline-primary btn-sm">Dashboard</a>
        <a href="../routes/route.php" class="btn btn-outline-primary btn-sm">Routes</a>
        <a href="../pickup/pickup.php" class="btn btn-outline-primary btn-sm">Pickup</a>
        <a href="../route_pickup/route_pickup.php" class="btn btn-outline-primary btn-sm">Route Pickup</a>
        <a href="../vehicle/vehicle.php" class="btn btn-outline-primary btn-sm">Vehicle</a>
        <a href="../report/report.php" class="btn btn-outline-primary btn-sm">Report</a>
        <a href="../logout.php" class="btn btn-danger btn-sm float-end">Logout</a>
    </div>
    <hr>
</div>
