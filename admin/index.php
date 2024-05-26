<?php

require('inc/essentials.php');
require('inc/db_config.php');

session_start();
if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    redirect('dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>
    <?php require('inc/links.php') ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-light">

    <div class="login-form text-center rounded-3 bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="custom-bg1 text-white py-3">ADMIN LOGIN</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center"
                        placeholder="Username">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center"
                        placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
            </div>
        </form>
    </div>

    <?php

    if (isset($_POST['login'])) {
        // Melakukan filterasi data input
        $frm_data = filteration($_POST);

        // Query untuk mendapatkan data admin berdasarkan username
        $query = "SELECT * FROM admin_cred WHERE admin_name=?";
        $values = [$frm_data['admin_name']];

        // Menjalankan query
        $res = select($query, $values, "s");

        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            // Memverifikasi password yang diinput dengan password hash di database
            if (password_verify($frm_data['admin_pass'], $row['admin_pass'])) {
                // Jika verifikasi password berhasil, set session dan redirect ke dashboard
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminId'] = $row['id_admin'];
                redirect('dashboard.php');
            } else {
                alert('error', 'Login failed - Password salah');
            }
        } else {
            alert('error', 'Login failed - Akun tidak ditemukan');
        }
    }
    ?>


    <?php require('inc/scripts.php') ?>
</body>

</html>