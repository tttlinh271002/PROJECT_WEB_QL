<div class="menu_dask">
<?php
    $sql_sua_danhsachnv = "SELECT * FROM proj_danhsachnv WHERE id_nv='$_GET[idnhanvien]' LIMIT 1";
    $query_sua_danhsachnv = mysqli_query($mysqli,$sql_sua_danhsachnv);
?>
<h3>SỬA DANH SÁCH NHÂN VIÊN</h3>
<div class ="them">
  <a href="index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<form method="POST" action="pages/admincp1/modules/quanlydanhsachnv/xuly.php?idnhanvien=<?php echo $_GET['idnhanvien'] ?>" enctype="multipart/form-data">
<?php
    while($dong = mysqli_fetch_array($query_sua_danhsachnv)){
?>
  <div class ="table_left" style="margin-bottom: 0;">
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
        <td>Email:</td>
        <td><input type="text" value="<?php echo $dong['email_nv'] ?>" name ="email"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right" style="margin-bottom: 0; margin-top: 10px">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Chức vụ:</td></br>
        <td>
          <select name ="chucvu">
            <?php
            if($dong['chucvu']==0) {
            ?>
            <option value="0" selected>Nhân viên</option>
            <option value="1">Phó phòng</option>
            <option value="2">Trưởng phòng</option>
            <option value="3">Giám đốc</option>
            <?php
            }elseif($dong['chucvu']==1){
            ?>
            <option value="0">Nhân viên</option>
            <option value="1" selected>Phó phòng</option>
            <option value="2">Trưởng phòng</option>
            <option value="3">Giám đốc</option>
            <?php
            }elseif($dong['chucvu']==2){
            ?>
            <option value="0">Nhân viên</option>
            <option value="1">Phó phòng</option>
            <option value="2" selected>Trưởng phòng</option>
            <option value="3">Giám đốc</option>
            <?php
            }else{
              ?>
              <option value="0">Nhân viên</option>
              <option value="1">Phó phòng</option>
              <option value="2">Trưởng phòng</option>
              <option value="3" selected>Giám đốc</option>
              <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="file_top">Phòng ban:</td>
        <td  class="file_top"><input type="text" value="<?php echo $dong['phong'] ?>" name ="phong"></td>
      </tr>
      <tr>
        <td class="file_top">Bằng cấp:</td>
        <td class="file_top">
          <select name ="bangcap">
            <?php
            if($dong['trinhdo']==0) {
            ?>
            <option value="0" selected>Đại học</option>
            <option value="1">Thạc sĩ</option>
            <option value="2">Tiến sĩ</option>
            <?php
            }elseif($dong['trinhdo']==1){
            ?>
            <option value="0">Đại học</option>
            <option value="1" selected>Thạc sĩ</option>
            <option value="2">Tiến sĩ</option>
            <?php
            }else{
            ?>
            <option value="0">Đại học</option>
            <option value="1">Thạc sĩ</option>
            <option value="2" selected>Tiến sĩ</option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div class="anh">
      <td>Ảnh:</td>
      <td>
        <input class="file_top" type="file" name ="anh">
        <img class="file_top" src="images/<?php echo $dong['images_nv'] ?>" style="margin-top: 5px; width: 120px; height: 130px;">
      </td>
  </div>
  <div style="text-align: center;"><input type="submit" name="suanhanvien" value ="Sửa danh sách nhân viên" onclick="alert('Sửa danh sách thành công')"></div>
<?php
    }
?>
</form>
</div>