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
    <title>Sport Zone | Contact</title>

    <!-- Include Library -->
    <?php require('inc/links.php') ?>
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <iframe class="w-100 rounded mb-4" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.20358553266!2d107.59252760000001!3d-6.866190299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ad402365e9%3A0x720f2e1a52359642!2sFakultas%20Teknik%20Unpas!5e0!3m2!1sen!2sid!4v1715686172804!5m2!1sen!2sid"
                        loading="lazy"></iframe>
                    <h5>Alamat</h5>
                    <a class="d-inline-block text-decoration-none" href="https://maps.app.goo.gl/SKF4tPThakkmk1GW6"
                        target="_blank">
                        <p><i class="bi bi-geo-alt-fill"></i> Gegerkalong, Kec. Sukasari, Kota Bandung
                        </p>
                    </a>
                    <h5 class="mt-2">Kontak</h5>
                    <a href="tel: +62895404418536" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill text-warning"></i> 0895404418536
                    </a>
                    <br>
                    <a href="tel: +6281266058105" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill text-warning"></i> ck271138@gmail.com
                    </a>


                </div>
            </div>


            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Send a message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none"
                                placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input name="email" required type="email" class="form-control shadow-none"
                                placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" required type="text" class="form-control shadow-none"
                                placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" required class="form-control shadow-none" rows="5"
                                style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="send"
                            class="btn custom-bg btn-warning text-white shadow-none">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    if (isset($_POST['send'])) {
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
        $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

        $res = insert($q, $values, 'ssss');
        if ($res == 1) {
            alert('success', 'Message sent successfully!');
        } else {
            alert('error', 'Failed to send message!');
        }
    }

    ?>


    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>



    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>