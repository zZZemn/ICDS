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

<?php
include('user-components/footer.php');
