<?php
session_start();
include 'koneksi.php';

$id_invoice = $_POST['id'];
$id_customer = $_SESSION['customer_id'];

// Mendapatkan data invoice
$invoice_query = mysqli_query($koneksi, "SELECT * FROM invoice WHERE invoice_id='$id_invoice' AND invoice_customer='$id_customer'");
$invoice_data = mysqli_fetch_assoc($invoice_query);

// Mengecek apakah invoice ada dan statusnya memungkinkan untuk dibatalkan
if ($invoice_data && ($invoice_data['invoice_status'] == 0 || $invoice_data['invoice_status'] == 1)) {
    // Update status invoice menjadi '2' (Ditolak/Dibatalkan)
    mysqli_query($koneksi, "UPDATE invoice SET invoice_status='2' WHERE invoice_id='$id_invoice' AND invoice_customer='$id_customer'") or die(mysqli_error($koneksi));

    // Mendapatkan data transaksi yang terkait dengan invoice yang dibatalkan
    $transaksi_query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_invoice='$id_invoice'");
    while ($transaksi_data = mysqli_fetch_assoc($transaksi_query)) {
        $id_produk = $transaksi_data['transaksi_produk'];
        $jumlah = $transaksi_data['transaksi_jumlah'];

        // Mendapatkan data stok produk saat ini
        $produk_query = mysqli_query($koneksi, "SELECT * FROM produk WHERE produk_id='$id_produk'");
        $produk_data = mysqli_fetch_assoc($produk_query);
        $stok_sekarang = $produk_data['produk_jumlah'];

        // Menambahkan jumlah produk yang dibatalkan kembali ke stok
        $stok_baru = $stok_sekarang + $jumlah;
        mysqli_query($koneksi, "UPDATE produk SET produk_jumlah='$stok_baru' WHERE produk_id='$id_produk'") or die(mysqli_error($koneksi));
    }

    // Redirect ke halaman pesanan dengan pesan sukses
    header("location:customer_pesanan.php?alert=batal_sukses");
} else {
    // Redirect ke halaman pesanan dengan pesan gagal
    header("location:customer_pesanan.php?alert=batal_gagal");
}
?>