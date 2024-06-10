<?php
include 'config.php';

if (isset($_POST['request-pinjam'])) {
    date_default_timezone_set('Asia/Jakarta');

    $username       = $_POST['username'];
    $nama_peminjam  = $_POST['nama_peminjam'];
    $nama_barang    = $_POST['nama_barang'];
    $jml_hari       = $_POST['jml_hari'];
    $harga_per_hari = $_POST['harga_per_hari']; // Harga per hari dari form
    // $tgl_pinjam     = $_POST['created_at'];
    $tgl_pinjam     = date('Y-m-d H:i:s');

    // Konversi harga_per_hari menjadi float
    $harga_per_hari = floatval($_POST['harga_per_hari']);

    // Hitung total harga berdasarkan jumlah hari
    $total_harga    = $harga_per_hari * $jml_hari;

    // Memasukkan data ke database
    $query_insert_req = mysqli_query($connect, "INSERT INTO tbl_request (nama_barang, peminjam, jml_hari, harga, created_at) VALUES ('$nama_barang', '$username', '$jml_hari', '$total_harga', '$tgl_pinjam')");

    if ($query_insert_req) {
        // Retrieve the latest entry from the database
        $request = mysqli_query($connect, "SELECT * FROM tbl_request WHERE peminjam='$username' ORDER BY id DESC LIMIT 1");
        $rqs = mysqli_fetch_assoc($request);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Request berhasil | Penyewaan Alat Olahraga</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body style="background-image: url('') !important;">
    <div class="container">
        <div class='row'>
            <div class="col-md-3"></div>
            <div class="col-md-6 form-register-container">
                <div class="alert alert-success" style="text-transform: capitalize;">
                    Anda Berhasil mengirim permintaan Penyewaan barang. Harap tunggu konfirmasi dari admin. Silahkan
                    Cek <a class="d-print-none"
                        href="pemberitahuan.php?username=<?php echo $username; ?>">Pemberitahuan</a>
                </div>
                <table class="table table-bordered table-super-condensed">
                    <tbody>
                        <tr>
                            <td>username</td>
                            <td><?php echo $username ?></td>
                        </tr>
                        <tr>
                            <td>Penyewa</td>
                            <td><?php echo $nama_peminjam ?></td>
                        </tr>

                        <tr>
                            <td>nama barang</td>
                            <td><?php echo $nama_barang ?></td>
                        </tr>
                        <tr>
                            <td>jumlah hari</td>
                            <td><?php echo $jml_hari ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>Rp. <?php echo number_format($total_harga, 0, ',', '.') ?>000</td>
                        </tr>


                        <tr>
                            <td>Tgl Sewa</td>
                            <td>
                                <?php echo $rqs['created_at']; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <a href="index.php" class="btn btn-success d-print-none">KEMBALI</a>
                <button class="btn btn-primary d-print-none" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>

    <script>
    // HTML button element
    const printButton = document.getElementById('printButton');

    // Triggering print on button click
    printButton.addEventListener('click', function() {
        window.print();
    });
    </script>

    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
<?php
    } else {
        echo "Gagal mengirim permintaan";
    }
}
?>