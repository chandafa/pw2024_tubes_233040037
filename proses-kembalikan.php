<?php
include 'config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query_search_pinjam = mysqli_query($connect, "SELECT * FROM tbl_pinjam WHERE id='$id'");
	$data_pinjam  		 = mysqli_fetch_array($query_search_pinjam);
	$nama_barang  		 = $data_pinjam['nama_barang'];
	$peminjam			 = $data_pinjam['peminjam'];

	$jml_hari			 = $data_pinjam['jml_hari'];
	$tgl_pinjam			 = $data_pinjam['created_at'];


	$query_search_barang = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE nama_barang = '$nama_barang'");
	$data_search_barang  = mysqli_fetch_array($query_search_barang);
	if ($query_search_barang) {
		$query_request_kembali = mysqli_query($connect, "INSERT INTO tbl_req_kembali (nama_barang, peminjam, jml_hari, created_at) VALUES ('$nama_barang', '$peminjam', '$jml_hari', '$tgl_pinjam')");
		if ($query_request_kembali) {
			$query_delete_pinjam = mysqli_query($connect, "DELETE FROM tbl_pinjam WHERE id='$id'");
			if ($query_delete_pinjam) {
				echo "<script>alert('Berhasil Request Pengembalian Barang');</script>";
				header("location: barang-dipinjam.php?username=$peminjam");
			} else {
				echo "Gagal Delete tbl_pinjam";
			}
		} else {
			echo "Gagal Insert data ke tbl_req_kembali";
		}
	} else {
		echo "Gagal Mencari Barang";
	}
}
