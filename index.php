<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed index.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

try {
    $logger->info('Connecting to database');
    $db = new mysqli('database-1.cfs8smgio0kv.us-east-2.rds.amazonaws.com', 'Neema', 'Cleburne$$137', 'database-1');
    if ($db->connect_error) {
        $logger->info('Connection Failed. Check Uptime Robot.');
        throw new Exception("Connection failed: " . $db->connect_error);
    }

    $logger->info('Connected Successfully');

    $repository = new TrainingScheduleRepository($db);
    $service = new TrainingService($repository);

    $logger->info('Fetching training schedules');
    $trainings = $service->getAllTrainings();
    $logger->info('Schedules retrieved successfully');

} catch (Exception $e) {

    $logger->error('Error Occured. Check for logic errors.');
    die('Error: ' . $e->getMessage());
}

echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '<div class="container mt-3"><h2>Training Schedule</h2>';
echo '<a href="home.php" class="btn btn-primary mb-2">Go Home</a>';

echo '<a href="create.php" class="btn btn-primary mb-2">Add New Training</a>';

echo '<table class="table"><thead><tr><th>Employee Name</th><th>Training Class</th><th>Date</th><th>Actions</th></tr></thead><tbody>';

foreach ($trainings as $training) {
    echo "<tr><td>{$training['employeeName']}</td><td>{$training['trainingClass']}</td><td>{$training['trainingDate']}</td>
          <td><a href='update.php?id={$training['id']}' class='btn btn-warning'>Edit</a>
          <a href='delete.php?id={$training['id']}' class='btn btn-danger'>Delete</a></td></tr>";
}

echo '</tbody></table></div>';
?>
