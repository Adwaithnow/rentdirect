<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Direct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <style>
        .agent-section {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            width: 100%;
            height: 350px;
        }

        .agent-image {
            flex: 0 0 150px;
            margin-right: 10px;
        }

        .agent-details {
            flex: 1;
        }

        .agent-image img {
            width: 200px;
            height: 250px;
            border-radius: 20px;
        }

        .call-btn {
            background-color: #DD2328;
            color: white;
            width: 45%;
            margin-top: 10px;
        }

        .call-mail {
            background-color: white;
            border: solid 1px #DD2328;
            color: #DD2328;
            width: 45%;
            margin-top: 10px;
        }

        .call-whtasapp {
            background-color: #4DBD43;
            color: white;
            width: 90%;
            margin-top: 10px;
        }

        .call-rent {
            background-color: rgb(113, 79, 236);
            border: solid 1px #1605ce;
            color: #cfcce8;
            width: 50%;
            margin-top: 10px;
        }

        @media (max-width: 991.98px) {
            .navbar {
                background-color: var(--secondary-color);
                /* Dark background color for mobile */
            }
        }

        /* Media query for devices with a max-width of 991.98px (tablets and smaller) */
        @media (max-width: 991.98px) {
            .agent-section {
                flex-direction: column;
                align-items: center;
                height: auto;
            }

            .agent-image img {
                width: 150px;
                height: 200px;
            }

            .call-btn,
            .call-mail,
            .call-whtasapp,
            .call-rent {
                width: 80%;
            }
        }

        /* Media query for devices with a max-width of 767.98px (large phones and smaller) */
        @media (max-width: 767.98px) {
            .agent-image {
                flex: 0 0 100px;
                margin-bottom: 15px;
            }

            .agent-image img {
                width: 120px;
                height: 160px;
            }

            .call-btn,
            .call-mail,
            .call-whtasapp,
            .call-rent {
                width: 100%;
            }
        }

        /* Media query for devices with a max-width of 575.98px (small phones and smaller) */
        @media (max-width: 575.98px) {
            .agent-section {
                padding: 10px;
            }

            .agent-image img {
                width: 100px;
                height: 140px;
            }

            .call-btn,
            .call-mail,
            .call-whtasapp,
            .call-rent {
                width: 100%;
                margin-top: 5px;
            }
        }

        /* Media query for very small devices or landscape mode on phones */
        @media (max-width: 375px) {
            .agent-image img {
                width: 80px;
                height: 120px;
            }

            .agent-details h5 {
                font-size: 16px;
            }

            .agent-details p {
                font-size: 14px;
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
                            <a class="nav-link" href="findagent.php">Find Agent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <div class="auth-buttons ml-lg-2 mt-2 mt-lg-0">
                        <a href="login.php" class="btn btn-outline-light rounded-0 mr-2 ">Login Now</a>
                        <a class="btn btn-danger rounded-0">Post Property</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero text-white text-center d-flex align-items-center"
        style="background: url('AllImages/assets/images/agentimgbg.jpg') no-repeat center center/cover; height: 400px;">
        <div class="container">
            <h2>Connect with an agent to find your dream home </h2>
        </div>
    </section>
    <section class="agent-details py-5">
        <div class="container">
            <div class="row" id="agent-list">
                <!-- Agents will be dynamically inserted here -->
            </div>
        </div>
    </section>
    <script>
        // Fetch agents from the server
        fetch('actions/listing/list_agent.php')
            .then(response => response.json())
            .then(data => {
                const agentList = document.getElementById('agent-list');
                data.forEach(agent => {
                    // Create a new card for each agent dynamically
                    const agentHTML = `
                    <div class="col-md-6">
                        <div class="agent-section">
                            <div class="agent-image">
                                <img src="uploads/agents/${agent.image}" alt="Agent">
                            </div>
                            <div class="agent-details">
                                <h5>${agent.name}</h5>
                                <h6>Company Name :</h6>
                                <p>${agent.job_title}</p>
                                <p><b>Nationality: </b>${agent.nationality}</p>
                                <p><b>Languages Known : </b>${agent.languages}</p>
                                <button class="btn call-btn">
                                    <!-- Call Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                        <path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                    </svg> CALL
                                </button>
                                <button class="btn call-mail">
                                    <!-- Email Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg> EMAIL
                                </button>
                                <button class="btn call-whtasapp">
                                    <i class="bi bi-whatsapp text-green me-3 px-2"></i> WHATSAPP
                                </button>
                            </div>
                        </div>
                    </div>
                    `;
                    // Append the new agent card to the agent list
                    agentList.innerHTML += agentHTML;
                });
            })
            .catch(error => console.error('Error fetching agent data:', error));
    </script>
    <!-- <section class="agent-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="agent-section">
                        <div class="agent-image">
                            <img src="AllImages/assets/images/Joann-Cereza.webp" alt="Agent">
                            <div class="row text-center justify-content-between">
                                <div class="col d-flex align-items-center justify-content-center">
                                    <img src="../rentdirect/AllImages/assets/images/Find the top real estate agents in UAE _ Property Finder_files/1012-7835co.jpg"
                                        alt="Icon 1" class="img-fluid" style="width: 50px; height: 50px;">
                                    <p class="card-text mb-0 ml-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="agent-details">
                            <h5>Joann-Cereza </h5>
                            <h6>Company Name :</h6>
                            <p>Junior Leasing Executive</p>
                            <p><b>Nationality: </b></p>
                            <p><b>Languages Known : </b></p>
                            <button class="btn call-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                    <path
                                        d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                </svg> CALL</button>
                            <td><button class="btn call-mail"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg>EMAIL</button></td>

                            <button class="btn call-whtasapp"><i class="bi bi-whatsapp text-green me-3 px-2"></i>
                                WHATSAPP</button>



                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="agent-section">
                        <div class="agent-image">
                            <img src="AllImages/assets/images/Shaun-price.webp" alt="Agent">
                            <div class="row text-center justify-content-between">
                                <div class="col d-flex align-items-center justify-content-center">
                                    <img src="../rentdirect/AllImages/assets/images/Find the top real estate agents in UAE _ Property Finder_files/1012-7835co.jpg"
                                        alt="Icon 1" class="img-fluid" style="width: 50px; height: 50px;">
                                    <p class="card-text mb-0 ml-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="agent-details">
                            <h5>Shaun-price </h5>
                            <h6>Company Name :</h6>
                            <p>Business Development Officer</p>
                            <p><b>Nationality: </b></p>
                            <p><b>Languages Known : </b></p>

                            <button class="btn call-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                    <path
                                        d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                </svg> CALL</button>
                            <td><button class="btn call-mail"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg>EMAIL</button></td>

                            <button class="btn call-whtasapp"><i class="bi bi-whatsapp text-green me-3 px-2"></i>
                                WHATSAPP</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="agent-section">
                        <div class="agent-image">
                            <img src="AllImages/assets/images/Priyanka-Burla.webp" alt="Agent">

                            <div class="row text-center justify-content-between">
                                <div class="col d-flex align-items-center justify-content-center">
                                    <img src="../rentdirect/AllImages/assets/images/Find the top real estate agents in UAE _ Property Finder_files/1012-7835co.jpg"
                                        alt="Icon 1" class="img-fluid" style="width: 50px; height: 50px;">
                                    <p class="card-text mb-0 ml-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="agent-details">
                            <h5>Priyanka-Burla </h5>
                            <div class="col d-flex align-items-right justify-content-right">

                            </div>


                            <h6>Company Name :</h6>
                            <p>Marketing Support Coordinator</p>
                            <p><b>Nationality: </b></p>
                            <p><b>Languages Known : </b></p>
                            <button class="btn call-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                    <path
                                        d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                </svg> CALL</button>
                            <td><button class="btn call-mail"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg>EMAIL</button></td>

                            <button class="btn call-whtasapp"><i class="bi bi-whatsapp text-green me-3 px-2"></i>
                                WHATSAPP</button>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="agent-section">
                        <div class="agent-image">
                            <img src="AllImages/assets/images/Ayyaz-Ulde.webp" alt="Agent">
                            <div class="col d-flex align-items-center justify-content-center">
                                <img src="../rentdirect/AllImages/assets/images/Find the top real estate agents in UAE _ Property Finder_files/1012-7835co.jpg"
                                    alt="Icon 1" class="img-fluid" style="width: 50px; height: 50px;">
                                <p class="card-text mb-0 ml-2"></p>
                            </div>
                        </div>

                        <div class="agent-details">

                            <h5>Ayyaz-Ulde</h5>
                            <h4>Company Name</h4>
                            <p>Marketing Officer</p>
                            <p><b>Nationality</b></p>
                            <p><b>Languages Known: </b></p>
                            <button class="btn call-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                    <path
                                        d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                </svg> CALL</button>
                            <td><button class="btn call-mail"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg>EMAIL</button></td>

                            <button class="btn call-whtasapp"><i class="bi bi-whatsapp text-green me-3 px-2"></i>
                                WHATSAPP</button>
                            <br>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="agent-section">
                        <div class="agent-image">
                            <img src="AllImages/assets/images/Alma-Tantoy.webp" alt="Agent">

                            <div class="col d-flex align-items-center justify-content-center">
                                <img src="../rentdirect/AllImages/assets/images/Find the top real estate agents in UAE _ Property Finder_files/1012-7835co.jpg"
                                    alt="Icon 1" class="img-fluid" style="width: 50px; height: 50px;">
                                <p class="card-text mb-0 ml-2"></p>

                            </div>

                        </div>

                        <div class="agent-details">
                            <h5>Alma-Tantoy </h5>
                            <h6>Company Name</h6>
                            <p>Senior Leasing Executive</p>

                            <p><b>Nationality: </b></p>
                            <p><b>Languages Known: </b></p>
                            <button class="btn call-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                    <path
                                        d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                                </svg> CALL</button>
                            <td><button class="btn call-mail"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                    </svg>EMAIL</button></td>

                            <button class="btn call-whtasapp"><i class="bi bi-whatsapp text-green me-3 px-2"></i>
                                WHATSAPP</button>
                            <br>
                            <!-- <h6 class="mt-3">Social Media Links</h6> -->

    <br>
    <!-- <a href="#"><i class="bi bi-instagram text-pink me-3 px-2"></i></a>
                             <a href="#"><i class="bi bi-facebook text-blue me-3 px-2"></i></a>
                             <a href="#"><i class="bi bi-twitter text-blue me-3 px-2"></i></a>
                             <a href="#"><i class="bi bi-whatsapp text-green me-3 px-2"></i></a> -->
    </div>
    </div>
    </div>


    </div>
    <!-- Repeat this row for more agents -->
    </div>


    </section> -->




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
                        <li><a href="findagent.php" class="text-white">Find Agent</a></li>
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
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#FFFFFF">
                            <path
                                d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z" />
                        </svg>
                        <p> Ibn Khaldoun Street , Hawally , Kuwait</p>

                    </div>

                    <div class="contact-info">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px"
                            fill="#FFFFFF">
                            <path
                                d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                        </svg>
                        <p>info@rentdirect-q8.com</p>
                    </div>

                    <div class="contact-info">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px"
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