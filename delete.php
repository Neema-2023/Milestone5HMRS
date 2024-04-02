<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed delete.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

$db = new mysqli('database-1.cpwgy466mtid.us-east-1.rds.amazonaws.com', 'admin', 'Zz8U&JP1^UczS', 'trainingDB');
if ($db->connect_error) {
    $logger->info('Connection Failed at delete.php');
    die("Connection failed: " . $db->connect_error);
}

$repository = new TrainingScheduleRepository($db);
$service = new TrainingService($repository);

$logger->info('Attempting to delete training');

$id = $_GET['id'] ?? 0;
if ($id) {
    $service->deleteTraining($id);
}

$logger->info('Training deleted successfully');

header("Location: index.php");
exit();
?>
