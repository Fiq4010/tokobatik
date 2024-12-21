<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Kategori</li>
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

				<?php
				$id = $_GET['id'];
				if (!isset($id)) {
					echo "<script>window.location.href='index.php';</script>";
				}
				$kategori = mysqli_query($koneksi, "select * from kategori where kategori_id='$id'");
				$k = mysqli_fetch_assoc($kategori);
				?>

				<div class="pull-left">
					<h4>Kategori Produk : <?php echo $k['kategori_nama']; ?></h4>
				</div>

				<!-- store top filter -->
				<form action="" method="get">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="store-filter clearfix">
						<div class="pull-right">
							<div class="sort-filter form-inline">
								<span class="text-uppercase">Urutkan :</span>
								<select class="form-control ml-2" name="urutan" onchange="this.form.submit()" style="width: 250px;">
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "terbaru") {
												echo "selected='selected'";
											} ?> value="terbaru">Terbaru</option>
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
												echo "selected='selected'";
											} ?> value="harga">Harga Terendah</option>
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "harga_desc") {
												echo "selected='selected'";
											} ?> value="harga_desc">Harga Tertinggi</option>
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "200_300") {
												echo "selected='selected'";
											} ?> value="200_300">Rp. 200,000 - Rp. 300,000</option>
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "300_400") {
												echo "selected='selected'";
											} ?> value="300_400">Rp. 300,000 - Rp. 400,000</option>
									<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "400_500") {
												echo "selected='selected'";
											} ?> value="400_500">Rp. 400,000 - Rp. 500,000</option>
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
						$kategori = $_GET['id'];

						$halaman = 12;
						$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
						$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE produk_kategori='$kategori'");
						$total = mysqli_num_rows($result);
						$pages = ceil($total / $halaman);

						if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori order by produk_harga asc LIMIT $mulai, $halaman");
						} else if (isset($_GET['urutan']) && $_GET['urutan'] == "harga_desc") {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori order by produk_harga desc LIMIT $mulai, $halaman");
						} else if (isset($_GET['urutan']) && $_GET['urutan'] == "200_300") {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori and produk_harga between 200000 and 300000 order by produk_harga asc LIMIT $mulai, $halaman");
						} else if (isset($_GET['urutan']) && $_GET['urutan'] == "300_400") {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori and produk_harga between 300000 and 400000 order by produk_harga asc LIMIT $mulai, $halaman");
						} else if (isset($_GET['urutan']) && $_GET['urutan'] == "400_500") {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori and produk_harga between 400000 and 500000 order by produk_harga asc LIMIT $mulai, $halaman");
						} else {
							$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id='$kategori' and kategori_id=produk_kategori order by produk_id desc LIMIT $mulai, $halaman");
						}
						$no = $mulai + 1;

						while ($d = mysqli_fetch_array($data)) {
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
										<h3 class="product-price">
											<?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?>
											<?php if ($d['produk_jumlah'] == 0) { ?> <del class="product-old-price">Kosong</del> <?php } ?>
										</h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
										</h2>
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

						<?php
						if (mysqli_num_rows($data) == 0) {
							echo "<center><h3>Belum Ada Produk</h3></center>";
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
									if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&urutan=harga&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									} else if (isset($_GET['urutan']) && $_GET['urutan'] == "harga_desc") {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&urutan=harga_desc&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									} else if (isset($_GET['urutan']) && $_GET['urutan'] == "200_300") {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&urutan=200_300&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									} else if (isset($_GET['urutan']) && $_GET['urutan'] == "300_400") {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&urutan=300_400&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									} else if (isset($_GET['urutan']) && $_GET['urutan'] == "400_500") {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&urutan=400_500&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									} else {
									?>
										<li><a href="?halaman=<?php echo $i; ?>&id=<?php echo $kategori; ?>"><?php echo $i; ?></a>
										</li>
									<?php
									}
									?>

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