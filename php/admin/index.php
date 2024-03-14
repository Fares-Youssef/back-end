<?php

include './app/function.php';
include './shared/head.php';
include './shared/header.php';
include './shared/aside.php';
session();
?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="text-center">
        <h1>Welcome <?php print_r($_SESSION["name"]); ?></h1>
    </div>
</main><!-- End #main -->



<?php  
include './shared/script.php';
?>