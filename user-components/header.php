<?php
include('db/class.php');

session_start();
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICDS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    </style>
    <link rel="stylesheet" href="user-css/styles.css">
    <link rel="stylesheet" href="user-css/categories.css">
    <link rel="stylesheet" href="user-css/blogs.css">
    <link rel="stylesheet" href="user-css/about-us.css">
</head>

<body>
    <nav class="nav-container">
        <button type="button" id="toggleNav" class="toggle-nav"><i class="fa-solid fa-bars"></i></button>
        <img src="../../global-assets/store-logos/12719_store_75613.jpg">
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="categories.php">Categories</a>
            <a href="about-us.php">About us</a>
            <a href="blogs.php">Blogs</a>
            <a href="#">Contacts</a>
            <!-- <a href="#">Meet our Team</a> -->
        </div>
        <?= ($isLogin) ? '<a href="user-endpoints/logout.php" class="a-login">Logout</a>' : '<a href="login.php" class="a-login">Login</a>' ?>
    </nav>