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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $store['name'] ?> Edit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body class="">
    <nav class="navigation">
        <h3><a href="dashboard.php">ICDS</a></h3>
        <div class="btns-container">
            <button type="button" id="btnNewPhoto">New Photo</button>
            <button type="button" id="btnNewLink">New Link</button>
            <a href="edit-contens.php" id="btnEdit">Edit</a>
            <a class="btn-logout" href="process/logout.php">Logout</a>
        </div>
    </nav>

    <div class="main-container container p-4">
        <form id="frmEditEstablishment" class="frm-register card p-5">
            <h3>
                <center class="card-title">Edit Establishment</center>
            </h3>
            <input type="hidden" name="storeIdEdit" value="<?= $id ?>">
            <div class="input-container">
                <label for="storeName">Establishment Name</label>
                <input type="text" id="storeName" name="storeName" class="form-control" required value="<?= $store['name'] ?>">
            </div>
            <div class="input-container">
                <label for=address">Address</label>
                <input type="text" id=address" name="address" class="form-control" required value="<?= $store['address'] ?>">
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <div class="input-container">
                    <label for=email">Email</label>
                    <input type="email" id=email" name="email" class="form-control" required value="<?= $store['email'] ?>">
                </div>
                <div class="input-container">
                    <label for=contactNo">Contact #</label>
                    <input type="number" id=contactNo" name="contactNo" class="form-control" required value="<?= $store['contact_no'] ?>">
                </div>
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required value="<?= $store['username'] ?>">
                </div>
                <!-- <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required value="<?= $store['password'] ?>">
                </div> -->
                <div class="input-container">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option disabled selected>Select Category</option>
                        <?php
                        $getCategories =  $admin_db->admin_Get_Categories();
                        while ($category = $getCategories->fetch_array()) {
                        ?>
                            <option value='<?= $category['category_id'] ?>' <?= ($category['category_id'] == $store['category_id']) ? 'selected' : '' ?>><?= $category['category'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="input-container-container d-flex justify-content-between">
                <!-- <div class="input-container">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option disabled selected>Select Category</option>
                        <?php
                        // $getCategories =  $admin_db->admin_Get_Categories();
                        // while ($category = $getCategories->fetch_array()) {
                        //     echo "<option value='" . $category['category_id'] . "'>" . $category['category'] . "</option>";
                        // }
                        ?>
                    </select>
                </div> -->
                <!-- <div class="input-container">
                    <label for="storeLogo">Upload Logo</label>
                    <input type="file" id="storeLogo" name="storeLogo" class="form-control" required>
                </div> -->
            </div>
            <div class="btn-container d-flex justify-content-center mt-5">
                <input type="submit" id="btnRegister" name="btnRegister" class="btn btn-primary m-1" value="Save Changes">
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>