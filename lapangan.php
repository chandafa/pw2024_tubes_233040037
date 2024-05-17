<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Zone | Lapangan</title>

    <!-- Include Library -->
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Lapangan</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            In voluptate adipisci sequi voluptas <br> commodi saepenobis aperiam nam sunt numquam.
        </p>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-4 shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filters</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Ketersediaan</h5>
                                <label class="form-label">Tanggal Booking</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Tanggal Berakhir</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Fasilitas</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Fasilitas 1</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Fasilitas 2</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Fasilitas 3</label>
                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Harga</h5>
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <span>Rp 100.000</span>
                                    <input type="range" class="form-range mx-2" min="0" max="5" step="0.5"
                                        id="customRange3">
                                    <span>Rp 500.000</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow rounded-4">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/about.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Lapangan Bola</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Kelebihan</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Lapangan luas
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Bersih
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Akses mudah
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Stock bola
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Balkon
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Wifi
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">100Rp/Hari</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Pesan</a>
                            <a href="#" class="btn btn-sm w-100 text-black btn-outline-warning shadow-none">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow rounded-4">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/about.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Lapangan Bola</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Kelebihan</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Lapangan luas
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Bersih
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Akses mudah
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Stock bola
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Balkon
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Wifi
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">100Rp/Hari</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Pesan</a>
                            <a href="#" class="btn btn-sm w-100 text-black btn-outline-warning shadow-none">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow rounded-4">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/about.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Lapangan Bola</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Kelebihan</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Lapangan luas
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Bersih
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Akses mudah
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Stock bola
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Balkon
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Wifi
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">100Rp/Hari</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Pesan</a>
                            <a href="#" class="btn btn-sm w-100 text-black btn-outline-warning shadow-none">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow rounded-4">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/about.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Lapangan Bola</h5>
                            <div class="features mb-4">
                                <h6 class="mb-1">Kelebihan</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Lapangan luas
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Bersih
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Akses mudah
                                </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas</h6>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Stock bola
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Balkon
                                </span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                    Wifi
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">100Rp/Hari</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2 ">Pesan</a>
                            <a href="#" class="btn btn-sm w-100 text-black btn-outline-warning shadow-none">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>