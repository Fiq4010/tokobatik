<?php 
include 'koneksi.php';

session_start();

$id_customer = $_SESSION['customer_id'];
$tanggal = date('Y-m-d');
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$provinsi = $_POST['provinsi2'];
$kabupaten = $_POST['kabupaten2'];
$kurir = $_POST['kurir'] . " - " . $_POST['service'];
$berat = $_POST['berat'];
$ongkir = $_POST['ongkir2'];
$total_bayar = $_POST['total_bayar'] + $ongkir;

mysqli_query($koneksi, "INSERT INTO invoice (invoice_tanggal, invoice_customer, invoice_nama, invoice_hp, invoice_alamat, invoice_provinsi, invoice_kabupaten, invoice_kurir, invoice_berat, invoice_ongkir, invoice_total_bayar, invoice_status, invoice_resi, invoice_bukti) VALUES ('$tanggal', '$id_customer', '$nama', '$hp', '$alamat', '$provinsi', '$kabupaten', '$kurir', '$berat', '$ongkir', '$total_bayar', '0', '', '')") or die(mysqli_error($koneksi));

$last_id = mysqli_insert_id($koneksi);

// transaksi
$invoice = $last_id;

$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for($a = 0; $a < $jumlah_isi_keranjang; $a++){
    $id_produk = $_SESSION['keranjang'][$a]['produk'];
    $jml = $_SESSION['keranjang'][$a]['jumlah'];
    $ukuran = $_SESSION['keranjang'][$a]['ukuran'];

    $isi = mysqli_query($koneksi, "SELECT * FROM produk WHERE produk_id='$id_produk'");
    $i = mysqli_fetch_assoc($isi);

    $produk = $i['produk_id'];
    $jumlah = $_SESSION['keranjang'][$a]['jumlah'];
    $harga = $i['produk_harga'];

    mysqli_query($koneksi, "INSERT INTO transaksi (transaksi_invoice, transaksi_produk, transaksi_jumlah, transaksi_harga, ukuran) VALUES ('$invoice', '$produk', '$jumlah', '$harga', '$ukuran')") or die(mysqli_error($koneksi));

    unset($_SESSION['keranjang'][$a]);
}

header("location:customer_pesanan.php?alert=sukses");
?>
