<?php
include '../config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Pencarian data request kembali berdasarkan ID
	$query_search_req_kembali = mysqli_query($connect, "SELECT * FROM tbl_req_kembali WHERE id = '$id'");
	if (!$query_search_req_kembali) {
		die("Query gagal: " . mysqli_error($connect));
	}
	$data_req_kembali = mysqli_fetch_array($query_search_req_kembali);

	if ($data_req_kembali) {
		$nama_barang = $data_req_kembali['nama_barang'];
		$peminjam = $data_req_kembali['peminjam'];
		$jml_hari = $data_req_kembali['jml_hari'];
		$tgl_pinjam = $data_req_kembali['created_at'];

		// Pencarian data barang berdasarkan nama_barang dari request kembali
		$query_search_barang = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE nama_barang = '$nama_barang'");
		if (!$query_search_barang) {
			die("Query gagal: " . mysqli_error($connect));
		}
		$data_search_barang = mysqli_fetch_array($query_search_barang);

		if ($data_search_barang) {
			$stok_barang = $data_search_barang['stok_barang'] + $jml_hari;

			$update_stok = mysqli_query($connect, "UPDATE tbl_barang SET stok_barang = '$stok_barang' WHERE nama_barang = '$nama_barang'");
			if (!$update_stok) {
				die("Query gagal: " . mysqli_error($connect));
			}

			if (mysqli_query($connect, "INSERT INTO tbl_transaksi (nama_barang, peminjam, jml_hari, created_at) VALUES ('$nama_barang', '$peminjam', '$jml_hari', '$tgl_pinjam')")) {
				if (mysqli_query($connect, "DELETE FROM tbl_req_kembali WHERE id='$id'")) {
					$konten = "Permintaan Pengembalian Barang Anda Telah di Terima. " . $jml_hari_request . " buah " . $nama_barang_request . ". Username: " . $peminjam_request;

					if (mysqli_query($connect, "INSERT INTO pemberitahuan (username, konten, status) VALUES ('$peminjam', '$konten', 'kembali')")) {
						echo "<script>alert('Berhasil Memproses Pengembalian Barang');</script>";
						header('location: barang-kembali.php');
						exit(); // tambahkan exit setelah header untuk mencegah eksekusi kode selanjutnya
					} else {
						echo "Gagal Menambah Pemberitahuan";
					}
				} else {
					echo "Gagal Hapus tbl_req_kembali";
				}
			} else {
				echo "Gagal insert ke tbl_transaksi";
			}
		} else {
			echo "Gagal Mencari barang";
		}
	} else {
		echo "Data Request Kembali tidak ditemukan";
	}
}