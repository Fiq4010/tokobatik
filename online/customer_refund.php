<?php
include 'header.php';

// Inisialisasi $invoice_id dari parameter URL
$invoice_id = $_GET['id'];

// Pastikan koneksi ke database sudah dilakukan di file header.php atau sebelumnya

// Mendapatkan detail transaksi untuk refund
$query_transaksi_details = "
    SELECT t.transaksi_id, t.transaksi_produk, t.transaksi_jumlah, t.ukuran, p.produk_nama, p.produk_foto1
    FROM transaksi t
    JOIN produk p ON t.transaksi_produk = p.produk_id
    WHERE t.transaksi_invoice = '$invoice_id'
";

$result_transaksi_details = mysqli_query($koneksi, $query_transaksi_details);
?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Refund Dana</li>
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
                        <h3 class="title">Refund Dana</h3>
                        <a href="customer_pesanan.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger text-center'>Permintaan refund gagal dikirim.</div>";
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table" border="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th class="text-center">Tanggal Permohonan</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Ukuran</th>
                                            <th>Jumlah Refund</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result_transaksi_details && mysqli_num_rows($result_transaksi_details) > 0) : ?>
                                            <?php while ($row = mysqli_fetch_assoc($result_transaksi_details)) : ?>
                                                <tr>
                                                    <td><?php echo $row['produk_nama']; ?></td>
                                                    <td class="text-center"><?php echo date('d-m-Y'); ?></td>
                                                    <td class="text-center"><?php echo $row['transaksi_jumlah']; ?></td>
                                                    <td class="text-center"><?php echo $row['ukuran']; ?></td>
                                                    <td>
                                                        <form method="POST" enctype="multipart/form-data" action="customer_refund_act.php?id=<?php echo $invoice_id; ?>">
                                                            <input type="hidden" name="produk_id" value="<?php echo $row['transaksi_produk']; ?>">
                                                            <input type="hidden" name="ukuran" value="<?php echo $row['ukuran']; ?>">
                                                            <div class="form-group">
                                                                <select name="refund_qty" class="form-control" required>
                                                                    <?php for ($i = 1; $i <= $row['transaksi_jumlah']; $i++) : ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <small class="text-muted">Pilih jumlah barang yang ingin direfund.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alasan">Alasan Refund</label>
                                                                <textarea class="form-control" name="alasan" rows="5" style="width: 100%;" required></textarea>
                                                                <small class="text-muted">Tuliskan alasan refund dana anda disini.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bukti">Upload Bukti</label>
                                                                <input type="file" class="form-control" id="bukti" name="bukti" required>
                                                                <small class="text-muted">Bukti transfer atau dokumen lainnya.</small>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="primary-btn btn-sm add-to-cart" style="width: 100%; font-weight: bold;">Ajukan Refund</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada transaksi yang ditemukan.</td>
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


<!-- Dalam kode di atas, saya menambahkan input hidden `produk_id` di dalam form refund, yang diisi dengan nilai `transaksi_produk` dari setiap produk dalam transaksi. Nilai ini kemudian akan dikirimkan bersamaan dengan form saat pengguna mengajukan refund. -->
