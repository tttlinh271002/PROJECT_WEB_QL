<div class="menu_them">
<h3>THÊM PHÂN CẤP CHỨC VỤ</h3>
<div class ="them" style="margin-bottom: 0">
  <a href="index.php?quanly=phancapchucvu">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>
<div style="text-align: center;">
<form method="POST" action="pages/admincp6/modules/phancapcv/xuly.php">
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Chức vụ:</td></br>
        <td>
          <select name ="chucvu">
            <option value="0">Nhân viên</option>
            <option value="1">Phó phòng</option>
            <option value="2">Trưởng phòng</option>
            <option value="3">Giám đốc</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="file_top">Lương cứng:</td>
        <td class="file_top"><input type="text" name ="luongcung"></td>
      </tr>
      <tr>
        <td>Lương thưởng chuẩn:</td></br>
        <td><input type="text" name ="thuongchuan"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right" style="width: 37%; margin-top: 30px;">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Chỉ tiêu(thẻ):</td>
        <td><input type="text" name ="the"></td>
      </tr>
      <tr>
        <td>Chỉ tiêu(tiết kiệm):</td>
        <td><input type="text" name ="tietkiem"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="themnhanvien" onclick="alert('Thêm thông tin thành công')" value ="Thêm phân cấp"></div>
</form>
</div>
</div>