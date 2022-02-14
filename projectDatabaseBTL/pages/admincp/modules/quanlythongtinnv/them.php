<div class="menu_them">
<h3>THÊM THÔNG TIN NHÂN VIÊN</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinnhanvien">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>
<div style="text-align: center;">
<form method="POST" action="pages/admincp/modules/quanlythongtinnv/xuly.php">
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Tên nhân viên:</td></br>
        <td><input type="text" name ="tennhanvien"></td>
      </tr>
      <tr>
        <td>Mã nhân viên:</td>
        <td><input type="text" name ="manhanvien"></td>
      </tr>
      <tr>
        <td>Ngày sinh:</td>
        <td><input type="text" name ="ngaysinh"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Số điện thoại:</td></br>
        <td><input type="text" name ="sdt"></td>
      </tr>
      <tr>
        <td>CMND:</td>
        <td><input type="text" name ="cmnd"></td>
      </tr>
      <tr>
        <td>Địa chỉ:</td>
        <td><input type="text" name ="diachi"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="themnhanvien" value ="Thêm thông tin" onclick="alert('Thêm thông tin thành công')"></div>
</form>
</div>
</div>