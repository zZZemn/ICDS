<?php
include('../../db/class.php');
if (isset($_POST['id']) && isset($_POST['table']) && isset($_POST['value']) && isset($_POST['idName'])) {
    $db = new admin_class();
    echo $db->admin_Deactivate_Users($_POST['id'], $_POST['value'], $_POST['table'], $_POST['idName']);
}
