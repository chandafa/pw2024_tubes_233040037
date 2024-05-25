<?php

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
require('../inc/sendgrid/sendgrid-php.php');

function send_mail($uemail, $name, $token)
{
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("againlost49@gmail.com", "Chanits");
    $email->setSubject("Account Verification Link");

    $email->addTo($uemail, $name);


    $email->addContent(
        "text/html",
        "
        Click the link to confirm you email : <br>
        <a href='" . SITE_URL . "email_confirm.php?email=$uemail&token=$token" . "'>
            CLICK ME
        </a>
        "
    );
    $sendgrid = new \SendGrid(SENDGRID_API_KEY);

    try {
        $sendgrid->send($email);
        return 1;
    } catch (Exception $e) {
        return 0;
    }
}

if (isset($_POST['register'])) {
    $data = filteration($_POST);

    // pass and confir pass
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // check user
    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` =? LIMIT 1",
        [$data['email'], $data['phonenum']],
        "ss"
    );

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // upload image
    $img = uploadUserImage($_FILES['profile']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }
    var_dump($_FILES['profile']);


    // send confirmasi

    $token = bin2hex(random_bytes(16));

    if (!send_mail($data['email'], $data['name'], $token)) {
        echo 'mail_failed';
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    $query = "INSERT INTO `user_cred`(`name`, `email`, `pass`, `profile`, `phonenum`, `address`, `token`) VALUES (?,?,?,?,?,?,?,?)";

    $values = [$data['name'], $data['email'], $enc_pass, $img, $data['phonenum'], $data['address'], $token];

    if (insert($query, $values, "sssssss")) {
        echo 1;
    } else {
        echo 'ins_failed';
    }
}