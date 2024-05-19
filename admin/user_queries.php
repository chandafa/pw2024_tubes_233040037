<?php

require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

// function membaca semua pesan
if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE user_queries SET seen =?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Message Read All Successfully');
        } else {
            alert('error', 'Something went wrong');
        }
    } else {
        $q = "UPDATE user_queries SET seen =? WHERE id_queries=?";
        $values = ['1', $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Message Read Successfully');
        } else {
            alert('error', 'Something went wrong');
        }
    }
}

// function menghapus semua pesan
if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM user_queries";
        if (mysqli_query($con, $q)) {
            alert('success', 'Message Deleted All Successfully');
        } else {
            alert('error', 'Something went wrong');
        }
    } else {
        $q = "DELETE FROM user_queries WHERE id_queries=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Message Deleted Successfully');
        } else {
            alert('error', 'Something went wrong');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Message</title>
    <?php require('inc/links.php') ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">User Message</h3>

                <!-- Carousel section -->
                <div class="card border-0 shadow-sm mb-4 z-2">
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm me-1">
                                <i class="bi bi-check2-all"></i> Read All</a>
                            <a href="?del=all" class="btn btn-sm rounded-pill shadow-none btn-danger">
                                <i class="bi bi-trash"></i> Delete All</a>
                        </div>

                        <div class="table-responsive-md" style="height: 220px; overflow-y: scroll;">
                            <table class="table table-hover border-2">
                                <thead class="sticky-top table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="20%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM user_queries ORDER BY id_queries DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href='?seen=$row[id_queries]' class='btn btn-sm rounded-pill btn-primary me-1'>Read</a>";
                                        }

                                        $seen .= "<a href='?del=$row[id_queries]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";


                                        echo <<<query
                                            <tr>
                                                <td>$i</td>
                                                <td>{$row['name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['subject']}</td>
                                                <td>{$row['message']}</td>
                                                <td>{$row['date']}</td>
                                                <td>$seen</td>
                                            </tr>
                                        query;
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php') ?>


</body>

</html>