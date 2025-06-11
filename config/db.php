
<?php
$db_host = 'localhost';
$db_name = 'bigsell';
$db_user = 'root';
$db_pass = '';
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>