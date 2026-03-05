<?php 
include("../config/database.php");
include '../includes/header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Routes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Routes</h3>

<button class="btn btn-primary mb-3" id="addRouteBtn">Add Route</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Route</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="routeTable"></tbody>
</table>

<!-- MODAL -->
<div class="modal fade" id="routeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="routeForm">
        <div class="modal-header">
          <h5 class="modal-title">Add Route</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" name="route_id" id="route_id">
            <label>Route Name</label>
            <input type="text" name="route_name" id="route_name" class="form-control" required>
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
<script src="../assets/js/route.js"></script>

</body>
</html>
