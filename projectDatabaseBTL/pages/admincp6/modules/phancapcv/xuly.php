<?php
include('../../config/connect.php');

$chucvu = $_POST['chucvu'];
$luongcung = $_POST['luongcung'];
$thuongchuan = $_POST['thuongchuan'];
$the = $_POST['the'];
$tietkiem = $_POST['tietkiem'];
if(isset($_POST['themnhanvien'])){
    $sql_them = "INSERT INTO proj_phancap(chucvu, luongcung, thuongchuan, the, tietkiem) 
    VALUE('".$chucvu."','".$luongcung."','".$thuongchuan."','".$the."','".$tietkiem."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../../../index.php?quanly=phancapchucvu&action=quanlyphancap&query=them');
}elseif(isset($_POST['suanhanvien'])){
    $sql_update = "UPDATE proj_phancap SET chucvu='".$chucvu."',luongcung='".$luongcung."',thuongchuan='".$thuongchuan."',
    the='".$the."',tietkiem='".$tietkiem."'
    WHERE chucvu='$_GET[idchucvu]'";
    mysqli_query($mysqli,$sql_update);
    header('Location:../../../../index.php?quanly=phancapchucvu&action=quanlyphancap&query=them');
}else{
    $id=$_GET['idchucvu'];
    $sql_xoa = "DELETE FROM proj_phancap WHERE chucvu='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../../../index.php?quanly=phancapchucvu&action=quanlyphancap&query=them');
}
?>