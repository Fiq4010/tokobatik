<?php 
include 'koneksi.php';
include 'keranjang_simpan.php';

session_start();

if (isset($_SESSION['customer_id']) && isset($_SESSION['keranjang'])) {
    $customer_id = $_SESSION['customer_id'];
    $keranjang = $_SESSION['keranjang'];

    // Simpan keranjang ke database
    saveCartToDatabase($customer_id, $keranjang);
}

// Hapus session
unset($_SESSION['customer_id']);
unset($_SESSION['customer_status']);
unset($_SESSION['keranjang']);

header("location:index.php");
?>
