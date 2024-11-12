<?php
// logout.php

// Start the session
session_start();

// Destroy the session and clear all session data
session_unset();
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit();
?>
