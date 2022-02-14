<?php
require('../../../tfpdf/tfpdf.php');
require('../../../connect/connect.php');

$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',15);

$pdf->SetFillColor(193,229,252);

$begin = $_GET['trang'];
$sql_lietke_luongnv = "SELECT p1.id_nv, p1.name_nv, p2.the,p2.tietkiem,p2.luongcung,p2.thuongchuan,
(SELECT COUNT(ma_gd) AS ma FROM proj_thongtinkh WHERE giaodich='0' AND id_nv=p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) thec,
(SELECT SUM(amount_gd) AS amount FROM proj_thongtinkh WHERE giaodich='1' AND id_nv = p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) tien,
(SELECT IF(thec IS NULL, 0, thec)) the_nv,
(SELECT IF(tien IS NULL, 0, tien)) tientk,
(SELECT(CAST(((the_nv/p2.the)*0.5 + (tientk/p2.tietkiem)*0.5)*p2.thuongchuan as int))) thuong,
(SELECT(CAST((thuong + p2.luongcung)as int))) tong_luong
FROM proj_danhsachnv p1 INNER JOIN proj_phancap p2 ON p1.chucvu=p2.chucvu ORDER BY p1.id_nv DESC";

    $query_lietke_luongnv = mysqli_query($mysqli,$sql_lietke_luongnv);

$pdf->Write(10,'                                                              DANH SÁCH LƯƠNG NHÂN VIÊN THÁNG '.$begin.'');
// $pdf->Write(10,'');
$pdf->Ln(10);

$width_cell=array(12,45,65,52,52,52);

$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Mã nhân viên',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Tên nhân viên',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Lương cứng(vnđ)',1,0,'C',true); 
$pdf->Cell($width_cell[4],10,'Lương thưởng(vnđ)',1,0,'C',true);
$pdf->Cell($width_cell[5],10,'Tổng lương(vnđ)',1,1,'C',true); 

$pdf->SetFillColor(235,236,236); 
$fill=false;
$i = 0;
while($row = mysqli_fetch_array($query_lietke_luongnv)){
    $i++;
$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['id_nv'],1,0,'C',$fill);
$pdf->Cell($width_cell[2],10,$row['name_nv'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,number_format($row['luongcung']),1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,number_format($row['thuong']),1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,number_format($row['tong_luong']),1,1,'C',$fill);
$fill = !$fill;

}
$pdf->Write(10,'');
$pdf->Ln(10);

$pdf->Output();
?>