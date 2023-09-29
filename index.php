<?php
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
include('user-components/header.php');

$admin_db = new admin_class();
?>

<div class="main-container">
    <img src="global-assets/assets-used-in-web/main-page.jpg">
    <div class="main-contents-container">
        <h1>Find what's best for you</h1>
        <h5>Look for the greatest places to dine, drink and shop around you.</h5>
        <div class="main-page-search-container">
            <input type="text" id="search" class="main-search" placeholder="What are you lookin for?">
            <select class="main-select-category">
                <?php
                $getCategory = $admin_db->admin_Get_Categories();
                while ($category = $getCategory->fetch_array()) {
                ?>
                    <option value="<?= $category['category_id'] ?>"><?= $category['category'] ?></option>
                <?php
                }
                ?>
            </select>
            <button type="button" id="btnSearch"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </div>
    </div>
</div>

<div class="main-categories-container">
    <h3>Our Categories</h3>
    <div class="container categories-container">
        <?php
        $getCategory = $admin_db->admin_Get_Categories();
        while ($category = $getCategory->fetch_array()) {
        ?>
            <a href="#" class="btn-category">
                <?= $category['icon'] ?>
                <p><?= $category['category'] ?></p>
            </a>
        <?php
        }
        ?>
    </div>
</div>

<?php
include('user-components/footer.php');
