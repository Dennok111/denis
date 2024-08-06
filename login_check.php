<?php
session_start();
require_once 'includes/functions.php';

$census = new CensusSystem("localhost", "root", "", "census");

$email = $_POST['username'];
$password = $_POST['password'];
echo $email;
echo $password;
echo $census->loginUser($email, $password);
if ($census->loginUser($email, $password)) {
    // Redirect based on user role
    switch ($_SESSION['user_role']) {
        case 'Admin':
            header("Location: admin_dashboard.php");
            break;
        case 'DataCollector':
            header("Location: data_collector_dashboard.php");
            break;
        case 'Viewer':
            header("Location: viewer_dashboard.php");
            break;
        default:
            header("Location: default_dashboard.php");
            break;
    }
    exit();
} else {
    //header("Location: login.html?error=1"); // Redirect back to login with an error
    exit();
}
?>
