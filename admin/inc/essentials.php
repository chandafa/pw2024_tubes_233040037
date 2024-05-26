<!-- auto close alert -->
<script>
// Set a timer to auto close the alert after 5 seconds (5000 milliseconds)
setTimeout(function() {
    var alertElement = document.getElementById('autoCloseAlert');
    var alert = new bootstrap.Alert(alertElement);
    alert.close();
}, 3000); // 3000 milliseconds = 3 seconds
</script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
document.getElementById('confirmLogoutBtn').addEventListener('click', function() {
    // Redirect to the logout page or perform logout action here
    window.location.href = 'logout.php'; // Ganti '/logout' dengan URL logout yang sesuai
});
</script>
</body>

</html>


<?php

// frontend
define('SITE_URL', 'http://127.0.0.1/git/pw2024_tubes_233040037/');
define('ABOUT_IMG_PATH', SITE_URL . 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL . 'images/carousel/');

// backend
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/git/pw2024_tubes_233040037/images/');
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('USERS_FOLDER', 'users/');


function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
            window.location.href='index.php';
        </script>";
    }
    session_regenerate_id(true);
}


function redirect($url)
{
    echo "<script>
        window.location.href='$url';
    </script>";
}

function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
    <div class="alert $bs_class alert-warning alert-dismissible fade show custom-alert" role="alert" id="autoCloseAlert">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}

function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; //invalid image format
    } else if (($image['size'] / (1024 * 1024)) > 2) {
        return 'img_size'; //invalid image size 2mb
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . " .$ext";

        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed'; //upload failed
        }
    }
}

function deleteImage($image, $folder)
{
    if (unlink(UPLOAD_IMAGE_PATH . $folder . $image)) {
        return true;
    } else {
        return false;
    }
}

function uploadUserImage($image)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image format
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . '.jpeg'; // Ensure no space between . and jpeg

        $img_path = UPLOAD_IMAGE_PATH . USERS_FOLDER . $rname;

        if ($ext == 'png' || $ext == 'PNG') {
            $img = imagecreatefrompng($image['tmp_name']);
        } else if ($ext == 'webp' || $ext == 'WEBP') {
            $img = imagecreatefromwebp($image['tmp_name']);
        } else {
            $img = imagecreatefromjpeg($image['tmp_name']);
        }

        if (imagejpeg($img, $img_path, 75)) {
            return $rname;
        } else {
            return 'upd_failed'; // Upload failed
        }
    }
}