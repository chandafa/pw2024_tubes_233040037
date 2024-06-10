<?php
include '../config.php';

if (isset($_GET['mode']) && !empty($_GET['mode']) && isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];

	// Ambil data request
	$search_request = mysqli_query($connect, "SELECT * FROM tbl_request WHERE id='$id'");

	// Check if the query was successful and the result is not empty
	if ($search_request && mysqli_num_rows($search_request) > 0) {
		$data_request = mysqli_fetch_array($search_request);

		$id_request = $data_request['id'];
		$nama_barang_request = $data_request['nama_barang'];
		$peminjam_request = $data_request['peminjam'];
		$jml_hari_request = $data_request['jml_hari'];
		$tgl_pinjam_request = $data_request['created_at'];


		// Proses berdasarkan mode (terima/tolak)
		if ($_GET['mode'] == "terima") {
			// Cari data barang
			$query_search_barang = mysqli_query($connect, "SELECT * FROM tbl_barang WHERE nama_barang = '$nama_barang_request'");

			// Check if the query was successful and the result is not empty
			if ($query_search_barang && mysqli_num_rows($query_search_barang) > 0) {
				$data_search_barang = mysqli_fetch_array($query_search_barang);
				$stok_barang = $data_search_barang['stok_barang'] - $jml_hari_request;

				// Update stok barang
				$update_stok = mysqli_query($connect, "UPDATE tbl_barang SET stok_barang = '$stok_barang' WHERE nama_barang = '$nama_barang_request'");

				// Cek apakah update stok berhasil
				if ($update_stok) {
					// Insert data ke tbl_pinjam
					$insert_pinjam = mysqli_query($connect, "INSERT INTO tbl_pinjam (nama_barang, peminjam, jml_hari, created_at) VALUES ('$nama_barang_request', '$peminjam_request', '$jml_hari_request', '$tgl_pinjam_request')");

					// Cek apakah insert data ke tbl_pinjam berhasil
					if ($insert_pinjam) {
						// Hapus data dari tbl_request
						$delete_request = mysqli_query($connect, "DELETE FROM tbl_request WHERE id = '$id_request'");

						// Cek apakah hapus data dari tbl_request berhasil
						if ($delete_request) {
							// Buat konten pemberitahuan
							$konten = "Permintaan Peminjaman Barang Anda Telah di Terima. " . $jml_hari_request . " buah " . $nama_barang_request . ". Username: " . $peminjam_request . ". Silahkan ke bagian Sarpras untuk mengambil barang";

							// Insert data ke tbl_pemberitahuan
							$insert_pemberitahuan = mysqli_query($connect, "INSERT INTO pemberitahuan (username, konten, status) VALUES ('$peminjam_request', '$konten', 'terima')");

							// Cek apakah insert data ke tbl_pemberitahuan berhasil
							if ($insert_pemberitahuan) {
								echo "<script>alert('Berhasil Menerima Permintaan');</script>";
								echo "<script>window.history.back();</script>";
							} else {
								echo "Gagal Menambah Pemberitahuan";
							}
						} else {
							echo "Gagal Menghapus dari tbl_request";
						}
					} else {
						echo "Gagal menambah ke tbl_pinjam";
					}
				} else {
					echo "Tidak bisa update data barang";
				}
			} else {
				echo "Barang tidak ditemukan";
			}
		} else if ($_GET['mode'] == "tolak") {
			// Hapus data dari tbl_request
			$delete_request = mysqli_query($connect, "DELETE FROM tbl_request WHERE id = '$id_request'");

			// Cek apakah hapus data dari tbl_request berhasil
			if ($delete_request) {
				// Buat konten pemberitahuan
				$konten = "Permintaan Peminjaman Barang Anda Ditolak. " . $jml_hari_request . " buah " . $nama_barang_request . ". Username: " . $peminjam_request . ". Silahkan menghubungi bagian Sarpras untuk informasi lebih lanjut";

				// Insert data ke tbl_pemberitahuan
				$insert_pemberitahuan = mysqli_query($connect, "INSERT INTO pemberitahuan (username, konten, status) VALUES ('$peminjam_request', '$konten', 'tolak')");

				// Cek apakah insert data ke tbl_pemberitahuan berhasil
				if ($insert_pemberitahuan) {
					echo "<script>alert('Berhasil Menolak Permintaan');</script>";
					echo "<script>window.history.back();</script>";
				} else {
					echo "Gagal Menambah Pemberitahuan";
				}
			} else {
				echo "Gagal Menghapus dari tbl_request";
			}
		}
	} else {
		echo "Data request tidak ditemukan atau query gagal";
	}
} else {
	echo "Mode atau ID tidak valid";
}
