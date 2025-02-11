<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Direct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="property-style.css">
</head>

<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-scroll navbar-expand-lg py-2 navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/images/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rent.html">Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="findagent.html">Find Agent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <div class="auth-buttons ml-lg-2 mt-2 mt-lg-0">
                        <a href="login.html" class="btn btn-outline-light rounded-0 mr-2 ">Login Now</a>
                        <a href="login.html" class="btn btn-danger rounded-0">Post Property</a>
                        <a href="postproperty.html"></a>

                    </div>
                </div>
            </div>
        </nav>

    </header>

    <section class="hero text-white text-center d-flex align-items-center"
        style="background: url('AllImages/assets/images/hsec2.jpg') no-repeat center center/cover; height: 400px;">
        <div class="container">
            <h2>Unlock Your Dream Property Now</h2>
            <form class="form-inline justify-content-center mt-4 p-4 bg-white form-border">
                <div class="form-group mx-sm-3 mb-2">
                    <select id="location" class="form-control" onchange="updateSubLocation()">
                        <option value="">Select Property location</option>
                        <option value="Ahmadi">Ahmadi</option>
                        <option value="Assimah">Assimah</option>
                        <option value="Farwaniya">Farwaniya</option>
                        <option value="Jahra">Jahra</option>
                        <option value="Hawali">Hawali</option>
                        <option value="Mubarak Al Kabir">Mubarak Al Kabir</option>
                    </select>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <select id="subLocation" class="form-control">
                        <option>Select City location</option>
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
                        "Mubarak Al Kabir": ["Abu Al Hasaniya", "Abu Futaira", "Adān", "Al Qurain", "Al-Qusour", "Funaitīs", "Messila",
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


                <div class="form-group mx-sm-3 mb-2">
                    <select id="propertyType" class="form-control" onchange="updatePropertySubType()">
                        <option value="">Select Property Type</option>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <select id="propertySubType" class="form-control">
                        <option value="">Select Sub Type</option>
                    </select>
                </div>

                <script>
                    const propertySubTypes = {
                        Residential: ["Apartment", "Villa", "Floor Villa", "Duplex", "Studio", "Mulhaq"],
                        Commercial: ["Office Space", "Shop", "Warehouse", "Garage", "Cloud Kitchen"]
                    };

                    function updatePropertySubType() {
                        const propertyTypeSelect = document.getElementById("propertyType");
                        const propertySubTypeSelect = document.getElementById("propertySubType");
                        const selectedPropertyType = propertyTypeSelect.value;

                        propertySubTypeSelect.innerHTML = '<option value="">Select Sub Type</option>';

                        if (selectedPropertyType) {
                            propertySubTypes[selectedPropertyType].forEach(subType => {
                                const option = document.createElement("option");
                                option.value = subType;
                                option.textContent = subType;
                                propertySubTypeSelect.appendChild(option);
                            });
                        }
                    }
                </script>

                <!-- <div class="form-group mx-sm-3 mb-2 slider-container">
    <label for="rentRange" class="slider-label">Select Rent Range: <span id="rentRangeLabel">150 KD - 5000 KD</span></label>
    <input type="range" id="rentRange" min="150" max="5000" step="50" value="150" class="form-control rent-range-slider" oninput="updateRentRangeLabel()">
</div> -->

                <script>
                    function updateRentRangeLabel() {
                        const rentRangeSlider = document.getElementById("rentRange");
                        const rentRangeLabel = document.getElementById("rentRangeLabel");
                        const minValue = parseInt(rentRangeSlider.min, 10);
                        const maxValue = parseInt(rentRangeSlider.max, 10);
                        const currentValue = parseInt(rentRangeSlider.value, 10);

                        rentRangeLabel.textContent = `${minValue} KD - ${currentValue} KD`;
                    }

                    // Initialize the label
                    updateRentRangeLabel();
                </script>

                <button type="submit" class="btn btn-danger mb-2">Search</button>
            </form>
        </div>
    </section>
    <style>
        .rent-range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #ddd;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .rent-range-slider:hover {
            opacity: 1;
        }

        .rent-range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: red;
            cursor: pointer;
        }

        .rent-range-slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: red;
            cursor: pointer;
        }

        .rent-range-slider::-ms-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: red;
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .slider-container {
                padding: 0 15px;
            }

            .slider-label {
                font-size: 14px;
            }

            #rentRangeLabel {
                font-size: 14px;
            }

            .rent-range-slider {
                height: 6px;
            }

            .rent-range-slider::-webkit-slider-thumb,
            .rent-range-slider::-moz-range-thumb,
            .rent-range-slider::-ms-thumb {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 768px) {
            .slider-container {
                padding: 0 20px;
            }

            .slider-label {
                font-size: 16px;
            }

            #rentRangeLabel {
                font-size: 16px;
            }

            .rent-range-slider {
                height: 7px;
            }

            .rent-range-slider::-webkit-slider-thumb,
            .rent-range-slider::-moz-range-thumb,
            .rent-range-slider::-ms-thumb {
                width: 22px;
                height: 22px;
            }
        }

        @media (max-width: 992px) {
            .slider-container {
                padding: 0 25px;
            }

            .slider-label {
                font-size: 18px;
            }

            #rentRangeLabel {
                font-size: 18px;
            }

            .rent-range-slider {
                height: 8px;
            }

            .rent-range-slider::-webkit-slider-thumb,
            .rent-range-slider::-moz-range-thumb,
            .rent-range-slider::-ms-thumb {
                width: 24px;
                height: 24px;
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
    <!-- kuwait description section -->
    <br>
    <br>
    <section class="intro py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Discover the best properties in Kuwait</h2>
                    <p>Explore the finest properties in kuwait has to offer. Whenever looking for cozy home, a luxurious
                        apartment, or a prime commercial space , find the best options that suit your needs and
                        lifestyle. Discover your perfect property in Kuwait today.</p>
                    <a href="exploremore2.html">
                        <button class="btn btn-danger"> More</button></a>
                    <div class="stats d-flex mt-4">
                        <div class="stat mr-4">
                            <h3>30k+</h3>
                            <p>Happy Client</p>
                        </div>
                        <div class="stat">
                            <h3>20k+</h3>
                            <p>Rent</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <div id="propertySlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="AllImages/IMG-20240828-WA0008.jpg" class="d-block w-100" alt="Image 1"
                                    style="width: 850px; height: 600px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="AllImages/IMG-20240828-WA0009.jpg" class="d-block w-100" alt="Image 2"
                                    style="width: 850px; height: 600px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="AllImages/IMG-20240828-WA0010.jpg" class="d-block w-100" alt="Image 3"
                                    style="width: 850px; height: 600px; object-fit: cover; ">
                            </div>
                            <div class="carousel-item">
                                <img src="AllImages/IMG-20240828-WA0008.jpg" class="d-block w-100" alt="Image 4"
                                    style="width: 850px; height: 600px; object-fit: cover;">
                            </div>
                            <div class="carousel-item">
                                <img src="AllImages/IMG-20240828-WA0009.jpg" class="d-block w-100" alt="Image 5"
                                    style="width: 850px; height: 600px; object-fit: cover;">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#propertySlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#propertySlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="diagonal-bg"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- premium-properties section -->
    <section class="premium-properties py-5">

        <div class="container text-center">
            <h2> Premium Properties</h2>
            <div class="row">
                <!-- Repeat this block for each property -->
                <div class="col-md-4 mb-4">

                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>
                            <img src="assets/images/1.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex  justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">LOREM</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Bedrooms</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Bathrooms</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Square m</p>
                                    </div>
                                </div>
                                -->

                            </div>
                        </a>
                    </div>

                </div>

                <div class="col-md-4 mb-4">
                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>

                            <img src="assets/images/2.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">Farwaniya</p>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>
                            <img src="assets/images/3.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">LOREM</p>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>
                            <img src="assets/images/2.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">LOREM</p>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>
                            <img src="assets/images/1.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">LOREM</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-image">
                        <a href="propertypage.html">
                            <span class="premium-badge">Premium</span>
                            <img src="assets/images/3.jpg" alt="Ocean Star" class="card-img-top rounded-image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ocean Star</h3>
                                    <p class="card-text">$2400/Month</p>
                                </div>
                                <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bed.png" alt="Icon 1" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/bathroom.png" alt="Icon 2" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <img src="assets/icons/maximize.png" alt="Icon 3" class="img-fluid"
                                            style="width: 20px; height: 20px;">
                                        <p class="card-text mb-0 ml-2">4</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="row text-center mt-2 mx-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="card-text mb-0 ml-2">LOREM</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="row text-center justify-content-between">
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Bedrooms</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Bathrooms</p>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <p class="card-text mb-0 ml-2">Square m</p>
                                    </div>
                                </div> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Repeat ends -->
            </div>
            <a href="rent.html" class="btn btn-danger">Browse More Properties</a>
        </div>

    </section>
    <!-- explore more -->
    <section>
        <div class="container my-5 ">
            <div class="find-agent-section">
                <div class="find-agent-content">
                    <img src="AllImages/AllImages/exploremore.jpg" alt="Agent" class="img-fluid">
                    <div class="find-agent-text">
                        <br>
                        <h2 style="color: #d21b1b; margin-left:50px;">
                            <tr>
                                <td></td>
                            </tr>Explore More
                        </h2>
                        <br>
                        <p style="margin-left: 50px;">Explore More diverse categories to find exactly what you're
                            looking for.</p>
                        <p style="margin-left: 50px;">Refine your search and find the perfect place that suits your
                            needs and lifestyle.,</p>
                        <br>
                        <br>
                        <a href="exploremore2.html" class="btn btn-danger" style="margin-left: 50px;">Budget
                            Friendly</a>
                        <a href="exploremore2.html" class="btn btn-danger">Luxury</a>
                        <a href="exploremore2.html" class="btn btn-danger">Petfriendly</a>
                        <a href="exploremore2.html" class="btn btn-danger">Staff Accomodation</a>


                    </div>
                </div>
            </div>

        </div>
    </section>

    <section>


    </section>
    <!-- footer -->
    <footer class="text-white py-4">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <a href="/">
                        <img src="assets/images/logo.png" alt="Logo" width="100">

                    </a>
                    <h6 class="mt-3">Social Media Links</h6>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-instagram text-white me-3 px-2"></i></a>
                        <a href="#"><i class="bi bi-facebook text-white me-3 px-2"></i></a>
                        <a href="#"><i class="bi bi-twitter text-white me-3 px-2"></i></a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <h4>Useful Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Home</a></li>
                        <li><a href="rent.html" class="text-white">Rent</a></li>
                        <li><a href="findagent.html" class="text-white">Find Agent</a></li>
                        <li><a href="contact.html" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-3">
                    <h4>Legal</h4>
                    <ul class="list-unstyled">
                        <li><a href="terms.html" class="text-white">Terms & Conditions</a></li>
                        <li><a href="privacy.html" class="text-white">Privacy and Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-3">
                    <h4>Contact</h4>

                    <div class="contact-info">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px"
                            fill="#FFFFFF">
                            <path
                                d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z" />
                        </svg>
                        <p> Ibn Khaldoun street , </p>
                        <p>Hawally , </p>
                        <br>
                        <p>Kuwait</p>
                    </div>

                    <div class="contact-info">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px"
                            fill="#FFFFFF">
                            <path
                                d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                        </svg>
                        <p>info@rentdirect-q8.com</p>
                    </div>

                    <div class="contact-info">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px"
                            fill="#FFFFFF">
                            <path
                                d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                        </svg>
                        <p> +965 92276201</p>
                    </div>

                </div>

            </div>
            <div class="text-center mt-4">
                <p>@2024 All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>