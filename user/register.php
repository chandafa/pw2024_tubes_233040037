<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('koneksi.php');
    require('../admin/inc/essentials.php');
    session_start();

    $error = '';
    $validate = '';

    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    if (isset($_POST['submit'])) {
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);

        if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
            if ($password == $repass) {
                if (cek_nama($username, $con) == 0) {
                    $pass = password_hash($password, PASSWORD_DEFAULT);

                    // Proses unggahan file
                    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                        $target_dir = USERS_FOLDER;
                        if (!file_exists($target_dir)) {
                            mkdir($target_dir, 0777, true); // Buat direktori jika belum ada
                        }
                        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Periksa apakah file adalah gambar asli atau tidak
                        $check = getimagesize($_FILES["foto"]["tmp_name"]);
                        if ($check !== false) {
                            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                                $foto = $target_file;

                                $query = "INSERT INTO users (username, name, email, foto, password) VALUES ('$username', '$name', '$email', '$foto', '$pass')";
                                $result = mysqli_query($con, $query);

                                if ($result) {
                                    $_SESSION['username'] = $username;
                                    header('Location: index.php');
                                } else {
                                    $error = 'Register User Gagal !!';
                                }
                            } else {
                                $error = 'Terjadi kesalahan saat mengunggah foto.';
                            }
                        } else {
                            $error = 'File bukan gambar.';
                        }
                    } else {
                        $error = 'Tidak ada foto yang diunggah atau terjadi kesalahan saat mengunggah.';
                    }
                } else {
                    $error = 'Username sudah terdaftar !!';
                }
            } else {
                $validate = 'Password tidak sama !!';
            }
        } else {
            $error = 'Data tidak boleh kosong !!';
        }
    }

    function cek_nama($username, $con)
    {
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if ($result = mysqli_query($con, $query)) {
            return mysqli_num_rows($result);
        }
        return 0;
    }

    ?>


    <section class="container-fluid mb-4">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST" enctype="multipart/form-data">
                    <h4 class="text-center font-weight-bold"> Register </h4>
                    <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Alamat Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email"
                            aria-describeby="emailHelp" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="foto">Profile</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan profile">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword"
                            placeholder="Re-Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya account? <a href="../index.php#loginModal">Login</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>