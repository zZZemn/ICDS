<?php
session_start();
if (!isset($_SESSION['store_id'])) {
    header('Location: login.php');
    exit;
}

$id = $_SESSION['store_id'];
