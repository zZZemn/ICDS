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
            <span class="card-title picture-title"><h5>Pictures</h5></span>
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
</div>

<script>

</script>

<?php
include('user-components/footer.php');
