<?php
session_start();
include '../config.php';

function sanitizeInput($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if (isset($_POST['edit-barang'])) {
    $nama_barang  = sanitizeInput($_POST['nama_barang']);
    $stok_barang  = (int)$_POST['stok_barang'];
    $harga_barang = (int)$_POST['harga'];
    $id           = (int)$_POST['id'];

    // Pemrosesan file gambar
    $file_name    = str_replace(" ", "_", $_FILES['gambar_barang']['name']);
    $file_size    = $_FILES['gambar_barang']['size'];
    $file_type    = $_FILES['gambar_barang']['type'];
    $tmp_name     = $_FILES['gambar_barang']['tmp_name'];
    $max_size     = 2000000;
    $extension    = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (isset($file_name) && !empty($file_name)) {
        // Memeriksa jenis file dan ukuran file
        if (($extension == "jpg" || $extension == "jpeg" || $extension == "gif" || $extension == "png") &&
            ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/gif") &&
            $file_size <= $max_size
        ) {
            $location = "../assets/img/uploads/";
            if (move_uploaded_file($tmp_name, $location . $file_name)) {
                $query = "UPDATE tbl_barang SET nama_barang='$nama_barang', gambar_barang='$file_name', stok_barang='$stok_barang', harga='$harga_barang' WHERE id='$id'";
                if (mysqli_query($connect, $query)) {
                    echo "<script>alert('Berhasil Disimpan');</script>";
                    echo "<script>window.location.href = 'data-barang.php';</script>";
                } else {
                    echo "<script>alert('Gagal Edit ke Database');</script>";
                }
            } else {
                echo "<script>alert('Gagal Upload ke direktori');</script>";
            }
        } else {
            echo "<script>alert('Bukan file gambar yang valid atau melebihi batas ukuran');</script>";
        }
    } else {
        echo "<script>alert('Harap unggah gambar barang.');</script>";
    }
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE id='$id'");
    $data  = mysqli_fetch_array($query);
    $nama_barang   = sanitizeInput($data['nama_barang']);
    $gambar_barang = $data['gambar_barang'];
    $stok_barang   = (int)$data['stok_barang'];
    $harga_barang  = (int)$data['harga'];
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Tambah Barang</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'header.php'; ?>
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title" style="padding: 20px 0;">
                        <h1 style="display: unset;">Edit Data Barang</h1>
                        <a href="data-barang.php" class="btn btn-info btn-sm" style="margin-left: 20px;">
                            <i class="fa fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Barang</a></li>
                            <li class="active">Edit Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Edit Data Barang </strong></div>
                            <form class="card-body card-block" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="nama" class=" form-control-label">Nama Barang</label>
                                    <input type="text" id="nama" name="nama_barang" class="form-control"
                                        value="<?php echo $nama_barang; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gambar" class="form-control-label">Upload Foto Barang</label>
                                    <input type="file" id="gambar" name="gambar_barang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="stok" class=" form-control-label">Jumlah Barang</label>
                                    <input type="number" id="stok" name="stok_barang"
                                        value="<?php echo $stok_barang; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="harga" class=" form-control-label">Harga Barang</label>
                                    <input type="number" id="harga" name="harga" value="<?php echo $harga_barang; ?>"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success" name="edit-barang">
                                    <i class="fa fa-check"></i>
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </div>
</body>

</html>