    <!-- Footer -->
    <div class="container-fluid bg-white mt-5">
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;"
                        href="#!" role="button"><i class="bi bi-facebook"></i></a>

                    <!-- Twitter -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;"
                        href="#!" role="button"><i class="bi bi-twitter"></i></a>

                    <!-- Google -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
                        href="#!" role="button"><i class="bi bi-google"></i></a>

                    <!-- Instagram -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                        href="#!" role="button"><i class="bi bi-instagram"></i></a>

                    <!-- Linkedin -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;"
                        href="#!" role="button"><i class="bi bi-linkedin"></i></a>

                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
        </footer>
    </div>

    <h6 class="text-center custom-bg text-white p-3 m-0">Copyright 2024 by Candra Kirana</h6>

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


    <script>
document.addEventListener("DOMContentLoaded", function() {
    function setActive() {
        let navbar = document.getElementById('nav-bar');
        let navLinks = navbar.querySelectorAll('.nav-link');
        let currentPage = document.location.href.split('/').pop().split('.')[0];

        navLinks.forEach(link => {
            let file = link.href.split('/').pop();
            let fileName = file.split('.')[0];

            if (fileName === currentPage) {
                link.classList.add('active');
            }
        });
    }

    setActive();
});
    </script>

    <!-- Local JS -->
    <script src="assets/js/script.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> -->