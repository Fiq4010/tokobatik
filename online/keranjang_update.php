<?php 
include 'koneksi.php';

$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$ukuran = $_POST['ukuran'];

session_start();

foreach ($_SESSION['keranjang'] as $key => $item) {
    for ($i = 0; $i < count($produk); $i++) {
        if ($item['produk'] == $produk[$i] && $item['ukuran'] == $ukuran[$i]) {
            // Update jumlah hanya jika valid
            $jumlah_lama = $item['jumlah'];
            $jumlah_baru = $jumlah[$i];
            $produk_id = $item['produk'];

            // Cek stok produk
            $query_stok = mysqli_query($koneksi, "SELECT produk_jumlah FROM produk WHERE produk_id = $produk_id");
            $data_stok = mysqli_fetch_assoc($query_stok);
            $stok_sekarang = $data_stok['produk_jumlah'];

            // Periksa apakah jumlah baru valid
            if ($jumlah_baru > ($stok_sekarang + $jumlah_lama)) {
                // Jika melebihi stok, tampilkan alert dan hentikan proses
                echo "<script>
                    alert('Jumlah yang dipesan melebihi stok tersedia!');
                    window.location.href = 'keranjang.php';
                </script>";
                exit;
            }

            // Hitung perubahan stok
            $perubahan_stok = $jumlah_lama - $jumlah_baru;
            $stok_terbaru = $stok_sekarang + $perubahan_stok;

            // Update jumlah di keranjang
            $_SESSION['keranjang'][$key]['jumlah'] = $jumlah_baru;

            // Update stok di database
            mysqli_query($koneksi, "UPDATE produk SET produk_jumlah = $stok_terbaru WHERE produk_id = $produk_id");
        }
    }
}

header("location:keranjang.php");
?>
