<?php
// Start the session
session_start();

// Include the functions file to use session management and other helper functions
include('functions.php');

// Check if the user is logged in by verifying the session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// User email is stored in the session after successful login
$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Welcome message with the logged-in user's email -->
        <h1 class="text-center mb-4">Welcome to the System: <?php echo htmlspecialchars($user_email); ?></h1>

        <div class="row">
            <!-- Add Subject Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Add a Subject</div>
                    <div class="card-body">
                        <p class="card-text">This section allows you to add a new subject in the system. Click the button below to proceed with the adding process.</p>
                        <a href="subject/add.php" class="btn btn-primary btn-block">Add Subject</a>
                    </div>
                </div>
            </div>

            <!-- Register Student Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Register a Student</div>
                    <div class="card-body">
                        <p class="card-text">This section allows you to register a new student in the system. Click the button below to proceed with the registration process.</p>
                        <a href="student/register.php" class="btn btn-primary btn-block">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="text-right">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
