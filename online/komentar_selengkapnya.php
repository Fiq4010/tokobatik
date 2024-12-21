<?php
include 'header.php';
$produk_id = $_GET['id'];

// Query untuk mengambil semua komentar berdasarkan produk ID
$query_komentar = "SELECT k.*, c.customer_nama, c.customer_foto FROM komentar k JOIN customer c ON k.customer_id = c.customer_id WHERE produk_id = '$produk_id'";
$result_komentar = mysqli_query($koneksi, $query_komentar);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .product-rating .fa-star {
            color: orange;
        }

        .product-rating .fa-star-o {
            color: orange;
        }
    </style>
</head>

<body>

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Komentar</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Semua Komentar</h3>
                    </div>
                    <div class="komentar">
                        <table class="komentar-table">
                            <tbody>
                                <?php
                                // Tampilkan komentar jika ada
                                if (mysqli_num_rows($result_komentar) > 0) {
                                    while ($komentar = mysqli_fetch_assoc($result_komentar)) {
                                        echo "<tr>";
                                        // Tampilkan foto profil jika tersedia di dalam kolom pertama
                                        if (!empty($komentar['customer_foto'])) {
                                            echo "<td class='customer-photo'>";
                                            echo "<img src='./gambar/user/{$komentar['customer_foto']}' alt='Foto Profil' style='width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: top; margin-right: 10px; margin-bottom: 35px'>";
                                            echo "</td>";
                                        } else {
                                            echo "<td class='customer-photo'>";
                                            echo "<i class='fa fa-user-circle' style='font-size: 50px; margin-right: 10px; margin-bottom: 35px'></i>"; // Gambar default jika tidak ada foto profil
                                            echo "</td>";
                                        }
                                        // Tampilkan teks komentar di dalam kolom kedua
                                        echo "<td class='komentar-content'>";
                                        echo "<p><strong>{$komentar['customer_nama']}: <br> </strong> {$komentar['komentar_teks']}</p>";
                                        // Tampilkan rating di bawah teks komentar
                                        echo "<p class='product-rating'>";
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $komentar['bintang']) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        }
                                        echo "</p>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    // Tampilkan pesan jika tidak ada komentar
                                    echo "<tr><td colspan='2'>Belum ada komentar untuk produk ini.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="produk_detail.php?id=<?php echo $produk_id; ?>" class="primary-btn btn-sm add-to-cart"> <i class="fa fa-arrow-left"></i> Kembali ke Detail Produk</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /section -->

    <?php include 'footer.php'; ?>