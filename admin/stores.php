<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
$id = $_SESSION['id'];

include('components/header.php');
?>

<main class="main" id="main">
    <div class="pagetitle">
        <h1>Stores</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Stores</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <button id="new_category" class="card-title btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#NewModal">New Category</button> -->
                        <table class="table datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $db->admin_Get_Stores();
                                $num_row = 0;
                                while ($row = $sql->fetch_array()) {
                                    $num_row++;
                                    $category = $db->admin_Get_Category($row['category_id']);
                                ?>
                                    <tr>
                                        <td><?= $num_row ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['address'] ?></td>
                                        <td><?= $category ?></td>
                                        <td><?= ($row['status'] === 1) ? 'Active' : 'Deactivated' ?></td>
                                        <td>
                                            <button data-id="<?= $row['store_id'] ?>" data-idname="store_id" data-value="<?= $row['status'] ?>" data-table="store" class="change_status btn <?= ($row['status'] === 1) ? 'btn-danger' : 'btn-success' ?>">
                                                <?= ($row['status'] === 1) ? '<i class="fa-solid fa-x"></i>' : '<i class="fa-solid fa-check"></i>' ?>
                                            </button>
                                            <button 
                                            data-id="<?= $row['store_id'] ?>"  
                                            class="btn_edit btn btn-dark">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include('components/footer.php');
?>

<script>
    $('#nav-stores').addClass('nav-active')
</script>