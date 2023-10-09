<?php
include('../db/class.php');
$db = new global_class();
$admin_db = new admin_class();

if (isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['repassword'])) {
    if ($db->signup($_POST) === 200) {
        echo 'sign up completed!';
    } else {
        echo 'Something went wrong :<';
    }
} elseif (isset($_POST['username'], $_POST['password'])) {
    $userLogin = $admin_db->login('user', $_POST['username']);
    if ($userLogin->num_rows > 0) {
        $user = $userLogin->fetch_array();
        if ($_POST['password'] === $user['password']) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            echo '200';
        } else {
            echo '400';
        }
    } else {
        echo '400';
    }
} elseif (isset($_POST['userId'], $_POST['storeId'], $_POST['review'], $_POST['rateValue'])) {
    echo $db->submitRate($_POST);
}
