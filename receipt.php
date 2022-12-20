<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: Home.php");
}
require("connect.php");
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'STRUK PEMBELIAN GAME',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'STUNT',0,1,'C');
$pdf->Cell(190,7,date('l jS \of F Y h:i:s A'),0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'No.',1,0);
$pdf->Cell(85,6,'Nama Game',1,0);
$pdf->Cell(27,6,'Harga',1,0);

$pdf->SetFont('Arial','',10);

$query = mysqli_query($conn, "select * from usercart uc join games g where g.id_game = uc.id_game and uc.id_user = ".$_SESSION['id']." and status = 0;");
$i = 1;
$pdf->Cell(10,7,'',0,1);
$total = 0;
while ($row = mysqli_fetch_array($query)){
    if ($row['harga'] !== 'Free') $total += $row['harga'];
    $pdf->Cell(20,6,$i++,1,0);
    $pdf->Cell(85,6,$row['nama'],1,0);
    $pdf->Cell(27,6,$row['harga'],1,0);
    $pdf->Cell(10,7,'',0,1);
}
$pdf->Cell(105,6,'Total',1,0);
$pdf->Cell(27,6,"IDR ".$total,1,0);

$pdf->Output();
?>