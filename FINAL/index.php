<?php session_start();

if (!isset($_SESSION["user"])) {
    header('Location: login.php');
    exit();
}

// Include functions and connect to the database using mysqli
include 'functions.php';
$mysqli = mysqli_connect('localhost', 'root', '', 'shoppingcart');

// Check connection
if (!$mysqli) {
    exit('Failed to connect to database!');
}

// Page is set to home (home.php) by default, so when the visitor visits, that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';

// Close the database connection
mysqli_close($mysqli);
?>