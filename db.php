<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "todo_app";

try {
    // Enable MySQLi error reporting
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
