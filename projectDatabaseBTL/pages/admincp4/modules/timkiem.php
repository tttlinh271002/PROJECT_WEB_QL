<div class="menu_dask">

<?php
  $begin = $_GET['trang'];
  if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
  }
    $sql_lietke_luongnv = "SELECT p1.id_nv, p1.name_nv, p2.the,p2.tietkiem,p2.luongcung,p2.thuongchuan,
    (SELECT SUM(amount_gd) AS ma FROM proj_thongtinkh WHERE giaodich='0' AND id_nv=p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) thec,
    (SELECT SUM(amount_gd) AS amount FROM proj_thongtinkh WHERE giaodich='1' AND id_nv = p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) tien,
    (SELECT IF(thec IS NULL, 0, thec)) the_nv,
    (SELECT IF(tien IS NULL, 0, tien)) tientk,
    (SELECT(CAST(((the_nv/p2.the)*0.5 + (tientk/p2.tietkiem)*0.5)*p2.thuongchuan as int))) thuongt,
    (SELECT IF(thuongt IS NULL, 0, thuongt)) thuong,
    (SELECT(CAST((thuong + p2.luongcung)as int))) tong_luong
    FROM proj_danhsachnv p1 INNER JOIN proj_phancap p2 ON p1.chucvu=p2.chucvu WHERE p1.id_nv LIKE '%".$tukhoa."%' OR p1.name_nv LIKE '%".$tukhoa."%'
    ORDER BY p1.id_nv ASC";

    $query_lietke_luongnv = mysqli_query($mysqli,$sql_lietke_luongnv);
    // echo "<div>THÁNG $begin</div>";
?>



<h3>DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="tk">
    <div class ="dropdown">
        <a class="dropbtn">THÁNG <?php echo $_GET['trang'] ?></a>
    </div>
    <div class ="quaylai">
        <a href="index.php?quanly=luongnhanvien&trang=<?php echo $_GET['trang'] ?>"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
</div>

<!-- <div class="pagination">
  <a href="#" class="active">Home</a>
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
</div> -->

<!-- <td>
          <select name ="chucvu">
            <option value="0">Nhân viên</option>
            <option value="1">Phó phòng</option>
            <option value="2">Trưởng phòng</option>
            <option value="3">Giám đốc</option>
          </select>
        </td> -->

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:" >STT</th>
    <th style="width:" >Mã nhân viên</th>
    <th style="width:" >Tên nhân viên</th>
    <th style="width:" >Lương cứng(vnđ)</th>
    <th style="width:" >Lương thưởng(vnđ)</th>
    <th style="width:" >Tổng lương(vnđ)</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_luongnv)) {
      $i++;
  ?>
  <tr class ="hangcot1">
      <td class ="thaydoi"><?php echo $i ?></td>
      <td><?php echo $row['id_nv'] ?></td>
      <td><?php echo $row['name_nv'] ?></td>
      <td><?php echo number_format($row['luongcung'],0,',','.'); ?></td>
      <td><?php echo number_format($row['thuong'],0,',','.'); ?></td>
      <td><?php echo number_format($row['tong_luong'],0,',','.'); ?></td>
  </tr>
<?php
}
?>
</table>
</div>


