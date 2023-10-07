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
        $category = $checkCategory->fetch_array();
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
            ($selectCategory == true) ? 'Select Category' : $category['category'];
            ?>
        </h5>
    </div>
    <div class="container establishment-pick-container mt-5 mb-5">
        <div class="category-pic-container">
            <h5 class="listing-category">LISTING CATEGORIES</h5>
            <div class="cpc-categories-container">
                <?php
                $getCategories = $global_db->getCatregories();
                while ($categoryRow = $getCategories->fetch_array()) {
                ?>
                    <a href="categories.php?category=<?= $categoryRow['category_id'] ?>">
                        <h5><?= $categoryRow['category'] ?></h5>
                        <h5><?= $categoryRow['total_store'] ?></h5>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="selected-categories-container">
            <div class="establishment-container">
                <?php
                if (!$selectCategory) {
                    $getStores = $global_db->getStores($_GET['category']);
                    if ($getStores->num_rows > 0) {
                        while ($storeRow = $getStores->fetch_array()) {
                            $totalReview = $storeRow['total_reviews'];
                            $totalRating = $storeRow['total_rating'];
                            if ($totalReview > 0) {
                                $rating = ($totalRating / ($totalReview * 5)) * 5;
                            } else {
                                $rating = 0;
                            }
                            $newRating = intval($rating);
                ?>
                            <div class="ec-content-container">
                                <div class="eccc-left">
                                    <h5 class="establishment-name"><?= $storeRow['name'] ?></h5>
                                    <p class="establishment-address"><?= $storeRow['address'] ?></p>
                                    <div class="bottom-btns-container">
                                        <a href="establishment.php?str_id=<?= $storeRow['store_id'] ?>" class="btn-estab-more-det">More details</a>
                                        <div class="rate-stars-container">
                                            <?php
                                            $printed = 0;
                                            $printedSolid = 0;
                                            while ($printed < 5) {
                                                if ($printedSolid < $newRating) {
                                                    echo '<i class="fa-solid fa-star"></i>';
                                                    $printedSolid++;
                                                } else {
                                                    echo '<i class="fa-regular fa-star"></i>';
                                                }
                                                $printed++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="eccc-right">
                                    <img src="global-assets/store-logos/<?= $storeRow['logo'] ?>">
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <center class="pt-5 nef">
                            <h4 class="text-danger">No Establishment Found</h4>
                        </center>
                    <?php
                    }
                } else {
                    ?>
                    <center class="pt-5 nef">
                        <h4 class="text-danger">No Establishment Found</h4>
                    </center>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include('user-components/footer.php');
