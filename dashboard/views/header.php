<!-- header.php -->
<?php
// Start session (if not already started)
session_start();
// Check if the user is logged in by verifying the presence of the user role and user ID cookies
if (!(isset($_COOKIE['user_role']) && isset($_COOKIE['user_id']))) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit();
}
?>
<header class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg py-2 navbar-dark navbar-bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/images/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'post_property.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="post_property.php">Post Property</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'findagent.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="findagent.php">Find Agent</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact.html' ? 'active' : ''; ?>">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
                <div class="auth-buttons ml-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-danger rounded-0" href="../actions/login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
