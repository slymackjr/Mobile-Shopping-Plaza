<?php
session_start();
if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
    header('location: ../index.php');
}

$stmt = $db->con->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param('i',$_SESSION['admin'] );
$stmt->execute();

// Fetch the result as an associative array
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
