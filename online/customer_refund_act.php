<?php
include 'koneksi.php';
session_start();

$invoice_id = $_GET['id'];
$produk_id = $_POST['produk_id'];
$ukuran = $_POST['ukuran'];
$refund_qty = $_POST['refund_qty'];
$alasan = $_POST['alasan'];
$bukti = $_FILES['bukti']['name'];
$target_dir = "./gambar/bukti_refund/"; // Direktori untuk menyimpan file bukti
$target_file = $target_dir . basename($_FILES['bukti']['name']);

// Check if a file with the same name already exists
if (file_exists($target_file)) {
    // Generate a new file name by appending a timestamp
    $timestamp = time();
    $filename_parts = pathinfo($bukti);
    $new_filename = $filename_parts['filename'] . '_' . $timestamp . '.' . $filename_parts['extension'];
    $target_file = $target_dir . $new_filename;

    // Attempt to move the uploaded file with the new name
    if (!move_uploaded_file($_FILES['bukti']['tmp_name'], $target_file)) {
        // Gagal mengupload file
        die("Gagal mengupload file bukti.");
    }
    // Simpan nama file baru
    $bukti = $new_filename;
} else {
    // Jika nama file belum ada yang sama, langsung simpan
    if (!move_uploaded_file($_FILES['bukti']['tmp_name'], $target_file)) {
        // Gagal mengupload file
        die("Gagal mengupload file bukti.");
    }
}

// Fetch current transaction record
$query_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_invoice = '$invoice_id' AND transaksi_produk = '$produk_id' AND ukuran = '$ukuran'");
$transaksi = mysqli_fetch_assoc($query_transaksi);

if (!$transaksi) {
    die("Transaksi tidak ditemukan.");
}

$current_qty = $transaksi['transaksi_jumlah'];

if ($current_qty <= 0) {
    die("Tidak dapat melakukan refund karena jumlah barang sudah 0.");
}

if ($current_qty < $refund_qty) {
    die("Jumlah refund melebihi jumlah transaksi.");
}

// Ambil harga produk
$harga_produk_query = mysqli_query($koneksi, "SELECT produk_harga FROM produk WHERE produk_id = '$produk_id'");
$harga_produk_data = mysqli_fetch_assoc($harga_produk_query);
$harga = $harga_produk_data['produk_harga'];

// Hitung total refund
$total_refund = $harga * $refund_qty;

// Ambil total bayar saat ini dari tabel invoice
$invoice_query = mysqli_query($koneksi, "SELECT invoice_total_bayar FROM invoice WHERE invoice_id = '$invoice_id'");
$invoice_data = mysqli_fetch_assoc($invoice_query);
$total_bayar_sekarang = $invoice_data['invoice_total_bayar'];

// Kurangi total bayar dengan total refund
$total_bayar_baru = $total_bayar_sekarang - $total_refund;

// Cek apakah ada refund yang ditolak sebelumnya untuk transaksi ini
$existing_refund_query = mysqli_query($koneksi, "SELECT * FROM refund WHERE invoice_id = '$invoice_id' AND produk_id = '$produk_id' AND ukuran = '$ukuran' AND status = 2");
$existing_refund = mysqli_fetch_assoc($existing_refund_query);

if ($existing_refund) {
    // Hapus refund yang ditolak sebelumnya
    mysqli_query($koneksi, "DELETE FROM refund WHERE id = '" . $existing_refund['id'] . "'");
}

// Insert refund request into database
mysqli_query($koneksi, "INSERT INTO refund (invoice_id, produk_id, jumlah, alasan, bukti, status, ukuran) VALUES ('$invoice_id', '$produk_id', '$refund_qty', '$alasan', '$bukti', 0, '$ukuran')");

// Update transaction record to reflect the refunded quantity
$new_qty = $current_qty - $refund_qty;
mysqli_query($koneksi, "UPDATE transaksi SET transaksi_jumlah = $new_qty WHERE transaksi_invoice = '$invoice_id' AND transaksi_produk = '$produk_id' AND ukuran = '$ukuran'");

// Fetch current stock of the product
$query_stok = mysqli_query($koneksi, "SELECT produk_jumlah FROM produk WHERE produk_id = $produk_id");
$data_stok = mysqli_fetch_assoc($query_stok);
$stok_sekarang = $data_stok['produk_jumlah'];

// Update the stock in the database
$stok_terbaru = $stok_sekarang + $refund_qty;
mysqli_query($koneksi, "UPDATE produk SET produk_jumlah = $stok_terbaru WHERE produk_id = $produk_id");

// Update session cart
if (isset($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $key => $item) {
        if ($item['produk'] == $produk_id && $item['ukuran'] == $ukuran) {
            if ($item['jumlah'] > $refund_qty) {
                $_SESSION['keranjang'][$key]['jumlah'] -= $refund_qty;
            } else {
                unset($_SESSION['keranjang'][$key]);
            }
            break;
        }
    }
}

// Update total bayar di tabel invoice
mysqli_query($koneksi, "UPDATE invoice SET invoice_total_bayar = $total_bayar_baru WHERE invoice_id = '$invoice_id'");

header("Location: customer_pesanan.php?alert=refund");
exit();
?>
