<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
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

            <!-- MAIN -->
            <div id="main" class="col-md-12">

                <!-- store top filter -->
                <form action="" method="get">
                    <div class="store-filter clearfix">
                        <div class="pull-right">
                            <div class="sort-filter form-inline">
                                <span class="text-uppercase">Urutkan :</span>
                                <select class="form-control ml-2" name="urutan" onchange="this.form.submit()" style="width: 250px;">
                                    <option value="terbaru" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "terbaru" ? "selected" : ""; ?>>Terbaru</option>
                                    <option value="harga" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "harga" ? "selected" : ""; ?>>Harga Terendah</option>
                                    <option value="harga_desc" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "harga_desc" ? "selected" : ""; ?>>Harga Tertinggi</option>
                                    <option value="200_300" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "200_300" ? "selected" : ""; ?>>Rp. 200,000 - Rp. 300,000</option>
                                    <option value="300_400" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "300_400" ? "selected" : ""; ?>>Rp. 300,000 - Rp. 400,000</option>
                                    <option value="400_500" <?php echo isset($_GET['urutan']) && $_GET['urutan'] == "400_500" ? "selected" : ""; ?>>Rp. 400,000 - Rp. 500,000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        <?php
                        // Mengambil parameter pencarian
                        $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
                        $urutan = isset($_GET['urutan']) ? $_GET['urutan'] : 'terbaru';

                        // Mengatur jumlah data per halaman
                        $halaman = 12;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

                        // Query dasar untuk menghitung total data
                        $query_total = "SELECT COUNT(*) AS total FROM produk, kategori WHERE kategori_id=produk_kategori ";

                        // Menambahkan kondisi pencarian jika ada
                        if ($cari != '') {
                            $query_total .= "AND (produk_nama LIKE '%$cari%' OR kategori_nama LIKE '%$cari%') ";
                        }

                        // Menambahkan pengurutan berdasarkan parameter
                        if ($urutan == "200_300") {
                            $query_total .= "AND produk_harga BETWEEN 200000 AND 300000 ";
                        } else if ($urutan == "300_400") {
                            $query_total .= "AND produk_harga BETWEEN 300000 AND 400000 ";
                        } else if ($urutan == "400_500") {
                            $query_total .= "AND produk_harga BETWEEN 400000 AND 500000 ";
                        }

                        // Eksekusi query total
                        $result_total = mysqli_query($koneksi, $query_total);
                        $data_total = mysqli_fetch_assoc($result_total);
                        $total = $data_total['total'];
                        $pages = ceil($total / $halaman);

                        // Query untuk mendapatkan data produk
                        $query = "SELECT * FROM produk, kategori WHERE kategori_id=produk_kategori ";

                        if ($cari != '') {
                            $query .= "AND (produk_nama LIKE '%$cari%' OR kategori_nama LIKE '%$cari%') ";
                        }

                        if ($urutan == "harga") {
                            $query .= "ORDER BY produk_harga ASC ";
                        } else if ($urutan == "harga_desc") {
                            $query .= "ORDER BY produk_harga DESC ";
                        } else if ($urutan == "200_300") {
                            $query .= "AND produk_harga BETWEEN 200000 AND 300000 ORDER BY produk_harga ASC ";
                        } else if ($urutan == "300_400") {
                            $query .= "AND produk_harga BETWEEN 300000 AND 400000 ORDER BY produk_harga ASC ";
                        } else if ($urutan == "400_500") {
                            $query .= "AND produk_harga BETWEEN 400000 AND 500000 ORDER BY produk_harga ASC ";
                        } else {
                            $query .= "ORDER BY produk_id DESC ";
                        }

                        $query .= "LIMIT $mulai, $halaman";
                        $result = mysqli_query($koneksi, $query);

                        while ($d = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span><?php echo $d['kategori_nama'] ?></span>
                                        </div>
                                        <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                        <?php if ($d['produk_foto1'] == "") { ?>
                                            <img src="gambar/sistem/produk.png" style="height: 250px">
                                        <?php } else { ?>
                                            <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="height: 250px">
                                        <?php } ?>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price"><?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?><?php if ($d['produk_jumlah'] == 0) { ?> <del class="product-old-price">Kosong</del><?php } ?></h3>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o empty"></i>
                                        </div>
                                        <h2 class="product-name"><a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a></h2>
                                        <div class="product-btns">
                                            <a class="main-btn btn-block text-center" href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-search"></i> Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <div class="store-filter clearfix">
                    <div class="pull-right">
                        <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                <?php if ($page == $i) { ?>
                                    <li class="active"><?php echo $i; ?></li>
                                <?php } else { ?>
                                    <?php
                                    $c = isset($_GET['cari']) ? "&cari=" . $_GET['cari'] : "";
                                    $u = isset($_GET['urutan']) ? "&urutan=" . $_GET['urutan'] : "";
                                    ?>
                                    <li><a href="?halaman=<?php echo $i . $c . $u ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>
