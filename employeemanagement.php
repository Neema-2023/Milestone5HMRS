<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed employeeemanagement.php');

use App\Service\TrainingService;

$db = new mysqli('milestone5hmrs-server.mysql.database.azure.com', 'gzfemdsgdy', '$XdsiMGt67QSoak2', 'milestone5hmrs-database');
if ($db->connect_error) {
    $logger->info('Connection failed at employeemanagement.php');
    die("Connection failed: " . $db->connect_error);
}

$trainingService = new TrainingService(new App\Repository\TrainingScheduleRepository($db));
$trainings = $trainingService->getAllTrainings();

echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '<div class="container mt-3"><h2>Employee Management - Scheduled Classes</h2>';
echo '<a href="home.php" class="btn btn-primary mb-2">Go Home</a>';
echo '<table class="table">';
echo '<thead><tr><th>Employee Name</th><th>Department</th><th>Training Class</th><th>Date</th></tr></thead><tbody>';

foreach ($trainings as $training) {
    echo "<tr>
            <td>{$training['employeeName']}</td>
            <td>{$training['department']}</td>
            <td>{$training['trainingClass']}</td>
            <td>{$training['trainingDate']}</td>
          </tr>";
}

echo '</tbody></table></div>';
?>
