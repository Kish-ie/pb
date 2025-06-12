<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']); // Get the current script name (e.g., index.php)
$page = $_GET['page'] ?? 'home'; // Get the 'page' from query parameter, default to 'home'
?>

<nav class="main-nav" role="navigation" aria-label="Main navigation">
    <div class="container">
        <div class="nav-content">
            <a href="<?= BASE_URL ?>index.php?page=home" class="logo" aria-label="PBIRT Institute Home">
                <img src="<?= BASE_URL ?>assets/images/logo.svg" alt="PBIRT Institute Logo" width="180" height="60">
            </a>
            <ul id="primary-navigation" class="nav-links">
                <!-- Home Link -->
                <li>
                    <a href="<?= ($page === 'home') ? 'javascript:void(0);' : BASE_URL . 'index.php?page=home'; ?>"
                       class="<?= ($page === 'home') ? 'active' : ''; ?>">
                        Home
                    </a>
                </li>

                <!-- About Us -->
                <li>
                    <a href="<?= ($page === 'about') ? 'javascript:void(0);' : BASE_URL . 'about.php'; ?>"
                       class="<?= ($page === 'about') ? 'active' : ''; ?>">
                        About
                    </a>
                </li>

                <!-- Courses -->
                <li>
                    <a href="<?= ($page === 'courses') ? 'javascript:void(0);' : BASE_URL . 'courses/index.php'; ?>"
                       class="<?= ($page === 'courses') ? 'active' : ''; ?>">
                        Courses
                    </a>
                </li>

                <!-- Contact -->
                <li>
                    <a href="<?= ($page === 'contact') ? 'javascript:void(0);' : BASE_URL . 'contact.php'; ?>"
                       class="<?= ($page === 'contact') ? 'active' : ''; ?>">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php
