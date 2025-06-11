<?php

require_once('inc/header.php');
$page = isset($_GET['page']) ? basename($_GET['page']) : 'home';

if (!file_exists($page . ".php") && !is_dir($page)) {
    include '404.php';
} else {
    if (is_dir($page)) {
        include $page . '/index.php'; // this file should NOT use $page again
    } else {
        include $page . '.php';
    }
}
require_once('inc/footer.php');
