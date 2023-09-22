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
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body class="">
    <nav class="navigation">
        <h3><a href="#">ICDS</a></h3>
        <div class="btns-container">
            <button type="button" id="btnNewPhoto">New Photo</button>
            <button type="button" id="btnNewLink">New Link</button>
            <button type="button" id="btnEdit">Edit</button>
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
            <?php
            $getLinks = $global_db->getStoresLinks($id);
            if ($getLinks->num_rows > 0) {
            ?>
                <ul class="links-ul-container">
                    <?php
                    while ($links = $getLinks->fetch_array()) {
                    ?>
                        <li><?= $links['link_name'] ?>: <a href="<?= $links['link'] ?>"><?= $links['link'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            } else {
            ?>
                <center>No link found</center>
            <?php
            }
            ?>
        </div>
        <hr>
        <div class="t-container">
            <h5>Pictures</h5>
            <div class="pictures-container">
                <?php
                $getPhotos = $global_db->getStorePhotos($id);
                if ($getPhotos->num_rows > 0) {
                    while ($photo = $getPhotos->fetch_array()) {
                ?>
                        <img src="../global-assets/store-photos/<?= $photo['photo'] ?>">
                    <?php
                    }
                } else {
                    ?>
                    <center>No photo found</center>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- New Link Modal -->
    <form id="frmNewLink" class="frm-new-link card p-5">
        <center>
            <h5>Add Link</h5>
        </center>
        <input type="hidden" class="storeId" name="store_id" value="<?= $id ?>">
        <div class="input-container">
            <label for="linkName">Link Name</label>
            <input type="text" id="linkName" name="linkName" class="form-control" required>
        </div>
        <div class="input-container">
            <label for="link">Link</label>
            <input type="text" id="link" name="link" class="form-control" required>
        </div>
        <div class="frm-btns-container">
            <button type="reset" id="cancelFrmNewLink" class="btn btn-dark">Cancel</button>
            <button type="submit" id="addLink" class="btn btn-primary">Add</button>
        </div>
    </form>
    <!-- End Of  New Link Modal -->

    <!-- New Photo Modal -->
    <form id="frmPhoto" class="frm-new-photo card p-5">
        <center>
            <h5>Add Photo</h5>
        </center>
        <input type="hidden" class="storeId" name="store_id" value="<?= $id ?>">
        <div class="input-container">
            <label for="photo">Upload Photo</label>
            <input type="file" id="photo" name="photo" class="form-control" required>
        </div>
        <div class="frm-btns-container">
            <button type="reset" id="cancelFrmPhoto" class="btn btn-dark">Cancel</button>
            <button type="submit" id="addPhoto" class="btn btn-primary">Add</button>
        </div>
    </form>
    <!-- End Of New Photo Modal -->

    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>