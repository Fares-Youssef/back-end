<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/admin/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php if($_SESSION["rule"]==1): ?>
            
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Admin-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Admin</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/Admin/admin/pages-register.php">
                        <i class="bi bi-circle"></i><span>Add Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/admin/list.php">
                        <i class="bi bi-circle"></i><span>List Admin</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["rule"]==1 || $_SESSION["rule"]==2): ?>

                <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#department-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Depatment</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="department-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/Admin/department/add.php">
                        <i class="bi bi-circle"></i><span>Add Department</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/department/list.php">
                        <i class="bi bi-circle"></i><span>List Department</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Employee</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="employee-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/Admin/employees/add.php">
                        <i class="bi bi-circle"></i><span>Add Employees</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/employees/list.php">
                        <i class="bi bi-circle"></i><span>List Employee</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/admin/users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/admin/logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->