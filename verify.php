<?php
require_once('functions.php');
include_once 'include/session.php';


if(isset($_POST['login'])) {

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

     if ($users->getUserVerification($login,$email,$password,"users")){
         //regeneration helps prevent session fixation attacks where an attacker forces a victim to use a known session ID.
            session_regenerate_id(true);

         $userId = $_SESSION['log']; // Replace with the actual user ID
         $action = "User logged in"; // Replace with the actual action
         $actionType = "Login"; // Indicates login action
         $ipAddress = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

         if ($users->logUserAction($userId, $action, $actionType, $ipAddress)) {
             //echo "User login action logged successfully.";
         } else {
             //echo "Failed to log user login action.";
         }
     }
}

header('location: login.php');

