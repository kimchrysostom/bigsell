<?php
$conn = new mysqli('localhost', 'vrytxswq_bigisel', 'bigisell@selinanasike', 'vrytxswq_bigisell');

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully!";
?>
