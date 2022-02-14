<div class="menu_them">
<h3>THÊM THÔNG TIN PHÒNG BAN</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinphongban">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<div style="text-align: center;">
<form method="POST" action="pages/admincp5/modules/quanlyphongban/xuly.php">
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Mã phòng:</td></br>
        <td><input type="text" name ="maphong"></td>
      </tr>
      <tr>
        <td>Tên phòng:</td>
        <td><input type="text" name ="tenphong"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Địa chỉ:</td>
        <td><input type="text" name ="diachi"></td>
      </tr>
      <tr>
        <td>Ngày thành lập:</td>
        <td><input type="text" name ="tgphong"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="themnhanvien" value ="Thêm thông tin" onclick="alert('Thêm thông tin thành công')"></div>
</form>
</div>
</div>