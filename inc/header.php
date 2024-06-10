<header class="sticky-top">
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-2 px-lg-3 py-lg-2 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48">
                    <circle cx="28" cy="9" r="5" fill="#ff9800" />
                    <path fill="#00796b"
                        d="m29 27.3l-9.2-4.1c-1-.5-1.5 1-2 2s-4.1 7.2-3.8 8.3c.3.9 1.1 1.4 1.9 1.4c.2 0 .4 0 .6-.1L28.8 31c.8-.2 1.4-1 1.4-1.8s-.5-1.6-1.2-1.9" />
                    <path fill="#009688"
                        d="m26.8 15.2l-2.2-1c-1.3-.6-2.9 0-3.5 1.3L9.2 41.1c-.5 1 0 2.2 1 2.7c.3.1.6.2.9.2c.8 0 1.5-.4 1.8-1.1c0 0 9.6-13.3 10.4-14.9s4.9-9.3 4.9-9.3c.5-1.3 0-2.9-1.4-3.5" />
                    <path fill="#ff9800"
                        d="M40.5 15.7c-.7-.8-2-1-2.8-.3l-5 4.2l-6.4-3.5c-1.1-.6-2.6-.4-3.3.9c-.8 1.3-.4 2.9.8 3.4l8.3 3.4c.3.1.6.2.9.2c.5 0 .9-.2 1.3-.5l6-5c.8-.7.9-1.9.2-2.8m-28.8 7.4l3.4-5.1l4.6.6l1.5-3.1c.4-.9 1.2-1.4 2.1-1.5h-9.2c-.7 0-1.3.3-1.7.9l-4 6c-.6.9-.4 2.2.6 2.8c.2.2.6.3 1 .3c.6 0 1.3-.3 1.7-.9" />
                </svg>
                Sport Zone
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-medium">
                    <li class="nav-item">
                        <a class="nav-link p-2" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="alat.php">Alat Olahraga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="facilities.php">Benefit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="contact.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="about.php">Tentang Kami</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if (isset($_SESSION['username'])) : ?>
                    <span class="navbar-text me-3 d-none d-lg-block m-1">Selamat datang, <b>
                            <?php echo htmlspecialchars($_SESSION['name']); ?>!</b></span>
                    <a href="user/profile-user.php" class="btn btn-outline-primary m-1">Profil</a>
                    <!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
                    <a href="#" class="btn btn-danger m-1" onclick="confirmLogout()">Logout</a>

                    <?php else : ?>
                    <button type="button" class="btn btn-outline-warning me-2" data-bs-toggle="modal"
                        data-bs-target="#search">
                        <i class="bi bi-search"></i> Search
                    </button>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Login
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>


</header>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-container" action="proses-login.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" id="username" name="username"
                            placeholder="Username">
                    </div>
                    <div class="form-group mb-4">
                        <label for="InputPassword">Password</label>
                        <input required type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Password">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" name="login" class="btn btn-warning text-white shadow-none">Login</button>
                        <!-- Lupa Password Form -->
                        <a class="text-decoration-none" href="#" data-bs-toggle="modal"
                            data-bs-target="#forgetPasswordModal">Forget Password?</a>

                    </div>
                    <hr>
                    <label class="form-label mt-2"> <a class="text-decoration-none" href="register.php">Belum memiliki
                            akun?</a></label>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Form untuk Lupa Password -->
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" aria-labelledby="forgetPasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgetPasswordForm" method="POST" action="process_reset_password.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgetPasswordModalLabel">Forget Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
function showForgetPasswordForm() {
    document.getElementById('forgetPasswordModal').style.display = 'block';
}
</script>



<!-- Modal Search -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchLabel"><i class="bi bi-search"></i> Search</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-group" id="result"></ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="searchBtn" class="btn btn-outline-warning shadow-none">Search</button>
            </div>
        </div>
    </div>
</div>

<script>
function confirmLogout() {
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        window.location.href = "logout.php"; // Redirect to logout.php if the user confirms
    }
}
</script>