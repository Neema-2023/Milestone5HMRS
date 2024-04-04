<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed employeeemanagement.php');

use App\Service\TrainingService;

$db = new mysqli('neemalocalhost.database.windows.net,1433', 'Neema', 'Cleburne$$137', 'HMRS');
if ($db->connect_error) {
    $logger->info('Connection failed at employeemanagement.php');
    die("Connection failed: " . $db->connect_error);
}

$trainingService = new TrainingService(new App\Repository\TrainingScheduleRepository($db));
$trainings = $trainingService->getAllTrainings();

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3"><h2>Employee Management - Scheduled Classes</h2>
<a href="home.php" class="btn btn-primary mb-2">Go Home</a>
<table class="table">
<thead><tr><th>Employee Name</th><th>Department</th><th>Training Class</th><th>Date</th></tr></thead><tbody>

foreach ($trainings as $training) {
    <tr>
            <td>{$training['employeeName']}</td>
            <td>{$training['department']}</td>
            <td>{$training['trainingClass']}</td>
            <td>{$training['trainingDate']}</td>
          </tr>
}

</tbody></table></div>
?>
