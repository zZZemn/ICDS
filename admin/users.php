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
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $db->admin_Get_Users();
                                $num_row = 0;
                                while ($row = $sql->fetch_array()) {
                                    $num_row++;
                                ?>
                                    <tr>
                                        <td><?= $num_row ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= ($row['status'] === 1) ? 'Active' : 'Deactivated' ?></td>
                                        <td>
                                            <button data-id="<?= $row['user_id'] ?>" data-idname="user_id" data-value="<?= $row['status'] ?>" data-table="user" class="change_status btn <?= ($row['status'] === 1) ? 'btn-danger' : 'btn-success' ?>">
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

<?php
include('components/footer.php');
?>

<script>
    $('#nav-users').addClass('nav-active')
</script>