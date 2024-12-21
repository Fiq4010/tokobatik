<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Detail Produk</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<?php
$id_produk = $_GET['id'];
$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id=produk_kategori and produk_id='$id_produk'");
while ($d = mysqli_fetch_array($data)) {
?>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">

							<div class="product-view">
								<?php if ($d['produk_foto1'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto2'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto3'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto3'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto2'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

						</div>
						<div id="product-view">

							<div class="product-view">
								<?php if ($d['produk_foto1'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto2'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto3'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto3'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if ($d['produk_foto2'] == "") { ?>
									<img src="gambar/sistem/produk.png">
								<?php } else { ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

						</div>
					</div>

					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span><?php echo $d['kategori_nama']; ?></span>
								<span class="sale">Kualitas Terbaik</span>
							</div>
							<br>
							<h2 class="product-name"><?php echo $d['produk_nama']; ?></h2>
							<br />
							<br />
							<br />
							<h3 class="product-price"><?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?> <?php if ($d['produk_jumlah'] == 0) { ?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
							<br />
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
							<br />
							<!-- stok -->
							<p>
								<strong>Stok:</strong>
								<?php
								if ($d['produk_jumlah'] == 0) {
									echo "Habis";
								} else {
									echo $d['produk_jumlah'];
								}
								?>
							</p>

							<form method="post" action="keranjang_masukkan.php">
								<input type="hidden" name="id_produk" value="<?php echo $d['produk_id']; ?>">
								<input type="hidden" name="redirect" value="detail">
								<div class="product-options">
									<label for="ukuran">Pilih Ukuran:</label>
									<input type="radio" name="ukuran_baju" id="size_s" value="S" required>
									<label for="size_s">S</label>
									<input type="radio" name="ukuran_baju" id="size_m" value="M">
									<label for="size_m">M</label>
									<input type="radio" name="ukuran_baju" id="size_l" value="L">
									<label for="size_l">L</label>
									<input type="radio" name="ukuran_baju" id="size_xl" value="XL">
									<label for="size_xl">XL</label>
								</div>
								<div class="product-btns">
									<?php if ($d['produk_jumlah'] > 0) : ?>
										<button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
									<?php else : ?>
										<button type="button" class="primary-btn add-to-cart" disabled><i class="fa fa-shopping-cart"></i> Stok Habis</button>
									<?php endif; ?>
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p><?php echo $d['produk_keterangan']; ?></p>
								</div>
							</div>
						</div>
					</div>

					<!-- Tampilan Komentar -->
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Komentar</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<div class="komentar">
										<table class="komentar-table">
											<tbody>
												<?php
												$query_komentar = "
												SELECT k.komentar_teks, k.bintang, c.customer_nama, c.customer_foto 
												FROM komentar k
												JOIN customer c ON k.customer_id = c.customer_id
												WHERE k.produk_id = '{$d['produk_id']}'
												LIMIT 3
											";
												$result_komentar = mysqli_query($koneksi, $query_komentar);

												// Query untuk menghitung total komentar
												$query_count_komentar = "SELECT COUNT(*) as total FROM komentar WHERE produk_id = '{$d['produk_id']}'";
												$result_count_komentar = mysqli_query($koneksi, $query_count_komentar);
												$count_komentar = mysqli_fetch_assoc($result_count_komentar)['total'];
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
										<?php
										if ($count_komentar > 3) {
											echo '<a href="komentar_selengkapnya.php?id=' . $d['produk_id'] . '" class="primary-btn btn-sm add-to-cart"> <i class="fa fa-chevron-circle-right"></i> Lihat Selengkapnya</a>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<?php
}
	?>



	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Rekomendasi Produk Lainnya</h2>
					</div>
				</div>
				<!-- section title -->


				<?php
				$data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id=produk_kategori order by rand() limit 4");
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
								<h3 class="product-price"><?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?> <?php if ($d['produk_jumlah'] == 0) { ?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
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
									<!-- <a class="primary-btn add-to-cart btn-block text-center" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=detail"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a> -->
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
		<!-- /container -->
	</div>

	<?php include 'footer.php'; ?>