<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../dashboard/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    <form id="loginForm">

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <input type="hidden" name="login" value="1">

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>
                </div>

                <div class="card-footer text-center">
                    New user?
                    <a href="register.php">Register</a>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
$("#loginForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "auth_action.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(res){
            if(res === "success"){
                window.location.href = "../dashboard/dashboard.php";
            } else if(res === "invalid_mobile"){
                alert("Mobile number not registered");
            } else if(res === "invalid_password"){
                alert("Wrong password");
            } else {
                alert(res);
            }
        }
    });
});
</script>

</body>
</html>
