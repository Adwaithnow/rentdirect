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
            -webkit-box-flex: 1;
            -ms-flex: 1;
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
            /* margin: 0 auto; */
            /* padding: 0 1.75rem; */
            top: 40%;
            bottom: 0;
            left: 0;
            right: 0;
        }

        @media (max-width: 1200px) {
            .auth-buttons {
                margin-top: 10px;
            }
        }

        @media (max-width: 992px) {
            .auth-buttons {
                margin-top: 10px;
                margin-left: 0;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }

            .navbar-brand img {
                width: 100px;
            }
        }

        @media (max-width: 768px) {
            .auth-buttons {
                margin-top: 10px;
                margin-left: 0;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }

            .navbar-brand img {
                width: 80px;
            }

            .card {
                margin: 20px 0;
            }

            .account-block .account-testimonial {
                top: 20%;
            }
        }

        @media (max-width: 576px) {
            .auth-buttons {
                margin-top: 10px;
                margin-left: 0;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }

            .navbar-brand img {
                width: 60px;
            }

            .card {
                margin: 20px 0;
            }

            .account-block .account-testimonial {
                top: 20%;
                padding: 0 10px;
            }

            .btn {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg py-2 navbar-dark navbar-bg-dark ">
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
                        <a href="postproperty.html" class="btn btn-danger rounded-0">Post Property</a>
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
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-danger">Login</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-2">Enter your email address and password </p>

<!-- Login Form -->
<form id="loginForm" onsubmit="submitLoginForm(event)">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
    </div>
    <div class="form-group mb-2">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    </div>
    <button type="submit" class="btn btn-danger rounded-0" id="loginBtn">Login</button>
    <a href="forgot.html" class="forgot-link float-right text-primary">Forgot password?</a>

    <!-- Google login button -->
    <button type="button" class="btn btn-outline-danger btn-block mt-3">
        <i class="bi bi-google"></i> Login with Google
    </button>

    <!-- Facebook login button -->
    <button type="button" class="btn btn-outline-primary btn-block">
        <i class="bi bi-facebook"></i> Login with Facebook
    </button>
</form>

<!-- Confirmation Message -->
<div class="confirmation-message" style="display: none;">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome Back!</h4>
        <p>You are successfully logged in.</p>
    </div>
</div>

<!-- Error Message -->
<div class="error-message" style="display: none;">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Oops!</h4>
        <p class="error-text"></p>
    </div>
</div>


<script>

    // Function to handle login form submission via AJAX
    function submitLoginForm(event) {
        event.preventDefault();  // Prevent the default form submission

        let form = new FormData(event.target);  // Collect form data
        let confirmationMessage = document.querySelector(".confirmation-message");
        let errorMessage = document.querySelector(".error-message");
        let submitButton = document.querySelector("button[type='submit']");

        // Disable the submit button to prevent multiple clicks
        submitButton.disabled = true;
        submitButton.innerText = "Logging in...";  // Change button text
        console.log('test');
        $.ajax({
            url: 'actions/login/login.php',  // PHP file to handle login
            type: 'POST',
            data: form,
            processData: false,  // Don't process the data
            contentType: false,  // Let jQuery set the content type
            success: function(response) {
                let data = JSON.parse(response);  // Parse JSON response

                if (data.success) {
                    // Display confirmation message on success
                    confirmationMessage.style.display = "block";
                    errorMessage.style.display = "none";  // Hide error message
                    window.location.href = data.redirect_url;  // Redirect to dashboard
                } else {
                    // Display error message if login failed
                    errorMessage.querySelector(".error-text").textContent = data.message;
                    errorMessage.style.display = "block";
                    confirmationMessage.style.display = "none";  // Hide confirmation message
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                errorMessage.querySelector(".error-text").textContent = "An error occurred: " + error;
                errorMessage.style.display = "block";
                confirmationMessage.style.display = "none";
            },
            complete: function() {
                // Re-enable the submit button
                submitButton.disabled = false;
                submitButton.innerText = "Login";  // Reset button text
            }
        })
        ;
        console.log('test');
    }
</script>

                                    <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a
                                            href="register.html" class="text-primary ml-1">Register</a></p>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Find your property that suits you </h4>
                                        <p class="lead text-white">"Best investment i made for a long time. Can only
                                            recommend it for other users."</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->



                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>