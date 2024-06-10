<?php
// session_start();
// include 'config.php';

// if (isset($_POST['login'])) {
// 	$username = mysqli_real_escape_string($connect, $_POST['username']);
// 	$password = md5($_POST['password']);

// 	$query_username = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");

// 	if ($query_username) {
// 		if (mysqli_num_rows($query_username) > 0) {
// 			$data = mysqli_fetch_array($query_username);
// 			if ($password == $data['password']) {
// 				$_SESSION['username'] = $data['username'];
// 				$_SESSION['name'] = $data['nama'];

// 				if ($data['level'] == 'admin') {
// 					header('location: admin/index.php');
// 				} else {
// 					header('location: index.php');
// 				}
// 				exit(); // Make sure to exit after redirect
// 			} else {
// 				echo "<script>alert('Password Salah atau belum diisi');</script>";
// 				echo "<script>window.history.back();</script>";
// 			}
// 		} else {
// 			echo "<script>alert('Username tidak terdaftar');</script>";
// 			echo "<script>window.history.back();</script>";
// 		}
// 	} else {
// 		echo "Query gagal: " . mysqli_error($connect);
// 	}
// }


session_start();
include 'config.php';

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = $_POST['password'];

	$query = "SELECT * FROM user WHERE username = ?";
	$stmt = mysqli_prepare($connect, $query);
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$data = mysqli_fetch_array($result);
			if (password_verify($password, $data['password'])) {
				$_SESSION['username'] = $data['username'];
				$_SESSION['name'] = $data['nama'];

				if ($data['level'] == 'admin') {
					header('location: admin/index.php');
				} else {
					header('location: index.php');
				}
				exit(); // Pastikan untuk keluar setelah pengalihan
			} else {
				echo "<script>alert('Password Salah');</script>";
				echo "<script>window.history.back();</script>";
			}
		} else {
			echo "<script>alert('Username tidak terdaftar');</script>";
			echo "<script>window.history.back();</script>";
		}
	} else {
		echo "<script>alert('Query gagal: " . mysqli_error($connect) . "');</script>";
		echo "<script>window.history.back();</script>";
	}

	mysqli_stmt_close($stmt);
	mysqli_close($connect);
}