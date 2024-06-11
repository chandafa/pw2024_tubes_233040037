<?php
session_start();

include 'config.php';

// Pagination settings
$records_per_page = 3;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting record for the query
$start_from = ($page - 1) * $records_per_page;

// $query = mysqli_query($connect, "SELECT * FROM tbl_barang ORDER BY id ASC LIMIT $start_from, $records_per_page");


// Query to fetch items with stock greater than 0
$query = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE stok_barang > 0 ORDER BY id ASC LIMIT $start_from, $records_per_page");


if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}


if (!$query) {
    die("Query gagal: " . mysqli_error($connect));
}

// Loop untuk menampilkan data




?>
<!DOCTYPE html>
<html>

<head>
    <?php require('inc/links.php'); ?>

    <style>
    /* CSS untuk tombol go to top */
    #goTopBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99;
    }
    </style>



</head>

<body>

    <?php require('inc/header.php'); ?>

    <!-- Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper mySwiper rounded-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="assets/img/carousel/1.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/carousel/2.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/carousel/3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/carousel/4.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/carousel/5.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/carousel/6.jpg" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php if (isset($_SESSION['username'])) : ?>
    <!-- Booking Larapangan -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 glass shadow p-4 rounded-4 ">
                <h5>Check Sewa Alat</h5>
                <section class="p-4 text-center">
                    <div class="container-fluid ">
                        <?php
                            $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
                            ?>

                        <div class="btn-group d-flex flex-wrap justify-content-center" style="margin-top: 5px;">
                            <a href="data-request.php?username=<?php echo $username; ?>"
                                class="btn btn-warning m-2 rounded">
                                <i class="fa fa-question"></i> Permintaan
                            </a>
                            <a href="pemberitahuan.php?username=<?php echo $username; ?>"
                                class="btn btn-info m-2 rounded">
                                <i class="fa fa-bell"></i> Pemberitahuan
                            </a>
                            <a href="barang-dipinjam.php?username=<?php echo $username; ?>"
                                class="btn btn-secondary m-2 rounded">
                                <i class="bi bi-clock-history"></i> Disewa
                            </a>
                            <a href="barang-dikembalikan.php?username=<?php echo $username; ?>"
                                class="btn btn-success m-2 rounded">
                                <i class="fa fa-check"></i> Dikembalikan
                            </a>

                            <button type="button" class="btn btn-outline-warning rounded m-2" data-bs-toggle="modal"
                                data-bs-target="#search">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <!-- Barang -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Alat Olahraga</h2>
    <div class="container">
        <div class="row lapangan-list">
            <?php while ($data = mysqli_fetch_array($query)) : ?>


            <?php
                $harga = $data['harga'];
                $formatted_harga = number_format($harga, 0, ',', '.');
                ?>

            <?php $modal_id = "modal_" . $data['id']; ?>
            <!-- cards 1 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow rounded-4" style="max-width: 350px;  margin: auto;">
                    <img src="assets/img/uploads/<?php echo $data['gambar_barang']; ?>"
                        class="card-img-top rounded-top-4" height="250">
                    <div class="card-body ">
                        <h5><?php echo $data['nama_barang']; ?></h5>
                        <h6 class="mb-4"><?php echo $formatted_harga; ?>/Hari</h6>

                        <div class="facilities mb-4">
                            <h6 class="mb-1">Benefit</h6>
                            
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Card Member
                            </span>
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Berkualitas
                            </span>
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Terjangkau
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <ul class="list-unstyled list-inline mb-2 badge rounded-pill bg-light">
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item"><i class="bi bi-star-half text-warning"></i></li>
                            </ul>

                        </div>

                        <div class="d-flex justify-content-evenly mb-2">
                            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
                            <a href="proses-pinjam.php?username=<?php echo $_SESSION['username']; ?>&id_barang=<?php echo $data['id']; ?>"
                                class="btn btn-outline-info px-4">Pesan</a>
                            <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal"
                                data-bs-target="#<?php echo $modal_id; ?>">Detail</button>

                            <?php else : ?>
                            <button type="button" class="btn btn-warning text-white px-4" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Pesan</button>
                            <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal"
                                data-bs-target="#<?php echo $modal_id; ?>">Detail</button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php require('inc/details.php'); ?>
            <?php endwhile; ?>

        </div>


        <!-- Pagination -->
        <?php
        // Fetch total number of records
        $total_records_query = "SELECT COUNT(*) AS total_records FROM tbl_barang";
        $result = mysqli_query($connect, $total_records_query);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        $total_pages = ceil($total_records / $records_per_page);

        if ($total_pages > 1) :
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>



    </div>


    <!-- Kelebihan -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Kelebihan</h2>

    <div class="container mt-4 mb-4">
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            <div class="col">
                <div class=" h-100 " style="width: 90%;">
                    <div class="card-body justify-content-between">
                        <div class="exp">
                            <i class="bi bi-hand-thumbs-up-fill fs-2 text-secondary"></i>
                        </div>
                        <h5 class="card-title mb-2">Produk Berkualitas</h5>
                        <p class="card-text">
                            Kualitas produk sangat penting bagi Anda, dan juga kami! Itu sebabnya kami melakukan
                            pemeriksaan kualitas yang ketat untuk setiap produk.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 " style="width: 90%;">

                    <div class="card-body">
                        <div class="exp">
                            <i class="bi bi-cash fs-2 text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">Biaya Terjangkau</h5>
                        <p class="card-text">Biaya harian yang terjangkau mulai dari Rp20.000 per hari untuk alat
                            fitness dengan kualitas premium.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 " style="width: 90%;">

                    <div class="card-body">
                        <div class="exp">
                            <i class="bi bi-whatsapp fs-2 text-success"></i>
                        </div>
                        <h5 class="card-title mb-2">Respon Cepat</h5>
                        <p class="card-text">Customer Service dan Teknisi kami memberikan jaminan respon yang cepat
                            untuk memberikan pengalaman terbaik.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 " style="width: 90%;">

                    <div class="card-body">
                        <div class="exp">
                            <i class="bi bi-credit-card fs-2 text-warning"></i>
                        </div>
                        <h5 class="card-title mb-2">Refundable Deposit</h5>
                        <p class="card-text">
                            Uang deposit dikembalikan dalam 7 hari kerja setelah produk selesai di sewa.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 " style="width: 90%;">

                    <div class="card-body">
                        <div class="exp">
                            <i class="bi bi-tools fs-2 text-danger"></i>
                        </div>
                        <h5 class="card-title mb-2">Teknisi Handal</h5>
                        <p class="card-text">
                            Kualitas produk sangat penting bagi Anda, dan juga kami! Itu sebabnya kami melakukan
                            pemeriksaan kualitas yang ketat untuk setiap produk.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 " style="width: 90%;">

                    <div class="card-body">
                        <div class="exp">
                            <i class="bi bi-lock-fill fs-2 text-info"></i>
                        </div>
                        <h5 class="card-title mb-2">100% Aman</h5>
                        <p class="card-text">
                            Kami sudah hadir lebih dari 2 tahun dan memiliki testimoni pelanggan yang luas, untuk
                            pribadi maupun bisnis​​
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Testimoni -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Testimoni</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4 shadow rounded">
                    <div class="profile img-tests d-flex align-items-center mb-2">
                        <img src="assets/img/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Aufa Ramadhan</h6>
                    </div>
                    <p>
                        "Website ini sangat memudahkan saya dalam menyewa peralatan olahraga untuk sesi latihan saya.
                        Proses pemesanan yang cepat dan harga yang terjangkau membuat saya kembali lagi dan lagi

                    </p>
                    <div class="rating">
                        <ul class="list-unstyled list-inline mb-2 badge rounded-pill bg-light">
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item"><i class="bi bi-star-half text-warning"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4 shadow rounded">
                    <div class="profile img-tests d-flex align-items-center mb-2">
                        <img src="assets/img/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Galang Ramadhan</h6>
                    </div>
                    <p>
                        "Sebagai instruktur yoga, saya sering membutuhkan peralatan tambahan untuk kelas-kelas saya.
                        Website ini menyediakan berbagai alat yang berkualitas dengan pelayanan yang memuaskan.
                    </p>
                    <div class="rating">
                        <ul class="list-unstyled list-inline mb-2 badge rounded-pill bg-light">
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item"><i class="bi bi-star-half text-warning"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4 shadow rounded">
                    <div class="profile img-tests d-flex align-items-center mb-2">
                        <img src="assets/img/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Candra Kirana</h6>
                    </div>
                    <p>
                        "Dengan anggaran terbatas sebagai mahasiswa, menyewa peralatan olahraga adalah solusi terbaik
                        bagi saya. Website ini menawarkan harga yang kompetitif dan proses yang sangat mudah.
                    </p>
                    <div class="rating">
                        <ul class="list-unstyled list-inline mb-2 badge rounded-pill bg-light">
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item"><i class="bi bi-star-half text-warning"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4 shadow rounded">
                    <div class="profile img-tests d-flex align-items-center mb-2">
                        <img src="assets/img/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Muhammad Alfi</h6>
                    </div>
                    <p>
                        "Website ini sangat user-friendly dan memudahkan saya dalam menyewa alat olahraga untuk keluarga
                        saya. Anak-anak saya sangat menikmati berbagai peralatan yang kami sewa.
                    </p>
                    <div class="rating">
                        <ul class="list-unstyled list-inline mb-2 badge rounded-pill bg-light">
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                            <li class="list-inline-item"><i class="bi bi-star-half text-warning"></i></li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>


    <!-- Kontak dan Lokasi -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Kontak dan Lokasi</h2>
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded shadow">
                <iframe class="w-100 rounded" height="320px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.20358553266!2d107.59252760000001!3d-6.866190299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ad402365e9%3A0x720f2e1a52359642!2sFakultas%20Teknik%20Unpas!5e0!3m2!1sen!2sid!4v1715686172804!5m2!1sen!2sid"
                    loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4 shadow">
                    <h5>Kontak</h5>
                    <a href="tel: +62895404418536" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill text-warning"></i> 0895404418536
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope text-warning"></i> ck271138@gmail.com
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4 shadow">
                    <h5>Follow</h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter-x me-1 text-warning"></i> Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1 text-warning"></i> Instagram
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1 text-warning"></i> Facebook
                        </span>
                    </a>


                </div>

            </div>
        </div>
    </div>

    <button id="goTopBtn" class="btn btn-primary" onclick="goToTop()"><i class="bi bi-arrow-up-circle"></i>
    </button>


    <!-- Footer -->
    <?php require('inc/footer.php'); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const resultList = document.getElementById('result');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value;

            if (query.length > 2) {
                fetch('search.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'query=' + encodeURIComponent(query)
                    })
                    .then(response => response.json())
                    .then(data => {
                        resultList.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(item => {
                                const li = document.createElement('li');
                                li.classList.add('list-group-item', 'd-flex',
                                    'justify-content-between', 'align-items-center');

                                const itemName = document.createElement('span');
                                itemName.textContent = item.nama_barang;

                                const username =
                                    "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
                                let itemButton;

                                if (username) {
                                    itemButton = document.createElement('a');
                                    itemButton.href =
                                        `proses-pinjam.php?username=${username}&id_barang=${item.id}`;
                                    itemButton.classList.add('btn', 'btn-outline-info');
                                    itemButton.textContent = 'Pesan Sekarang';
                                } else {
                                    itemButton = document.createElement('button');
                                    itemButton.type = 'button';
                                    itemButton.classList.add('btn', 'btn-warning',
                                        'text-white');
                                    itemButton.setAttribute('data-bs-toggle', 'modal');
                                    itemButton.setAttribute('data-bs-target',
                                        '#loginModal');
                                    itemButton.textContent = 'Pesan Sekarang';
                                }

                                li.appendChild(itemName);
                                li.appendChild(itemButton);
                                resultList.appendChild(li);
                            });
                        } else {
                            const li = document.createElement('li');
                            li.classList.add('list-group-item');
                            li.textContent = 'No results found';
                            resultList.appendChild(li);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                resultList.innerHTML = '';
            }
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        $('#searchBtn').click(function() {
            var searchText = $('#searchInput').val(); // Get the value of the search input

            // Perform AJAX request
            $.ajax({
                url: 'search.php', // URL to the server-side script handling the search
                type: 'POST',
                data: {
                    searchText: searchText
                }, // Send the search text as data
                success: function(response) {
                    $('#result').html(
                        response
                    ); // Update the result list with the response from the server
                }
            });
        });
    });

    function confirmLogout() {
        var confirmLogout = confirm("Are you sure you want to logout?");
        if (confirmLogout) {
            window.location.href = "logout.php"; // Redirect to logout.php if the user confirms
        }
    }
    </script>

    <!-- Container Swiper -->
    <script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });


    // Function Pagination
    document.addEventListener("DOMContentLoaded", function() {
        const moreButton = document.querySelector('.more-button');
        const lapanganList = document.querySelector('.lapangan-list');

        moreButton.addEventListener('click', function(event) {
            event.preventDefault();
            const lapanganItems = lapanganList.querySelectorAll('.my-3.d-none');
            lapanganItems.forEach(function(item) {
                item.classList.toggle('d-none');
            });

            moreButton.textContent = moreButton.textContent === 'More...' ? 'Less...' : 'More...';
        });
    });


    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
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

    <script>
    // Fungsi untuk scroll ke atas halaman
    function goToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Menampilkan atau menyembunyikan tombol go to top berdasarkan posisi scroll
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        var goTopBtn = document.getElementById("goTopBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            goTopBtn.style.display = "block";
        } else {
            goTopBtn.style.display = "none";
        }
    }
    </script>


    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>




</body>

</html>
