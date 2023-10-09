<?php
include('../db/class.php');
$db = new global_class();

if (isset($_GET['value'], $_GET['category'])) {
    if ($_GET['value'] !== '') {
        $search = $db->searchEstablishment($_GET);
        if ($search->num_rows > 0) {
            while ($searchRow = $search->fetch_array()) {
?>
                <a href="establishment.php?str_id=<?= $searchRow['store_id'] ?>"><?= $searchRow['name'] ?></a>
<?php
            }
        }
    }
}
