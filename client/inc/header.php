<?php
require_once __DIR__ . '/../config/config.php'; // Include client-specific config
$currentPage = basename($_SERVER['SCRIPT_NAME']); // Get the current script name
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Simplified page detection

// Function to generate consistent navigation URLs
function navUrl($pageName) {
    return ($pageName === 'home')
        ? BASE_URL . 'index.php?page=home'
        : BASE_URL . $pageName . '.php?page=' . $pageName;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PBIRT Institute - Premier accounting, technology and research training in Kenya">
    <meta name="keywords" content="CPA courses, ATD, accounting training, Kenya, computer packages, research institute">
    <title>PBIRT Institute | <?php echo ucfirst($page); ?> | Accounting & Technology Training</title>

    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/main.min.css" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/js/main.min.js" as="script">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/index.css">
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/favicon.png">

    <!-- Font Awesome -->
    <script defer src="https://kit.fontawesome.com/c656c17c23.js" crossorigin="anonymous"></script>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" media="print" onload="this.media='all'">

    <style>
    /* ==========================================================================
       Header Styles (restored from original)
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
        width: 100%;
        align-items: center;
    }

    .nav-links > li {
        text-align: center;
        position: relative;
    }

    .nav-links a {
        color: var(--dark);
        font-weight: 600;

        position: relative;
        display: block;
        width: 100%;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: var(--primary);
        transition: var(--transition);
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
        justify-content: center;
        width: 100%;
    }

    .dropdown-toggle i {
        margin-left: 0.25rem;
        transition: var(--transition);
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        min-width: 200px;
        background-color: var(--white);
        box-shadow: var(--shadow-lg);
        border-radius: var(--radius-md);
        padding: 0.5rem 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px) translateX(-50%);
        transition: var(--transition);
        z-index: 100;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) translateX(-50%);
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .nav-links {
            display: none;
            flex-direction: column;
            width: 100%;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-links > li {
            flex: none;
            text-align: left;
            padding: 1rem;
            width: 100%;
        }

        .dropdown-menu {
            position: static;
            transform: none;
            width: 100%;
            box-shadow: none;
            opacity: 1;
            visibility: visible;
            display: none;
        }

        .dropdown.active .dropdown-menu {
            display: block;
        }

        .mobile-menu-toggle {
            display: block;
        }

        .nav-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .logo {
            margin-bottom: 1rem;
        }
    }

    /* Loading animation */
    @keyframes loading {
        0% { width: 0; left: 0; }
        50% { width: 100%; left: 0; }
        100% { width: 0; left: 100%; }
    }
    </style>
</head>
<body>
    <!-- Skip to a content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

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
                    <a href="<?php echo navUrl('home'); ?>" class="logo" aria-label="PBIRT Institute Home">
                        <img src="<?php echo BASE_URL; ?>assets/images/logo.svg" alt="PBIRT Institute Logo" width="180" height="60">
                    </a>

                    <button class="mobile-menu-toggle" aria-expanded="false" aria-controls="primary-navigation">
                        <span class="sr-only">Menu</span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>

                    <ul id="primary-navigation" class="nav-links">
                        <li>
                            <a href="<?php echo navUrl('home'); ?>" class="<?php echo ($page === 'home') ? 'active' : ''; ?>">
                                HOME
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="<?php echo navUrl('about'); ?>" class="dropdown-toggle <?php echo ($page === 'about') ? 'active' : ''; ?>" aria-expanded="false" aria-controls="about-dropdown">
                                ABOUT US <i class="fas fa-chevron-down" aria-hidden="true"></i>
                            </a>
                            <ul id="about-dropdown" class="dropdown-menu">
                                <li><a href="<?php echo navUrl('about'); ?>#our-story">Our Story</a></li>
                                <li><a href="<?php echo navUrl('about'); ?>#mission">Mission & Vision</a></li>
                                <li><a href="<?php echo navUrl('about'); ?>#partners">Partners</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('courses'); ?>" class="<?php echo ($page === 'courses') ? 'active' : ''; ?>">
                                COURSES
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('trainings'); ?>" class="<?php echo ($page === 'trainings') ? 'active' : ''; ?>">
                                TRAINING AND CONSULTANCIES
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('gallery'); ?>" class="<?php echo ($page === 'gallery') ? 'active' : ''; ?>">
                                GALLERY
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('vacancies'); ?>" class="<?php echo ($page === 'vacancies') ? 'active' : ''; ?>">
                                VACANCIES
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('contact'); ?>" class="<?php echo ($page === 'contact') ? 'active' : ''; ?>">
                                CONTACT US
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo navUrl('downloads'); ?>" class="<?php echo ($page === 'downloads') ? 'active' : ''; ?>">
                                DOWNLOADS
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URL; ?>login.php" class="btn btn-primary">
                                LOGIN
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const toggleButton = document.querySelector('.mobile-menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        toggleButton.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            navLinks.classList.toggle('active');
        });

        // Dropdown functionality for mobile
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            });
        });

        // Smooth navigation with a loading indicator
        document.querySelectorAll('a[href^="<?php echo BASE_URL; ?>"]').forEach(link => {
            link.addEventListener('click', function(e) {
                // Skip for anchor links and external links
                if (this.href.includes('#') || this.target === '_blank') return;

                e.preventDefault();

                // Close the mobile menu if open
                if (window.innerWidth <= 768 && navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                    toggleButton.setAttribute('aria-expanded', 'false');
                }

                // Show loading indicator
                document.body.classList.add('page-loading');

                // Navigate after a brief delay for animation
                setTimeout(() => {
                    window.location.href = this.href;
                }, 300);
            });
        });
    });
    </script>
</body>
</html>