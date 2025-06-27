<?php
/**
 * Global Configuration and Utility Functions for the Client Side
 *
 * This file contains system-wide configurations, path definitions, and utility functions
 * for the client side of the PBIRT application.
 *
 * @package PBIRT
 * @version 1.1.0
 */

// ==============================================
// BASE URL CONFIGURATION
// ==============================================

/**
 * Define base URL with proper sanitization
 */
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
             (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? '198.251.88.32';
$scriptPath = dirname($_SERVER['SCRIPT_NAME']);

// Normalize the path
$scriptPath = str_replace('\\', '/', $scriptPath); // Convert backslashes to forward slashes
$scriptPath = rtrim($scriptPath, '/') . '/';

define('BASE_URL', $protocol . $host . $scriptPath);

// ==============================================
// SECURITY AND ERROR HANDLING CONFIGURATION
// ==============================================

// Define environment
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'development'); // Change to 'production' for live site
}

if (ENVIRONMENT === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// ==============================================
// PATH CONFIGURATIONS
// ==============================================

/**
 * Define application base paths with directory separator awareness
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)) . DS); // Points to pbirt/
define('CLIENT_PATH', dirname(__DIR__) . DS); // Points to client/
define('CONFIG_PATH', __DIR__ . DS);
define('INC_PATH', CLIENT_PATH . 'inc' . DS);
define('ASSETS_PATH', CLIENT_PATH . 'assets' . DS);
define('CLASSES_PATH', CLIENT_PATH . 'classes' . DS);
define('CSS_PATH', ASSETS_PATH . 'css' . DS);
define('JS_PATH', ASSETS_PATH . 'js' . DS);

// ==============================================
// URL CONFIGURATION
// ==============================================

/**
 * Define URL paths based on BASE_URL
 */
define('ASSETS_URL', rtrim(BASE_URL, '/') . '/assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');

// ==============================================
// FILE INCLUSION FUNCTIONS
// ==============================================

/**
 * Safely include a file with error handling
 *
 * @param string $path Full path to the file
 * @param bool $once Whether to include once
 * @param bool $required Whether to throw exception if file not found
 * @throws RuntimeException If file not found and required
 * @return bool True if included successfully
 */
function safe_include($path, $once = true, $required = true) {
    if (!file_exists($path)) {
        $errorMsg = "File not found: {$path}";
        if ($required) {
            throw new RuntimeException($errorMsg);
        }
        error_log($errorMsg);
        return false;
    }
    return $once ? include_once $path : include $path;
}

/**
 * Include a file from the inc directory
 *
 * @param string $filename The filename to include
 * @param bool $once Whether to include once
 * @return void
 */
function include_inc($filename, $once = true) {
    $filePath = INC_PATH . ltrim($filename, '/');
    safe_include($filePath, $once);
}

// ==============================================
// PATH RESOLUTION FUNCTIONS
// ==============================================

/**
 * Get full system path for a file in specified directory
 *
 * @param string $type Directory type (inc, assets, CSS, js, classes, config)
 * @param string $filename File to append to a path
 * @return string Full system path
 */
function get_path($type, $filename = '') {
    $paths = [
        'inc' => INC_PATH,
        'assets' => ASSETS_PATH,
        'css' => CSS_PATH,
        'js' => JS_PATH,
        'classes' => CLASSES_PATH,
        'root' => ROOT_PATH,
        'config' => CONFIG_PATH // Added 'config' to the valid types
    ];

    if (!array_key_exists($type, $paths)) {
        throw new InvalidArgumentException("Invalid path type: {$type}");
    }

    return rtrim($paths[$type], DS) . DS . ltrim($filename, '/');
}

// ==============================================
// ASSET MANAGEMENT FUNCTIONS
// ==============================================

/**
 * Generate HTML for including a CSS file with cache busting
 *
 * @param string $filename CSS filename
 * @param bool $cacheBust Whether to append modification time
 * @return string HTML link tag
 */
function css($filename, $cacheBust = true) {
    $filePath = CSS_PATH . ltrim($filename, '/');

    if (!file_exists($filePath)) {
        error_log("CSS file not found: {$filename}");
        return "<!-- CSS file not found: {$filename} -->";
    }

    $url = CSS_URL . $filename;

    if ($cacheBust) {
        $mtime = filemtime($filePath);
        $url .= "?v={$mtime}";
    }

    return '<link rel="stylesheet" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">';
}

/**
 * Generate HTML for including a JS file with cache busting
 *
 * @param string $filename JS filename
 * @param bool $cacheBust Whether to append modification time
 * @param bool $defer Whether to add defer attribute
 * @return string HTML script tag
 */
function js($filename, $cacheBust = true, $defer = false) {
    $filePath = JS_PATH . ltrim($filename, '/');

    if (!file_exists($filePath)) {
        error_log("JS file not found: {$filename}");
        return "<!-- JS file not found: {$filename} -->";
    }

    $url = JS_URL . $filename;

    if ($cacheBust) {
        $mtime = filemtime($filePath);
        $url .= "?v={$mtime}";
    }

    $deferAttr = $defer ? ' defer' : '';
    return '<script src="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"' . $deferAttr . '></script>';
}

/**
 * Include global CSS files with cache busting
 *
 * @return void
 */
function include_global_css() {
    echo css('index.css');
    echo css('style.css');
}

// ==============================================
// DATABASE AND SESSION INITIALIZATION
// ==============================================

// Initialize database connection with a configurable path
$dbConnectionFile = get_path('classes', 'dbconnection.php'); // Line 212
if (file_exists($dbConnectionFile)) {
    safe_include($dbConnectionFile);
} else {
    error_log("Database connection file not found: {$dbConnectionFile}");
}

// Start session with secure settings
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_secure' => (strpos(BASE_URL, 'https://') === 0),
        'cookie_httponly' => true,
        'use_strict_mode' => true
    ]);
}

// ==============================================
// SECURITY FUNCTIONS
// ==============================================

/**
 * Sanitize output data
 *
 * @param mixed $data Data to sanitize
 * @param string $encoding Character encoding
 * @return mixed Sanitized data
 */
function sanitize_output($data, $encoding = 'UTF-8') {
    if (is_array($data)) {
        return array_map('sanitize_output', $data);
    }
    return htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, $encoding);
}

/**
 * Generate CSRF token and store in session
 *
 * @return string Generated token
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validate CSRF token
 *
 * @param string $token Token to validate
 * @return bool True if valid
 */
function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}