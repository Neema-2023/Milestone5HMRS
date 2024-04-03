<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed department.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

$db = new mysqli('milestone5hmrs-server.mysql.database.azure.com', 'gzfemdsgdy', '$XdsiMGt67QSoak2', 'milestone5hmrs-database');
if ($db->connect_error) {
    $logger->info('Connection failed at departments.php');
    die("Connection failed: " . $db->connect_error);
}

$repository = new TrainingScheduleRepository($db);
$service = new TrainingService($repository);

$logger->info('Getting all departments');
$departments = $service->getAllDepartments();
$logger->info('Got all departments successfully');

echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '<div class="container mt-3"><h2>Departments</h2>';
echo '<a href="home.php" class="btn btn-primary mb-2">Go Home</a>';
echo '<ul>';

foreach ($departments as $department) {
    echo "<li>{$department['department']}</li>";
}

echo '</ul></div>';
?>
