<?php 
include("../config/database.php");
include '../includes/header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3>Vehicle Report</h3>

<div class="row mb-3">
    <div class="col-md-4">
        <label>Vehicle</label>
        <select id="vehicle_filter" class="form-control" multiple>
            <?php
            $vehicles = mysqli_query($conn,"SELECT * FROM vehicles");
            while($v = mysqli_fetch_assoc($vehicles)){
                echo "<option value='{$v['id']}'>{$v['vehicle_name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <label>Routes</label>
        <select id="route_filter" class="form-control" multiple>
            <?php
            $routes = mysqli_query($conn,"SELECT * FROM routes");
            while($r = mysqli_fetch_assoc($routes)){
                echo "<option value='{$r['id']}'>{$r['route_name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <label>Driver Name</label>
        <input type="text" id="driver_filter" class="form-control" placeholder="Search Driver">
    </div>
</div>

<button id="filterBtn" class="btn btn-primary mb-3">Filter</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Vehicle Name</th>
            <th>Routes</th>
            <th>Pickup Points</th>
            <th>Driver Name</th>
        </tr>
    </thead>
    <tbody id="reportTable"></tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../assets/js/report.js"></script>
</body>
</html>
