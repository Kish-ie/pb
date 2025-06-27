<?php
require_once __DIR__ . '/../config/config.php'; // Include client-specific config
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$page = ($currentPage === 'index.php' && (!isset($_GET['page']) || $_GET['page'] === 'home')) ? 'home' : (isset($_GET['page']) ? $_GET['page'] : str_replace('.php', '', $currentPage));
$currentUrl = $_SERVER['REQUEST_URI'];
?>
<!-- Footer with improved structure -->
<footer class="main-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col footer-about">
                <a href="<?= BASE_URL ?>index.php?page=home" class="footer-logo" aria-label="PBIRT Institute Home">
                    <img src="<?= BASE_URL ?>assets/images/logo-white.svg" alt="PBIRT Institute Logo" width="180" height="60">
                </a>
                <p>PB Training Institute of Research and Technology is a non-profit institution registered in Kenya committed to promoting excellence and integrity in accounting, technology, and research.</p>

                <div class="footer-social">
                    <a href="https://facebook.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <i class="fab fa-x-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="https://linkedin.com/company/pbirt" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    </a>
                    <a href="https://instagram.com/pbirt" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="footer-col footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?= ($page === 'home' && $currentPage === 'index.php') ? $currentUrl : BASE_URL . 'index.php?page=home'; ?>">Home</a></li>
                    <li><a href="<?= ($page === 'about') ? $currentUrl : BASE_URL . 'about.php?page=about'; ?>">About Us</a></li>
                    <li><a href="<?= ($page === 'courses') ? $currentUrl : BASE_URL . 'courses/index.php?page=courses'; ?>">Courses</a></li>
                    <li><a href="<?= ($page === 'trainings') ? $currentUrl : BASE_URL . 'trainings/?page=trainings'; ?>">Training & Consultancies</a></li>
                    <li><a href="<?= ($page === 'gallery') ? $currentUrl : BASE_URL . 'gallery?page=gallery'; ?>">Gallery</a></li>
                    <li><a href="<?= ($page === 'vacancies') ? $currentUrl : BASE_URL . 'vacancies?page=vacancies'; ?>">Vacancies</a></li>
                    <li><a href="<?= ($page === 'contact') ? $currentUrl : BASE_URL . 'contact.php?page=contact'; ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col footer-courses">
                <h3>Our Courses</h3>
                <ul>
                    <li><a href="<?= BASE_URL ?>courses/index.php?page=courses">Certified Public Accountants (CPA)</a></li>
                    <li><a href="<?= BASE_URL ?>courses/atd">Accounting Technicians Diploma (ATD)</a></li>
                    <li><a href="<?= BASE_URL ?>courses/cams">Certificate in Accounting & Management</a></li>
                    <li><a href="<?= BASE_URL ?>courses/computer">Computer Packages</a></li>
                    <li><a href="<?= BASE_URL ?>courses/graphic">Graphic Design</a></li>
                    <li><a href="<?= BASE_URL ?>courses/accounting-software">Accounting Software</a></li>
                    <li><a href="<?= BASE_URL ?>courses/research">Research Methods</a></li>
                </ul>
            </div>

            <div class="footer-col footer-newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter to receive updates on courses, events, and more.</p>
                <form class="newsletter-form" action="<?= BASE_URL ?>subscribe.php" method="POST">
                    <label for="newsletter-email" class="sr-only">Email address</label>
                    <input type="email" id="newsletter-email" name="email" placeholder="Your email address" required aria-label="Enter your email to subscribe">
                    <button type="submit" aria-label="Subscribe to newsletter">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">
                © <?= date('Y') ?> PBIRT Institute. All Rights Reserved.
            </div>
            <div class="footer-legal">
                <a href="<?= BASE_URL ?>privacy">Privacy Policy</a>
                <a href="<?= BASE_URL ?>terms">Terms of Service</a>
                <a href="<?= BASE_URL ?>sitemap">Sitemap</a>
            </div>
        </div>
    </div>
</footer>