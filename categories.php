<?php
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
include('user-components/header.php');

$admin_db = new admin_class();
$global_db = new global_class();

if (isset($_GET['category'])) {
    $checkCategory = $global_db->getSelectedCategory($_GET['category']);
    if ($checkCategory->num_rows > 0) {
        $selectCategory = false;
    } else {
        $selectCategory = true;
    }
} else {
    $selectCategory = true;
}
?>

<div class="categories-page-container">
    <div class="cpc-top-container">
        <img src="global-assets/assets-used-in-web/footer-banner.png">
        <h5 class="category-label-h5">
            <?=
            ($selectCategory = true) ? 'Select Category' : $_GET['category'];
            ?>
        </h5>
    </div>
    <div class="container establishment-pick-container">
        <div class="category-pic-container">
            <h5>LISTING CATEGORIES</h5>
            <div class="cpc-categories-container">
                <?php
                // $getCategories = $global_db->getCatregories();
                // while ($category = $getCategories->fetch_array()) {
                ?>
                    <!-- <a href="#">
                        <h5></h5>
                        <h5></h5>
                    </a> -->
                <?php
                // }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include('user-components/footer.php');
