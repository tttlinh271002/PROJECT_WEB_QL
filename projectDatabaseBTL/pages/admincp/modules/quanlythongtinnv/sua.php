<div class="menu_dask">
<?php
    $sql_sua_thongtinnv = "SELECT * FROM proj_thongtinnv WHERE id_nv='$_GET[idnhanvien]' LIMIT 1";
    $query_sua_thongtinnv = mysqli_query($mysqli,$sql_sua_thongtinnv);
?>
<h3>SỬA THÔNG TIN NHÂN VIÊN</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<div style="text-align: center;">
<form method="POST" action="pages/admincp/modules/quanlythongtinnv/xuly.php?idnhanvien=<?php echo $_GET['idnhanvien'] ?>">
<?php
    while($dong = mysqli_fetch_array($query_sua_thongtinnv)){
?>
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Tên nhân viên:</td></br>
        <td><input type="text" value="<?php echo $dong['name_nv'] ?>" name ="tennhanvien"></td>
      </tr>
      <tr>
        <td>Mã nhân viên:</td>
        <td><input type="text" value="<?php echo $dong['id_nv'] ?>" name ="manhanvien"></td>
      </tr>
      <tr>
        <td>Ngày sinh:</td>
        <td><input type="text" value="<?php echo $dong['birth_nv'] ?>" name ="ngaysinh"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Số điện thoại:</td></br>
        <td><input type="text" value="<?php echo $dong['sdt_nv'] ?>" name ="sdt"></td>
      </tr>
      <tr>
        <td>CMND:</td>
        <td><input type="text" value="<?php echo $dong['cmnd_nv'] ?>" name ="cmnd"></td>
      </tr>
      <tr>
        <td>Địa chỉ:</td>
        <td><input type="text" value="<?php echo $dong['address_nv'] ?>" name ="diachi"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="suanhanvien" value ="Sửa thông tin" onclick="alert('Sửa thông tin thành công')"></div>
<?php
    }
?>
</form>
</div>
</div>