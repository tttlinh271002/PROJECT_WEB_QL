<?php
include('../../config/connect.php');

$tennhanvien = $_POST['tennhanvien'];
$manhanvien = $_POST['manhanvien'];
$email = $_POST['email'];
$chucvu = $_POST['chucvu'];
$phong = $_POST['phong'];
$bangcap = $_POST['bangcap'];
//xử lý hình ảnh
$anh = $_FILES['anh']['name'];
$anh_tmp = $_FILES['anh']['tmp_name'];
$anh = time().'_'.$anh;

if(isset($_POST['themnhanvien'])){
    $sql_them = "INSERT INTO proj_danhsachnv(name_nv, id_nv, email_nv, images_nv, chucvu, phong, trinhdo) 
    VALUE('".$tennhanvien."','".$manhanvien."','".$email."','".$anh."','".$chucvu."','".$phong."','".$bangcap."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($anh_tmp,'../../../../images/'.$anh);
    header('Location:../../../../index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them');
}elseif(isset($_POST['suanhanvien'])){
    //sua
    if($anh!=''){
        move_uploaded_file($anh_tmp,'../../../../images/'.$anh);
        $sql = "SELECT * FROM proj_danhsachnv WHERE id_nv = '$_GET[idnhanvien]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('../../../../images/'.$row['images_nv']);
        }
        $sql_update = "UPDATE proj_danhsachnv SET name_nv='".$tennhanvien."',id_nv='".$manhanvien."', images_nv='".$anh."', email_nv='".$email."',
        chucvu='".$chucvu."',phong='".$phong."',trinhdo='".$bangcap."'
        WHERE id_nv='$_GET[idnhanvien]'";
    }else{
        $sql_update = "UPDATE proj_danhsachnv SET name_nv='".$tennhanvien."',id_nv='".$manhanvien."', email_nv='".$email."',
        chucvu='".$chucvu."',phong='".$phong."',trinhdo='".$bangcap."'
        WHERE id_nv='$_GET[idnhanvien]'";
    }
    mysqli_query($mysqli,$sql_update);
    header('Location:../../../../index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them');
}else{
    $id=$_GET['idnhanvien'];
    $sql = "SELECT * FROM proj_danhsachnv WHERE id_nv = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)) {
        unlink('../../../../images/'.$row['images_nv']);
    }
    $sql_xoa = "DELETE FROM proj_danhsachnv WHERE id_nv='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../../../index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them');
}
?>