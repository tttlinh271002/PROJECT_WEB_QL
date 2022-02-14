<div class="menu_dask">
<?php
    $sql_sua_phancap = "SELECT * FROM proj_phancap WHERE chucvu='$_GET[idchucvu]' LIMIT 1";
    $query_sua_phancap = mysqli_query($mysqli,$sql_sua_phancap);
?>
<h3>SỬA PHÂN CẤP CHỨC VỤ</h3>
<div class ="them">
  <a href="index.php?quanly=phancapchucvu&action=quanlyphancap&query=them">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<div style="text-align: center;">
<form method="POST" action="pages/admincp6/modules/phancapcv/xuly.php?idchucvu=<?php echo $_GET['idchucvu'] ?>">
<?php
    while($dong = mysqli_fetch_array($query_sua_phancap)){
?>
  <div class ="table_left">
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
        <td class="file_top">Lương cứng:</td>
        <td class="file_top"><input type="text" value="<?php echo $dong['luongcung'] ?>" name ="luongcung"></td>
      </tr>
      <tr>
        <td>Lương thưởng chuẩn:</td></br>
        <td><input type="text" value="<?php echo $dong['thuongchuan'] ?>" name ="thuongchuan"></td>
      </tr>
    </table>
  </div>
  <div class ="table_right">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Chỉ tiêu(thẻ):</td>
        <td><input type="text" value="<?php echo $dong['the'] ?>" name ="the"></td>
      </tr>
      <tr>
        <td>Chỉ tiêu(tiết kiệm):</td>
        <td><input type="text" value="<?php echo $dong['tietkiem'] ?>" name ="tietkiem"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div><input type="submit" name="suanhanvien" onclick="alert('Sửa thông tin thành công')" value ="Sửa phân cấp" ></div>
<?php
    }
?>
</form>
</div>
</div>
