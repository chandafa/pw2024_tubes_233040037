<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil alamat email yang dikirimkan dari form
    $email = $_POST['email'];

    // Kirim email ke admin
    $admin_email = 'ck271138@gmail.com';
    $subject = 'Permintaan Reset Password';
    $message = 'Ada pengguna yang meminta reset password dengan alamat email: ' . $email;
    $headers = 'From: ' . $email;

    // Kirim email menggunakan fungsi mail() bawaan PHP
    if (mail($admin_email, $subject, $message, $headers)) {
        echo '<script>alert("Permintaan reset password telah dikirim. Kami akan segera menghubungi Anda.");</script>';
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo '<script>alert("Gagal mengirim permintaan reset password. Silakan coba lagi nanti.");</script>';
        echo "<script>window.location.href = 'index.php';</script>";
    }
}