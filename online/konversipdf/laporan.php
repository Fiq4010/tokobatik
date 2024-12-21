<!DOCTYPE html>
<html>
<head>
  <title>Laporan Penjualan</title>
</head>
<body>

  <style type="text/css">
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

    
  <center>
    <h2>Laporan Penjualan Toko Online Rita Konveksi</h2>
  </center>

  <?php 
  include '../koneksi.php';
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    ?>

    <br/>

    <table class="">
      <tr>
        <td width="20%">DARI TANGGAL</td>
        <td width="1%">:</td>
        <td><?php echo $tgl_dari; ?></td>
      </tr>
      <tr>
        <td>SAMPAI TANGGAL</td>
        <td>:</td>
        <td><?php echo $tgl_sampai; ?></td>
      </tr>
    </table>

    <br/>

    <table class="table table-bordered table-striped" id="table-datatable">
      <thead>
        <tr>
          <th width="1%">NO</th>
          <th>INVOICE</th>
          <th>TANGGAL MASUK</th>
          <th>PEMBELI</th>
          <th>HARGA</th>
          <th>STATUS</th>
        </tr>

      </thead>
      <tbody>
        <?php 
              $query = "SELECT COUNT(*) AS total FROM invoice,customer WHERE invoice_total_bayar=customer_id";
              $total_jumlah = mysqli_query($koneksi, $query);
              $jumlah = mysqli_fetch_assoc($total_jumlah);
        ?>
        <?php 
        $no=1;
        $modal = 100000;
        $keluar = 0;
        $data = mysqli_query($koneksi,"SELECT * FROM invoice,customer WHERE invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
        while($i = mysqli_fetch_array($data)){
        $keluar += $i['invoice_total_bayar'];
        $total = $keluar-$modal;
          ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
            <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
            <td><?php echo $i['customer_nama'] ?></td>
            <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
            <td>
              <?php 
              if($i['invoice_status'] == 0){
                echo "Menunggu Pembayaran";
              }elseif($i['invoice_status'] == 1){
                echo "Menunggu Konfirmasi";
              }elseif($i['invoice_status'] == 2){
                echo "Ditolak";
              }elseif($i['invoice_status'] == 3){
                echo "Dikonfirmasi & Sedang Diproses";
              }elseif($i['invoice_status'] == 4){
                echo "Selesai Dikirim";
              }
              ?>
            </td>
          </tr>
          <?php 
        }
        ?>
        
      </tbody>
      <tfoot>
           <tr>
              <td colspan="4" style="border: none"></td>
              <th>Total Keseluruhan</th>
              <td><?php echo "Rp. ".number_format($keluar)." ,-" ?></td>
            </tr>
             <tr>
              <td colspan="4" style="border: none"></td>
              <th>Modal Awal</th>
              <td><?php echo "Rp. ".number_format($modal)." ,-" ?></td>
            </tr>
            <tr>
              <td colspan="4" style="border: none"></td>
              <th>Keuntungan</th>
              <td><?php echo "Rp. ".number_format($total)." ,-" ?></td>
            </tr>
          </tfoot>
    </table>
    <h2><th>Total keseluruhaan</th> <?php echo "Rp. ".number_format($total)." ,-" ?></h2>
    <?php 
  }else{
    ?>

    <div class="alert alert-info text-center">
      Silahkan Filter Laporan Terlebih Dulu.
    </div>

    <?php
  }
  ?>
</body>

<script>
</script>
</html>
<?php
//SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF

    $content = ob_get_clean();
    require_once(dirname(__FILE__).'./html2pdf/html2pdf.class.php');
    try
    {
       $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
       $html2pdf->pdf->SetDisplayMode('fullpage');
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
       $html2pdf->Output('laporan.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>