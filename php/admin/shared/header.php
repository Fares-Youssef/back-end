  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin/index.php" class="logo d-flex align-items-center">
        <img src="/admin/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">HR system</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/admin/admin/users-profile.php" >
            <img src="/admin/admin/upload/<?php print_r($_SESSION["image"]);?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2"><?php print_r($_SESSION["userName"]);?></span>
          </a><!-- End Profile Iamge Icon -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
