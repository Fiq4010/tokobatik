<?php
include '../koneksi.php';
session_start();

// Ambil data dari form atau URL
$refund_id = $_POST['id'];
$status = $_POST['status'];

// Ambil data refund yang bersangkutan
$refund_query = mysqli_query($koneksi, "SELECT * FROM refund WHERE id = '$refund_id'");
$refund = mysqli_fetch_assoc($refund_query);

$invoice_id = $refund['invoice_id'];
$produk_id = $refund['produk_id'];
$jumlah_refund = $refund['jumlah'];
$ukuran = $refund['ukuran'];

// Ambil data transaksi yang bersangkutan
$transaksi_query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_invoice='$invoice_id' AND transaksi_produk='$produk_id' AND ukuran='$ukuran'");
$transaksi = mysqli_fetch_assoc($transaksi_query);
$jumlah_awal = $transaksi['transaksi_jumlah'];
$harga = $transaksi['transaksi_harga'];

// Ambil total bayar saat ini dari tabel invoice
$invoice_query = mysqli_query($koneksi, "SELECT invoice_total_bayar FROM invoice WHERE invoice_id = '$invoice_id'");
$invoice_data = mysqli_fetch_assoc($invoice_query);
$total_bayar_sekarang = $invoice_data['invoice_total_bayar'];

// Jika refund disetujui
if ($status == 1) { // 1: Disetujui
    // Update status refund
    mysqli_query($koneksi, "UPDATE refund SET status = '$status' WHERE id = '$refund_id'");
} elseif ($status == 2) { // 2: Ditolak
    // Kembalikan jumlah barang ke transaksi
    $jumlah_kembali = $jumlah_awal + $jumlah_refund;

    // Update jumlah barang di transaksi
    mysqli_query($koneksi, "UPDATE transaksi SET transaksi_jumlah = $jumlah_kembali WHERE transaksi_invoice='$invoice_id' AND transaksi_produk='$produk_id' AND ukuran='$ukuran'");

    // Tambahkan total bayar dengan total harga refund
    $total_bayar_baru = $total_bayar_sekarang + ($harga * $jumlah_refund);

    // Update total bayar di tabel invoice
    mysqli_query($koneksi, "UPDATE invoice SET invoice_total_bayar = $total_bayar_baru WHERE invoice_id = '$invoice_id'");

    // Update status refund
    mysqli_query($koneksi, "UPDATE refund SET status = '$status' WHERE id = '$refund_id'");
}

// Redirect atau tampilkan pesan
header("Location: refund_dana.php");
exit();
?>
