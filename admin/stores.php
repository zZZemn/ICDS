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
</main>

<?php
include('components/footer.php');
?>

<script>
    $('#nav-stores').addClass('nav-active')
</script>