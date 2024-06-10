<!-- Left Panel -->
<aside id="left-panel" class="left-panel d-print-none">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">Penyewaan Barang</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Penyewaan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-question"></i><a href="permintaan.php">Permintaan sewa</a>
                        </li>
                        <li><i class="menu-icon fa fa-shopping-cart"></i><a href="barang-dipinjam.php">Barang
                                Disewa</a></li>
                        <li><i class="menu-icon fa fa-check"></i><a href="permintaan-kembali.php">Konfirmasi Barang
                                Kembali?</a></li>
                        <li><i class="menu-icon fa fa-handshake-o"></i><a href="barang-kembali.php">Barang Kembali</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Alat Olahraga</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-archive"></i><a href="data-barang.php">Data Alat</a></li>
                        <li><i class="menu-icon fa fa-plus"></i><a href="tambah-barang.php">Tambah Alat</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user"></i>User</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-users"></i><a href="data-user.php">Data User</a></li>
                        <!--li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Tambah User</a></li-->
                    </ul>
                </li>

                <li class="active">
                    <a href="logout.php"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>


<script>
// HTML button element
const printButton = document.getElementById('printButton');

// Triggering print on button click
printButton.addEventListener('click', function() {
    window.print();
});
</script>