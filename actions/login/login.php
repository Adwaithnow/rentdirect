<?php
session_start();
include('../common/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for agent first
    $sql = "SELECT * FROM agents WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard_agent.php");
        } else {
            echo "Invalid password";
        }
    } else {
        $sql = "SELECT * FROM companies WHERE email = '$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                header("Location: dashboard_company.php");
            } else {
                echo "Invalid password";
            }
        } else {
            echo "No user found with this email";
        }
    }
}

$conn->close();
?>
