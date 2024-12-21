<?php
include 'header.php';

$invoice_id = $_GET['id'];
$customer_id = $_SESSION['customer_id'];

// Query untuk mengambil detail transaksi berdasarkan invoice_id
$query_transaksi_details = "
    SELECT t.transaksi_produk, t.ukuran, p.produk_nama, p.produk_foto1
    FROM transaksi t
    JOIN produk p ON t.transaksi_produk = p.produk_id
    WHERE t.transaksi_invoice = '$invoice_id'
";

$result_transaksi_details = mysqli_query($koneksi, $query_transaksi_details);

// Jika form disubmit, simpan komentar ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produk_id = $_POST['produk_id'];
    $komentar_teks = $_POST['komentar_teks'];
    $bintang = $_POST['bintang'];

    $insert_komentar = "
        INSERT INTO komentar (customer_id, produk_id, komentar_teks, bintang)
        VALUES ('$customer_id', '$produk_id', '$komentar_teks', '$bintang')
    ";
    if (mysqli_query($koneksi, $insert_komentar)) {
        header("location:customer_pesanan.php?id=$invoice_id&alert=komentar");
        exit();
    } else {
        header("location:customer_komentar.php?id=$invoice_id&alert=gagal");
        exit();
    }
}
?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Komentar Customer</li>
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
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Komentar</h3>
                        <a href="customer_pesanan.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "sukses") {
                            echo "<div class='alert alert-success text-center'>Komentar anda berhasil dikirim.</div>";
                        }
                        if ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger text-center'>Komentar anda gagal dikirim.</div>";
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th class="text-center">Ukuran</th>
                                            <th>Komentar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result_transaksi_details && mysqli_num_rows($result_transaksi_details) > 0) : ?>
                                            <?php while ($row = mysqli_fetch_assoc($result_transaksi_details)) : ?>
                                                <tr>
                                                    <td><img src="gambar/produk/<?php echo $row['produk_foto1']; ?>" alt="<?php echo $row['produk_nama']; ?>" style="width: 150px;"></td>
                                                    <td><?php echo $row['produk_nama']; ?></td>
                                                    <td class="text-center"><?php echo $row['ukuran']; ?></td>
                                                    <td>
                                                        <form method="POST" action="customer_komentar.php?id=<?php echo $invoice_id; ?>">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="komentar_teks" rows="5" style="width: 100%;" required></textarea>
                                                                <small class="text-muted">Tuliskan komentar anda.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bintang">Rating</label>
                                                                <select class="form-control" id="bintang" name="bintang" required>
                                                                    <option value="1">1 Bintang</option>
                                                                    <option value="2">2 Bintang</option>
                                                                    <option value="3">3 Bintang</option>
                                                                    <option value="4">4 Bintang</option>
                                                                    <option value="5">5 Bintang</option>
                                                                </select>
                                                            </div>
                                                            <div class="text-center">
                                                                <input type="hidden" name="produk_id" value="<?php echo $row['transaksi_produk']; ?>">
                                                                <button type="submit" class="primary-btn btn-sm add-to-cart" style="width: 100%; font-weight: bold;">Kirim Komentar</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada produk untuk dikomentari.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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