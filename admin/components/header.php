<?php
include('../db/class.php');
$db = new admin_class;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICDS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,900;1,200;1,500&family=Roboto+Condensed:wght@300;400&display=swap');
    </style>
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <header>
        <nav class="navigation text-light">
            <h1 class="burger" id="burger" data-state="open"><i class="fa-solid fa-bars"></i></h1>
            <h1 class="ICDS">ICDS</h1>
            <ul class="hide-me">
                <li><a href="#">Sample</a></li>
                <li><a href="#">Sample</a></li>
                <li><a href="#">Sample</a></li>
            </ul>
        </nav>
    </header>

    <aside class="sidebar" id="sidebar">
        <ul class="list-group">
            <li>
                <a href="dashboard.php" id="nav-dashboard">
                    <i class="fa-solid fa-gauge"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="users.php" id="nav-users">
                    <i class="fa-solid fa-users"></i>
                    Users
                </a>
            </li>
            <li>
                <a href="stores.php" id="nav-stores">
                    <i class="fa-solid fa-store"></i>
                    Stores
                </a>
            </li>
            <li>
                <a href="category.php" id="nav-category">
                    <i class="fa-solid fa-layer-group"></i>
                    Category
                </a>
            </li>
            <li>
                <a href="process/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </li>
        </ul>
    </aside>