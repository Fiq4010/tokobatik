<?php 
include '../koneksi.php';
$id = $_GET['id'];

// Menghapus baris terkait di tabel transaksi
$data_invoice = mysqli_query($koneksi, "SELECT invoice_id FROM invoice WHERE invoice_customer='$id'");
while ($d = mysqli_fetch_array($data_invoice)) {
    $id_invoice = $d['invoice_id'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE transaksi_invoice='$id_invoice'");
}

// Menghapus baris di tabel invoice
mysqli_query($koneksi, "DELETE FROM invoice WHERE invoice_customer='$id'");

// Menghapus baris di tabel customer
mysqli_query($koneksi, "DELETE FROM customer WHERE customer_id='$id'");

header("Location: customer.php");
exit();
?>
