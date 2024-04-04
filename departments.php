<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed department.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

$db = new mysqli('neemalocalhost.database.windows.net,1433', 'Neema', 'Cleburne$$137', 'HMRS');
if ($db->connect_error) {
    $logger->info('Connection failed at departments.php');
    die("Connection failed: " . $db->connect_error);
}

$repository = new TrainingScheduleRepository($db);
$service = new TrainingService($repository);

$logger->info('Getting all departments');
$departments = $service->getAllDepartments();
$logger->info('Got all departments successfully');

<link href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3"><h2>Departments</h2>
<a href="home.php" class="btn btn-primary mb-2">Go Home</a>
echo '<ul>';

foreach ($departments as $department) {
    <li>{$department['department']}</li>
}

</ul></div>
?>
