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
        .account-block {
            padding: 0;
            background-image: url("assets/images/e753ffca8e.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }

        .account-block .overlay {
            flex: 1;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            top: 40%;
            bottom: 0;
            left: 0;
            right: 0;
        }

        @media (max-width: 768px) {
            .account-block {
                display: none;
            }

            .card {
                border-radius: 0;
            }

            .auth-buttons {
                flex-direction: column;
            }

            .auth-buttons .btn {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                width: 100px;
            }

            .auth-buttons {
                flex-direction: column;
                width: 100%;
                text-align: center;
            }

            .auth-buttons .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg py-2 navbar-dark navbar-bg-dark">
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
                        <a href="login.php" class="btn btn-outline-light rounded-0 mr-2">Login Now</a>
                        <a class="btn btn-danger rounded-0">Post Property</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-wrapper" class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-2">
                                        <h3 class="h4 font-weight-bold text-danger">Register</h3>
                                    </div>
                                    <h6 class="h5 mb-0">Welcome!</h6>
                                    <p class="text-muted mt-2 mb-2">Enter your details to create an account</p>

<!-- Confirmation Message -->
<div class="confirmation-message" style="display: none;">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Your registration was successful! You can now log in with your credentials.</p>
    </div>
</div>

<!-- Error Message -->
<div class="error-message" style="display: none;">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Oops!</h4>
        <p class="error-text"></p>
    </div>
</div>

<!-- Registration Form -->
<form id="registrationForm" onsubmit="submitForm(event)">
    <div class="form-group">
        <label for="exampleInputCompanyName">Company Name</label>
        <input type="text" class="form-control" id="exampleInputCompanyName" name="companyName" required>
    </div>
    <div class="form-group">
        <label for="complogo">Company Logo</label>
        <input type="file" id="complogo" name="complogo" class="form-control-file" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="compregno">Company Registration No</label>
        <input type="text" class="form-control" id="compregno" name="compregno" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="password" required>
    </div>
    <div class="form-group">
        <label for="exampleInputConfirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword" name="confirmPassword" required>
    </div>
    <button type="submit" class="btn btn-danger rounded-0" id="registerBtn">Register</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to handle form submission via AJAX
    function submitForm(event) {
        event.preventDefault();  // Prevent the default form submission

        let form = new FormData(event.target);  // Collect form data
        let confirmationMessage = document.querySelector(".confirmation-message");
        let errorMessage = document.querySelector(".error-message");
        let submitButton = document.querySelector("button[type='submit']");

        // Disable the submit button to prevent multiple clicks
        submitButton.disabled = true;
        submitButton.innerText = "Submitting...";  // Optionally change button text to indicate submission

        fetch('actions/registration/company_registration.php', {
            method: 'POST',
            body: form
        })
            .then(response => response.json())  // Ensure the response is JSON
            .then(data => {
                if (data.success) {
                    // Display confirmation message on success
                    document.querySelector("form").style.display = "none";  // Hide the form
                    confirmationMessage.style.display = "block";  
                    errorMessage.style.display = "none";  // Hide error message if successful
                } else {
                    // Display error message if something went wrong
                    errorMessage.querySelector(".error-text").textContent = data.message;
                    errorMessage.style.display = "block";  // Show the error message
                    confirmationMessage.style.display = "none";  // Hide confirmation message
                }
            })
            .catch(error => {
                // Display error message if there's a network issue or other errors
                errorMessage.querySelector(".error-text").textContent = "An error occurred: " + error.message;
                errorMessage.style.display = "block";  // Show error message
                confirmationMessage.style.display = "none";  // Hide confirmation message
            })
            .finally(() => {
                // Re-enable the button after the request completes (in case of errors, etc.)
                submitButton.disabled = false;
                submitButton.innerText = "Register";  // Reset button text
            });
    }
</script>

                                    <p class="text-muted text-center mt-3 mb-0">Already have an account? <a
                                            href="login.php" class="text-primary ml-1">Login</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Find your property that suits you</h4>
                                        <p class="lead text-white">"Best investment I made for a long time. Can only
                                            recommend it for other users."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>