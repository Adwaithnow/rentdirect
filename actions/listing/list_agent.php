<?php
include('../common/db.php'); 

// Query to get agent data from the database
$query = "SELECT * FROM agents";  // Assuming your table is named `agents`
$result = mysqli_query($conn, $query);

$agents = [];

while ($row = mysqli_fetch_assoc($result)) {
    $agents[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'image' => $row['agent_image'], // Assuming the image path is stored in the `image` column
        'job_title' => $row['job_title'],
        'company' => $row['company'],
        'nationality' => $row['nationality'],
        'languages' => $row['languages'],
        'contact' => $row['contact'] // Add any contact details (phone, email, etc.)
    ];
}

header('Content-Type: application/json');
echo json_encode($agents);

mysqli_close($conn);
?>
