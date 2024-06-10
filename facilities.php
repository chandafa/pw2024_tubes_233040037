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
    <title>Sport Zone | Benefit</title>

    <!-- Include Library -->
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Benefit Tersedia</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            In voluptate adipisci sequi voluptas <br> commodi saepenobis aperiam nam sunt numquam.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop p-4">
                    <div class="d-flex align-items-center mb-2 p-2">
                        <i class="bi bi-credit-card-2-front fs-4"></i>

                        <h5 class="m-0 ms-3">Card Member</h5>
                    </div>
                    <p class="text-justify">
                        Anggota mendapatkan akses ke diskon khusus dan penawaran eksklusif yang tidak tersedia untuk
                        pengguna biasa. Ini bisa termasuk potongan harga tetap dari card member.
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop p-4">
                    <div class="d-flex align-items-center mb-2 p-2">
                        <i class="bi bi-door-open fs-4"></i>

                        <h5 class="m-0 ms-3">Akses Mudah dan Praktis</h5>
                    </div>
                    <p class="text-justify">
                        Pengguna dapat dengan mudah mengakses berbagai alat olahraga kapan saja dan di mana saja tanpa
                        perlu pergi ke toko fisik. Ini memberikan kenyamanan.
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop p-4">
                    <div class="d-flex align-items-center mb-2 p-2">
                        <i class="bi bi-tags fs-4"></i>

                        <h5 class="m-0 ms-3">Harga yang Terjangkau</h5>
                    </div>
                    <p class="text-justify">
                        Menyewa peralatan olahraga sering kali lebih ekonomis dibandingkan membeli, terutama untuk
                        peralatan yang hanya digunakan sesekali.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>