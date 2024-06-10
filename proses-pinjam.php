<?php
include 'config.php';

if (!empty($_GET['username']) && $_GET['username'] != "") {
    //echo $_GET['username'];
    $id_barang         = $_GET['id_barang'];
    $search_barang     = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE id='$id_barang'");
    $data             = mysqli_fetch_array($search_barang);
    $nama_barang    = $data['nama_barang'];

    $harga = $data['harga'];
    $formatted_harga = number_format($harga, 0, ',', '.');
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Penyewaan | Penyewaan Alat Olahraga</title>
        <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
        <link href="assets/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <body style="background-image: url('') !important;">
        <div class="container">
            <div class='row'>
                <div class="col-md-4"></div>
                <div class="col-md-4 form-register-container">
                    <h2 class="">Penyewaan Barang</h2>
                    <form action="request-barang.php" method="post">
                        <label>Username</label>
                        <input class="form-control" type="" name="username" required value="<?php echo $_GET['username']; ?>" readonly>
                        <label>Nama Penyewa</label>
                        <input class="form-control" type="" name="nama_peminjam" required="">

                        <label>Nama Barang</label>
                        <input class="form-control" type="" name="nama_barang" required readonly value="<?php echo $data['nama_barang']; ?>">

                        <label>Harga</label>
                        <input class="form-control" type="" name="harga_per_hari" required readonly value="<?php echo $formatted_harga; ?>/Hari">
                        <label>Lama Sewa (Hari)</label>
                        <input class="form-control" type="number" name="jml_hari" min="1" value="1" required>

                        <!-- <div class="form-group" style="margin: 0;">
                        <label for="dtp_input1" class="control-label">Tgl Pinjam</label>
                        <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p"
                            data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" value="" readonly name="tgl_pinjam"
                                required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" required />
                    </div>
                    <div class="form-group" style="margin: 0;">
                        <label for="dtp_input1" class="control-label">Tgl Kembali</label>
                        <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p"
                            data-link-field="dtp_input1">
                            <input class="form-control" size="16" type="text" value="" readonly name="tgl_kembali"
                                required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" required />
                    </div> -->
                        <button type="submit" name="request-pinjam" class="btn btn-success" style="margin-top: 20px;">REQUEST</button>
                        <a href="index.php" class="btn btn-danger" style="margin-top: 20px; float:right">BATAL</a>
                    </form>
                </div>
            </div>
        </div>
    <?php
} else {
    echo "<script>Anda belum Login. Silahkan login dulu</script>";
    header("location: login.php");
}
    ?>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="assets/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8">
    </script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            language: 'id',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language: 'id',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language: 'id',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
    </script>

    </body>

    </html>