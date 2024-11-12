<?php
// index.php

// Start the session at the top of the file
session_start();

// Include the functions.php file where we will define our utility functions
include 'functions.php';

// Check if the user is already logged in and redirect them to the dashboard
if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    exit();
}

// Initialize an array to store error messages
$errors = [];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data from the POST request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the login credentials
    $errors = validateLoginCredentials($email, $password);

    // Check credentials if validation passes
    if (empty($errors) && checkLoginCredentials($email, $password, getUsers())) {
        // Set the session variable if login is successful
        $_SESSION['user_email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        // Add an error if login credentials are invalid
        $errors[] = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>

                <!-- Display errors if there are any, directly below the Login heading -->
                <?php if (!empty($errors)) echo displayErrors($errors); ?>

                <!-- Login Form -->
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
