<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed create.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

$db = new mysqli('database-1.cpwgy466mtid.us-east-1.rds.amazonaws.com', 'admin', 'Zz8U&JP1^UczS', 'trainingDB');
if ($db->connect_error) {
    $logger->error('Connection Failed. Check Uptime Robot');
    die("Connection failed: " . $db->connect_error);
}

$logger->info('Connected Successfully');

$repository = new TrainingScheduleRepository($db);
$service = new TrainingService($repository);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeName = $_POST['employeeName'];
    $department = $_POST['department'];
    $trainingClass = $_POST['trainingClass'];
    $trainingDate = $_POST['trainingDate'];

    $logger->info('Adding employee to training session');
    // Error handling here?
    $service->addTraining($employeeName, $department, $trainingClass, $trainingDate);
    
    $logger->info('Employee added successfully');
    header("Location: index.php");
    exit();
}

echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '<div class="container mt-3"><h2>Add Training Session</h2>';
echo '<form method="POST">
        <div class="form-group"><label>Employee Name</label><input type="text" name="employeeName" class="form-control" required></div>
        <div class="form-group"><label>Department</label><input type="text" name="department" class="form-control" required></div>
        <div class="form-group"><label>Training Class</label><select name="trainingClass" class="form-control" required>
            <option>Anger Management</option>
            <option>Security</option>
            <option>Phishing</option>
        </select></div>
        <div class="form-group"><label>Training Date</label><input type="date" name="trainingDate" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Add Training</button>
      </form></div>';
?>
