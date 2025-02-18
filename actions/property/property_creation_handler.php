<?php
// Include database connection
require_once '../common/db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1); // Disable error display in production
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $propertyType = $_POST['propertyType'] ?? null;
    $propertySubType = $_POST['propertySubType'] ?? null;
    $propertyStatus = null;
    
    // Determine property status based on option value
    if (isset($_POST['option'])) {
        switch ($_POST['option']) {
            case '1':
                $propertyStatus = 'Rent';
                break;
            case '2':
                $propertyStatus = 'Sale';
                break;
            case '3':
                $propertyStatus = 'Holiday';
                break;
        }
    }
    $userId=$_COOKIE['user_id'];
    $userRole=$_COOKIE['user_role'];
    // Create title from form data
    $title = "A " . $propertyType . " " . $propertySubType . " in " . ($_POST['governorate'] ?? '');

    // Prepare SQL statement
    $sql = "INSERT INTO properties (
        title,
        description,
        property_type,
        property_sub_category,
        property_status,
        governorate,
        block,
        building_number,
        property_name,
        area,
        street,
        paci_number,
        userid,
        userrole
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssssssssss", 
            $title,
            $_POST['description'],
            $propertyType,
            $propertySubType,
            $propertyStatus,
            $_POST['governorate'],
            $_POST['block'],
            $_POST['building-no'],
            $_POST['property-name'],
            $_POST['area'],
            $_POST['street'],
            $_POST['pacinumber'],
            $userId,
            $userRole
        );

        // Execute the statement
        if ($stmt->execute()) {
            // Get the ID of the inserted property
            $propertyId = $conn->insert_id;

            // Redirect based on property status
            $redirectUrl = '';
            switch ($propertyStatus) {
                case 'Rent':
                    $redirectUrl = "postproperty.html?id=" . $propertyId;
                    break;
                case 'Sale':
                    $redirectUrl = "listinginfo.html?id=" . $propertyId;
                    break;
                case 'Holiday':
                    $redirectUrl = "demo8.html?id=" . $propertyId;
                    break;
                default:
                    $redirectUrl = "index.html";
            }

            header("Location: " . $redirectUrl);
            exit();
        } else {
            error_log("Execute Error: " . $stmt->error);
            echo "An error occurred while saving the property. Please try again later.";
        }

        $stmt->close();
    } else {
        error_log("Prepare Error: " . $conn->error);
        echo "An error occurred while preparing the query. Please try again later.";
    }
} else {
    // If not POST request, redirect to the form page
    header("Location: index.html");
    exit();
}

// Close connection
$conn->close();
?>