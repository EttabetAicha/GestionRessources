<?php session_start(); ?>

<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
        id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2"
                style="border-bottom: 2px solid rgba(121, 119, 119, 0.493);">
                <img class="rounded-circle" src="../images/Rectangle 49.png" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold">Bonjour <?php echo $_SESSION['name']; ?></h2>
                <span class="h7 admin-color">
    <?php 
    if (isset($_SESSION['role'])) {
        echo $_SESSION['role'];
    } else {
        echo "Role not set";
    }
    ?>
</span>
                <br>
            </div>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder"
                                src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-expand-lg  navbar-collapse" id="sidebarCollapse">

                <!-- Navigation -->

                <?php
                if ($_SESSION['role'] === 'admin ') {
                    echo '
                        <div class="navbar-nav">
                        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="bi bi-house"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Users.php">
                <i class="bi bi-bar-chart"></i> Utilisateurs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Resources.php">
                <i class="bi bi-chat"></i> Ressources
                <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Category.php">
                <i class="bi bi-bookmarks"></i> Category
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="SousCategory.php">
                <i class="bi bi-globe-americas"></i> SousCategory
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-file-text"></i> Posts
            </a>
        </li>';
                }
                else{
                    echo '
                        <div class="navbar-nav">
                        
        <li class="nav-item">
            <a class="nav-link" href="Users.php">
                <i class="bi bi-bar-chart"></i> Utilisateurs
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="Category.php">
                <i class="bi bi-bookmarks"></i> Category
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="SousCategory.php">
                <i class="bi bi-globe-americas"></i> SousCategory
            </a>
        </li>
        ';
                };
                ?>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                </ul>
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"
                            onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>