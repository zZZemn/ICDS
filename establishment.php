<?php
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
include('user-components/header.php');

$admin_db = new admin_class();
$global_db = new global_class();

if (isset($_GET['str_id'])) {
    $getStore = $global_db->getStoreDetails($_GET['str_id']);
    if ($getStore->num_rows > 0) {
        $store = $getStore->fetch_array();
    } else {
        header("Location: categories.php");
        exit;
    }
} else {
    header("Location: categories.php");
    exit;
}
?>

<div class="page-establishment-container">
    <div class="page-establishment-header">
        <h3><?= $store['name'] ?></h3>
        <img src="global-assets/store-logos/<?= $store['logo'] ?>">
    </div>
    <div class="container establishment-page-details-container mt-5 mb-5">
        <div class="epdc-left-container card p-5">
            <div>
                <h5>Contacs / Address</h5>
                <ul class="list">
                    <li><?= $store['contact_no'] ?></li>
                    <li><?= $store['email'] ?></li>
                    <li><?= $store['address'] ?></li>
                </ul>
            </div>
            <div>
                <h5>Links</h5>
                <?php
                $getLinks = $global_db->getStoresLinks($_GET['str_id']);
                if ($getLinks->num_rows > 0) {
                ?>
                    <ul>
                        <?php
                        while ($linkRow = $getLinks->fetch_array()) {
                        ?>
                            <li><a href="<?= $linkRow['link'] ?>"><?= $linkRow['link_name'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="epdc-right-container card">
            <span class="card-title picture-title">
                <h5>Pictures</h5>
            </span>
            <?php
            $getStorePhoto = $global_db->getStorePhotos($_GET['str_id']);
            if ($getStorePhoto->num_rows > 0) {
            ?>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $firstPhoto = true;
                        while ($storePhotoRow = $getStorePhoto->fetch_array()) {
                        ?>
                            <div class="carousel-item <?= ($firstPhoto) ? 'active' : ''; ?>">
                                <img class="d-block w-100" src="global-assets/store-photos/<?= $storePhotoRow['photo'] ?>" alt="Slide">
                            </div>
                        <?php
                            $firstPhoto = false;
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php
            } else {
            ?>
                <center>No photos found.</center>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="card container mb-5 reviews-main-container">
        <div class="card reviews-header-container">
            <div>
                <div class="mt-2">
                    <h5><i class="fa-solid fa-pen"></i>Reviews</h5>
                </div>
                <div>
                    <button type="button" class="btn btn-dark" id="btnOpenAddReviewModal">Add Review</button>
                </div>
            </div>
        </div>
        <div class="reviews-container m-3">
            <?php
            if ($isLogin) {
                $getReviews = $global_db->getRatingAndReviews($_GET['str_id']);
                if ($getReviews->num_rows > 0) {
                    while ($reviewsRow = $getReviews->fetch_array()) {
                        $userRating = $reviewsRow['rating'];
            ?>
                        <div class="card m-2 p-3">
                            <div class="top-review-container">
                                <h5><?= $reviewsRow['name'] ?></h5>
                                <div class="reviews-page-stars-container">
                                    <?php
                                    $printed = 0;
                                    $printedSolid = 0;
                                    while ($printed < 5) {
                                        if ($printedSolid < $userRating) {
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
                            <div class="date-container">
                                <article><?= date('F j, Y g:i a', strtotime($reviewsRow['date'])) ?></article>
                            </div>
                            <div class="card container mt-3 p-3">
                                <p><?= $reviewsRow['review'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <center>
                        <h4>0 REVIEWS FOUND.</h4>
                    </center>
                <?php
                }
            } else {
                ?>
                <center>
                    <h4>LOGIN TO SEE AND ADD REVIEWS</h4>
                    <p>You don’t have permission to to post a review.</p>
                </center>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="add-review-frm-container">
        <form class="container add-review-modal card p-4" id="frmModalAddReview">
            <input type="hidden" name="userId" id="userId" value="<?= $user_id ?>">
            <input type="hidden" name="storeId" id="storeId" value="<?= $_GET['str_id'] ?>">

            <center>
                <h5>Add Review</h5>
            </center>
            <center class="content-container-reviews">
                <div class="user-rate-container">
                    <button class="btnRateStarsClick btnRateStarsClick1" data-val="1"><i class="fa-regular fa-star"></i></button>
                    <button class="btnRateStarsClick btnRateStarsClick2" data-val="2"><i class="fa-regular fa-star"></i></button>
                    <button class="btnRateStarsClick btnRateStarsClick3" data-val="3"><i class="fa-regular fa-star"></i></button>
                    <button class="btnRateStarsClick btnRateStarsClick4" data-val="4"><i class="fa-regular fa-star"></i></button>
                    <button class="btnRateStarsClick btnRateStarsClick5" data-val="5"><i class="fa-regular fa-star"></i></button>
                </div>
            </center>
            <div class="content-container-reviews mt-3 d-flex">
                <label for="txtReview">Review:</label>
                <textarea id="txtReview" name="review" class="p-2 form-control" required></textarea>
            </div>
            <center class="container mt-4">
                <button type="button" class="btn btn-dark" id="btnCancelAddReview">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </center>
        </form>
    </div>
</div>

<script>

</script>

<?php
include('user-components/footer.php');
