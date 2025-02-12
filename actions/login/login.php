<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
header('Content-Type: application/json');  // Set the content type for AJAX response

include('../common/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if the email belongs to an agent
    $sql = "SELECT * FROM agents WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Successful login
            $_SESSION['user_id'] = $row['id'];
            echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect_url' => 'dashboard_agent.php']);
        } else {
            // Invalid password
            echo json_encode(['success' => false, 'message' => 'Invalid password']);
        }
    } else {
        // Check if the email belongs to a company
        $sql = "SELECT * FROM companies WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Successful login
                $_SESSION['user_id'] = $row['id'];
                echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect_url' => 'dashboard_company.php']);
            } else {
                // Invalid password
                echo json_encode(['success' => false, 'message' => 'Invalid password']);
            }
        } else {
            // No user found with this email
            echo json_encode(['success' => false, 'message' => 'No user found with this email']);
        }
    }

    $conn->close();
}
?>
