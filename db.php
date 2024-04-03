<?php
$host = 'database-1.cfs8smgio0kv.us-east-2.rds.amazonaws.com';
$dbname = 'database-1';
$username = 'Neema';
$password = 'Cleburne$$137';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    $logger->info('Connection failed at db.php');
    die("Connection failed: " . $conn->connect_error);
}
?>
