<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Zone | Contact</title>

    <!-- Include Library -->
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Contact</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            In voluptate adipisci sequi voluptas <br> commodi saepenobis aperiam nam sunt numquam.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.20358553266!2d107.59252760000001!3d-6.866190299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ad402365e9%3A0x720f2e1a52359642!2sFakultas%20Teknik%20Unpas!5e0!3m2!1sen!2sid!4v1715686172804!5m2!1sen!2sid" loading="lazy"></iframe>
                    <h5>Alamat</h5>
                    <a class="d-inline-block text-decoration-none" href="https://maps.app.goo.gl/SKF4tPThakkmk1GW6" target="_blank">
                        <p><i class="bi bi-geo-alt-fill"></i> Gegerkalong, Kec. Sukasari, Kota Bandung
                        </p>
                    </a>
                    <h5 class="mt-4">Kontak</h5>
                    <a href="tel: +62895404418536" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill text-warning"></i> 0895404418536
                    </a>
                    <br>
                    <a href="tel: +6281266058105" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill text-warning"></i> 081266058105
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: ask.ck271138@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope text-warning"></i> ck271138@gmail.com
                    </a>

                    <h5 class="mt-4">Follow</h5>
                    <a href="#" class="d-inline-block fs-5 me-2">
                        <i class="bi bi-twitter-x me-1 text-warning"></i>
                    </a>

                    <a href="#" class="d-inline-block fs-5 me-2">
                        <i class="bi bi-instagram me-1 text-warning"></i>
                    </a>

                    <a href="#" class="d-inline-block fs-5">
                        <i class="bi bi-facebook me-1 text-warning"></i>
                    </a>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>Send a message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" class="form-control shadow-none" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn custom-bg btn-warning text-white shadow-none">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>