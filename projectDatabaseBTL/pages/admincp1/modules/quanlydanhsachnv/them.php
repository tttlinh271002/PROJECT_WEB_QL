<div class="menu_them">
<h3>THÊM DANH SÁCH NHÂN VIÊN</h3>
<div class ="them" style="margin-bottom: 0">
  <a href="index.php?quanly=danhsachnhanvien">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>
<div style="text-align: center;">
<form method="POST" action="pages/admincp1/modules/quanlydanhsachnv/xuly.php" enctype="multipart/form-data">
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
        <td>Email:</td>
        <td><input type="text" name ="email"></td>
      </tr>
      <tr>
        <td class="file_top">Ảnh:</td></br>
        <td class="file_top"><input type="file" name ="anh" style="padding: 2px; margin-left: 2px;"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
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
        <td class="file_top">Phòng ban:</td>
        <td class="file_top"><input type="text" name ="phong"></td>
      </tr>
      <tr>
        <td class="file_top">Bằng cấp:</td>
        <td class="file_top">
          <select name ="bangcap">
            <option value="0">Đại học</option>
            <option value="1">Thạc sĩ</option>
            <option value="2">Tiến sĩ</option>
          </select>
        </td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="themnhanvien" value ="Thêm danh sách" onclick="alert('Thêm danh sách thành công')"></div>
</form>
</div>
</div>