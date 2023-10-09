<?php
include('../../db/class.php');

$db = new stores_class();

if (isset($_POST['wtd'], $_POST['id'])) {
    echo $db->deleteStore($_POST);
}