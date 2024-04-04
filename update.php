<?php
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed update.php');

use App\Service\TrainingService;
use App\Repository\TrainingScheduleRepository;

$db = new mysqli('neemalocalhost.database.windows.net,1433', 'Neema', 'Cleburne$$137', 'HMRS');
if ($db->connect_error) {
    $logger->info('Connection error at update.php');
    die("Connection failed: " . $db->connect_error);
}

$repository = new TrainingScheduleRepository($db);
$service = new TrainingService($repository);

$logger->info('Updating employee info');
$id = $_GET['id'] ?? 0;
$training = $service->getTraining($id);
$logger->info('Updated employee info successfully');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeName = $_POST['employeeName'];
    $department = $_POST['department'];
    $trainingClass = $_POST['trainingClass'];
    $trainingDate = $_POST['trainingDate'];

    // data validation / error handling here
    $service->updateTraining($id, $employeeName, $department, $trainingClass, $trainingDate);

    header("Location: index.php");
    exit();
}

<link href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-3"><h2>Edit Training Session</h2>

if ($training) {
    echo '<form method="POST">
            <input type="hidden" name="id" value="' . $training['id'] . '">
            <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="employeeName" class="form-control" value="' . htmlspecialchars($training['employeeName']) . '" required>
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="' . htmlspecialchars($training['department']) . '" required>
            </div>
            <div class="form-group">
                <label>Training Class</label>
                <select name="trainingClass" class="form-control" required>
                    <option value="Anger Management"' . ($training['trainingClass'] == 'Anger Management' ? ' selected' : '') . '>Anger Management</option>
                    <option value="Security"' . ($training['trainingClass'] == 'Security' ? ' selected' : '') . '>Security</option>
                    <option value="Phishing"' . ($training['trainingClass'] == 'Phishing' ? ' selected' : '') . '>Phishing</option>
                </select>
            </div>
            <div class="form-group">
                <label>Training Date</label>
                <input type="date" name="trainingDate" class="form-control" value="' . htmlspecialchars($training['trainingDate']) . '" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Training</button>
        </form>';
} else {
    <p>Training session not found.</p>
}

</div>
?>
