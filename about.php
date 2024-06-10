<?php
session_start();

include 'config.php';

// Pagination settings
$records_per_page = 3;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting record for the query
$start_from = ($page - 1) * $records_per_page;

$query = mysqli_query($connect, "SELECT * FROM tbl_barang ORDER BY id ASC LIMIT $start_from, $records_per_page");

if (!$query) {
    die("Query gagal: " . mysqli_error($connect));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Zone | About</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Include Library -->
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">About</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ai ipsum dolor sit amet consectetur adipisicing elit.
            In voluptate adipisci sequi voluptas <br> commodi saepenobis aperiam nam sunt numquam.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3 fw-bold fs-4">
                    Sport Zone | Penyewaan Alat Olahraga

                </h3>
                <p>
                    Selamat datang di Sport Zone, tempat terbaik untuk menyewa berbagai macam alat olahraga berkualitas.
                    Kami memahami betapa pentingnya aktivitas fisik dalam menjaga kesehatan dan kebugaran Anda. Oleh
                    karena itu, kami menyediakan beragam peralatan olahraga yang dapat Anda sewa dengan mudah dan cepat.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="assets/img/logo.png" width="50%" class="rounded-4">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <i class="bi bi-gear fs-4"></i>
                    <h4 class="mt-3">200+ Alat</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <i class="bi bi-people fs-4"></i>

                    <h4 class="mt-3">200+ Customer</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <i class="bi bi-envelope-paper fs-4"></i>

                    <h4 class="mt-3">300+ Pesanan</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <i class="bi bi-stars fs-4"></i>

                    <h4 class="mt-3">500+ Riview</h4>
                </div>
            </div>
        </div>
    </div>


    <br><br><br>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {

        spaceBetween: 40,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,

            },
            640: {
                slidesPerView: 1,

            },
            768: {
                slidesPerView: 2,

            },
            1024: {
                slidesPerView: 3,

            },
        },
    });
    </script>


    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>