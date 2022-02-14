<?php
include('../../config/connect.php');

$maphong = $_POST['maphong'];
$tenphong = $_POST['tenphong'];
$diachi = $_POST['diachi'];
$tgphong = $_POST['tgphong'];
if(isset($_POST['themnhanvien'])){
    $sql_them = "INSERT INTO proj_phongban(id_phong, name_phong, address_phong, tg_phong) 
    VALUE('".$maphong."','".$tenphong."','".$diachi."','".$tgphong."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../../../index.php?quanly=thongtinphongban&action=quanlyphongban&query=them');
}elseif(isset($_POST['suanhanvien'])){
    $sql_update = "UPDATE proj_phongban SET id_phong='".$maphong."',name_phong='".$tenphong."',address_phong='".$diachi."',
    tg_phong='".$tgphong."'
    WHERE id_phong='$_GET[idphongban]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../../../index.php?quanly=thongtinphongban&action=quanlyphongban&query=them');
}else{
    $id=$_GET['idphongban'];
    $sql_xoa = "DELETE FROM proj_phongban WHERE id_phong='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../../../index.php?quanly=thongtinphongban&action=quanlyphongban&query=them');
}
?>