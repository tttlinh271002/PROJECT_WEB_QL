<?php
include('../../config/connect.php');

$makh = $_POST['makh'];
$gd = $_POST['gd'];
$magd = $_POST['magd'];
$sl = $_POST['sl'];
$nv = $_POST['nv'];
$tg = $_POST['tg'];
if(isset($_POST['themnhanvien'])){
    $sql_them = "INSERT INTO proj_thongtinkh(id_kh, giaodich, ma_gd, amount_gd, id_nv, tg) 
    VALUE('".$makh."','".$gd."','".$magd."','".$sl."','".$nv."','".$tg."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../../../index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them');
}elseif(isset($_POST['suanhanvien'])){
    $sql_update = "UPDATE proj_thongtinkh SET id_kh='".$makh."',giaodich='".$gd."',ma_gd='".$magd."',
    amount_gd='".$sl."',id_nv='".$nv."',tg='".$tg."'
    WHERE ma_gd='$_GET[magiaodich]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../../../index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them');
}else{
    $id=$_GET['magiaodich'];
    $sql_xoa = "DELETE FROM proj_thongtinkh WHERE ma_gd='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../../../index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them');
}
?>