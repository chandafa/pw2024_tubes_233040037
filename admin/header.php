<!-- Header-->
<header id="header" class="header d-print-none">

    <div class="header-menu">

        <div class="col-sm-7"> </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h4>Welcome,<b>" <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin'; ?> "</b>
                    </h4>
                </a>

                <div class="user-menu dropdown-menu border border-primary">
                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

</header><!-- /header -->
<!-- Header-->