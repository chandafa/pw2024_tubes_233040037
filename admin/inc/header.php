<div class="container-fluid bg-dark p-3 d-flex align-items-center justify-content-between sticky-top">
    <a href="../index.php" class="text-decoration-none">
        <h3 class="mb-0 text-light">Sport Zone</h3>
    </a>
    <!-- <a href="logout.php" class="btn btn-secondary btn-sm fw-semibold" id="confirmLogoutButton">LOGOUT</a> -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
        Logout
    </button>
</div>

<div class="col-lg-2 bg-dark border-top border-3 border-secondary z-3" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="lapangan.php">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user_queries.php">User Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="features_facilities.php">Kelebihan dan Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="carousel.php">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="settings.php">Settings</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</div>


<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-danger" id="confirmLogoutBtn"><a href="logout.php" class="fw-semibold text-decoration-none text-white" id="confirmLogoutButton">Logout</a></button>
            </div>
        </div>
    </div>
</div>