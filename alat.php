<?php
session_start();
include 'config.php';

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Check if price range is set in GET request
$min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 10000;
$max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 500000;
$search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

// Modify query to include price range filter
$query = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE harga BETWEEN $min_price AND $max_price AND nama_barang LIKE '%$search_keyword%' ORDER BY id ASC LIMIT $start_from, $records_per_page");

if (!$query) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Zone | Alat Olahraga</title>

    <!-- Include Library -->
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Alat Olahraga</h2>
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
                        <h4 class="mt-2 mx-2">Filters</h4>
                        <button class="navbar-toggler shadow-none me-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mx-2"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2 p-4"
                            id="filterDropdown">

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Pilih Alat Olahraga</h5>
                                <div class="row">
                                    <div class="col">
                                        <form class="col-md-12">
                                            <input type="text" id="search_keyword" class="form-control"
                                                placeholder="Cari Nama Barang...">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Harga</h5>
                                <input type="range" class="form-range mx-2" min="10000" max="500000" step="5000"
                                    id="priceRange">
                                <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <span id="min-price">Rp 10.000</span>
                                    -
                                    <span id="max-price">Rp 500.000</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4" id="product-list">
                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) :
                        $harga = $data['harga'];
                        $formatted_harga = number_format($harga, 0, ',', '.');
                        $modal_id = "modal_" . $data['id'];
                ?>
                <div class="card mb-4 border-0 shadow rounded-4 product" data-price="<?php echo $formatted_harga; ?>">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="assets/img/uploads/<?php echo $data['gambar_barang']; ?>"
                                class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3"><?php echo $data['nama_barang']; ?></h5>

                            <div class="facilities mb-3">
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Stock</span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Card
                                    Member</span>
                                <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Harga
                                    Murah</span>
                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center ">
                            <h6 class=" mb-4"><?php echo $formatted_harga; ?> Rp/Hari</h6>
                            <div class="justify-content-evenly mb-2 ">
                                <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
                                <a href="proses-pinjam.php?username=<?php echo $_SESSION['username']; ?>&id_barang=<?php echo $data['id']; ?>"
                                    class="btn btn-outline-info px-4 mb-2">Pesan</a>
                                <br>
                                <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo $modal_id; ?>">Detail</button>
                                <?php else : ?>
                                <button type="button" class="btn btn-warning text-white px-4 mb-2"
                                    data-bs-toggle="modal" data-bs-target="#loginModal">Pesan</button>
                                <br>
                                <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo $modal_id; ?>">Detail</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require('inc/details.php'); ?>
                <?php endwhile;
                } else {
                    echo "<div class='alert alert-warning'>Barang tidak ditemukan</div>";
                }
                ?>
            </div>
        </div>


    </div>



    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- jquery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <!-- Footer -->
    <?php require('inc/footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const priceRange = document.getElementById('priceRange');
        const minPriceSpan = document.getElementById('min-price');
        const maxPriceSpan = document.getElementById('max-price');
        const searchKeywordInput = document.getElementById('search_keyword');
        const productList = document.getElementById('product-list');

        const minPriceValue = 10000; // Rp 10.000
        const maxPriceValue = 500000; // Rp 500.000

        function updatePriceDisplay() {
            const price = priceRange.value;
            minPriceSpan.textContent = `Rp ${price.toLocaleString()}`;
            maxPriceSpan.textContent = `Rp ${price.toLocaleString()}`;
            fetchProducts(priceRange.min, price, searchKeywordInput.value);
        }

        function fetchProducts(minPrice, maxPrice, searchKeyword) {
            $.ajax({
                url: 'search_barang.php',
                type: 'GET',
                data: {
                    min_price: minPrice,
                    max_price: maxPrice,
                    search_keyword: searchKeyword
                },
                success: function(response) {
                    const products = JSON.parse(response);
                    productList.innerHTML = '';
                    if (products.length > 0) {
                        products.forEach(product => {
                            const productCard = `
                            <div class="card mb-4 border-0 shadow rounded-4 product" data-price="${product.harga}">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="assets/img/uploads/${product.gambar_barang}" class="img-fluid rounded" alt="...">
                                    </div>
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="mb-3">${product.nama_barang}</h5>
                                        <div class="facilities mb-3">
                                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Stock</span>
                                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Card Member</span>
                                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">Harga Murah</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center ">
                                        <h6 class=" mb-4">${product.harga.toLocaleString()} Rp/Hari</h6>
                                        <div class="justify-content-evenly mb-2 ">
                                            ${product.pesan_button}
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                            productList.insertAdjacentHTML('beforeend', productCard);
                        });
                    } else {
                        productList.innerHTML =
                            "<div class='alert alert-warning'>Barang tidak ditemukan</div>";
                    }
                }
            });
        }

        priceRange.addEventListener('input', updatePriceDisplay);
        searchKeywordInput.addEventListener('input', () => {
            fetchProducts(priceRange.min, priceRange.value, searchKeywordInput.value);
        });

        updatePriceDisplay();
    });
    </script>

</body>

</html>