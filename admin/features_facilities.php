<?php

require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

// function membaca semua pesan
// if (isset($_GET['seen'])) {
//     $frm_data = filteration($_GET);

//     if ($frm_data['seen'] == 'all') {
//         $q = "UPDATE user_queries SET seen =?";
//         $values = [1];
//         if (update($q, $values, 'i')) {
//             alert('success', 'Message Read All Successfully');
//         } else {
//             alert('error', 'Something went wrong');
//         }
//     } else {
//         $q = "UPDATE user_queries SET seen =? WHERE id_queries=?";
//         $values = ['1', $frm_data['seen']];
//         if (update($q, $values, 'ii')) {
//             alert('success', 'Message Read Successfully');
//         } else {
//             alert('error', 'Something went wrong');
//         }
//     }
// }

// if (isset($_GET['del'])) {
//     $frm_data = filteration($_GET);

//     if ($frm_data['del'] == 'all') {
//         $q = "DELETE FROM user_queries";
//         if (mysqli_query($con, $q)) {
//             alert('success', 'Message Deleted All Successfully');
//         } else {
//             alert('error', 'Something went wrong');
//         }
//     } else {
//         $q = "DELETE FROM user_queries WHERE id_queries=?";
//         $values = [$frm_data['del']];
//         if (delete($q, $values, 'i')) {
//             alert('success', 'Message Deleted Successfully');
//         } else {
//             alert('error', 'Something went wrong');
//         }
//     }
// }

// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kelebihan & Fasilitas</title>
    <?php require('inc/links.php') ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="bg-light">

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Kelebihan & Fasilitas</h3>

                <!-- Carousel section -->
                <div class="card border-0 shadow-sm mb-4 z-2">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Kelebihan</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>


                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border-2">
                                <thead class="sticky-top table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Kelebihan-->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="general-sLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Kelebihan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn bg-secondary text-white shadow-none"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-dark text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php require('inc/scripts.php') ?>

    <script>
    let feature_s_form = document.getElementById('feature_s_form');

    feature_s_form.addEventListener('submit', function(e) {
        e.preventDefault();
        add_feature();
    });

    function add_feature() {
        let data = new FormData();
        data.append("name", feature_s_form.elements['feature_name'].value);
        data.append("add_feature", "");

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('feature-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('error', 'gagal menambahkan kelebihan');
                feature_s_form.elements['feature_name'].value = '';
                // get_carousel();
            } else {
                alert('success', 'Menambahkan kelebihan');
            }
        }
        xhr.send(data);
    }


    function get_features() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            document.getElementById("features-data").innerHTML = this.responseText;
        }

        xhr.send("get_features");
    }

    function rem_feature(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('error', 'gagal removed feature');
                get_features();
            } else {
                alert('success', 'berhasil remove feature');
            }
        }

        xhr.send("rem_feature=" + val);
    }

    window.onload = function() {
        get_features();
    }
    </script>

</body>

</html>