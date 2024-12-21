<?php 

$koneksi = mysqli_connect("localhost:3306", "root", "" ,"batik");


if (!function_exists('minstok')) {
    function minstok($data) {
        global $koneksi;
        $id = $data["produk_id"];
        $stok = $data["produk_jumlah"];
        $qty = $data["jumlah"];
        $now = $stok - $qty;

        $query = "UPDATE produk SET produk_jumlah = '$now' WHERE produk_id = $id";

        if (mysqli_query($koneksi, $query)) {
            return mysqli_affected_rows($koneksi);
        } else {
            echo "Error: " . mysqli_error($koneksi);
            return 0;
        }
    }
}  return mysqli_affected_rows($koneksi);

?>