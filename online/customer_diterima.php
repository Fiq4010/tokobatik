<?php
include 'koneksi.php';
session_start();

// Ambil ID Invoice dari URL
if (isset($_GET['id'])) {
    $id_invoice = $_GET['id'];

    // Perbarui status invoice menjadi 'Diterima' (5)
    $update_status = "UPDATE invoice SET invoice_status = 5 WHERE invoice_id = '$id_invoice' AND invoice_status = 4";
    if (mysqli_query($koneksi, $update_status)) {
        // Redirect kembali ke halaman pesanan dengan alert sukses
        header("Location: customer_pesanan.php?alert=sukses_diterima");
    } else {
        // Redirect dengan alert gagal
        header("Location: customer_pesanan.php?alert=gagal_diterima");
    }
} else {
    // Jika tidak ada ID, redirect ke halaman pesanan
    header("Location: customer_pesanan.php");
}
?>
