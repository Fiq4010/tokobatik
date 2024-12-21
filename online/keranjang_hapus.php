<?php 
include 'koneksi.php';
session_start();

$id_produk = $_GET['id'];
$ukuran_produk = $_GET['ukuran']; // Get the size from the URL
$redirect = $_GET['redirect'];

if(isset($_SESSION['keranjang'])){
    // Ambil jumlah produk yang akan dihapus dari keranjang
    $jumlah_produk_dihapus = 0;
    for ($a = 0; $a < count($_SESSION['keranjang']); $a++) {
        if ($_SESSION['keranjang'][$a]['produk'] == $id_produk && $_SESSION['keranjang'][$a]['ukuran'] == $ukuran_produk) { // Check both product ID and size
            $jumlah_produk_dihapus = $_SESSION['keranjang'][$a]['jumlah'];
            unset($_SESSION['keranjang'][$a]);
            // Mengurutkan kembali array setelah menghapus item
            $_SESSION['keranjang'] = array_values($_SESSION['keranjang']); // Reindex array
            break; // Hentikan pencarian setelah item ditemukan dan dihapus
        }
    }

    // Mengembalikan stok produk
    if ($jumlah_produk_dihapus > 0) {
        // Query untuk mengembalikan stok produk yang dihapus
        $query = "UPDATE produk SET produk_jumlah = produk_jumlah + $jumlah_produk_dihapus WHERE produk_id = $id_produk";
        mysqli_query($koneksi, $query);
    }

    // Hapus item dari order_details jika pengguna sudah login
    if (isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
        // Ambil order_id terakhir dari user
        $query_order = "SELECT order_id FROM orders WHERE customer_id = $customer_id ORDER BY order_date DESC LIMIT 1";
        $result_order = mysqli_query($koneksi, $query_order);

        if ($result_order && mysqli_num_rows($result_order) > 0) {
            $order = mysqli_fetch_assoc($result_order);
            $order_id = $order['order_id'];

            // Hapus item dari order_details
            $query_delete = "DELETE FROM order_details WHERE order_id = $order_id AND produk_id = $id_produk AND ukuran_baju = '$ukuran_produk'";
            mysqli_query($koneksi, $query_delete);
        }
    }
}

// Redirect sesuai dengan halaman yang diinginkan
if($redirect == "index"){
    $r = "index.php";
}elseif($redirect == "detail"){
    $r = "produk_detail.php?id=".$id_produk;
}elseif($redirect == "keranjang"){
    $r = "keranjang.php";
}

header("Location: ".$r);
exit();
?>
