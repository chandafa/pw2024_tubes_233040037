<!-- Footer -->
<footer class="text-center text-lg-start text-white mt-5 custom-bg">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        Sport Zone
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer
                        content. Lorem ipsum dolor sit amet, consectetur adipisicing
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                    <p>
                        <a class="text-white">Alat Olahraga</a>
                    </p>


                </div>
                <!-- Grid column -->



                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p><i class="bi bi-geo-alt-fill mr-3"></i> Kota Bandung</p>
                    <p><i class="bi bi-envelope-fill mr-3"></i> Ck271138@gmail.com</p>
                    <p><i class="bi bi-phone-fill mr-3"></i> + 62895404418536</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                        role="button"><i class="bi bi-facebook"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                        role="button"><i class="bi bi-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                        role="button"><i class="bi bi-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                        role="button"><i class="bi bi-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!"
                        role="button"><i class="bi bi-linkedin"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!"
                        role="button"><i class="bi bi-github"></i></a>
                </div>
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 mt-2" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2024 Copyright:
        <a class="text-white text-decoration-none" href="index.php">Candra Kirana</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

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