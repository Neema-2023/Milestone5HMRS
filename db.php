<?php
$host = 'database-1.cpwgy466mtid.us-east-1.rds.amazonaws.com';
$dbname = 'trainingDB';
$username = 'admin';
$password = 'Zz8U&JP1^UczS';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    $logger->info('Connection failed at db.php');
    die("Connection failed: " . $conn->connect_error);
}
?>
