<?php 
include('../config/database.php'); 
include '../includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pickup Points</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Pickup Point Management</h3>

<form id="pickupForm">
    <input type="hidden" name="pickup_id" id="pickup_id">

    <div class="mb-2">
        <label>Pickup Point</label>
        <input type="text" name="pickup_point" id="pickup_point" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save Pickup Point</button>
</form>

<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Pickup Point</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="pickupTable">
        <?php
        $i = 1;
        $result = mysqli_query($conn, "SELECT * FROM pickup_points ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['pickup_point'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <button class="btn btn-sm btn-warning editBtn" data-id="<?= $row['id'] ?>">Edit</button>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="<?= $row['id'] ?>">Delete</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../assets/js/pickup.js"></script>


</body>
</html>
