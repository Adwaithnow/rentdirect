
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Direct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <style>
        .card-img-top {
            width: 100%;
            height: auto;
        }

        .card {
            margin-bottom: 20px;
        }

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

        @media (max-width: 768px) {
            .account-block {
                height: auto;
                padding: 20px;
            }

            .account-block .account-testimonial {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
<?php include 'views/header.php'; ?>
<div class="container mt-5">
        <h1>Welcome </h1>
        <div class="row">
            <!-- Property Card 1 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="assets/images/1.jpg" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Description of Property 1</p>
                        <a href="#" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg> Edit </a>
                        <a href="#" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg> Delete </a>
                        <a href="#" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680q50 0 90.5 22t69.5 58h320q50 0 85 35t35 85q0 50-35 85t-85 35H440q-29 36-69.5 58T280-280Zm0-200Zm196 40h284q17 0 28.5-11.5T800-480q0-17-11.5-28.5T760-520H476q2 9 3 20t1 20q0 9-1 20t-3 20Zm-196 80q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                            </svg> Activate </a>
                        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-240q-100 0-170-70T40-480q0-100 70-170t170-70h400q100 0 170 70t70 170q0 100-70 170t-170 70H280Zm0-80h400q66 0 113-47t47-113q0-66-47-113t-113-47H280q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-40q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm200-120Z" />
                            </svg> Deactivate </a>
                    </div>
                </div>
            </div>
            <!-- Property Card 2 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="assets/images/2.jpg" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Description of Property 1</p>
                        <a href="#" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg> Edit </a>
                        <a href="#" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg> Delete </a>
                        <a href="#" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680q50 0 90.5 22t69.5 58h320q50 0 85 35t35 85q0 50-35 85t-85 35H440q-29 36-69.5 58T280-280Zm0-200Zm196 40h284q17 0 28.5-11.5T800-480q0-17-11.5-28.5T760-520H476q2 9 3 20t1 20q0 9-1 20t-3 20Zm-196 80q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                            </svg> Activate </a>
                        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-240q-100 0-170-70T40-480q0-100 70-170t170-70h400q100 0 170 70t70 170q0 100-70 170t-170 70H280Zm0-80h400q66 0 113-47t47-113q0-66-47-113t-113-47H280q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-40q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm200-120Z" />
                            </svg> Deactivate </a>
                    </div>
                </div>
            </div>
            <!-- Add more property cards as needed -->
        </div>
        <div class="row">
            <!-- Property Card 1 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="assets/images/1.jpg" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Description of Property 1</p>
                        <a href="#" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg> Edit </a>
                        <a href="#" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg> Delete </a>
                        <a href="#" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680q50 0 90.5 22t69.5 58h320q50 0 85 35t35 85q0 50-35 85t-85 35H440q-29 36-69.5 58T280-280Zm0-200Zm196 40h284q17 0 28.5-11.5T800-480q0-17-11.5-28.5T760-520H476q2 9 3 20t1 20q0 9-1 20t-3 20Zm-196 80q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                            </svg> Activate </a>
                        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-240q-100 0-170-70T40-480q0-100 70-170t170-70h400q100 0 170 70t70 170q0 100-70 170t-170 70H280Zm0-80h400q66 0 113-47t47-113q0-66-47-113t-113-47H280q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-40q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm200-120Z" />
                            </svg> Deactivate </a>
                    </div>
                </div>
            </div>
            <!-- Property Card 2 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="assets/images/2.jpg" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property 1</h5>
                        <p class="card-text">Description of Property 1</p>
                        <a href="#" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg> Edit </a>
                        <a href="#" class="btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg> Delete </a>
                        <a href="#" class="btn btn-success"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680q50 0 90.5 22t69.5 58h320q50 0 85 35t35 85q0 50-35 85t-85 35H440q-29 36-69.5 58T280-280Zm0-200Zm196 40h284q17 0 28.5-11.5T800-480q0-17-11.5-28.5T760-520H476q2 9 3 20t1 20q0 9-1 20t-3 20Zm-196 80q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
                            </svg> Activate </a>
                        <a href="#" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                <path
                                    d="M280-240q-100 0-170-70T40-480q0-100 70-170t170-70h400q100 0 170 70t70 170q0 100-70 170t-170 70H280Zm0-80h400q66 0 113-47t47-113q0-66-47-113t-113-47H280q-66 0-113 47t-47 113q0 66 47 113t113 47Zm0-40q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm200-120Z" />
                            </svg> Deactivate </a>
                    </div>
                </div>
            </div>
            <!-- Add more property cards as needed -->
        </div>
    </div>

    <?php include 'views/footer.php'; ?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>