<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed reports.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

try {
    $db = new mysqli('neemalocalhost.database.windows.net,1433', 'Neema', 'Cleburne$$137', 'HMRS');
    if ($db->connect_error) {
        $logger->info('Connection failed at reports.php');
        throw new Exception("Connection failed: " . $db->connect_error);
    }

    $repository = new TrainingScheduleRepository($db);
    $service = new TrainingService($repository);

    $logger->info('Getting all training reports');
    $trainings = $service->getAllTrainings();
    $logger->info('Got all training reports');
    
} catch (Exception $e) {
    $logger->info('Error at reports.php');
    die('Error: ' . $e->getMessage());
}

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3"><h2>Training Classes Report</h2>
<a href="home.php" class="btn btn-primary mb-2">Go Home</a>
<table class="table"><thead><tr><th>Employee Name</th><th>Department</th><th>Training Class</th><th>Date</th></tr></thead><tbody>

foreach ($trainings as $training) {
     "<tr>
            <td>{$training['employeeName']}</td>
            <td>{$training['department']}</td>
            <td>{$training['trainingClass']}</td>
            <td>{$training['trainingDate']}</td>
          </tr>";
}

</tbody></table></div>
?>
