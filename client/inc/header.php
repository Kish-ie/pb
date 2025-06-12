<?php
require_once __DIR__ . '/../config/config.php'; // Include client-specific config
$currentPage = basename($_SERVER['SCRIPT_NAME']); // Get the current script name (e.g., index.php)
$page = $_GET['page'] ?? 'home'; // Get the 'page' from query parameter, default to 'home'
$currentUrl = $_SERVER['REQUEST_URI']; // Get the full current URL for refresh
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PBIRT Institute - Premier accounting, technology and research training in Kenya">
    <meta name="keywords" content="CPA courses, ATD, accounting training, Kenya, computer packages, research institute">
    <title>PBIRT Institute | Accounting & Technology Training</title>

    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/main.min.css" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/js/main.min.js" as="script">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/index.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/favicon.png">

    <!-- Main CSS (optimized) -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.min.css">

    <!-- Font Awesome (optimized loading) -->
    <script defer src="https://kit.fontawesome.com/c656c17c23.js" crossorigin="anonymous"></script>

    <!-- AOS CSS (loaded conditionally) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" media="print" onload="this.media='all'">
    <style>

</style>
</head>
<body>
    <!-- Skip to content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Header with improved semantic structure -->
    <header class="header" role="banner">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="contact-info">
                        <a href="mailto:info@pbinstituteofresearch.co.ke" aria-label="Email PBIRT Institute">
                            <i class="fas fa-envelope" aria-hidden="true"></i> info@pbinstituteofresearch.co.ke
                        </a>
                        <a href="tel:+254721214795" aria-label="Call PBIRT Institute">
                            <i class="fas fa-phone-alt" aria-hidden="true"></i> +254 721 214 795
                        </a>
                    </div>

                    <div class="social-links">
                        <span>Follow Us:</span>
                        <a href="https://facebook.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://linkedin.com/company/pbirt" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                        <a href="https://twitter.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                            <i class="fab fa-x-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="main-nav" role="navigation" aria-label="Main navigation">
            <div class="container">
                <div class="nav-content">
                    <a href="<?= BASE_URL ?>index.php?page=home" class="logo" aria-label="PBIRT Institute Home">
                        <img src="<?= BASE_URL ?>assets/images/logo.svg" alt="PBIRT Institute Logo" width="180" height="60">
                    </a>

                    <!-- Mobile menu button -->
                    <button class="mobile-menu-toggle" aria-expanded="false" aria-controls="primary-navigation">
                        <span class="sr-only">Menu</span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>

                    <ul id="primary-navigation" class="nav-links">
                        <li><a href="<?php echo BASE_URL; ?>index.php/?page=home" class="active">Home</a></li>
                        <li class="dropdown">
                            <button class="dropdown-toggle" aria-expanded="false" aria-controls="about-dropdown"><a href="<?php echo BASE_URL; ?>./about/?page=about"> About Us</a>
                                <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul id="about-dropdown" class="dropdown-menu">
                                <li><a href="<?php echo BASE_URL; ?>./about/?page=about#our-story">Our Story</a></li>
                                <li><a href="<?php echo BASE_URL; ?>./about/?page=about#mission">Mission & Vision</a></li>
                                <li><a href="<?php echo BASE_URL; ?>./about/?page=about#partners">Partners</a></li>
                            </ul>
                        </li>

                        <!-- Courses -->
                        <li class="dropdown">
                            <button class="dropdown-toggle" aria-expanded="false" aria-controls="courses-dropdown">
                                Courses <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul id="courses-dropdown" class="dropdown-menu">
                                <li><a href="<?= ($page === 'courses') ? $currentUrl : BASE_URL . 'courses/index.php?page=courses'; ?>"
                                       class="<?= ($page === 'courses') ? 'active' : ''; ?>">Certified Public Accountants (CPA)</a></li>
                                <li><a href="<?= BASE_URL ?>courses/atd">Accounting Technicians Diploma (ATD)</a></li>
                                <li><a href="<?= BASE_URL ?>courses/cams">Certificate in Accounting & Management</a></li>
                                <li><a href="<?= BASE_URL ?>courses/computer">Computer Packages</a></li>
                                <li><a href="<?= BASE_URL ?>courses/graphic">Graphic Design</a></li>
                                <li><a href="<?= BASE_URL ?>courses/accounting-software">Accounting Software</a></li>
                            </ul>
                        </li>

                        <!-- Contact -->
                        <li>
                            <a href="<?= ($page === 'contact') ? $currentUrl : BASE_URL . 'contact.php'; ?>"
                               class="<?= ($page === 'contact') ? 'active' : ''; ?>">
                                Contact
                            </a>
                        </li>

                        <!-- Training & Consultancies -->
                        <li>
                            <a href="<?= ($page === 'trainings') ? $currentUrl : BASE_URL . 'trainings/?page=trainings'; ?>"
                               class="<?= ($page === 'trainings') ? 'active' : ''; ?>">
                                Training & Consultancies
                            </a>
                        </li>

                        <!-- Gallery -->
                        <li>
                            <a href="<?= ($page === 'gallery') ? $currentUrl : BASE_URL . 'gallery'; ?>"
                               class="<?= ($page === 'gallery') ? 'active' : ''; ?>">
                                Gallery
                            </a>
                        </li>

                        <!-- Vacancies -->
                        <li>
                            <a href="<?= ($page === 'vacancies') ? $currentUrl : BASE_URL . 'vacancies'; ?>"
                               class="<?= ($page === 'vacancies') ? 'active' : ''; ?>">
                                Vacancies
                            </a>
                        </li>

                        <!-- Downloads -->
                        <li>
                            <a href="<?= ($page === 'downloads') ? $currentUrl : BASE_URL . 'downloads'; ?>"
                               class="<?= ($page === 'downloads') ? 'active' : ''; ?>">
                                Downloads
                            </a>
                        </li>

                        <!-- Login -->
                        <li>
                            <a href="<?= BASE_URL ?>login.html" class="btn btn-primary">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>