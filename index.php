<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Zone | Home</title>
    <?php require('inc/links.php') ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">




</head>

<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <!-- Swiper Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container rounded-4">
            <div class="swiper-wrapper ">

                <?php

                $res = selectAll('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                    <div class="swiper-slide">
                        <img src="$path$row[image]" alt="by@unplash" class="w-100 d-block" />
                    </div>
                    data;
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Booking Larapangan -->
    <div class="container availability-form ">
        <div class="row ">
            <div class="col-lg-12 glass shadow p-4 rounded-4 ">
                <h5 class="mb-4">Check Booking Lapangan</h5>
                <form>
                    <div class="row align-items-end justify-content-evenly">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Tanggal Booking</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Tanggal Berakhir</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Dewasa</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Anak-Anak</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2 px-lg-1">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Lapangan -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Lapangan tersedia</h2>
    <div class="container">
        <div class="row">

            <!-- cards 1 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow rounded-4" style="max-width: 350px; margin: auto;">
                    <img src="images/lapangan/5.jpg" class="card-img-top rounded-top-4">

                    <div class="card-body ">
                        <h5>Lapangan Bola</h5>
                        <h6 class="mb-4">100Rp/Hari</h6>
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
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Fasilitas</h6>
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Lapangan Tenis
                            </span>
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
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none  ">Pesan Sekarang</a>
                            <a href="#" class="btn btn-sm text-black btn-outline-warning shadow-none">Detail
                                lapangan</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cards 2 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow rounded-4" style="max-width: 350px; margin: auto;">
                    <img src="images/lapangan/3.jpg" class="card-img-top rounded-top-4">

                    <div class="card-body">
                        <h5>Lapangan Voli</h5>
                        <h6 class="mb-4">100Rp/Hari</h6>
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
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Fasilitas</h6>
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Lapangan Tenis
                            </span>
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
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none  ">Pesan Sekarang</a>
                            <a href="#" class="btn btn-sm text-black btn-outline-warning shadow-none">Detail
                                lapangan</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cards 3 -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow rounded-4" style="max-width: 350px; margin: auto;">
                    <img src="images/lapangan/4.jpg" class="card-img-top rounded-top-4">

                    <div class="card-body">
                        <h5>Lapangan Basket</h5>
                        <h6 class="mb-4">100Rp/Hari</h6>
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
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Fasilitas</h6>
                            <span class="badge rounded-pill bg-warning text-dark text-wrap lh-base">
                                Lapangan Tenis
                            </span>
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
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none  ">Pesan Sekarang</a>
                            <a href="#" class="btn btn-sm text-black btn-outline-warning shadow-none">Detail
                                lapangan</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm rounded-0 fw-bold shadow-none text-white custom-bg btn-warning">Lapangan
                    Lainnya...
                </a>
            </div>
        </div>
    </div>


    <!-- Fasilitas -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Fasilitas tersedia</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded-4 shadow py-4 my-3">
                <img src="images/features/wifi.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded-4 shadow py-4 my-3">
                <img src="images/features/balkon.png" width="80px">
                <h5 class="mt-3">Balkon</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded-4 shadow py-4 my-3">
                <img src="images/features/ball.png" width="80px">
                <h5 class="mt-3">Ball</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded-4 shadow py-4 my-3">
                <img src="images/features/drink.png" width="80px">
                <h5 class="mt-3">Minuman</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded-4 shadow py-4 my-3">
                <img src="images/features/lapangan.png" width="80px">
                <h5 class="mt-3">Lapangan</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm rounded-0 fw-bold shadow-none text-white custom-bg btn-warning">Fasilitas
                    Lainnya...
                </a>
            </div>
        </div>
    </div>

    <!-- Testimoni -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Testimoni</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4 shadow">
                    <div class="profile d-flex align-items-center mb-2">
                        <img src="images/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Aufa Ramadhan</h6>
                    </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur maxime voluptatibus quis molestiae neque iste illo
                        doloremque quos, architecto itaque!
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
                <div class="swiper-slide bg-white p-4 shadow">
                    <div class="profile d-flex align-items-center mb-2">
                        <img src="images/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Galang Ramadhan</h6>
                    </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur maxime voluptatibus quis molestiae neque iste illo
                        doloremque quos, architecto itaque!
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
                <div class="swiper-slide bg-white p-4 shadow">
                    <div class="profile d-flex align-items-center mb-2">
                        <img src="images/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Candra Kirana</h6>
                    </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur maxime voluptatibus quis molestiae neque iste illo
                        doloremque quos, architecto itaque!
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
                <div class="swiper-slide bg-white p-4 shadow">
                    <div class="profile d-flex align-items-center mb-2">
                        <img src="images/testimoni/tes1.jpg" width="30px">
                        <h6 class="m-0 ms-2">Muhammad Alfi</h6>
                    </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Tenetur maxime voluptatibus quis molestiae neque iste illo
                        doloremque quos, architecto itaque!
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
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded shadow">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.20358553266!2d107.59252760000001!3d-6.866190299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ad402365e9%3A0x720f2e1a52359642!2sFakultas%20Teknik%20Unpas!5e0!3m2!1sen!2sid!4v1715686172804!5m2!1sen!2sid" loading="lazy"></iframe>
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


    <?php require('inc/footer.php'); ?>

    <!-- Container Swiper -->
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>

    <!-- Testimoni Swiper -->
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

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

    <!-- Local JS -->
    <script src="assets/js/script.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> -->


    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



</body>

</html>