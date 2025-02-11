<?php
// db.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'rent_direct');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
