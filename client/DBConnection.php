<?php
$servername = "198.251.88.32";
$username = "pbinstituteofre_25";
$password = "BF3tHtZ4qKeMzngHrhmE";
$dbname = "pbinstituteofre_25";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



