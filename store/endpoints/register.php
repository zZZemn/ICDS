<?php
include('../../db/class.php');
$db = new stores_class;

if (isset($_POST['username'], $_POST['storeName'])) {
    $validateUsername = $db->storeRegisterValidation('username', $_POST['username']);
    $validateStoreName = $db->storeRegisterValidation('name', $_POST['storeName']);
    if ($validateUsername->num_rows > 0) {
        echo 'username exist';
    } elseif ($validateStoreName->num_rows > 0) {
        echo 'Establishment Exist';
    } else {
        echo 'Registration Success!';
    }
}
