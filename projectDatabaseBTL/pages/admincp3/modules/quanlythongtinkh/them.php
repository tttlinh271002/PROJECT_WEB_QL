<div class="menu_them">
<h3>THÊM THÔNG TIN KHÁCH HÀNG</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinkhachhang">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<div style="text-align: center;">
<form method="POST" action="pages/admincp3/modules/quanlythongtinkh/xuly.php">
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Mã khách hàng:</td></br>
        <td><input type="text" name ="makh"></td>
      </tr>
      <tr>
        <td class="file_top">Loại giao dịch:</td>
        <td class="file_top">
          <select name ="gd">
            <option value="0">Thẻ</option>
            <option value="1">Tiết kiệm</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="file_top">Mã giao dịch:</td>
        <td class="file_top"><input type="text" name ="magd"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right" style="width: 37%; margin-top: 0;">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Số lượng:</td></br>
        <td><input type="text" name ="sl"></td>
      </tr>
      <tr>
        <td>Nhân viên phụ trách:</td>
        <td><input type="text" name ="nv"></td>
      </tr>
      <tr>
        <td>Thời gian:</td>
        <td><input type="text" name ="tg"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="themnhanvien" value ="Thêm thông tin khách hàng" onclick="alert('Thêm thông tin thành công')"></div>
</form>
</div>
</div>