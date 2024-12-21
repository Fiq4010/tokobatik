<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id_invoice'])) {
    $id_invoice = $_GET['id_invoice'];
    $id_customer = $_SESSION['customer_id'];

    // Mendapatkan data transaksi yang terkait dengan invoice
    $transaksi_query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_invoice='$id_invoice'");
    if ($transaksi_data = mysqli_fetch_assoc($transaksi_query)) {
        $id_produk = $transaksi_data['transaksi_produk'];
        // Redirect ke halaman detail produk
        header("Location: produk_detail.php?id=$id_produk");
    } else {
        // Jika tidak ada transaksi terkait, kembali ke halaman pesanan dengan pesan gagal
        header("Location: customer_pesanan.php?alert=transaksi_tidak_ditemukan");
    }
} else {
    // Jika id_invoice tidak diset, kembali ke halaman pesanan dengan pesan gagal
    header("Location: customer_pesanan.php?alert=id_invoice_tidak_ditemukan");
}
?>