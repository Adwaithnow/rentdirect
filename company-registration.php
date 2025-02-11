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
                        <a href="login.html" class="btn btn-outline-light rounded-0 mr-2">Login Now</a>
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
                                    <form id="companyRegistrationForm">
    <div class="form-group">
        <label for="exampleInputCompanyName">Company Name</label>
        <input type="text" class="form-control" id="exampleInputCompanyName" name="companyName">
    </div>
    <div class="form-group">
        <label for="complogo">Company Logo</label>
        <input type="file" id="complogo" name="complogo" class="form-control-file" accept="image/*" required>
    </div>
    <div class="form-group">
        <label for="compregno">Company Registration No</label>
        <input type="text" class="form-control" id="compregno" name="compregno">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="password">
    </div>
    <div class="form-group">
        <label for="exampleInputConfirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword" name="confirmPassword">
    </div>
    <button type="submit" class="btn btn-danger rounded-0" id="registerBtn">Register</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Prevent multi-clicks by disabling the button when clicked
    $("#companyRegistrationForm").submit(function(e) {
        e.preventDefault();

        // Validate fields before sending the AJAX request
        let companyName = $("#exampleInputCompanyName").val();
        let companyLogo = $("#complogo")[0].files.length;
        let regNo = $("#compregno").val();
        let email = $("#exampleInputEmail").val();
        let password = $("#exampleInputPassword").val();
        let confirmPassword = $("#exampleInputConfirmPassword").val();

        if (!companyName || !companyLogo || !regNo || !email || !password || !confirmPassword) {
            alert("All fields are required!");
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        // Disable the submit button to prevent multi-click
        $("#registerBtn").prop("disabled", true);

        // Prepare form data (including file data)
        let formData = new FormData(this);

        // AJAX request to send data to PHP
        $.ajax({
            url: 'actions/registration/company_registration.php',  // PHP file to handle the registration
            type: "POST",
            data: formData,
            processData: false,  // Don't process the file
            contentType: false,  // Set content-type to false for file upload
            success: function(response) {
                let data = JSON.parse(response);
                if (data.success) {
                    alert("Registration successful!");
                } else {
                    alert(data.message);
                }
                // Enable the button again after the request is complete
                $("#registerBtn").prop("disabled", false);
            },
            error: function() {
                alert("There was an error processing your request.");
                $("#registerBtn").prop("disabled", false);  // Enable button in case of error
            }
        });
    });
});
</script>

                                    <p class="text-muted text-center mt-3 mb-0">Already have an account? <a
                                            href="login.html" class="text-primary ml-1">Login</a></p>
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