<?php
$host = 'milestone5hmrs-server.mysql.database.azure.com';
$dbname = 'milestone5hmrs-server';
$username = 'gzfemdsgdy';
$password = '$XdsiMGt67QSoak2';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    $logger->info('Connection failed at db.php');
    die("Connection failed: " . $conn->connect_error);
}
?>
