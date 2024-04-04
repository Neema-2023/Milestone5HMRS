<?php
// change home.php to index.php?
//require_once __DIR__ . '/../config/bootstrap.php';
// require_once __DIR__ . '/../vendor/autoload.php';
$logger = require_once __DIR__ . '/../config/bootstrap.php';

$logger->info('User accessed home.php');

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
<h1>Welcome to the CST323HR Management System</h1>
<div class="list-group mt-3">
<a href="employeemanagement.php" class="list-group-item list-group-item-action">Employee Management</a>
<a href="departments.php" class="list-group-item list-group-item-action">Departments</a>
<a href="reports.php" class="list-group-item list-group-item-action">Training Reports</a>
<a href="index.php" class="list-group-item list-group-item-action">Schedule a Class</a>
</div></div>'
?>
