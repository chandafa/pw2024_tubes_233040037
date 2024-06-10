<?php
session_start();
include '../config.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
    exit();
}

// Ambil informasi user dari database
$username = $_SESSION['username'];
$query = "SELECT level FROM user WHERE username='$username'";
$result = mysqli_query($connect, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
    // Periksa apakah user memiliki level admin
    if ($user['level'] !== 'admin') {
        header("location: ../index.php");
        exit();
    }
} else {
    // Jika query gagal, redirect ke halaman login
    header("location: ../index.php");
    exit();
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Penyewaan Alat Olahraga</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


</head>

<body>

    <?php
    include 'sidebar.php';
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php
        include 'header.php';
        ?>
        <div class="breadcrumbs d-print-none">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Permintaan Penyewaan
                            <a href="permintaan.php" class="btn btn-info btn-sm">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Penyewaan</a></li>
                            <li class="active">Permintaan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>




        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Permintaan Penyewaan</strong>
                                <button class="d-print-none btn btn-primary rounded"
                                    onclick="window.print()">Print</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Nama Penyewa</th>
                                            <th>Jumlah Hari</th>
                                            <th>Tgl Sewa</th>
                                            <th class="d-print-none">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../config.php';
                                        $query = mysqli_query($connect, "SELECT * FROM tbl_request ORDER BY  id DESC ");
                                        if ($query) {
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id          = $data['id'];
                                                $nama_barang = $data['nama_barang'];
                                                $peminjam    = $data['peminjam'];
                                                // $level       = $data['level'];
                                                $jml_hari  = $data['jml_hari'];
                                                $tgl_pinjam     = date('Y-m-d H:i:s');
                                                // $tgl_pinjam  = $data['tgl_pinjam'];
                                                // $tgl_kembali = $data['tgl_kembali'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $nama_barang; ?></td>
                                            <td><?php echo $peminjam; ?></td>
                                            <td><?php echo $jml_hari; ?></td>

                                            <td><?php echo $data['created_at']; ?></td>

                                            <td class="d-print-none">
                                                <div class="btn-group flex-wrap">
                                                    <a class="btn btn-success btn-sm"
                                                        href="proses-pinjam.php?mode=terima&id=<?php echo $id; ?>">
                                                        <i class="fa fa-check"></i>
                                                        Terima
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="proses-pinjam.php?mode=tolak&id=<?php echo $id; ?>">
                                                        <i class="fa fa-times"></i>
                                                        Tolak
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            ?>
                                        <tr>
                                            <td colspan="7">Data Kosong</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->




    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
    </script>


</body>

</html>