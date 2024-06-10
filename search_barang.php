<?php
include 'config.php';

$min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 10000;
$max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 500000;
$search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

$query = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE harga BETWEEN $min_price AND $max_price AND nama_barang LIKE '%$search_keyword%' ORDER BY id ASC");

$result = [];
while ($data = mysqli_fetch_assoc($query)) {
    $harga = $data['harga'];
    $formatted_harga = number_format($harga, 0, ',', '.');

    $pesan_button = isset($_SESSION['username']) && !empty($_SESSION['username']) ?
        '<a href="proses-pinjam.php?username=' . $_SESSION['username'] . '&id_barang=' . $data['id'] . '" class="btn btn-outline-info px-4 mb-2">Pesan</a>
         <br>
         <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal" data-bs-target="#modal_' . $data['id'] . '">Detail</button>' :
        '<button type="button" class="btn btn-warning text-white px-4 mb-2" data-bs-toggle="modal" data-bs-target="#loginModal">Pesan</button>
         <br>
         <button type="button" class="btn btn-primary text-white px-4" data-bs-toggle="modal" data-bs-target="#modal_' . $data['id'] . '">Detail</button>';

    $result[] = [
        'id' => $data['id'],
        'nama_barang' => $data['nama_barang'],
        'gambar_barang' => $data['gambar_barang'],
        'harga' => $harga,
        'formatted_harga' => $formatted_harga,
        'pesan_button' => $pesan_button,
    ];
}

echo json_encode($result);