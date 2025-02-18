<?php
// PropertyController.php

class PropertyController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Display property creation form
    public function create() {
        require_once 'views/property/create.php';
    }

    // Handle property creation
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and sanitize input
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $propertyType = filter_input(INPUT_POST, 'propertyType', FILTER_SANITIZE_STRING);
            $propertySubCategory = filter_input(INPUT_POST, 'propertySubCategory', FILTER_SANITIZE_STRING);
            $propertyStatus = filter_input(INPUT_POST, 'propertyStatus', FILTER_SANITIZE_STRING);
            $governorate = filter_input(INPUT_POST, 'governorate', FILTER_SANITIZE_STRING);
            $block = filter_input(INPUT_POST, 'block', FILTER_SANITIZE_STRING);
            $buildingNumber = filter_input(INPUT_POST, 'buildingNumber', FILTER_SANITIZE_STRING);
            $propertyName = filter_input(INPUT_POST, 'propertyName', FILTER_SANITIZE_STRING);
            $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
            $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
            $paciNumber = filter_input(INPUT_POST, 'paciNumber', FILTER_SANITIZE_STRING);

            try {
                $stmt = $this->db->prepare("
                    INSERT INTO properties (
                        title, description, property_type, property_sub_category,
                        property_status, governorate, block, building_number,
                        property_name, area, street, paci_number
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ");

                $stmt->execute([
                    $title, $description, $propertyType, $propertySubCategory,
                    $propertyStatus, $governorate, $block, $buildingNumber,
                    $propertyName, $area, $street, $paciNumber
                ]);

                $propertyId = $this->db->lastInsertId();
                header("Location: listing_info.php?id=" . $propertyId);
                exit;
            } catch (PDOException $e) {
                // Log error and show user-friendly message
                error_log($e->getMessage());
                $_SESSION['error'] = "Failed to create property. Please try again.";
                header("Location: create.php");
                exit;
            }
        }
    }

    // Display listing info form
    public function listingInfo($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM properties WHERE id = ?");
            $stmt->execute([$id]);
            $property = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$property) {
                header("HTTP/1.0 404 Not Found");
                exit("Property not found");
            }

            require_once 'views/property/listing_info.php';
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Failed to load property details.";
            header("Location: index.php");
            exit;
        }
    }

    // Update listing info
    public function updateListingInfo($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bedrooms = filter_input(INPUT_POST, 'bedrooms', FILTER_VALIDATE_INT);
            $bathrooms = filter_input(INPUT_POST, 'bathrooms', FILTER_VALIDATE_INT);
            $kitchens = filter_input(INPUT_POST, 'kitchens', FILTER_VALIDATE_INT);
            $size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_FLOAT);
            $furnishingStatus = filter_input(INPUT_POST, 'furnishingStatus', FILTER_SANITIZE_STRING);
            $parkingType = filter_input(INPUT_POST, 'parkingType', FILTER_SANITIZE_STRING);
            $petFriendly = isset($_POST['petFriendly']) ? 1 : 0;
            $specify = filter_input(INPUT_POST, 'specify', FILTER_SANITIZE_STRING);
            $rentalPrice = filter_input(INPUT_POST, 'rentalPrice', FILTER_VALIDATE_FLOAT);
            $securityDeposit = filter_input(INPUT_POST, 'securityDeposit', FILTER_VALIDATE_FLOAT);
            $realtorFee = filter_input(INPUT_POST, 'realtorFee', FILTER_VALIDATE_FLOAT);
            $amenities = isset($_POST['amenities']) ? json_encode($_POST['amenities']) : null;
            $monthlyRentIncludes = isset($_POST['monthlyRentIncludes']) ? json_encode($_POST['monthlyRentIncludes']) : null;

            try {
                $stmt = $this->db->prepare("
                    UPDATE properties SET 
                        bedrooms = ?, bathrooms = ?, kitchens = ?, size = ?,
                        furnishing_status = ?, parking_type = ?, pet_friendly = ?,
                        specify = ?, rental_price = ?, security_deposit = ?,
                        realtor_fee = ?, amenities = ?, monthly_rent_includes = ?
                    WHERE id = ?
                ");

                $stmt->execute([
                    $bedrooms, $bathrooms, $kitchens, $size,
                    $furnishingStatus, $parkingType, $petFriendly,
                    $specify, $rentalPrice, $securityDeposit,
                    $realtorFee, $amenities, $monthlyRentIncludes,
                    $id
                ]);

                header("Location: add_images.php?id=" . $id);
                exit;
            } catch (PDOException $e) {
                error_log($e->getMessage());
                $_SESSION['error'] = "Failed to update property details.";
                header("Location: listing_info.php?id=" . $id);
                exit;
            }
        }
    }

    // Handle image uploads
    public function addImages($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['declaration']) || $_POST['declaration'] !== '1') {
                $_SESSION['error'] = "You must accept the declaration.";
                header("Location: add_images.php?id=" . $id);
                exit;
            }

            try {
                // Handle multiple image uploads
                $imageUrls = [];
                if (isset($_FILES['images'])) {
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                        $imageUrl = $this->saveFile($_FILES['images']['name'][$key], $tmp_name, 'images');
                        if ($imageUrl) {
                            $imageUrls[] = $imageUrl;
                        }
                    }
                }

                // Handle video upload
                $videoUrl = null;
                if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
                    $videoUrl = $this->saveFile($_FILES['video']['name'], $_FILES['video']['tmp_name'], 'videos');
                }

                // Handle floor plans
                $floorPlanUrls = [];
                if (isset($_FILES['floorPlans'])) {
                    foreach ($_FILES['floorPlans']['tmp_name'] as $key => $tmp_name) {
                        $floorPlanUrl = $this->saveFile($_FILES['floorPlans']['name'][$key], $tmp_name, 'floorplans');
                        if ($floorPlanUrl) {
                            $floorPlanUrls[] = $floorPlanUrl;
                        }
                    }
                }

                // Save URLs to database
                $stmt = $this->db->prepare("
                    UPDATE properties SET 
                        image_urls = ?,
                        video_url = ?,
                        floor_plan_urls = ?,
                        reality_360_url = ?,
                        is_declaration_accepted = 1
                    WHERE id = ?
                ");

                $stmt->execute([
                    json_encode($imageUrls),
                    $videoUrl,
                    json_encode($floorPlanUrls),
                    $_POST['reality360Link'] ?? null,
                    $id
                ]);

                header("Location: index.php");
                exit;
            } catch (Exception $e) {
                error_log($e->getMessage());
                $_SESSION['error'] = "Failed to upload files.";
                header("Location: add_images.php?id=" . $id);
                exit;
            }
        }
    }

    // Helper function to save files
    private function saveFile($filename, $tmpName, $subDirectory) {
        $uploadDir = 'uploads/' . $subDirectory . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = uniqid() . '_' . basename($filename);
        $targetPath = $uploadDir . $filename;

        if (move_uploaded_file($tmpName, $targetPath)) {
            return '/' . $targetPath;
        }

        return null;
    }
}
?>