<?php
session_start();
header('Content-Type: application/json');

include('../common/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $company_name = mysqli_real_escape_string($conn, $_POST['companyName']);
    $registration_no = mysqli_real_escape_string($conn, $_POST['compregno']);
    $email = mysqli_real_escape_string($conn, $_POST['exampleInputEmail']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // Server-side validation
    if (empty($company_name) || empty($registration_no) || empty($email) || empty($password) || empty($confirm_password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match!']);
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM companies WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email is already registered!']);
        exit;
    }

    // Hash the password before saving to the database
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Handle logo upload
    if (isset($_FILES['complogo']) && $_FILES['complogo']['error'] == 0) {
        $logo = $_FILES['complogo']['name'];
        $target = "../../uploads/companylogo/" . basename($logo);

        // Move the uploaded file
        if (move_uploaded_file($_FILES['complogo']['tmp_name'], $target)) {
            // Insert data into the database using prepared statements
            $stmt = $conn->prepare("INSERT INTO companies (company_name, company_logo, registration_no, email, password) 
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $company_name, $logo, $registration_no, $email, $password_hash);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Registration successful!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload the logo.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No logo selected or upload failed.']);
    }

    // Close prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>
