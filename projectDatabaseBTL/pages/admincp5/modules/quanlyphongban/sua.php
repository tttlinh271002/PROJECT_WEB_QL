<div class="menu_dask">
<?php
    $sql_sua_phongban = "SELECT * FROM proj_phongban WHERE id_phong='$_GET[idphongban]' LIMIT 1";
    $query_sua_phongban = mysqli_query($mysqli,$sql_sua_phongban);
?>
<h3>SỬA THÔNG TIN PHÒNG BAN</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinphongban&action=quanlyphongban&query=them">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<div style="text-align: center;">
<form method="POST" action="pages/admincp5/modules/quanlyphongban/xuly.php?idphongban=<?php echo $_GET['idphongban'] ?>">
<?php
    while($dong = mysqli_fetch_array($query_sua_phongban)){
?>
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Mã phòng:</td></br>
        <td><input type="text" value="<?php echo $dong['id_phong'] ?>" name ="maphong"></td>
      </tr>
      <tr>
        <td>Tên phòng:</td>
        <td><input type="text" value="<?php echo $dong['name_phong'] ?>" name ="tenphong"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Địa chỉ:</td>
        <td><input type="text" value="<?php echo $dong['address_phong'] ?>" name ="diachi"></td>
      </tr>
      <tr>
        <td>Ngày thành lập:</td>
        <td><input type="text" value="<?php echo $dong['tg_phong'] ?>" name ="tgphong"></td>
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