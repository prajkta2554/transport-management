<?php
include("../config/database.php");

$q = mysqli_query($conn,"SELECT v.*, GROUP_CONCAT(r.route_name SEPARATOR ', ') AS routes
                        FROM vehicles v
                        LEFT JOIN routes r ON FIND_IN_SET(r.id, v.route_ids)
                        GROUP BY v.id
                        ORDER BY v.id DESC");

$i = 1;
while($row = mysqli_fetch_assoc($q)){
    $img = $row['vehicle_image'] ? "<img src='../uploads/{$row['vehicle_image']}' width='50'>" : '';
    echo "<tr>
        <td>{$i}</td>
        <td>{$row['vehicle_name']}</td>
        <td>{$row['routes']}</td>
        <td>{$row['driver_name']}</td>
        <td>{$img}</td>
        <td>
            <button class='btn btn-warning btn-sm editBtn' 
                    data-id='{$row['id']}' 
                    data-name='{$row['vehicle_name']}'
                    data-routes='{$row['route_ids']}'
                    data-driver='{$row['driver_name']}'
                    data-image='{$row['vehicle_image']}'>
                Edit
            </button>
            <button class='btn btn-danger btn-sm deleteBtn' data-id='{$row['id']}'>Delete</button>
        </td>
    </tr>";
    $i++;
}
