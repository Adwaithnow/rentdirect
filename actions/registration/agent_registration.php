<?php

session_start();
header('Content-Type: application/json');

include('../common/db.php');

// Validate and sanitize form inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['ownerName']);
    $phone = mysqli_real_escape_string($conn, $_POST['ownerNumber']);
    $email = mysqli_real_escape_string($conn, $_POST['ownerEmail']);
    $civil_id = mysqli_real_escape_string($conn, $_POST['ownerCivilId']);
    $languages_known = mysqli_real_escape_string($conn, $_POST['languagesknown']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Server-side validation
    if (empty($name) || empty($phone) || empty($email) || empty($languages_known) || empty($nationality) || empty($password) || empty($confirm_password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match!']);
        exit;
    }

    // Check if email already exists (prepared statement to prevent SQL injection)
    $stmt = $conn->prepare("SELECT * FROM agents WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email is already registered!']);
        exit;
    }

    // Hash the password before saving to the database
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Handle image upload
    if (isset($_FILES['agentImage']) && $_FILES['agentImage']['error'] == 0) {
        $image = $_FILES['agentImage']['name'];
        $image_tmp_name = $_FILES['agentImage']['tmp_name'];
        $image_size = $_FILES['agentImage']['size'];
        $image_type = $_FILES['agentImage']['type'];
        
        // Allowed image types (You can add more types if needed)
        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        
        // Check if the uploaded file is a valid image type
        if (!in_array($image_type, $allowed_types)) {
            echo json_encode(['success' => false, 'message' => 'Only images (JPEG, PNG, GIF) are allowed.']);
            exit;
        }

        // Define the target directory and file path
        $upload_dir = "../../uploads/agents/";
        $target = $upload_dir . basename($image);

        // Check if the image is too large (e.g., 5MB max)
        if ($image_size > 5 * 1024 * 1024) {
            echo json_encode(['success' => false, 'message' => 'File size exceeds the limit of 5MB.']);
            exit;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image_tmp_name, $target)) {
            // Insert data into the database using a prepared statement
            $stmt = $conn->prepare("INSERT INTO agents (name, phone, email, civil_id, languages_known, agent_image, nationality, password) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $name, $phone, $email, $civil_id, $languages_known, $image, $nationality, $password_hash);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Registration successful!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error while registering agent: ' . $stmt->error]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload the image.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No image selected or image upload failed.']);
    }

    // Close the prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>
