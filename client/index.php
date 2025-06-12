<?php
// Load global config
require_once __DIR__ . '/global_config_utils.php';

// Include shared header
require_once __DIR__ . '/inc/header.php';

// List of allowed folders/pages
$allowedPages = ['home', 'dashboard', 'courses', 'trainings', 'user', 'student', 'course_view','gallery','contact','vacancies','downloads'];

// Get requested page from URL (e.g., ?page=dashboard)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Build path: looking for /{page}/index.php
$pagePath = __DIR__ . "/$page/index.php";

// Validate and include the page
if (in_array($page, $allowedPages) && file_exists($pagePath)) {
    include $pagePath;
} else {
    include __DIR__ . '/home.php';
}

// Include shared footer
require_once __DIR__ . '/inc/footer.php';
