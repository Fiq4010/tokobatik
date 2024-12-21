<?php
include 'koneksi.php';
include 'keranjang_simpan.php';

session_start();

// Pastikan data email dan password ada di dalam $_POST
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	// Query untuk memeriksa apakah user ada dan mengambil customer_id
	$query_user = "SELECT customer_id FROM customer WHERE customer_email = '$email' AND customer_password = '$password'";
	$result_user = mysqli_query($koneksi, $query_user);

	if ($result_user && mysqli_num_rows($result_user) > 0) {
		$user = mysqli_fetch_assoc($result_user);
		$_SESSION['customer_id'] = $user['customer_id'];
		$_SESSION['customer_status'] = "login";

		// Mengambil order_id terakhir dari user
		$query_order = "SELECT order_id FROM orders WHERE customer_id = " . $user['customer_id'] . " ORDER BY order_date DESC LIMIT 1";
		$result_order = mysqli_query($koneksi, $query_order);

		if ($result_order && mysqli_num_rows($result_order) > 0) {
			$order = mysqli_fetch_assoc($result_order);
			$order_id = $order['order_id'];

			// Mengambil detail order dan menyimpannya kembali ke session
			$query_order_details = "SELECT produk_id, ukuran_baju, jumlah FROM order_details WHERE order_id = $order_id";
			$result_order_details = mysqli_query($koneksi, $query_order_details);

			// Inisialisasi keranjang gabungan
			$keranjang_gabungan = array();

			// Periksa apakah ada keranjang belanja dari sesi sebelumnya
			if (isset($_SESSION['keranjang'])) {
				$keranjang_sebelum_login = $_SESSION['keranjang'];

				// Gabungkan keranjang belanja dari sesi sebelumnya dengan keranjang belanja dari database
				$keranjang_gabungan = array_merge($keranjang_sebelum_login, $keranjang_gabungan);
			}

			// Tambahkan keranjang belanja dari database ke keranjang gabungan
			while ($item = mysqli_fetch_assoc($result_order_details)) {
				$existing_item_index = findItemIndex($keranjang_gabungan, $item['produk_id'], $item['ukuran_baju']);
				if ($existing_item_index !== false) {
					$keranjang_gabungan[$existing_item_index]['jumlah'] += $item['jumlah'];
				} else {
					$keranjang_gabungan[] = array(
						'produk' => $item['produk_id'],
						'ukuran' => $item['ukuran_baju'],
						'jumlah' => $item['jumlah']
					);
				}
			}

			// Simpan keranjang gabungan ke dalam sesi
			$_SESSION['keranjang'] = $keranjang_gabungan;
		}

		header("location:customer.php"); // Redirect ke halaman utama atau halaman lain
		exit();
	} else {
		// Tangani kesalahan login
		header("location:masuk.php?alert=gagal");
		exit();
	}
} else {
	// Tangani kesalahan jika data tidak lengkap
	header("location:masuk.php?alert=gagal");
	exit();
}
