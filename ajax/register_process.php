<?php
session_start();

require('../admin/inc/db_config.php');

// Filter input data
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'cpass', FILTER_SANITIZE_STRING);
$profile = $_FILES['profile'];
$phonenum = filter_input(INPUT_POST, 'phonenum', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

// Validasi password
if ($password !== $confirm_password) {
    header("Location: #registerModal?error=1");
    exit();
}

// Hash password
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Upload profile picture
$profile_name = $profile['name'];
$profile_tmp = $profile['tmp_name'];
$profile_destination = "profile_pictures/$profile_name";

move_uploaded_file($profile_tmp, $profile_destination);

// Query untuk memasukkan data pengguna ke dalam database
$sql = "INSERT INTO user_cred (name, email, password, profile, phonenum, address) VALUES (?, ?, ?, ?, ?, ?)";
$values = array($name, $email, $password_hashed, $profile_destination, $phonenum, $address);
$datatypes = "ssssss";

$result = insert($sql, $values, $datatypes);

if ($result) {
    // Jika registrasi berhasil, redirect ke halaman login
    header("Location: login.php");
    exit();
} else {
    // Jika terjadi kesalahan, redirect kembali ke halaman registrasi dengan pesan error
    header("Location: #registerModal?error=2");
    exit();
}