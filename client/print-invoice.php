<?php
include "../connect.php";
require './invoice/fpdf.php';
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'INVOICE SIPALING LAUNDRY', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'Tanggal : ' . date('d-m-Y'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 7, 'Jl. Raya Cibaduyut No. 1, Cibaduyut, Kec. Cibiru, Bandung, Jawa Barat 40614', 0, 1, 'C');
$pdf->Cell(190, 7, 'Telp. 022-203-1234', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'No', 1, 0);
$pdf->Cell(25, 6, 'Tanggal', 1, 0);
$pdf->Cell(65, 6, 'Nama', 1, 0);
$pdf->Cell(27, 6, 'Berat', 1, 0);
$pdf->Cell(25, 6, 'Total', 1, 1);
$pdf->SetFont('Arial', '', 10);
$query = mysqli_query($koneksi, "SELECT * FROM transaksi");
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(10, 6, $no, 1, 0);
    $pdf->Cell(25, 6, $row['tanggal_transaksi'], 1, 0);
    $pdf->Cell(65, 6, $row['nama_customer'], 1, 0);
    $pdf->Cell(27, 6, $row['berat'], 1, 0);
    $pdf->Cell(25, 6, $row['total_transaksi'], 1, 1);
    $no++;
}
$pdf->Output('I', 'Invoice.pdf');
?>

