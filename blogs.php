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
    <h1>EKSPLANASYON SA NANGYAYARI <br> TUWING ALAS 10 NG GABI</h1>
    <p>
        Delulu time theory
    </p>
</div>
<div class="bottom-banner card text-center p-3">
    About : Overthinking , Relapse and Breakdown.
</div>
<div class="blog-content-container container">
    <div class="blog-content-top-container">
        <div class="bctc-left">
            <div class="bctc-date">
                FRIDAY , AUGUST 18 2023
            </div>
            <p class="pt-2">
                This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. <br><br>

                Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. <br><br>

                Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available.
            </p>
        </div>
        <div class="bctc-right-img-container">
            <img src="global-assets/assets-used-in-web/blog1.png">
        </div>
    </div>
    <div class="blog-content-bottom-container">
        <p>
            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available.
            Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. <br><br>

            Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. <br><br>

            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. <br><br>

            This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available. This unfussy, modern hotel overlooking the Iloilo Strait is 2 km from art and historical exhibits at Museo Iloilo, and 3 km from Molo Church. Unassuming rooms come with flat-screen TVs and free Wi-Fi; some feature strait views. Family rooms sleep up to 6 guests. Upgraded rooms add minibars, tea and coffeemakers, balconies and/or sitting areas. There's a casual restaurant beside an outdoor pool, as well as a lively lounge and karaoke facilities. Parking is available.
        </p>
    </div>
</div>
<?php
include('user-components/footer.php');
