<?php
session_start();
if (!isset($_SESSION['store_id'])) {
    header('Location: login.php');
    exit;
}
include('../db/class.php');
$admin_db = new admin_class;
$global_db = new global_class;
$db = new stores_class;
$id = $_SESSION['store_id'];


$getStoreDetails = $db->storeRegisterValidation('store_id', $id);
$store = $getStoreDetails->fetch_array();

// getNumRating
$getNumbeOfRating = $global_db->getNumberOfRatings($id);
$numberOfRating = $getNumbeOfRating->fetch_array();
$totalNumberOfRating = $numberOfRating['TOTAL_RATINGS'];

$categoryName = $admin_db->admin_Get_Category($store['category_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $store['name'] ?> Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body class="">
    <nav class="navigation">
        <h3><a href="#">ICDS</a></h3>
        <div class="btns-container">
            <button type="button">New Photo</button>
            <button type="button">New Link</button>
            <button type="button">Edit</button>
            <a class="btn-logout" href="process/logout.php">Logout</a>
        </div>
    </nav>

    <div class="main-container container card p-4">
        <div class="f-container">
            <div class="f-row">
                <img src="../global-assets/store-logos/<?= $store['logo'] ?>">
                <div>
                    <h1><?= $store['name'] ?></h1>
                    <h5><span><?= $totalNumberOfRating ?></span> Rate/s</h5>
                </div>
            </div>
            <div class="s-row">
                <input type="text" class="form-control" readonly value="<?= $store['address'] ?>">
            </div>
            <div class="t-row">
                <input type="text" class="form-control" readonly value="<?= $store['email'] ?>">
                <input type="text" class="form-control" readonly value="<?= $store['contact_no'] ?>">
            </div>
            <div class="frth-row">
                <input type="text" class="form-control" readonly value="<?= $store['email'] ?>">
                <input type="text" class="form-control" readonly value="<?= $categoryName ?>">
            </div>
        </div>
        <hr>
        <div class="s-container">
            <h5>Links</h5>
            <ul>
                <li>Facebook: <a href="#">links</a></li>
                <li>Facebook: <a href="#">links</a></li>
                <li>Facebook: <a href="#">links</a></li>
            </ul>
        </div>
        <hr>
        <div class="t-container">
            <h5>Pictures</h5>
            <div class="pictures-container">
                <img src="../global-assets/store-logos/12719_store_75613.jpg">
                <img src="../global-assets/store-logos/12719_store_75613.jpg">
                <img src="../global-assets/store-logos/12719_store_75613.jpg">
                <img src="../global-assets/store-logos/12719_store_75613.jpg">
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>