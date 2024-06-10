<?php


$host = "localhost";
$user = "root";
$password = "";
$dbname = "pw2024_tubes_233040037";

// Membuat koneksi ke database
$connect = mysqli_connect($host, $user, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if (!$connect) {
	die("Gagal Koneksi: " . mysqli_connect_error());
}

// Memilih database
if (!mysqli_select_db($connect, $dbname)) {
	die("Gagal memilih database: " . mysqli_error($connect));
}