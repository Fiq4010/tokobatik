<?php 
include 'koneksi.php';

session_start();

$id_produk = $_POST['id_produk'];
$ukuran_baju = $_POST['ukuran_baju'];

// Ambil stok produk dari database
$query_stok = "SELECT produk_jumlah FROM produk WHERE produk_id = '$id_produk'";
$result_stok = mysqli_query($koneksi, $query_stok);
$row_stok = mysqli_fetch_assoc($result_stok);
$stok_produk = $row_stok['produk_jumlah'];

// Fungsi untuk mengurangi stok produk di database
function minstok($koneksi, $id_produk, $jumlah) {
    $query_update_stok = "UPDATE produk SET produk_jumlah = produk_jumlah - $jumlah WHERE produk_id = '$id_produk'";
    mysqli_query($koneksi, $query_update_stok);
}

$sudah_ada = 0;

if (isset($_SESSION['keranjang'])) {
    $jumlah_isi_keranjang = count($_SESSION['keranjang']);

    for ($a = 0; $a < $jumlah_isi_keranjang; $a++) {
        if ($_SESSION['keranjang'][$a]['produk'] == $id_produk && $_SESSION['keranjang'][$a]['ukuran'] == $ukuran_baju) {
            $sudah_ada = 1; // Menandai produk sudah ada
            break;
        }
    }
}

if ($sudah_ada == 0) {
    // Jika produk belum ada di keranjang
    if ($stok_produk > 0) {
        minstok($koneksi, $id_produk, 1);

        if (isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'][] = array(
                'produk' => $id_produk,
                'ukuran' => $ukuran_baju,
                'jumlah' => 1
            );
        } else {
            $_SESSION['keranjang'][0] = array(
                'produk' => $id_produk,
                'ukuran' => $ukuran_baju,
                'jumlah' => 1
            );
        }

        // Berhasil ditambahkan
        echo "<script>alert('Produk berhasil ditambahkan ke keranjang.'); window.history.back();</script>";
    } else {
        // Stok habis
        echo "<script>alert('Stok produk habis!'); window.history.back();</script>";
    }
} else {
    // Jika produk sudah ada di keranjang
    echo "<script>alert('Produk dengan ukuran ini sudah ada di keranjang!'); window.history.back();</script>";
}
?>
