<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Verifikasi username
    $query = mysqli_query($connect, "SELECT email FROM users WHERE username='$username'");
    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        $email = $user['email'];

        // Generate token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Simpan token di database
        $query = mysqli_query($connect, "INSERT INTO password_resets (username, token, expiry) VALUES ('$username', '$token', '$expiry')");

        if ($query) {
            // Kirim email
            $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $resetLink";
            $headers = "From: noreply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                echo "An email has been sent to your email address with instructions to reset your password.";
            } else {
                echo "Failed to send email.";
            }
        } else {
            echo "Failed to save token.";
        }
    } else {
        echo "Username not found.";
    }
}