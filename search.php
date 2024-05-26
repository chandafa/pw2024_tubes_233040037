<?php
require('admin/inc/db_config.php');

if (isset($_POST['query'])) {
    $query = mysqli_real_escape_string($con, $_POST['query']);
    $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$query%' OR deskripsi LIKE '%$query%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="list-group-item">' . htmlspecialchars($row['nama_produk']) . ' - ' . htmlspecialchars($row['deskripsi']) . '</li>';
        }
    } else {
        echo '<li class="list-group-item">No results found</li>';
    }
}