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
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!-- Main CSS (optimized) -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.min.css">

    <!-- Font Awesome (optimized loading) -->
    <script defer src="https://kit.fontawesome.com/c656c17c23.js" crossorigin="anonymous"></script>

    <!-- AOS CSS (loaded conditionally) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" media="print" onload="this.media='all'">
    <style>
/* ==========================================================================
Header Styles
========================================================================== */
.header {
position: fixed;
top: 0;
left: 0;
width: 100%;
z-index: 1000;
box-shadow: var(--shadow-sm);
}

.top-bar {
background-color: var(--primary);
color: var(--white);
padding: 0.5rem 0;
font-size: 0.875rem;
}

.top-bar-content {
display: flex;
justify-content: space-between;
align-items: center;
}

.contact-info a {
color: var(--white);
margin-right: 1.5rem;
display: inline-flex;
align-items: center;
}

.contact-info a:hover {
opacity: 0.9;
}

.contact-info i {
margin-right: 0.5rem;
}

.social-links {
display: flex;
align-items: center;
}

.social-links span {
margin-right: 0.75rem;
}

.social-links a {
color: var(--white);
margin-left: 0.75rem;
width: 28px;
height: 28px;
border-radius: 50%;
display: inline-flex;
align-items: center;
justify-content: center;
background-color: rgba(255, 255, 255, 0.2);
transition: var(--transition);
}

.social-links a:hover {
background-color: var(--white);
color: var(--primary);
}

.main-nav {
background-color: var(--white);
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.nav-content {
display: flex;
justify-content: space-between;
align-items: center;
padding: 1rem 0;
}

.logo img {
height: 50px;
width: auto;
}

.mobile-menu-toggle {
display: none;
background: none;
border: none;
cursor: pointer;
padding: 0.5rem;
z-index: 1001;
}

.mobile-menu-toggle .bar {
display: block;
width: 25px;
height: 3px;
background-color: var(--dark);
margin: 5px 0;
transition: var(--transition);
}

.nav-links {
display: flex;
list-style: none;
}

.nav-links > li {
position: relative;
margin-left: 1.5rem;
}

.nav-links a {
color: var(--dark);
font-weight: 600;
padding: 0.5rem 0;
position: relative;
}

.nav-links a::after {
content: '';
position: absolute;
bottom: 0;
left: 0;
width: 0;
height: 2px;
background-color: var(--primary);
transition: var(--transition);
}

.nav-links a:hover::after,
.nav-links .active::after {
width: 100%;
}

.dropdown-toggle {
background: none;
border: none;
font-family: inherit;
font-weight: 600;
color: var(--dark);
cursor: pointer;
display: flex;
align-items: center;
}

.dropdown-toggle i {
margin-left: 0.25rem;
transition: var(--transition);
}

.dropdown-menu {
position: absolute;
top: 100%;
left: 0;
min-width: 200px;
background-color: var(--white);
box-shadow: var(--shadow-lg);
border-radius: var(--radius-md);
padding: 0.5rem 0;
opacity: 0;
visibility: hidden;
transform: translateY(10px);
transition: var(--transition);
z-index: 100;
}

.dropdown:hover .dropdown-menu {
opacity: 1;
visibility: visible;
transform: translateY(0);
}

.dropdown-menu li {
margin: 0;
}

.dropdown-menu a {
display: block;
padding: 0.5rem 1.5rem;
color: var(--dark);
transition: var(--transition);
}

.dropdown-menu a:hover {
background-color: var(--gray);
color: var(--primary);
}
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
                    <a href="/" class="logo" aria-label="PBIRT Institute Home">
                        <img src="assets/images/logo.svg" alt="PBIRT Institute Logo" width="180" height="60">
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
                            <button class="dropdown-toggle" aria-expanded="false" aria-controls="about-dropdown">
                                About Us <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul id="about-dropdown" class="dropdown-menu">
                                <li><a href="/about">Our Story</a></li>
                                <li><a href="/mission">Mission & Vision</a></li>
                                <li><a href="/team">Our Team</a></li>
                                <li><a href="/partners">Partners</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
  <button class="dropdown-toggle" aria-expanded="false" aria-controls="courses-dropdown">
    Courses <i class="fas fa-chevron-down" aria-hidden="true"></i>
  </button>
  <ul id="courses-dropdown" class="dropdown-menu">
    <li><a href="<?php echo BASE_URL; ?>courses/?page=courses">Certified Public Accountants (CPA)</a></li>
    <li><a href="<?php echo BASE_URL; ?>courses/atd">Accounting Technicians Diploma (ATD)</a></li>
    <li><a href="<?php echo BASE_URL; ?>courses/cams">Certificate in Accounting & Management</a></li>
    <li><a href="<?php echo BASE_URL; ?>courses/computer">Computer Packages</a></li>
    <li><a href="<?php echo BASE_URL; ?>courses/graphic">Graphic Design</a></li>
    <li><a href="<?php echo BASE_URL; ?>courses/accounting-software">Accounting Software</a></li>
  </ul>
</li>

                        <li><a href="<?php echo BASE_URL; ?>./trainings/?page=trainings">Training & Consultancies</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/vacancies">Vacancies</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/downloads">Downloads</a></li>
                        <!-- Add the login button here -->
                        <li><a href="login.html" class="btn btn-primary">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>