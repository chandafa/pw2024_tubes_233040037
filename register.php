<?php
include 'config.php';

if (isset($_POST['daftar'])) {
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // $level = mysqli_real_escape_string($connect, $_POST['level']);

    // Menyiapkan query menggunakan prepared statements untuk keamanan lebih
    $stmt = $connect->prepare("INSERT INTO user (nama, username, email, password) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $connect->error);
    }
    $stmt->bind_param("ssss", $nama, $username, $email, $password);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['username'] = $username; // Menyimpan username dalam sesi
        $_SESSION['name'] = $nama; // Menyimpan nama dalam sesi
        echo "<script>alert('Berhasil Register');</script>";
        header("Location: index.php"); // Mengalihkan ke index.php
        exit(); // pastikan script berhenti setelah redirect
    } else {
        echo "<script>alert('Gagal Register');</script>";
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register | Penyewaan Alat Olahraga</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class='row m-4'>
            <div class="col-md-4"></div>
            <div class="col-md-4 form-register-container rounded-2">
                <h2 class="">Registrasi Akun</h2>
                <form action="" method="post">
                    <label class="mt-4">Nama</label>
                    <input class="form-control" type="text" name="nama" required>
                    <label class="mt-4">Username</label>
                    <input class="form-control" type="text" name="username" required>
                    <label class="mt-4">Email (<span class="text-muted small">harap masukan email yang
                            aktif</span>)</label>
                    <input class="form-control" type="email" name="email" required>
                    <label class="mt-4">Password</label>
                    <input class="form-control" type="password" name="password" required>
                    <!-- <label>Kelas</label>
                    <input class="form-control" type="text" name="level" required><br> -->
                    <input type="checkbox" name="" required> Saya setuju dengan <a href="#">syarat dan ketentuan</a>.
                    <button type="submit" name="daftar" class="btn btn-success"
                        style="margin-top: 20px; float:right">DAFTAR</button>
                    <a href="index.php" class="btn btn-danger me-2" style="margin-top: 20px; float:right">BATAL</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>