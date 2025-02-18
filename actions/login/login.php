<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable error display in production
session_start();

// Ensure no output before headers
ob_start();

// Include database connection
try {
    require_once('../common/db.php');
} catch (Exception $e) {
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Database connection error'
    ]);
    exit;
}

// Function to safely escape and validate input
function sanitizeInput($conn, $input) {
    return mysqli_real_escape_string($conn, trim($input));
}

// Function to send JSON response
function sendJsonResponse($data) {
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    sendJsonResponse([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}

// Validate required fields
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    sendJsonResponse([
        'success' => false,
        'message' => 'Email and password are required'
    ]);
}

// Sanitize inputs
$email = sanitizeInput($conn, $_POST['email']);
$password = $_POST['password'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendJsonResponse([
        'success' => false,
        'message' => 'Invalid email format'
    ]);
}

try {
    // Check agents table
    $stmt = $conn->prepare("SELECT id, password FROM agents WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = 'agent';
            setcookie("user_role", 'agent', time() + (86400 * 30), "/"); // 30 days expiration
            setcookie("user_id", $row['id'], time() + (86400 * 30), "/"); // 30 days expiration
            setcookie("email", $_POST['email'], time() + (86400 * 30), "/"); // 30 days expiration
            sendJsonResponse([
                'success' => true,
                'message' => 'Login successful',
                'redirect_url' => 'dashboard/index.php'
            ]);
        }
    }
    
    // Check companies table
    $stmt = $conn->prepare("SELECT id, password FROM companies WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = 'company';
            setcookie("user_role", 'company', time() + (86400 * 30), "/"); // 30 days expiration
            setcookie("user_id", $row['id'], time() + (86400 * 30), "/"); // 30 days expiration
            setcookie("email", $_POST['email'], time() + (86400 * 30), "/"); // 30 days expiration
            sendJsonResponse([
                'success' => true,
                'message' => 'Login successful',
                'redirect_url' => 'dashboard_company.php'
            ]);
        }
    }
    
    // If we get here, no valid user was found
    sendJsonResponse([
        'success' => false,
        'message' => 'Invalid email or password'
    ]);

} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    sendJsonResponse([
        'success' => false,
        'message' => 'An error occurred during login'
    ]);
} finally {
    $stmt->close();
    $conn->close();
}
?>