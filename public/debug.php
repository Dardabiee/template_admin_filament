<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo 'PHP ' . PHP_VERSION . '<br>';
require __DIR__ . '/../vendor/autoload.php';
echo 'autoload ok<br>';
$app = require __DIR__ . '/../bootstrap/app.php';
echo 'app ok';