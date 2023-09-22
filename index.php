<?php
$isLogin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isLogin = true;
}
include('user-components/header.php');
?>


<?php
include('user-components/footer.php');