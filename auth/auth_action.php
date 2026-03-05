<?php
include "../config/database.php";

/*REGISTER*/
session_start();
if (isset($_POST['register'])) {

    $name     = trim($_POST['name']);
    $mobile   = trim($_POST['mobile']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check duplicate mobile
    $check = mysqli_query($conn, "SELECT id FROM users WHERE mobile='$mobile'");
    if (mysqli_num_rows($check) > 0) {
        echo "Mobile number already registered";
        exit;
    }

    mysqli_query($conn, "INSERT INTO users (name, mobile, password)
                         VALUES ('$name', '$mobile', '$password')");

    echo "success";
    exit;
}


/*LOGIN*/
if (isset($_POST['login'])) {

    $mobile   = trim($_POST['mobile']);
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE mobile='$mobile'");
    if (mysqli_num_rows($res) == 0) {
        echo "invalid_mobile";
        exit;
    }

    $user = mysqli_fetch_assoc($res);

    if (!password_verify($password, $user['password'])) {
        echo "invalid_password";
        exit;
    }

    $_SESSION['user_id']   = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    echo "success";
    exit;
}


