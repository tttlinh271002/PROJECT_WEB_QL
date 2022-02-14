<div class="menu_dask">
<h3>LƯƠNG NHÂN VIÊN</h3>

<div class="dropdown" style="margin-bottom: 12px;">
  <button class="dropbtn">THÁNG <?php echo $_GET['trang'] ?></button>
  <div class="dropdown-content">
    <?php
    for($i=1;$i<=12;$i++){
    ?>
        <a href="index.php?quanly=luongnhanvien&trang=<?php echo $i ?>">Tháng <?php echo $i ?></a>
    <?php
    }
    ?>
  </div>
</div>
<div class="bao_dask" style="margin-bottom: 15px;">
  <div class ="chinhsua" style="border: 0; border-radius: 0;">
    <a href="pages/admincp2/modules/indanhsach.php?trang=<?php echo $_GET['trang'] ?>">In danh sách</a>
  </div>
  <div class ="dask_tk">
        <form action="index.php?quanly=luongnhanvien&trang=<?php echo $_GET['trang'] ?>&query=timkiem" method="POST">
            <input type="text" placeholder= "Tìm kiếm" name="tukhoa">
            <input type="submit" name="timkiem" value="Tìm kiếm">
        </form>
  </div>
</div>
<?php
  if(isset($_GET['trang'])){
    $page = $_GET['trang'];
  }else{
    $page = '';
  }
  if($page == ''|| $page == 1) {
    $begin = 1;
  }else{
    $begin = $page;
  }

  if(isset($_GET['so'])){
      $st = $_GET['so'];
  }else{
      $st = '';
  }
  if($st =='' || $st == 1){
    $b = 0;
  }else{
      $b = ($st-1)*10;
  }
    $sql_lietke_luongnv = "SELECT p1.id_nv, p1.name_nv, p2.the,p2.tietkiem,p2.luongcung,p2.thuongchuan,
    (SELECT SUM(amount_gd) AS ma FROM proj_thongtinkh WHERE giaodich='0' AND id_nv=p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) thec,
    (SELECT SUM(amount_gd) AS amount FROM proj_thongtinkh WHERE giaodich='1' AND id_nv = p1.id_nv AND MONTH(tg)=$begin GROUP BY id_nv) tien,
    (SELECT IF(thec IS NULL, 0, thec)) the_nv,
    (SELECT IF(tien IS NULL, 0, tien)) tientk,
    (SELECT(CAST(((the_nv/p2.the)*0.5 + (tientk/p2.tietkiem)*0.5)*p2.thuongchuan as int))) thuongt,
    (SELECT IF(thuongt IS NULL, 0, thuongt)) thuong,
    (SELECT(CAST((thuong + p2.luongcung)as int))) tong_luong
    FROM proj_danhsachnv p1 INNER JOIN proj_phancap p2 ON p1.chucvu=p2.chucvu ORDER BY p1.id_nv ASC LIMIT $b,10";

    $query_lietke_luongnv = mysqli_query($mysqli,$sql_lietke_luongnv);

  // echo"THÁNG $page";
?>

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

<?php
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_danhsachnv");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count/10);
?>
  <ul class="list_trang">
      <?php
      for($j=1;$j<=$trang;$j++){
      ?>
          <li><a href="index.php?quanly=luongnhanvien&trang=<?php echo $_GET['trang'] ?>&so=<?php echo $j ?>"><?php echo $j ?></a></li>
      <?php
      }
      ?>
  </ul>
</div>


