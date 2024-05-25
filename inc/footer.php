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

    <h6 class="text-center bg-warning text-white p-3 m-0">Copyright 2024 by Candra Kirana</h6>

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
function alert(type, msg, position = 'body') {
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-warning alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

    if (position == 'body') {
        document.body.append(element);
        element.classList.add('custom-alert');
    } else {
        document.getElementById(position).append(element);
    }
    setTimeout(remAlert, 3000);
}

function remAlert() {
    document.getElementsByClassName('alert')[0].remove();
}

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


let register_form = document.getElementById('register-form');

register_form.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData();

    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('profile', register_form.elements['profile'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value);
    data.append('register', '');


    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/login_register.php', true);

    xhr.onload = function() {
        if (this.responseText == 'pass_mismatch') {
            alert('error', "Password Mismatch");
        } else if (this.responseText == 'email_already') {
            alert('error', "Email is already registered!");
        } else if (this.responseText == 'phone_already') {
            alert('error', "Phone number is already registered!");
        } else if (this.responseText == 'inv_img') {
            alert('error', "Only JPG, WEBP & PNG images are allowed!");
        } else if (this.responseText == 'upd_failed') {
            alert('error', "Image upload failed");
        } else if (this.responseText == 'mail_failed') {
            alert('error', "Cannot send confirmation email! Server down");
        } else if (this.responseText == 'mail_failed') {
            alert('error', "Registration Failed! Server down");
        } else {
            alert('success', "Registration successful. Confirmation link sent to email");
            register_form.reset();
        }

    }

    xhr.send(data);

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