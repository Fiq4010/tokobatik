<?php
include '../koneksi.php';
if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $modal=100000;
              $keluar=0;            
              $kata='INVOICE-00';
}
// memanggil library FPDF
require('../library/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Laporan Penjualan Toko Online Batik Gems',0,1,'C');
$pdf->Cell(8,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,7,'Dari Tanggal         :  '.$tgl_dari,0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,7,'Sampai Tanggal   :  '.$tgl_sampai,0,1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Invoice',1,0,'C');
$pdf->Cell(30,6,'Tanggal Masuk',1,0,'C');
$pdf->Cell(55,6,'Nama Customer',1,0,'C');
$pdf->Cell(27,6,'Harga',1,0,'C');
$pdf->Cell(50,6,'Status',1,1,'C');


$pdf->SetFont('Arial','',10);


$data = mysqli_query($koneksi,"SELECT * FROM invoice,customer WHERE invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
while ($row = mysqli_fetch_array($data)){
    $date=$row['invoice_status'];
    $keluar += $row['invoice_total_bayar'];
    $total = $keluar-$modal;
    $uang=number_format($row['invoice_total_bayar']);
    $pdf->Cell(30,6,$kata.$row['invoice_id'],1,0,'C');
    $pdf->Cell(30,6,$row['invoice_tanggal'],1,0,'C');
    $pdf->Cell(55,6,$row['invoice_nama'],1,0);
    $pdf->Cell(27,6,'Rp.'.$uang.',-',1,0);
    if($date=="0")
    {
    $pdf->Cell(50,6,'Menunggu Pembayaran' ,1,1);
    }
    if($date=="1")
    {
    $pdf->Cell(50,6,'Menunggu Konfirmasi' ,1,1);
    }
    if($date=="2")
    {
    $pdf->Cell(50,6,'Ditolak / Dibatalkan' ,1,1);
    }
    if($date=="3")
    {
    $pdf->Cell(50,6,'Dikonfirmasi & Diproses' ,1,1);
    }
    if($date=="4")
    {
    $pdf->Cell(50,6,'Dikirim' ,1,1);
    }
    if($date=="5")
    {
    $pdf->Cell(50,6,'Diterima' ,1,1);
    }
    
    
}
    $pdf->Ln();
    $pdf->Cell(25,5,"Total               :   ".'Rp.'.number_format($keluar).',-',0,0,'L');
    $pdf->Ln();
    $pdf->Cell(25,5,"Modal             :   ".'Rp.'.number_format($modal).',-',0,0,'L');
    $pdf->Ln();
    $pdf->Cell(25,5,"Keuntungan   :   ".'Rp.'.number_format($total).',-',0,0,'L');
$pdf->Output();
?>