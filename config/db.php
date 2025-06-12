<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Localhost (XAMPP or similar)
    $db_host = 'localhost';
    $db_name = 'bigsell';
    $db_user = 'root';
    $db_pass = '';
} else {
    // LIVE SERVER (Truehost)
    $db_host = 'localhost';
    $db_name = 'vrytxswq_bigisell';
    $db_user = 'vrytxswq_bigisel'; // ✅ FIXED: This was wrong before
    $db_pass = 'bigisell@selinanasike';
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

