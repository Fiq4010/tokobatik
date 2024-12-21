<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Refund Dana
      <small>Data Refund Dana</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Refund Dana / Pengembalian Dana</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th width="15%">NAMA PRODUK</th>
                    <th>JUMLAH</th>
                    <th>TANGGAL REFUND</th>
                    <th>CUSTOMER</th>
                    <th>ALASAN</th>
                    <th>STATUS</th>
                    <th>UPDATE STATUS</th>
                    <th>HARGA PRODUK</th>
                    <th class="text-center">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $refunds = mysqli_query($koneksi, "
                    SELECT r.*, c.customer_nama, t.transaksi_jumlah, p.produk_nama, p.produk_harga, i.invoice_id, i.invoice_status, i.invoice_total_bayar, t.ukuran
                    FROM refund r
                    JOIN invoice i ON r.invoice_id = i.invoice_id
                    JOIN customer c ON i.invoice_customer = c.customer_id
                    JOIN transaksi t ON r.invoice_id = t.transaksi_invoice AND r.ukuran = t.ukuran
                    JOIN produk p ON t.transaksi_produk = p.produk_id
                    WHERE r.produk_id= t.transaksi_produk
                    ORDER BY r.created_at DESC
                  ");
                  while ($r = mysqli_fetch_array($refunds)) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $r['produk_nama'] ?></td>
                      <td class="text-center"><?php echo $r['jumlah'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($r['created_at'])); ?></td>
                      <td><?php echo $r['customer_nama'] ?></td>
                      <!-- <td><?php echo "Rp. " . number_format($r['invoice_total_bayar']) . " ,-" ?></td> -->
                      <td style="max-width: 175px; word-wrap: break-word;"><?php echo $r['alasan'] ?></td>
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
                      <td class="text-center">
                        <form action="refund_status.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                          <select class="form-control" name="status" onchange="this.form.submit()">
                            <option <?php if ($r['status'] == 0) echo "selected='selected'"; ?> value="0">Diajukan</option>
                            <option <?php if ($r['status'] == 1) echo "selected='selected'"; ?> value="1">Disetujui</option>
                            <option <?php if ($r['status'] == 2) echo "selected='selected'"; ?> value="2">Ditolak</option>
                          </select>
                        </form>
                      </td>

                      <td><?php echo "Rp. " . number_format($r['produk_harga']) . " ,-" ?></td> <!-- Menampilkan harga produk yang di-refund -->
                      <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#buktiRefund_<?php echo $r['id']; ?>">
                          <i class="fa fa-search"></i> Lihat Bukti
                        </button>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data refund dana ini?')" href="refund_dana_hapus.php?id=<?php echo $r['id'] ?>"><i class="fa fa-trash"></i></a>

                        <div class="modal fade" id="buktiRefund_<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Bukti Refund</h4>
                              </div>
                              <div class="modal-body">
                                <center>
                                  <?php
                                  if ($r['bukti'] == "") {
                                    echo "Bukti refund belum diupload oleh customer.";
                                  } else {
                                  ?>
                                    <img src="../gambar/bukti_refund/<?php echo ($r['bukti']); ?>" alt="Bukti Refund" style="width: 100%">
                                  <?php
                                  }
                                  ?>
                                </center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
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
      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>