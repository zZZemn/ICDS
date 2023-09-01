<?php
include('../../db/class.php');
$db = new admin_class();
if (isset($_POST['CatEditID']) && isset($_POST['EditCategory'])) {
    echo $db->admin_Edit_Categories($_POST['CatEditID'], $_POST['EditCategory']);
}
