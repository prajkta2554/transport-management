<?php
include("../config/database.php");

$q = mysqli_query($conn, "SELECT * FROM routes ORDER BY id DESC");
$i = 1;

while($row = mysqli_fetch_assoc($q)){
    echo "<tr>
        <td>{$i}</td>
        <td>{$row['route_name']}</td>
        <td>{$row['created_at']}</td>
        <td>
            <button 
              class='btn btn-warning btn-sm editBtn'
              data-id='{$row['id']}'
              data-route='{$row['route_name']}'>
              Edit
            </button>
            <button 
              class='btn btn-danger btn-sm deleteBtn'
              data-id='{$row['id']}'>
              Delete
            </button>
        </td>
    </tr>";
    $i++;
}
