<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>

	<?php
	session_start();
	include '../koneksi.php';
	?>

	<style>
		body {
			font-family: sans-serif;
		}

		.table {
			border-collapse: collapse;
		}

		.table th,
		.table td {
			padding: 5px 10px;
			border: 1px solid black;
		}
	</style>

	<div>

		<?php
		$id_invoice = $_GET['id'];
		$invoice = mysqli_query($koneksi, "select * from invoice where invoice_id='$id_invoice' order by invoice_id desc");
		while ($i = mysqli_fetch_array($invoice)) {
		?>


			<div>

				<center>
					<h3>Toko Online Batik Gems</h3>
				</center>

				<h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


				<br />
				<?php echo $i['invoice_nama']; ?><br />
				<?php echo $i['invoice_alamat']; ?><br />
				<?php echo $i['invoice_provinsi']; ?><br />
				<?php echo $i['invoice_kabupaten']; ?><br />
				Hp. <?php echo $i['invoice_hp']; ?><br />
				<br />

				<table class="table">
					<thead>
						<tr>
							<th class="text-center" width="1%">NO</th>
							<th colspan="2">Produk</th>
							<th class="text-center">Ukuran</th>
							<th class="text-center">Harga</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$total = 0;
						$transaksi = mysqli_query($koneksi, "select * from transaksi,produk where transaksi_produk=produk_id and transaksi_invoice='$id_invoice'");
						while ($d = mysqli_fetch_array($transaksi)) {
							$total += $d['transaksi_harga'] * $d['transaksi_jumlah'];
						?>
							<tr>
								<td class="text-center"><?php echo $no++; ?></td>
								<td>
									<center>
										<?php if ($d['produk_foto1'] == "") { ?>
											<img src="../gambar/sistem/produk.png" style="width: 50px;height: auto">
										<?php } else { ?>
											<img src="../gambar/produk/<?php echo $d['produk_foto1'] ?>" style="width: 50px;height: auto">
										<?php } ?>
									</center>
								</td>
								<td><?php echo $d['produk_nama']; ?></td>
								<td class="text-center"><?php echo $d['ukuran']; ?></td>
								<td class="text-center"><?php echo "Rp. " . number_format($d['transaksi_harga']) . ",-"; ?></td>
								<td class="text-center"><?php echo number_format($d['transaksi_jumlah']); ?></td>
								<td class="text-center"><?php echo "Rp. " . number_format($d['transaksi_jumlah'] * $d['transaksi_harga']) . " ,-"; ?></td>
							</tr>
						<?php
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" style="border: none"></td>
							<th>Berat</th>
							<td class="text-center"><?php echo number_format($i['invoice_berat']); ?> gram</td>
						</tr>
						<tr>
							<td colspan="5" style="border: none"></td>
							<th>Total Belanja</th>
							<td class="text-center"><?php echo "Rp. " . number_format($total) . " ,-"; ?></td>
						</tr>
						<tr>
							<td colspan="5" style="border: none"></td>
							<th>Ongkir (<?php echo $i['invoice_kurir'] ?>)</th>
							<td class="text-center"><?php echo "Rp. " . number_format($i['invoice_ongkir']) . " ,-"; ?></td>
						</tr>
						<tr>
							<td colspan="5" style="border: none"></td>
							<th>Total Bayar</th>
							<td class="text-center"><?php echo "Rp. " . number_format($i['invoice_total_bayar']) . " ,-"; ?></td>
						</tr>
					</tfoot>
				</table>


				<h5>STATUS :</h5>
				<?php
				if ($i['invoice_status'] == 0) {
					echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
				} elseif ($i['invoice_status'] == 1) {
					echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
				} elseif ($i['invoice_status'] == 2) {
					echo "<span class='label label-danger'>Ditolak / Dibatalkan</span>";
				} elseif ($i['invoice_status'] == 3) {
					echo "<span class='label label-primary'>Dikonfirmasi & Sedang Diproses</span>";
				} elseif ($i['invoice_status'] == 4) {
					echo "<span class='label label-warning'>Dikirim</span>";
				} elseif ($i['invoice_status'] == 5) {
					echo "<span class='label label-success'>Diterima</span>";
				}
				?>

				<br>
				<br>
				<br>
				<?php
				$total_refund = 0;
				$refunds = mysqli_query($koneksi, "SELECT r.*, p.produk_nama, t.ukuran, t.transaksi_harga 
									 FROM refund r
									 JOIN produk p ON r.produk_id = p.produk_id 
									 JOIN transaksi t ON r.invoice_id = t.transaksi_invoice 
									 AND r.produk_id = t.transaksi_produk 
									 AND r.ukuran = t.ukuran
									 WHERE r.invoice_id='$id_invoice'");

				if (mysqli_num_rows($refunds) > 0) {
				?>

					<h4>Detail Refund</h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center" width="1%">NO</th>
									<th>Produk</th>
									<th class="text-center">Ukuran</th>
									<th class="text-center">Harga</th>
									<th class="text-center">Jumlah Refund</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								while ($r = mysqli_fetch_array($refunds)) {
									if ($r['status'] == 1) {
										$total_refund += $r['jumlah'] * $r['transaksi_harga'];
									}
								?>
									<tr>
										<td class="text-center"><?php echo $no++; ?></td>
										<td><?php echo $r['produk_nama']; ?></td>
										<td class="text-center"><?php echo isset($r['ukuran']) ? $r['ukuran'] : 'N/A'; ?></td>
										<td class="text-center"><?php echo "Rp. " . number_format($r['transaksi_harga']) . ",-"; ?></td>
										<td class="text-center"><?php echo number_format($r['jumlah']); ?></td>
										<td class="text-center">
											<?php
											if ($r['status'] == 0) {
												echo "<span class='label label-default'>Diajukan</span>";
											} elseif ($r['status'] == 1) {
												echo "<span class='label label-success'>Disetujui</span>";
											} elseif ($r['status'] == 2) {
												echo "<span class='label label-danger'>Ditolak</span>";
											}
											?>
										</td>
									</tr>
							<?php
								}
							}
							?>
							</tbody>

							<tfoot>
								<?php if ($total_refund > 0) { ?>
									<tr>
										<td colspan="4" style="border: none"></td>
										<th>Total Refund</th>
										<td class="text-center"><?php echo "Rp. " . number_format($total_refund) . " ,-"; ?></td>
									</tr>
								<?php } ?>
							</tfoot>
						</table>
					</div>

			</div>


		<?php
		}
		?>
	</div>


	<script>
		window.print();
	</script>
</body>

</html>