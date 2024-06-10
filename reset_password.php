<?php
include 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verifikasi token
    $query = mysqli_query($connect, "SELECT * FROM password_resets WHERE token='$token' AND expiry > NOW()");
    if (mysqli_num_rows($query) > 0) {
        $resetData = mysqli_fetch_assoc($query);
        $username = $resetData['username'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

            // Update password
            $updateQuery = mysqli_query($connect, "UPDATE users SET password='$new_password' WHERE username='$username'");
            if ($updateQuery) {
                // Hapus token
                mysqli_query($connect, "DELETE FROM password_resets WHERE token='$token'");
                echo "Password has been reset successfully.";
            } else {
                echo "Failed to reset password.";
            }
        }
    } else {
        echo "Invalid or expired token.";
    }
}
?>

<!-- HTML Form -->
<form method="POST">
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <button type="submit">Reset Password</button>
</form>