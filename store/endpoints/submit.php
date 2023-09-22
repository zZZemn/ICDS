<?php
include('../../db/class.php');
$db = new stores_class;

if (isset($_POST['store_id'], $_POST['link'], $_POST['linkName'])) {
    $addLink = $db->addNewLink($_POST['store_id'], $_POST['link'], $_POST['linkName']);
    if ($addLink === 200) {
        echo 'Link Added';
    } else {
        echo 'Something Went Wrong';
    }
} elseif (isset($_FILES['photo'], $_POST['store_id'])) {
    $addPhoto = $db->addNewPhoto($_POST['store_id'], $_FILES['photo']);
    if ($addPhoto === 200) {
        echo 'Photo Added';
    } else {
        echo $addPhoto;
    }
} else {
    echo 'not set';
}
