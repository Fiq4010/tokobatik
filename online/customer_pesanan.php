<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Pesanan Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">

			<?php
			include 'customer_sidebar.php';
			?>

			<div id="main" class="col-md-9">

				<h4>PESANAN</h4>

				<div id="store">
					<div class="row">

						<div class="col-lg-14">

							<?php
							if (isset($_GET['alert'])) {
								if ($_GET['alert'] == "gagal") {
									echo "<div class='alert alert-danger'>Gambar gagal diupload!</div>";
								} elseif ($_GET['alert'] == "sukses") {
									echo "<div class='alert alert-success'>Pesanan berhasil dibuat, silahkan melakukan pembayaran!</div>";
								} elseif ($_GET['alert'] == "upload") {
									echo "<div class='alert alert-success'>Konfirmasi pembayaran berhasil tersimpan, silahkan menunggu konfirmasi dari admin!</div>";
								} elseif ($_GET['alert'] == "refund") {
									echo "<div class='alert alert-success'>Permintaan refund berhasil dikirim, silahkan menunggu konfirmasi dari admin!</div>";
								} elseif ($_GET['alert'] == "komentar") {
									echo "<div class='alert alert-success'>Komentar anda berhasil dikirim!</div>";
								}
							}
							?>

							<small class="text-muted">
								Semua data pesanan / invoice anda.
							</small>

							<br />
							<br />


							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th class="text-center">NO</th>
											<th>No.Invoice</th>
											<th>Tanggal</th>
											<th>Nama Penerima</th>
											<th>Total Bayar</th>
											<th class="text-center">Status</th>
											<th class="text-center">OPSI</th>
											<!-- <th class="text-center">Coba</th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$id = $_SESSION['customer_id'];
										$invoice_query = "
										SELECT i.*, r.status AS refund_status 
										FROM invoice i 
										LEFT JOIN refund r ON i.invoice_id = r.invoice_id 
										WHERE i.invoice_customer='$id'
										GROUP BY i.invoice_id 
										ORDER BY i.invoice_id DESC";
										$invoice = mysqli_query($koneksi, $invoice_query);
										while ($i = mysqli_fetch_array($invoice)) {
										?>
											<?php

											?>
											<tr>
												<td class="text-center""><?php echo $no++ ?></td>
												<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
												<td><?php echo $i['invoice_tanggal'] ?></td>
												<td><?php echo $i['invoice_nama'] ?></td>
												<td><?php echo "Rp. " . number_format($i['invoice_total_bayar']) . " ,-" ?></td>
												<td class=" text-center">
													<?php
													if ($i['invoice_status'] == 0) {
														echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
													} elseif ($i['invoice_status'] == 1) {
														echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
													} elseif ($i['invoice_status'] == 2) {
														echo "<span class='label label-danger'>Ditolak / Dibatalkan</span>";
													} elseif ($i['invoice_status'] == 3) {
														echo "<span class='label label-primary'>Dikonfirmasi & Diproses</span>";
													} elseif ($i['invoice_status'] == 4) {
														echo "<span class='label label-warning'>Dikirim</span>";
													} elseif ($i['invoice_status'] == 5) {
														echo "<span class='label label-success'>Diterima</span>";
													}
													?>
												</td>
												<td class="text-center">
													<a class='btn btn-sm btn-success' href="customer_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a>
													<?php
													if ($i['invoice_status'] == 0) {
													?>
														<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Bayar</a>
														<a class='btn btn-sm btn-danger' href="customer_batalkan.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-trash"></i> Batalkan Pesanan</a>
													<?php
													}
													?>
													<?php
													if ($i['invoice_status'] == 2) {
													?>
														<a class='btn btn-sm btn-danger' href="customer_beli-lagi.php?id_invoice=<?php echo $i['invoice_id']; ?>"><i class="fa fa-undo"></i> Beli Lagi</a>
													<?php
													}
													?>
													<?php
													if ($i['invoice_status'] == 4) {
													?>
														<a class='btn btn-sm btn-warning' href="javascript:void(0);" onclick="confirmReceive(<?php echo $i['invoice_id']; ?>)">
															<i class="fa fa-check"></i> Diterima
														</a>
													<?php
													}
													?>
																										<?php
													if ($i['invoice_status'] == 5) {
													?>
														<a class='btn btn-sm btn-primary' href="customer_komentar.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-comment"></i> Komentar</a>
													<?php
													}
													?>

													<?php
														// Cek refund status
														if ($i['invoice_status'] == 5) {
															if ($i['refund_status'] == 1 || $i['refund_status'] == 2) {
																// Menampilkan tombol refund dengan alert saat ditekan
																echo "<a class='btn btn-sm btn-danger' href='javascript:void(0);' onclick='alertRefund()'><i class='fa fa-undo'></i> Refund Dana</a>";
															} else {
																// Jika refund belum diajukan, tombol refund biasa muncul
																echo "<a class='btn btn-sm btn-danger' href='customer_refund.php?id={$i['invoice_id']}'><i class='fa fa-undo'></i> Refund Dana</a>";
															}
														}
														?>
													<!-- <?php
													if ($i['refund_status'] == 1 || $i['refund_status'] == 2) {
													?>
														<a class='btn btn-sm btn-danger' href="customer_refund.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-undo"></i> Refund Dana</a>
													<?php
													}
													?> -->
												</td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>



						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    function alertRefund() {
        alert("Anda sudah mengajukan refund untuk pesanan ini.");
    }

    function confirmReceive(invoiceId) {
        var confirmAction = confirm("Apakah Anda yakin sudah menerima barang?");
        if (confirmAction) {
            window.location.href = "customer_diterima.php?id=" + invoiceId;
        }
    }
</script>


<?php include 'footer.php'; ?>