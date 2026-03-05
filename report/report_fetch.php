<?php
include("../config/database.php");

// Get filters
$vehicle_ids = isset($_POST['vehicle_ids']) ? $_POST['vehicle_ids'] : [];
$route_ids   = isset($_POST['route_ids']) ? $_POST['route_ids'] : [];
$driver      = isset($_POST['driver']) ? $_POST['driver'] : '';

// Build WHERE clauses
$where = "WHERE 1 ";

if(!empty($vehicle_ids)){
    $vehicle_ids = implode(",", array_map('intval',$vehicle_ids));
    $where .= " AND v.id IN ($vehicle_ids)";
}

if(!empty($route_ids)){
    $route_ids = implode(",", array_map('intval',$route_ids));
    $where .= " AND FIND_IN_SET($route_ids, v.route_ids)";
}

if(!empty($driver)){
    $driver = mysqli_real_escape_string($conn, $driver);
    $where .= " AND v.driver_name LIKE '%$driver%'";
}

// Fetch vehicles
$sql = "SELECT v.id, v.vehicle_name, v.driver_name, v.route_ids
        FROM vehicles v $where
        ORDER BY v.id DESC";

$res = mysqli_query($conn, $sql);

$i = 1;
while($row = mysqli_fetch_assoc($res)){

    // Get route names
    $route_names = [];
    if($row['route_ids']){
        $ids = explode(",",$row['route_ids']);
        $q = mysqli_query($conn,"SELECT route_name FROM routes WHERE id IN (".implode(",",$ids).")");
        while($r=mysqli_fetch_assoc($q)){
            $route_names[] = $r['route_name'];
        }
    }

    // Get pickup points from route_pickups
    $pickup_names = [];
    foreach($ids as $rid){
        $q = mysqli_query($conn,"SELECT pickup_id FROM route_pickups WHERE route_id='$rid'");
        while($p=mysqli_fetch_assoc($q)){
            $pids = explode(",",$p['pickup_id']);
            if(!empty($pids)){
                $q2 = mysqli_query($conn,"SELECT pickup_point FROM pickup_points WHERE id IN (".implode(",",$pids).")");
                while($pp=mysqli_fetch_assoc($q2)){
                    $pickup_names[] = $pp['pickup_point'];
                }
            }
        }
    }

    echo "<tr>
        <td>{$i}</td>
        <td>{$row['vehicle_name']}</td>
        <td>".implode(", ",$route_names)."</td>
        <td>".implode(", ",$pickup_names)."</td>
        <td>{$row['driver_name']}</td>
    </tr>";

    $i++;
}
