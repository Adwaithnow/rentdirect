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

   <?php include 'views/header.php'; ?>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .box {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            width: 150px;
            background-color: #dc3545;

        }

        .icon {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        .counter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        button {
            padding: 5px 5px;
            font-size: 12px;
            height: 35px;
            width: 55px;
        }

        .buttons {
            padding: 5px 5px;
            font-size: 12px;
            height: 35px;
            width: 95px;
        }

        span {
            width: 30px;
            text-align: center;
        }

        .property-section {
            /* background-color: #edf2f6; */
            background-color: #fbdfbb;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        .property-section h2 {
            color: #e63946;
        }

        .option-row {
            display: flex;
            gap: 15px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .option-item {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Space between image and text */
            cursor: pointer;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
            width: 100px;
            /* Fixed width for consistency */
            box-sizing: border-box;
        }

        .option-item img {
            width: 50px;
            /* Adjust image size as needed */
            height: 50px;
            object-fit: cover;
        }

        .option-item span {
            flex: 1;
            /* Allow text to take up available space */
            font-size: 14px;
            color: #333;
            /* Default text color */
            text-align: left;
            /* Align text to the left */
        }

        .option-item input[type="checkbox"] {
            margin-left: auto;
            /* Align checkbox to the right */
            cursor: pointer;
            accent-color: blue;
            /* Modern style for the checkbox */
        }

        .option-item:hover {
            border-color: blue;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .option-item input[type="checkbox"]:checked+img {
            border: 2px solid blue;
        }

        .option-item input[type="checkbox"]:checked+span {
            font-weight: bold;
            color: blue;
        }



        .section-line {
            border: 1px solid #e63946;
            width: 80%;
            margin: 10px auto;
        }

        /* Mobile devices (up to 575.98px) */
        @media (max-width: 575.98px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .box {
                width: 100%;
                margin-bottom: 15px;
            }

            .icon {
                width: 30px;
                height: 30px;
            }

            .counter button {
                font-size: 10px;
                width: 40px;
                height: 30px;
            }

            .buttons {
                width: 80px;
            }

            .property-section {
                width: 90%;
                padding: 15px;
            }

            .property-section h2 {
                font-size: 1.5rem;
            }

            .option-item img {
                width: 50px;
                height: 50px;
            }

            .form-group {
                width: 100%;
                margin-bottom: 10px;
            }

            .btn {
                font-size: 12px;
            }
        }

        /* Tablet devices (576px to 991.98px) */
        @media (min-width: 576px) and (max-width: 991.98px) {
            .container {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 15px;
            }

            .box {
                width: 45%;
                margin-bottom: 20px;
            }

            .icon {
                width: 35px;
                height: 35px;
            }

            .counter button {
                font-size: 12px;
                width: 50px;
                height: 35px;
            }

            .buttons {
                width: 90px;
            }

            .property-section {
                width: 80%;
                padding: 20px;
            }

            .property-section h2 {
                font-size: 1.75rem;
            }

            .option-item img {
                width: 70px;
                height: 70px;
            }

            .form-group {
                width: 100%;
                margin-bottom: 15px;
            }

            .btn {
                font-size: 14px;
            }
        }

        /* Desktop devices (992px and above) */
        @media (min-width: 992px) {
            .container {
                flex-direction: row;
                gap: 20px;
            }

            .box {
                width: 150px;
                margin-bottom: 20px;
            }

            .icon {
                width: 40px;
                height: 40px;
            }

            .counter button {
                font-size: 14px;
                width: 55px;
                height: 35px;
            }

            .buttons {
                width: 95px;
            }

            .property-section {
                width: 70%;
                padding: 20px;
            }

            .property-section h2 {
                font-size: 2rem;
            }

            .option-item img {
                width: 85px;
                height: 80px;
            }

            .form-group {
                width: auto;
                margin-bottom: 20px;
            }

            .btn {
                font-size: 16px;
            }
        }
    </style>

    <form action="" method="GET">

        <!-- listing informations -->
        <section class="property-section">
                <h2>Listing Information</h2>
            <br>
            <h4>Fill these areas</h4>
            <div class="row">
                <div class="container">
                    <div class="box" style="color: white;">
                        <img src="../AllImages/bed.png" alt="Bedroom" class="icon" style="background-color: white;">
                        <label>
                            <p style="color: white;">Bedrooms:</p>
                        </label>
                        <div class="counter" style="color: white;">
                            <button onclick="decrease('bedrooms')">-</button>
                            <span id="bedrooms">0</span>
                            <button onclick="increase('bedrooms')">+</button>
                        </div>
                    </div>
                    <div class="box" style="color: white;">
                        <img src="../AllImages/bathroom.png" alt="Bathroom" class="icon" style="background-color: white;">
                        <label>
                            <p style="color: white;">Bathrooms:</p>
                        </label>
                        <div class="counter">
                            <button onclick="decrease('bathrooms')">-</button>
                            <span id="bathrooms">0</span>
                            <button onclick="increase('bathrooms')">+</button>
                        </div>
                    </div>
                    <div class="box" style="color: white;">
                        <img src="../AllImages/kitchen.png" alt=" Kitchen" class="icon">
                        <br>
                        <label>
                            <p style="color: white;">Kitchens :</p>
                        </label>
                        <div class="counter">
                            <button onclick="decrease('kitchens')">-</button>
                            <span id="kitchens">0</span>
                            <button onclick="increase('kitchens')">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="container " style="width: 550px;">
                    <div class="form-group col-md-4 mb-2">
                        <label for="size">Size (m²)</label>
                        <input type="text" id="size" name="size" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label for="Furnished">Furnishing Status</label>
                        <select id="Furnished" name="Furnished" class="form-control" required>
                            <option value="Furnished"> Fully Furnished</option>
                            <option value="Unfurnished">Unfurnished</option>
                            <option value="Semi-furnished">Semi-furnished</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label for="parking">Parking</label>
                        <select id="parking-type" name="parking-type" class="form-control" required>
                            <option value="shaded">Shaded</option>
                            <option value="basement">Basement</option>
                            <option value="both">both</option>
                            <option value="No-parking">No Parking</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label for="pet-friendly">Pet-friendly</label>
                        <select id="pet-friendly" name="pet-friendly" class="form-control" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>

                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label for="pet-details">Specify(details) </label>
                        <input type="text" id="pet-details" name="pet-details" class="form-control">
                    </div>

                </div>

            </div>



            <div class="row">
                <div class="container">
                    <div class="form-group col-md-4 mb-2">
                        <label for="rentalprice">Rental Price(kwd)</label>
                        <input type="text" id="size" name="size" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <label for="">Security Deposit</label>
                        <select id="securitydeposit" name="securitydeposit" class="form-control" required>
                            <option value="50%rental">50% rental</option>
                            <option value="100%rental">100% rental</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label for="realtorfee">Realtor Fee</label>
                        <select id="realtorfee" name="realtorfee" class="form-control" required>
                            <option value="25% rental">25% rental</option>
                            <option value="50%rental">50% rental</option>
                            <option value="100% rental">100% rental</option>
                            <option value="none">None</option>
                        </select>
                    </div>

                </div>
            </div>
            <hr class="section-line">
        </section>
        <!-- contract details -->
        <section class="property-section">
            <br>
            <div class="form-section">
                <h2>Amenities</h2>
                <div class="form-row" id="initial-amenities-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity1" value="gym">
                        <label class="form-check-label" for="amenity1">Gym</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity2"
                            value="swimmingPool">
                        <label class="form-check-label" for="amenity2">Swimming Pool</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity3"
                            value="security">
                        <label class="form-check-label" for="amenity3">Security</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity4" value="cctv">
                        <label class="form-check-label" for="amenity4">CCTV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity5"
                            value="internet">
                        <label class="form-check-label" for="amenity5">Internet</label>
                    </div>
                </div>
                <div class="form-row" id="new-amenities-container">
                    <!-- New amenities will be added here -->
                </div>
                <input type="text" id="new-amenity-name" placeholder="New Amenity Name" class="form-control" />
                <buttons type="button" class="btn btn-danger" id="add-amenity-btn">Add More</buttons>
            </div>




            <br>

            <br>
            <hr>

            <section>


            </section>




        </section>
        <br>
        <section class="property-section">
            <br>
            <h4>Monthly Rent Includes</h4>
            <hr>
            <div class="option-row">
                <div class="form-row" id="initial-amenities-container">
                    <div class="form-check">
                        <div class="box-content">
                            <input class="form-check-input-img" type="checkbox" name="amenities[]" id="amenity1"
                                value="electricity">
                            <img src="../AllImages/elec.png" alt="Electricity" class="box-image">
                            <span class="box-text">Electricity</span>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="box-content">
                            <input class="form-check-input-img" type="checkbox" name="amenities[]" id="parking"
                                value="parking">
                            <img src="../AllImages/parking.png" alt="parking" class="box-image">
                            <span class="box-text">Parking</span>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="box-content">
                            <input class="form-check-input-img" type="checkbox" name="amenities[]" id="water"
                                value="water">
                            <img src="../AllImages/water.png" alt="water" class="box-image">
                            <span class="box-text">Water</span>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="box-content">
                            <input class="form-check-input-img" type="checkbox" name="amenities[]" id="internet"
                                value="internet">
                            <img src="../assets/images/wifi.png" alt="internet" class="box-image">
                            <span class="box-text">Internet</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-row" id="monthly-includes-container">
                <!-- New rent includes will be added here -->
            </div>

            <!-- Input field to add new rent includes -->
            <input type="text" style="width: 87%;margin-left: 17px;" id="new-includes-name"
                placeholder="New Rent Includes" class="form-control" />
            <br>

            <!-- Button to add more items -->
            <button type="button" style="width: 300px;margin-left: 17px;" class="btn btn-danger"
                id="add-includes-btn">Add
                Monthly Rent Includes</button>
            <div class="option-row">
                <div class="form-row" id="initial-amenities-container">


                </div>
            </div>
            <script>
                document.getElementById('add-includes-btn').addEventListener('click', function () {
                    const includesContainer = document.getElementById('monthly-includes-container');
                    const newIncludesName = document.getElementById('new-includes-name').value.trim(); // Trim the input to remove extra spaces

                    if (newIncludesName !== '') {
                        // Create a new div for the new rent includes checkbox
                        const newIncludes = document.createElement('div');
                        newIncludes.classList.add('form-check');

                        // Generate a unique ID for each new rent includes checkbox
                        const nextId = includesContainer.getElementsByClassName('form-check').length + 1;

                        // Create the inner HTML with the checkbox and label
                        newIncludes.innerHTML = `
                <input class="form-check-input" type="checkbox" name="rent_includes[]" id="includes${nextId}" value="${newIncludesName}">
                <label class="form-check-label" for="includes${nextId}">${newIncludesName}</label>
            `;

                        // Append the new checkbox and label to the container
                        includesContainer.appendChild(newIncludes);

                        // Clear the input field after adding the item
                        document.getElementById('new-includes-name').value = '';
                    } else {
                        alert('Please enter a name for the new rent includes item.');
                    }
                });

            </script>

            <hr>
            <br>

            <hr class="section-line">
            <div class="form-group">
                <a href="postproperty.html">
                    <buttons type="previous" class="btn btn-danger">Previous </buttons>
                </a>
                <tr>
                    <td> </td>
                </tr>
                <a href="addingimg.html">
                    <buttons type="next" class="btn btn-danger">Continue </buttons>
                </a>
            </div>
        </section>
        <br>
        <br>
    </form>

    <!-- adding new amenities  -->
    <script>
        document.getElementById('add-amenity-btn').addEventListener('click', function () {
            const amenitiesContainer = document.getElementById('new-amenities-container');
            const newAmenityName = document.getElementById('new-amenity-name').value;

            if (newAmenityName.trim() !== '') {
                const newAmenity = document.createElement('div');
                newAmenity.classList.add('form-check');

                // Generate unique ID for new amenity
                const nextId = amenitiesContainer.getElementsByClassName('form-check').length + 6;

                newAmenity.innerHTML = `
                <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity${nextId}" value="${newAmenityName}">
                <label class="form-check-label" for="amenity${nextId}">${newAmenityName}</label>
            `;

                // Append the new amenity checkbox
                amenitiesContainer.appendChild(newAmenity);

                // Clear the input field
                document.getElementById('new-amenity-name').value = '';
            } else {
                alert('Please enter a name for the new amenity.');
            }
        });
    </script>

    <style>
        .property-section {
            background-color: #edf2f6;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        .form-section {
            margin-bottom: 40px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Ensure consistent styling for headings */
        .form-section h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 25px;
            color: #333;
        }

        /* Ensure checkboxes and labels are properly styled */
        .form-check {
            margin-bottom: 10px;
        }

        /* Ensure the grid layout for amenities is consistent */
        .form-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 11px;
        }

        /* Style the input field for new amenities */
        #new-amenity-name {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        /* Style the button for adding amenities */
        #add-amenity-btn {
            margin-top: 20px;
        }

        .form-check-label {
            margin: 0;
            white-space: nowrap;
        }


        .box-content {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            width: 200px;
            /* Fixed width for the box */
            box-sizing: border-box;
        }

        .form-check-input {

            margin-right: 10px;
            /* Space between checkbox and image */
            cursor: pointer;
        }

        .form-check-input-img {

            margin-left: 10px;
            margin-right: 10px;
            /* Space between checkbox and image */
            cursor: pointer;
        }

        .box-image {
            width: 20px;
            /* Small image size */
            height: 25px;
            object-fit: cover;
            margin-right: 5px;
            /* Space between image and text */
        }

        .box-text {
            flex: 1;
            font-size: 14px;
            color: #333;
            /* Text color */
            text-align: left;
            /* Align text to the left */
        }

        /* Hover effect for the checkbox box */
        .form-check:hover .box-content {
            border-color: rgb(201, 54, 54);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-check {
            margin-bottom: 10px;
        }

        /* Ensure the grid layout for amenities is consistent */
        .form-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        /* Style the input field for new amenities */
        #new-amenity-name {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* Style the button for adding amenities */
        #add-amenity-btn {
            margin-top: 5px;
        }


        /* Media query for responsiveness */
        @media (max-width: 768px) {
            .box-content {
                width: 100%;
                /* Full-width on smaller screens */
            }

            .box-image {
                width: 8px;
                /* Smaller images on mobile */
                height: 8px;
            }

            .box-text {
                font-size: 12px;
                /* Smaller text on mobile */
            }
        }


        .option-row {
            display: flex;
            gap: 15px;
            justify-content: center;
            text-align: center;
        }

        .option-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .option-item:hover {
            border-color: rgb(209, 33, 33);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .option-item img {
            width: 85px;
            height: 70px;
            object-fit: cover;
            margin-bottom: 5px;
        }

        .option-item input[type="checkbox"] {
            display: none;
        }

        .option-item input[type="checkbox"]:checked+img {
            border: 2px solid rgb(164, 8, 8);
        }

        .option-item input[type="checkbox"]:checked+img+span {
            font-weight: bold;
            color: blue;
        }

        .section-line {
            border: 1px solid #e63946;
            width: 80%;
            margin: 10px auto;
        }

        /* Mobile devices */
        @media (max-width: 575.98px) {
            .property-section {
                width: 90%;
            }

            .property-section h2 {
                font-size: 1.5rem;
            }

            .option-item img {
                width: 70px;
                height: 60px;
            }
        }

        /* Tablet devices */
        @media (min-width: 576px) and (max-width: 991.98px) {
            .property-section {
                width: 80%;
            }

            .property-section h2 {
                font-size: 1.75rem;
            }

            .option-item img {
                width: 85px;
                height: 75px;
            }
        }

        /* Desktop devices */
        @media (min-width: 992px) {
            .property-section {
                width: 70%;
            }

            .property-section h2 {
                font-size: 2rem;
            }

            .option-item img {
                width: 85px;
                height: 80px;
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
        function increase(id) {
            let element = document.getElementById(id);
            element.textContent = parseInt(element.textContent) + 1;
        }

        function decrease(id) {
            let element = document.getElementById(id);
            let value = parseInt(element.textContent);
            if (value > 0) {
                element.textContent = value - 1;
            }
        }
    </script>
    <!-- footer -->
    <?php include 'views/footer.php'; ?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>