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
    <title>Register</title>

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
                    <h4>Register</h4>
                </div>

                <div class="card-body">
                    <form id="registerForm">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <input type="hidden" name="register" value="1">

                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>
                    </form>
                </div>

                <div class="card-footer text-center">
                    Already have an account?
                    <a href="login.php">Login</a>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
$("#registerForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "auth_action.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(res){
            if(res === "success"){
                alert("Registered successfully");
                window.location.href = "login.php";
            } else {
                alert(res);
            }
        }
    });
});
</script>

</body>
</html>
