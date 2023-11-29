<?php
require_once ('../functions.php');

$userId = $_SESSION['log']; // Replace with the actual user ID
$action = "User logged out"; // Replace with the actual action
$actionType = "Logout"; // Indicates login action
$ipAddress = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

$users->logUserAction($userId, $action, $actionType, $ipAddress);

session_start();
session_destroy();

header('location: ../login.php');
