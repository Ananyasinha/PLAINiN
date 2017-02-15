<?php
session_start();

$email = $_SESSION['email'];
$admin = $_SESSION['admin'];

session_destroy();
header('location:index.php');
?>