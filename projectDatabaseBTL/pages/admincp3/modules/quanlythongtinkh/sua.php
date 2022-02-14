<div class="menu_dask">
<?php
    $sql_sua_thongtinkh = "SELECT * FROM proj_thongtinkh WHERE ma_gd='$_GET[magiaodich]' LIMIT 1";
    $query_sua_thongtinkh = mysqli_query($mysqli,$sql_sua_thongtinkh);
?>
<h3>SỬA THÔNG TIN KHÁCH HÀNG</h3>
<div class ="them">
  <a href="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them">
    <i class="fa fa-angle-double-left"></i>Quay lại</a>
</div>

<form method="POST" action="pages/admincp3/modules/quanlythongtinkh/xuly.php?magiaodich=<?php echo $_GET['magiaodich'] ?>">
<?php
    while($dong = mysqli_fetch_array($query_sua_thongtinkh)){
?>
  <div class ="table_left">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Mã khách hàng::</td></br>
        <td><input type="text" value="<?php echo $dong['id_kh'] ?>" name ="makh"></td>
      </tr>
      <tr>
        <td class="file_top">Loại giao dịch:</td>
        <td class="file_top">
          <select name ="gd">
            <?php
            if($dong['giaodich']==0) {
            ?>
            <option value="0" selected>Thẻ</option>
            <option value="1">Tiết kiệm</option>
            <?php
            }else{
            ?>
            <option value="0">Thẻ</option>
            <option value="1" selected>Tiết kiệm</option>
            <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="file_top">Mã giao dịch:</td>
        <td class="file_top"><input type="text" value="<?php echo $dong['ma_gd'] ?>" name ="magd"></td>
      </tr>
      
    </table>
  </div>
  <div class ="table_right" style="width: 37%; margin-top: 0;">
    <table style="border-collapse: collapse;">
      <tr>
        <td>Số lượng:</td></br>
        <td><input type="text" value="<?php echo $dong['amount_gd'] ?>" name ="sl"></td>
      </tr>
      <tr>
        <td>Nhân viên phụ trách:</td>
        <td><input type="text" value="<?php echo $dong['id_nv'] ?>" name ="nv"></td>
      </tr>
      <tr>
        <td>Thời gian:</td>
        <td><input type="text" value="<?php echo $dong['tg'] ?>" name ="tg"></td>
      </tr>
    </table>
  </div>
  <div class="clear" style="clear:both"></div>
  <div style="text-align: center;"><input type="submit" name="suanhanvien" value ="Sửa thông tin nhân viên" onclick="alert('Sửa thông tin thành công')"></div>
<?php
    }
?>
</form>