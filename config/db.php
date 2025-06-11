<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Local XAMPP settings
    $db_host = 'localhost';
    $db_name = 'bigsell';
    $db_user = 'root';
    $db_pass = '';
} else {
    // Truehost settings
    $db_host = 'localhost';
    $db_name = 'vrytxswq_bigisell';
    $db_user = 'vrytxswq';
    $db_pass = 'bigisell@selinanasike';
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php