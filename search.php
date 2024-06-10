<?php
include 'config.php';

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($connect, $_POST['query']);
    $query = "SELECT * FROM tbl_barang WHERE nama_barang LIKE '%$search%' LIMIT 10";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($connect));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}