<?php
include '../config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user query
    $delete_user = mysqli_query($connect, "DELETE FROM user WHERE id='$id'");

    if ($delete_user) {
        echo "<script>alert('User berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus user');</script>";
    }
}

echo "<script>window.location.href='data-user.php';</script>";
