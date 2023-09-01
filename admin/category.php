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
        <h1>Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button id="new_category" class="card-title btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#NewModal">New Category</button>
                        <table class="table datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $db->admin_Get_Categories();
                                $num_row = 0;
                                while ($row = $sql->fetch_array()) {
                                    $num_row++;
                                ?>
                                    <tr>
                                        <td><?= $num_row ?></td>
                                        <td><?= $row['icon'] ?></td>
                                        <td><?= $row['category'] ?></td>
                                        <td><?= ($row['status'] === 1) ? 'Active' : 'Deactivated' ?></td>
                                        <td>
                                            <button data-id="<?= $row['category_id'] ?>" data-idname="category_id" data-value="<?= $row['status'] ?>" data-table="category" class="change_status btn <?= ($row['status'] === 1) ? 'btn-danger' : 'btn-success' ?>">
                                                <?= ($row['status'] === 1) ? 'Deactivate' : 'Activate' ?>
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

<!-- new modal -->
<form class="modal-all new-modal" id="new_modal">
    <center class="m-3">New Category</center>
    <div class="container">
        <div class="input-container">
            <input type="text" class="form-control" pattern="[A-Za-z\s]+" name="NewCategory" id="NewCategory" required>
            <label for="NewCategory">Category</label>
            <div class="invalid-feedback">Please enter a valid Category! ex: Business.</div>
        </div>
        <div class="input-container">
            <input type="file" class="form-control" name="NewIcon" id="NewIcon" required>
            <label for="NewIcon">Icon</label>
            <div class="invalid-feedback">Please enter a valid Category! ex: Business.</div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="m-1 btn btn-success">Save</button>
            <button type="reset" class="m-1 btn btn-secondary" id="close-modal">Close</button>
        </div>
    </div>
</form>
<!-- end of new modal -->

<?php
include('components/footer.php');
?>

<script>
    $('#nav-category').addClass('nav-active')

    $('#close-modal').click(function(e) {
        $('.modal-all').css('display', 'none');
    });

    $('#new_category').click(function(e) {
        e.preventDefault();
        $('#new_modal').css('display', 'block');
    });
</script>