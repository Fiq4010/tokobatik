<?php
function saveCartToDatabase($customer_id, $keranjang) {
    global $koneksi;
    
    $query_order = "INSERT INTO orders (customer_id) VALUES ($customer_id)";
    if (mysqli_query($koneksi, $query_order)) {
        $order_id = mysqli_insert_id($koneksi);

        foreach ($keranjang as $item) {
            $produk_id = $item['produk'];
            $ukuran_baju = $item['ukuran'];
            $jumlah = $item['jumlah'];

            $query_order_detail = "INSERT INTO order_details (order_id, produk_id, ukuran_baju, jumlah) VALUES ($order_id, $produk_id, '$ukuran_baju', $jumlah)";
            mysqli_query($koneksi, $query_order_detail);
        }
    }
}

function findItemIndex($keranjang, $produk_id, $ukuran) {
    foreach ($keranjang as $index => $item) {
        if ($item['produk'] == $produk_id && $item['ukuran'] == $ukuran) {
            return $index;
        }
    }
    return false;
}

?>
