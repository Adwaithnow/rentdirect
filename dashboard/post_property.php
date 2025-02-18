<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Direct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">

</head>

<body>
<!-- index.php -->
<?php include 'views/header.php'; ?>




<form action="../actions/property/property_creation_handler.php" method="post">
<section class="property-section">
            <div class="form-row w-100 text-center">
                <h2 style="margin-left: 325px ;">Provide the details of the property you wish to list</h2>
            </div>
        <div class="form-group mx-sm-3 mb-2 col-12 text-center">
            <br>
            <div id="propertyTypeButtons" class="btn-group" role="group">
                <div class="option-row justify-content-center">
                    <label class="option-item">
                        <input type="radio" name="option" value="1">
                        <img src="../assets/icons/rent2.png" alt="Rent">
                        <span>Rent</span>
                    </label>

                    <label class="option-item">
                        <input type="radio" name="option" value="2">
                        <img src="../assets/icons/sale.png" alt="sell">
                        <span>Sale</span>
                    </label>
                    <label class="option-item">
                        <input type="radio" name="option" value="3">
                        <img src="../assets/icons/holiday2.png" alt="Holiday">
                        <span>Holiday</span>
                    </label>

                </div>
            </div>
            <hr class="section-line">
            <br>
        </div>

        <div class="form-group mx-sm-3 mb-2 col-12 text-center" style=" cursor: pointer;">
            <div id="propertyTypeButtons" class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary mx-2" onclick="selectPropertyType('Residential')"
                    style="background-color: #f9f9f9; border-radius: 50px;border: 2px solid #ccc; width: 200px;height: 150px;">
                    <img src="../assets/icons/residential2.png" alt="Residential"
                        style="width: 115px; height: 115px; margin-right: 8px; padding: 25px; text-align: center;">
                    Residential
                </button>
                <button type="button" class="btn btn-outline-primary mx-2" onclick="selectPropertyType('Commercial')"
                    style="background-color: #f9f9f9; border-radius: 50px;border: 2px solid #ccc;width: 200px;">
                    <img src="../assets/icons/commercial2.png" alt="Commercial"
                        style="width: 110px; height: 110px; margin-right: 8px; padding: 15px;text-align: center;">
                    Commercial
                </button>
                <button type="button" class="btn btn-outline-primary mx-2" onclick="selectPropertyType('Others')"
                    style="background-color: #f9f9f9; border-radius: 50px;border: 2px solid #ccc;width: 200px;">
                    <img src="../assets/icons/other.png" alt="Commercial"
                        style="width: 110px; height: 110px; margin-right: 8px; padding: 15px;text-align: center;">
                    Other(property type)
                </button>
            </div>
        </div>
        <div class="form-row w-100" id="propertySubTypeContainer" style="display: none;">
            <h4 id="subCategoryHeading" class="col-12 mt-4"></h4>
            <div class="form-group mx-sm-3 mb-2 col-12 text-center">
                <div id="propertySubTypeButtons" class="btn-group" role="group">
                    <!-- Subtype buttons will be dynamically added here -->
                </div>
            </div>
        </div>

        <input type="hidden" id="propertyType" value="propertyVal" name="propertyType">
        <input type="hidden" id="propertySubType" value="propertySubVal" name="propertySubType">

        <script>
            const propertySubTypes = {
                Residential: [
                    { name: "Apartment", icon: "../assets/icons/office.png" },
                    { name: "Villa", icon: "../assets/icons/villa.png" },
                    { name: "Floor Villa", icon: "../assets/icons/villaa.png" },
                    { name: "Duplex", icon: "../assets/icons/modern-house.png" },
                    { name: "Studio", icon: "../assets/icons/room.png" },
                    { name: "Mulhaq", icon: "../assets/icons/building.png" }
                ],
                Commercial: [
                    { name: "Office Space", icon: "../assets/icons/work .png" },
                    { name: "Shop", icon: "../assets/icons/store.png" },
                    { name: "Warehouse", icon: "../assets/icons/warehouse.png" },
                    { name: "Garage", icon: "../assets/icons/garage (1).png " },
                    { name: "Cloud Kitchen", icon: "../assets/icons/kitchen-set.png" }
                ],
                Others: [
                    { name: "Farm", icon: "../assets/icons/farm.png" },
                    { name: "Chalet", icon: "../assets/icons/chalet.png" }
                ]
            };

            function selectPropertyType(type) {
                document.getElementById("propertyType").value = type;
                console.log(type);
                console.log(document.getElementById("propertyType").value);
                updatePropertySubType();

                const buttons = document.querySelectorAll("#propertyTypeButtons .btn");
                buttons.forEach(button => {
                    button.classList.remove("active");
                });
                event.target.classList.add("active");

                document.getElementById("propertySubTypeContainer").style.display = 'block';
            }

            function selectPropertySubType(subType, element) {
                document.getElementById("propertySubType").value = subType;

                const buttons = document.querySelectorAll("#propertySubTypeButtons .btn");
                buttons.forEach(button => {
                    button.classList.remove("active");
                });
                element.classList.add("active");
            }

            function updatePropertySubType() {
                const propertyType = document.getElementById("propertyType").value;
                const propertySubTypeButtons = document.getElementById("propertySubTypeButtons");
                const subCategoryHeading = document.getElementById("subCategoryHeading");

                propertySubTypeButtons.innerHTML = '';
                subCategoryHeading.textContent = '';

                if (propertyType) {
                    subCategoryHeading.textContent = `Choose a subcategory for ${propertyType}:`;

                    propertySubTypes[propertyType].forEach(subType => {
                        const button = document.createElement("button");
                        button.type = "button";
                        button.style.backgroundColor = "#fff"; // Background color of the button
                        button.style.borderColor = "#ccc";
                        button.style.borderEndStartRadius = "50px";
                        button.style.textAlign = "center";
                        button.style.width = "150px";
                        button.style.height = "170px";
                        button.className = "btn btn-outline-primary mx-2 my-2";
                        button.onclick = function () {
                            selectPropertySubType(subType.name, button);
                        };

                        const img = document.createElement("img");
                        img.src = subType.icon;
                        img.alt = subType.name;
                        img.style.width = "70px";
                        img.style.height = "80px";
                        img.style.marginBottom = "8px"; // Space between image and text

                        const text = document.createElement("span");
                        text.textContent = subType.name;
                        text.style.display = "block"; // Ensures text is below the image
                        text.style.fontSize = "14px"; // Adjust text size if needed

                        button.appendChild(img);
                        button.appendChild(text);

                        propertySubTypeButtons.appendChild(button);
                    });
                }
            }

        </script>
    </section>
    <br>

    <br>
    <section class="property-section">
            <div class="form-row w-100 text-center">
                <h2> Location </h2>
            </div>
        <br>
        <h2>Property Information</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="governorate">Governorate</label>
                        <select id="location" class="form-control" onchange="updateSubLocation()" name="governorate">
                            <option value="">Select Governorate</option>
                            <option value="Ahmadi">Ahmadi</option>
                            <option value="Assimah">Assimah</option>
                            <option value="Farwaniya">Farwaniya</option>
                            <option value="Jahra">Jahra</option>
                            <option value="Hawali">Hawali</option>
                            <option value="Mubarak Al Kabir">Mubarak Al Kabir</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="block">Block</label>
                        <input type="text" id="block" name="block" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="building-no">Building Number</label>
                        <input type="text" id="building-no" name="building-no" class="form-control" required>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="property-name">Property Name</label>
                        <input type="text" id="property-name" name="property-name" class="form-control" required>
                    </div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="area">Area</label>
                    <select id="subLocation" class="form-control" name="area">
                        <option>Select Area</option>
                    </select>
                </div>
                <script>
                    const subLocations = {
                        Ahmadi: ["Abu Halifa", "Abu Hasani", "Al Ahmadi", "Al Julayah", "Mahboula", "Fahaheel", "Mangaf", "Ali As-Salim",
                            "Aqila", "Bar Al Ahmadi", "Bneidar", "Dhaher", "Fahad Al-Ahmad", "Hadiya	", "Jaber Al-Ali", "Jawaher Al Wafra",
                            "Khairan", "Miqwa", "New Khairan City", "New Wafra", "Nuwaiseeb", "Riqqa", "Sabah Al-Ahmad City", "Sabah Al Ahmad Sea City	",
                            "Sabahiya", "Shu'aiba ", "South Sabahiya", "Wafra", "Zoor", "Zuhar"],

                        Assimah: ["Abdullah Al Salem", "Adailiya", "Bnaid Al-Qar", "Daʿiya", "Dasma", "Doha", "Doha Port", "Faiha'", "Failakao(n)",
                            "Granada", "Jaber Al-Ahmad City Jābir il-Aḥmad", "Jibla", "Kaifan", "Khaldiya", "Mansūriya", "Mirqab", "Maliya", "Khaifan", "North West Sulaibikhat", "Nuzha", "Qadsiya",
                            "Qurtuba", "Rawda", "Shamiya", "Sharq", "Shuwaikh", "Shuwaikh Industrial Area", "Shuwaikh Port", "Sulaibikhat", "Surra", "Umm an Namil Island",
                            "Yarmouk"],

                        Farwaniya: ["Jleeb Al Shyoukh", "Al Rai", "Dajeej", "Abdullah Al-Mubarak", "Airport District", "Andalous", "Ardiya", "Ardiya Herafiya",
                            "Ardiya Industrial Area", "Ishbelya", "Fordous", "Khaitan	", "Omariya	", "Rabiya", "Al-Riggae", "Rihab", "Sabah Al-Nasser	", "Sabaq Al Hajan"],
                        Jahra: ["Nahda", "Naseem", "Abdali", "Amghara", "Bar Jahra", "Jahra", "Jahra Industrial Area", "Kabad", "Naeem", "Nasseem",
                            "Oyoun", "Qasr", "Saad Al Abdullah City", "Salmi", "Sikrab", "South Doha / Qairawān", "Subiya", "Sulaibiya", "Sulaibiya Agricultural Area",
                            "Taima", "Waha"],
                        Hawali: ["Anjafa", "Bayān", "Bi'da", "Hawally", "Hittin", "Jabriya	 Royale Hayat Hospital",
                            "Maidan Hawalli	", "Mishrif", "Mubarak Al-Jabir", "Nigra", "Rumaithiya", "Salam", "Salmiya", "Salwa", "Sha'ab", "Shuhada	",
                            "Siddiq", "South Surra", "Zahra"],
                        "Mubarak Al Kabir": ["Abu Al Hasaniya", "Abu Futaira", "Adan", "Al Qurain", "Al-Qusour", "Funaitīs", "Messila",
                            "Mubarak Al-Kabeer", "Sabah Al-Salem", "Sabhān", "South Wista", "Wista",
                        ]
                    };

                    function updateSubLocation() {
                        const locationSelect = document.getElementById("location");
                        const subLocationSelect = document.getElementById("subLocation");
                        const selectedLocation = locationSelect.value;

                        subLocationSelect.innerHTML = '<option>Select City</option>'; // Clear previous options

                        if (selectedLocation) {
                            subLocations[selectedLocation].forEach(city => {
                                const option = document.createElement("option");
                                option.value = city;
                                option.textContent = city;
                                subLocationSelect.appendChild(option);
                            });
                        }
                    }
                </script>
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="street">Street</label>
                        <input type="text" id="street" name="street" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="pacinumber">PACI Number</label>
                        <input type="text" id="pacinumber" name="pacinumber" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>
                </div>

            </div>
            <br>


            <div class="col-md-6">
         
                <section class="property-title-section">
                    <div class="container text-center mt-4">
                        <h2> Title:</h2>
                        <div id="propertyTitle" class="alert alert-info"
                            style="display: none; color: #e63946; background-color: white; margin-left: 20px;">
                            <!-- The title will be inserted here -->
                        </div>
                    </div>
                    <div class="container text-center mt-4">
                        <h2> Description</h2>
                        <div class="form-group">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="desc"></label>
                                <input type="text" id="desc" name="desc" class="form-control" required>
                            </div>
                        </div>

                    </div>

                </section>



                <script>
                    // Function to update the property title based on selections
                    function updatePropertyTitle() {
                        const type = document.getElementById("propertyType").value;
                        const subType = document.getElementById("propertySubType").value;
                        const location = document.getElementById("location").value;

                        let title = '';

                        if (type && subType && location) {
                            title = `A ${type}  ${subType} in ${location}`;
                        } else if (type && location) {
                            title = `A ${type} in ${location}`;
                        } else if (type) {
                            title = `A ${type}`;
                        } else {
                            title = 'Please select options to generate the title';
                        }

                        const titleElement = document.getElementById("propertyTitle");
                        titleElement.textContent = title;
                        titleElement.style.display = title ? 'block' : 'none';
                    }

                    // Call this function whenever an option is selected or changed
                    document.querySelectorAll('input[name="option"], #propertyTypeButtons button').forEach(button => {
                        button.addEventListener('change', updatePropertyTitle);
                    });

                    document.querySelectorAll('#location, #block, #building-no, #floor, #unit-no').forEach(input => {
                        input.addEventListener('input', updatePropertyTitle);
                    });

                </script>




                <div class="form-group">
                        <button type="submit" class="btn btn-danger">Continue </button>
                </div>

            </div>

        </div>
    </section>
</form>


    <style>
        .property-section {
            background-color: var(--yellow-bg-color);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 70%;
            /* Adjust the width as needed */
            margin-left: auto;
            margin-right: auto;
        }

        .property-section h2 {
            color: #e63946;
            /* Darker blue for the heading */
        }

        .option-row {
            display: flex;
            gap: 15px;
            /* Space between options */
            text-align: center;
        }

        .option-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            padding: 10px;
            /* Add padding inside the box */
            border: 2px solid #ccc;
            /* Border around the box */
            border-radius: 30px;
            /* Rounded corners */
            background-color: #f9f9f9;
            /* Light background color */
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .option-item:hover {
            border-color: rgb(255, 0, 0);
            /* Highlight on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow on hover */
        }

        .option-item img {
            width: 85px;
            /* Adjust size as needed */
            height: 70px;
            object-fit: cover;
            margin-bottom: 5px;
            min-width: 80px;
            border-radius: 30px;
        }

        .option-item input[type="radio"] {
            display: none;
            /* Hide the default radio button */
        }

        .option-item input[type="radio"]:checked+img {
            border: none;
            /* Remove border from the image when checked */
        }

        .option-item input[type="radio"]:checked+img+span {
            font-weight: bold;
            /* Bold text for the selected option */
            color: #e63946;
            /* Text color for the selected option */
        }

        .section-line {
            border: 1px solid #e63946;
            /* Line color */
            width: 80%;
            /* Line width */
            margin: 10px auto;
            /* Center the line */
        }

        /* Base styles for mobile devices */
        body {
            font-size: 14px;
            /* Base font size for mobile */
        }

        .navbar-brand img {
            max-width: 100px;
            /* Limit logo size on mobile */
        }

        .property-section {
            width: 90%;
            /* Full-width on mobile */
        }

        .property-section h2 {
            font-size: 1.5rem;
            /* Larger text on mobile */
        }

        .option-item img {
            width: 70px;
            /* Smaller images on mobile */
            height: 60px;
        }

        .btn-group {
            display: block;
            /* Stack buttons vertically on mobile */
        }

        /* Tablet devices */
        .map-location-box {
            width: 100%;
            max-width: 900px;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            text-align: center;
            margin: 40px auto;
            margin-left: 315px;
        }

        .map-location-box h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .locate-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .locate-btn:hover {
            background-color: #0056b3;
        }

        .map-location-box {
            width: 100%;
            text-align: center;

        }

        .locate-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .location-display-box {
            margin-top: 20px;
            padding: 10px;
            background-color: #e63946;
            border-radius: 15px;
            width: 80%;
            margin: 20px auto;
            min-height: 50px;
            line-height: 1.5;
            display: flex;
            justify-content: center;
            align-items: center;
            color: aliceblue;

        }

        /* Default styles for mobile devices (smallest screens) */
        .map-location-box {
            width: 90%;
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 10px;
            text-align: center;
            margin: 20px auto;
        }

        .map-location-box h3 {
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        .locate-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .locate-btn:hover {
            background-color: #0056b3;
        }

        .location-display-box {
            margin-top: 20px;
            padding: 10px;
            background-color: #e63946;
            border-radius: 15px;
            width: 100%;
            min-height: 50px;
            line-height: 1.5;
            display: flex;
            justify-content: center;
            align-items: center;
            color: aliceblue;
        }

        /* Tablet devices (portrait and landscape) */
        @media only screen and (min-width: 600px) and (max-width: 900px) {
            .map-location-box {
                width: 100%;
                max-width: 900px;
                padding: 20px;
                margin-left: auto;
                margin-right: auto;
            }

            .map-location-box h3 {
                font-size: 18px;
            }

            .locate-btn {
                font-size: 16px;
                padding: 10px 20px;
            }

            .location-display-box {
                width: 90%;
            }
        }

        /* Desktop devices and larger screens */
        @media only screen and (min-width: 901px) {
            .map-location-box {
                width: 100%;
                max-width: 1200px;
                padding: 25px;
                margin: 40px auto;
                margin-left: 315px;
            }

            .map-location-box h3 {
                font-size: 20px;
            }

            .locate-btn {
                font-size: 16px;
            }

            .location-display-box {
                width: 80%;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media (min-width: 600px) {
            .property-section {
                padding: 15px;
            }

            .form-group img {
                width: 60px;
                height: 70px;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media (min-width: 768px) {
            .property-section {
                padding: 20px;
            }

            .form-group img {
                width: 70px;
                height: 80px;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media (min-width: 992px) {
            .property-section {
                padding: 30px;
            }

            .form-group img {
                width: 80px;
                height: 90px;
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .property-section {
                padding: 40px;
            }

            .form-group img {
                width: 90px;
                height: 100px;
            }
        }

        /* Custom devices (ultra-wide screens, 1600px and up) */
        @media (min-width: 1600px) {
            .property-section {
                padding: 50px;
            }

            .form-group img {
                width: 100px;
                height: 110px;
            }
        }

        /* Extra small devices (portrait phones, less than 600px) */
        @media (max-width: 599px) {
            .property-section {
                padding: 10px;
            }

            .form-group img {
                width: 50px;
                height: 60px;
            }
        }

        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-info svg {
            margin-right: 8px;
        }

        .contact-info p {
            margin: 0;
        }
    </style>
    <script>
        function openGoogleMaps() {
            let mapWindow = window.open("https://www.google.com/maps", "_blank");

        
            let selectedLocation = "25.276987, 55.296249"; 

            setTimeout(() => {
                mapWindow.close();

                document.getElementById("selected-location").textContent = `Selected Location: ${selectedLocation}`;
            }, 5000); 
        }

    </script>






<?php include 'views/footer.php'; ?>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>