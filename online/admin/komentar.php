<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Komentar Customer
      <small>Data Komentar Customer</small>
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
            <h3 class="box-title">Komentar</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>CUSTOMER</th>
                    <th>PRODUK</th>
                    <th>TANGGAL</th>
                    <th>KOMENTAR</th>
                    <th>BINTANG</th>
                    <th class="text-center">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $komentar = mysqli_query($koneksi, "
                    SELECT k.*, c.customer_nama, p.produk_nama
                    FROM komentar k
                    JOIN customer c ON k.customer_id = c.customer_id
                    JOIN produk p ON k.produk_id = p.produk_id
                    ORDER BY k.komentar_id DESC
                  ");
                  while($k = mysqli_fetch_array($komentar)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $k['customer_nama'] ?></td>
                      <td><?php echo $k['produk_nama'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($k['komentar_timestamp'])); ?></td>
                      <td style="max-width: 200px; word-wrap: break-word;"><?php echo $k['komentar_teks'] ?></td>
                      <td class="text-center">
                        <?php for($i = 0; $i < 5; $i++) {
                          if($i < $k['bintang']) {
                            echo '<i class="fa fa-star"></i>';
                          } else {
                            echo '<i class="fa fa-star-o"></i>';
                          }
                        } ?>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus komentar ini?')" href="komentar_hapus.php?id=<?php echo $k['komentar_id'] ?>"><i class="fa fa-trash"></i></a>
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
