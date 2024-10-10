<?php
include 'config.php';
include 'includes/header.php';
include 'includes/nav.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

echo "<h1>Selamat datang di dashboard!</h1>";
include 'includes/footer.php';
?>
