<?php
// Start session (if not already started)
session_start();
session_destroy();

// Check if user is logged in
if (isset($_COOKIE['user_role']) && isset($_COOKIE['user_id'])) {
    // Unset cookies
    setcookie("user_role", "", time() - 3600, "/");
    setcookie("user_id", "", time() - 3600, "/");
    
    // Redirect to login page or any other desired page after logout
    header("Location: ../../index.php");
    exit();
} else {
    // If user is not logged in, redirect to login page
    header("Location: ../../index.php");
    exit();
}
?>