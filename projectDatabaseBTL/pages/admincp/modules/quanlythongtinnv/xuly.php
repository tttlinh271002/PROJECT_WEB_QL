<?php
include('../../config/connect.php');

$tennhanvien = $_POST['tennhanvien'];
$manhanvien = $_POST['manhanvien'];
$ngaysinh = $_POST['ngaysinh'];
$sdt = $_POST['sdt'];
$cmnd = $_POST['cmnd'];
$diachi = $_POST['diachi'];
if(isset($_POST['themnhanvien'])){
    $sql_them = "INSERT INTO proj_thongtinnv(name_nv, id_nv, birth_nv, sdt_nv, cmnd_nv, address_nv) 
    VALUE('".$tennhanvien."','".$manhanvien."','".$ngaysinh."','".$sdt."','".$cmnd."','".$diachi."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../../../index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them');
}elseif(isset($_POST['suanhanvien'])){
    $sql_update = "UPDATE proj_thongtinnv SET name_nv='".$tennhanvien."',id_nv='".$manhanvien."',birth_nv='".$ngaysinh."',
    sdt_nv='".$sdt."',cmnd_nv='".$cmnd."',address_nv='".$diachi."'
    WHERE id_nv='$_GET[idnhanvien]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../../../index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them');
}else{
    $id=$_GET['idnhanvien'];
    $sql_xoa = "DELETE FROM proj_thongtinnv WHERE id_nv='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../../../index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them');
}
?>