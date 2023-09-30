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
    <h3 class="heading-h3">Our Categories</h3>
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
    <center><a href="#" class="read-more mt-5">Browse categories >></a></center>
</div>

<div class="about-us-container">
    <center>
        <h3 class="heading-h3">About us</h3>
    </center>
    <div class="container about-container">
        <div class="map-container about-container-content-container">
            <img src="global-assets/assets-used-in-web/ilo-ilo-city-map.png">
        </div>
        <div class="p-container about-container-content-container">
            <p>The Directory was a fatal experiment in weak executive powers; it was created in reaction to the puritanical dictatorship that had existed under the Reign of Terror of 1793–94, and it would end up yielding to the more disciplined dictatorship of Napoleon Bonaparte. The Directory suffered from widespread corruption.
                Directories are a place to provide quick snapshots of a business: what it does, how it does it, where it's located, possibly even with a map link and a link to its website. In this day and age of fast information, users appreciate quick and coherent information. In computing, a directory structure is the way an operating system arranges files that are accessible to the user. Files are typically displayed in a hierarchical tree structure.</p>
            <a href="#" class="read-more">Read More</a>
        </div>
    </div>
</div>

<div class="blogs-container">
    <center>
        <h3 class="heading-h3">Blogs</h3>
    </center>
    <div class="container blogs-card-container">
        <div class="blog-card">
            <img src="global-assets/assets-used-in-web/blogs-img.png">
            <div class="blog-contents-container">
                <p class="jf2023">JOB FAIR 2023</p>
                <h5>EASY PATH TO FIND JOBS</h5>
                <article>August 17, 2023</article>
                <p class="blog-content-para">A job fair is an event where multiple recruiters, hiring managers and employers can meet with potential employees in one convenient, neutral venue, such as a school or college. These fairs are usually managed by third-party recruitment consultants.</p>
                <a href="#" class="read-more">READ MORE -></a>
            </div>
        </div>
        <div class="blog-card">
            <img src="global-assets/assets-used-in-web/blogs-img.png">
            <div class="blog-contents-container">
                <p class="jf2023">JOB FAIR 2023</p>
                <h5>EASY PATH TO FIND JOBS</h5>
                <article>August 17, 2023</article>
                <p class="blog-content-para">A job fair is an event where multiple recruiters, hiring managers and employers can meet with potential employees in one convenient, neutral venue, such as a school or college. These fairs are usually managed by third-party recruitment consultants.</p>
                <a href="#" class="read-more">READ MORE -></a>
            </div>
        </div>
        <div class="blog-card">
            <img src="global-assets/assets-used-in-web/blogs-img.png">
            <div class="blog-contents-container">
                <p class="jf2023">JOB FAIR 2023</p>
                <h5>EASY PATH TO FIND JOBS</h5>
                <article>August 17, 2023</article>
                <p class="blog-content-para">A job fair is an event where multiple recruiters, hiring managers and employers can meet with potential employees in one convenient, neutral venue, such as a school or college. These fairs are usually managed by third-party recruitment consultants.</p>
                <a href="#" class="read-more">READ MORE -></a>
            </div>
        </div>
    </div>
    <center>
        <h5 class="read-more mt-4">Browse blogs >></h5>
    </center>
</div>

<div class="main-page-footer">
    <img src="global-assets/assets-used-in-web/footer-banner.png">
    <div class="container mpf-container">
        <div class="mpf-1st">
            <h5>DIRECTORY</h5>
            <p>a book listing individuals or organizations alphabetically or thematically with details such as names, addresses, and phone numbers.</p>
            <div class="mpf-1st-links">
                <a><i class="fa-brands fa-square-facebook"></i></a>
                <a><i class="fa-brands fa-instagram"></i></a>
                <a><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mpf-2nd">
            <h5>QUICK LINKS</h5>
            <p><a href="#">Home</a></p>
            <p><a href="#">Directory</a></p>
            <p><a href="#">About Us</a></p>
            <p><a href="#">Blogs</a></p>
            <p><a href="#">Contacts</a></p>
        </div>
        <div class="mpf-3rd">
            <h5>OTHERS</h5>
            <p>Luna St. Gaisano lapaz , Iloilo City 5000.</p>
            <p>ICDS38@Gmail.com</p>
        </div>
    </div>
</div>

<?php
include('user-components/footer.php');
