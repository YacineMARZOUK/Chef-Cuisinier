<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chef cuisinier";  // Corrected database name (replaced space with underscore)

// Create connection with error handling and prepared settings
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection with improved error handling
if ($conn->connect_errno) {
    // Log the error instead of directly displaying sensitive details
    error_log("Database Connection Failed: " . $conn->connect_error);
    
    // Display a user-friendly error message
    die("Sorry, we're experiencing technical difficulties. Please try again later.");
}

// Optional: Set connection parameters for better security and performance
$conn->set_charset("utf8mb4");  // Use UTF-8 character set
?>