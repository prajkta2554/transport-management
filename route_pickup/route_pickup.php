<?php 
include("../config/database.php");
include '../includes/header.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Route Pickup Merge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h3>Route & Pickup Point Merge</h3>

<form id="mergeForm">
    <input type="hidden" name="id" id="id">

    <div class="mb-2">
        <label>Route</label>
        <select name="route_id" id="route_id" class="form-control" required>
            <option value="">Select Route</option>
            <?php
            $routes = mysqli_query($conn,"SELECT * FROM routes");
            while($r=mysqli_fetch_assoc($routes)){
                echo "<option value='{$r['id']}'>{$r['route_name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-2">
        <label>Pickup Points</label>
        <select name="pickup_id[]" id="pickup_id" class="form-control" multiple required>
            <?php
            $pickups = mysqli_query($conn,"SELECT * FROM pickup_points");
            while($p=mysqli_fetch_assoc($pickups)){
                echo "<option value='{$p['id']}'>{$p['pickup_point']}</option>";
            }
            ?>
        </select>
    </div>

    <button class="btn btn-primary">Save</button>
</form>

<hr>

<table class="table table-bordered">
<thead>
<tr>
    <th>S.No</th>
    <th>Route</th>
    <th>Pickup Points</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
$sql="
SELECT 
 rp.id,
 rp.route_id,
 rp.pickup_id,
 r.route_name,
 GROUP_CONCAT(p.pickup_point SEPARATOR ', ') AS pickup_points
FROM route_pickups rp
JOIN routes r ON r.id=rp.route_id
JOIN pickup_points p ON FIND_IN_SET(p.id,rp.pickup_id)
GROUP BY rp.id
";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($res)){
?>
<tr>
<td><?= $i++ ?></td>
<td><?= $row['route_name'] ?></td>
<td><?= $row['pickup_points'] ?></td>
<td>
<button 
 class="btn btn-warning btn-sm editBtn"
 data-id="<?= $row['id'] ?>"
 data-route="<?= $row['route_id'] ?>"
 data-pickups="<?= $row['pickup_id'] ?>">
 Edit
</button>

<button 
 class="btn btn-danger btn-sm deleteBtn"
 data-id="<?= $row['id'] ?>">
 Delete
</button>
</td>
</tr>
<?php } ?>
</tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../assets/js/route_pickup.js"></script>
</body>
</html>
