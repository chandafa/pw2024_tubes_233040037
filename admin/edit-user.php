<?php
include '../config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password if it's not empty
    $password_query = '';
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $password_query = ", password='$hashed_password'";
    }

    // Update user query
    $update_user = mysqli_query($connect, "UPDATE user SET nama='$nama', username='$username' $password_query WHERE id='$id'");

    if ($update_user) {
        echo "<script>alert('User berhasil diupdate');</script>";
    } else {
        echo "<script>alert('Gagal mengupdate user');</script>";
    }

    echo "<script>window.location.href='data-user.php';</script>";
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($connect, "SELECT * FROM user WHERE id='$id'");
        $data = mysqli_fetch_array($query);
    }
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit User</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <div id="right-panel" class="right-panel">
        <?php include 'header.php'; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit User</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="edit-user.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input type="text" id="username" name="username"
                                        value="<?php echo $data['username']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <small class="form-text text-muted">Leave blank if you don't want to change the
                                        password</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
                                    <a href="data-user.php" class="btn btn-secondary btn-sm">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>