<?php

session_start();

if(isset($_SESSION['admin'])){
    header('location: admin/index.php');
}

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $userResult = $users->getUserSessionDetails($user,"users");
}

/*
// Define the idle timeout in seconds (e.g., 1800 seconds = 30 minutes)
$idleTimeout = 1800;

// Check if the session has been idle for the specified time
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $idleTimeout) {
    // Regenerate the session ID after the idle timeout
    session_regenerate_id(true);
}

// Update the last activity timestamp
$_SESSION['last_activity'] = time();

function customErrorHandler($errno, $errstr, $errfile, $errline): bool
{
    $errorMessage = "Error [$errno]: $errstr in $errfile on line $errline";

    // Log the error to the database
    $db = new DBController();
    $db->logError($errorMessage);

    // Prevent the error from being displayed to the user
    return true;
}

// Set the custom error handler
//set_error_handler('customErrorHandler');

*/

