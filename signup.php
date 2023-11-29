<?php
require_once ('functions.php');

include_once 'include/session.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $terms = $_POST['terms'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $register = $_POST['register'];

    if ($users->registerUsers($register,$name,$username,$email,$terms,$password,$confirmPassword))
    {
        header('location: index.php');
    }
}

