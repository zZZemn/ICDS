<?php
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
include('user-components/header.php');

$admin_db = new admin_class();
$global_db = new global_class();
?>

<div class="banner-container">
    <img src="global-assets/assets-used-in-web/footer-banner.png">
    <h1>About us</h1>
</div>
<div class="bottom-banner card text-center p-3">
    ILOILO CITY DIRECTORY AND OUR TEAM
</div>

<div class="about-us-f-row container mt-5 mb-5">
    <div class="aufrow-left-container">
        <h5>ABOUT ILOILO CITY DIRECTORY</h5>
        <p>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church.
            <br>
            <br>
            Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available.
            <br>
            <br>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available.
        </p>
    </div>
    <div class="aufrow-right-container">
        <img src="global-assets/assets-used-in-web/about-us1.png">
    </div>
</div>

<div class="container promote-bus-container mt-5 mb-5">
    <div class="promote-bus-content-container">
        <h5>PROMOTE YOUR BUSINESS</h5>
        <p>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church.
        </p>
    </div>
    <div class="promote-bus-content-container">
        <h5>PROMOTE YOUR BUSINESS</h5>
        <p>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church.
        </p>
    </div>
    <div class="promote-bus-content-container">
        <h5>PROMOTE YOUR BUSINESS</h5>
        <p>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church.
        </p>
    </div>
</div>

<center class="out-team-h2-container">
    <h2>OUR TEAM</h2>
</center>
<div class="container our-team-container mt-5 mb-5">
    <div class="profile-container">
        <img class="cover-photo" src="global-assets/assets-used-in-web/blogs-img.png">
        <img class="profile-picture" src="global-assets/assets-used-in-web/blog1.png">
        <div class="profile-details-container">
            <h5>JOMZ LLAMO</h5>
            <p>PROGRAMMER</p>
            <a class="btn-more-details" href="#">MORE DETAILS</a>
        </div>
    </div>
    <div class="profile-container">
        <img class="cover-photo" src="global-assets/assets-used-in-web/blogs-img.png">
        <img class="profile-picture" src="global-assets/assets-used-in-web/blog1.png">
        <div class="profile-details-container">
            <h5>LUISA BASILISCO</h5>
            <p>PROJECT MANAGER</p>
            <a class="btn-more-details" href="#">MORE DETAILS</a>
        </div>
    </div>
    <div class="profile-container">
        <img class="cover-photo" src="global-assets/assets-used-in-web/blogs-img.png">
        <img class="profile-picture" src="global-assets/team-profile/chrisis paul.jpg">
        <div class="profile-details-container">
            <h5>CHRIS PAUL LEBRILLA</h5>
            <p>DOCUMENT</p>
            <a class="btn-more-details" href="#">MORE DETAILS</a>
        </div>
    </div>
    <div class="profile-container">
        <img class="cover-photo" src="global-assets/assets-used-in-web/blogs-img.png">
        <img class="profile-picture" src="global-assets/assets-used-in-web/blog1.png">
        <div class="profile-details-container">
            <h5>MARY JANE BALANDAN</h5>
            <p>DOCUMENT</p>
            <a class="btn-more-details" href="#">MORE DETAILS</a>
        </div>
    </div>
</div>
<?php
include('user-components/footer.php');
