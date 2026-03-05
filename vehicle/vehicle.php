<?php 
include("../config/database.php");
include '../includes/header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Vehicles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Vehicles</h3>

<button class="btn btn-primary mb-3" id="addVehicleBtn">Add Vehicle</button>

<table class="table table-bordered">
<thead>
<tr>
    <th>S.No</th>
    <th>Vehicle Name</th>
    <th>Routes</th>
    <th>Driver Name</th>
    <th>Vehicle Image</th>
    <th>Action</th>
</tr>
</thead>
<tbody id="vehicleTable"></tbody>
</table>

<!-- MODAL -->
<div class="modal fade" id="vehicleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="vehicleForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Add Vehicle</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" name="vehicle_id" id="vehicle_id">

            <label>Vehicle Name</label>
            <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" required>

            <label>Routes</label>
            <select name="route_ids[]" id="route_ids" class="form-control" multiple required>
                <?php
                $routes = mysqli_query($conn,"SELECT * FROM routes");
                while($r=mysqli_fetch_assoc($routes)){
                    echo "<option value='{$r['id']}'>{$r['route_name']}</option>";
                }
                ?>
            </select>

            <label>Driver Name</label>
            <input type="text" name="driver_name" id="driver_name" class="form-control" required>

            <label>Vehicle Image</label>
            <input type="file" name="vehicle_image" id="vehicle_image" class="form-control">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/vehicle.js"></script>

</body>
</html>
