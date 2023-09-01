<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
$id = $_SESSION['id'];

include('components/header.php');

$sql = $db->dashboard_Contents();
echo $sql;
$user = $sql[0];
$categories = $sql[1];
$store = $sql[2];
?>

<main class="main" id="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Users <span>| System</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-users fa-beat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h1><?= $user ?></h1>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Stores <span>| System</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-store fa-beat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h1><?= $store ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Categories <span>| System</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-layer-group fa-beat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h1><?= $categories ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Customers Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
</main>

<?php
include('components/footer.php');
?>

<script>
    $('#nav-dashboard').addClass('nav-active')
</script>