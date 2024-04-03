<?php
// change home.php to index.php?
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed home.php');

echo '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
echo '<div class="container mt-5">';
echo '<h1>Welcome to the CST323HR Management System</h1>';
echo '<div class="list-group mt-3">';
echo '<a href="employeemanagement.php" class="list-group-item list-group-item-action">Employee Management</a>';
echo '<a href="departments.php" class="list-group-item list-group-item-action">Departments</a>';
echo '<a href="reports.php" class="list-group-item list-group-item-action">Training Reports</a>';
echo '<a href="index.php" class="list-group-item list-group-item-action">Schedule a Class</a>';
echo '</div></div>';
?>
