<div class="menu_dask">
<h3>THÀNH TÍCH NHÂN VIÊN</h3>
<!-- <a href="index.php?quanly=thanhtichnhanvien&action=quanlythanhtichnhanvien&query=them">Chỉnh sửa thông tin nhân viên</a> -->

<div class="trangtk">
  <div class="dropdown">
    <button class="dropbtn">THÁNG <?php echo $_GET['trang'] ?></button>
    <div class="dropdown-content">
      <?php
      for($i=1;$i<=12;$i++){
      ?>
          <a href="index.php?quanly=thanhtichnhanvien&trang=<?php echo $i ?>">Tháng <?php echo $i ?></a>
      <?php
      }
      ?>
    </div>
  </div>
  <div class ="dask_tk">
      <form action="index.php?quanly=thanhtichnhanvien&trang=<?php echo $_GET['trang'] ?>&query=timkiem" method="POST">
          <input type="text" placeholder= "Tìm kiếm" name="tukhoa" style="margin-top: 9px;">
          <input type="submit" name="timkiem" value="Tìm kiếm" style="margin-top: 9px;">
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
    $sql_lietke_thanhtichnv = "SELECT id_nv, phong, chucvu,(IF(chucvu<3, chucvu+1, chucvu))AS gs,
    (SELECT id_nv FROM proj_danhsachnv WHERE chucvu = gs AND phong = p.phong) AS giamsat,
    (SELECT SUM(amount_gd) AS ma FROM proj_thongtinkh WHERE giaodich='0' AND id_nv=p.id_nv GROUP BY id_nv) thec,
    (SELECT SUM(amount_gd) AS amount FROM proj_thongtinkh WHERE giaodich='1' AND id_nv = p.id_nv GROUP BY id_nv) tientk,
    (SELECT IF(thec IS NULL, 0, thec)) the_nv,
    (SELECT IF(tientk IS NULL, 0, tientk)) tien,
    (SELECT id_nv FROM proj_thongtinkh WHERE MONTH(tg)=$begin AND id_nv = p.id_nv GROUP BY id_nv) as idchuan
    FROM proj_danhsachnv p HAVING id_nv = idchuan ORDER BY id_nv ASC LIMIT $b,10";
    $query_lietke_thanhtichnv = mysqli_query($mysqli,$sql_lietke_thanhtichnv);

    // echo "<div>THÁNG $begin</div>";
?>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:" rowspan="2">STT</th>
    <th style="width:" rowspan="2">Mã nhân viên</th>
    <th style="width:" rowspan="2">Chức vụ</th>
    <th style="width:" rowspan="2">Phòng ban</th>
    <th style="width:" colspan="2">Thành tích</th>
    <th style="width:" rowspan="2">Người giám sát</th>
  </tr>
  <tr class ="hang1">
    <th>Thẻ</th>
    <th>Tiền tiết kiệm(vnđ)</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_thanhtichnv)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><?php if($row['chucvu'] == 0){
            echo 'Nhân viên';
        }elseif($row['chucvu'] == 1) {
            echo 'Phó phòng';
        }elseif($row['chucvu'] == 2){
            echo 'Trưởng phòng';
        }else{
            echo 'Giám đốc';
        }
        ?></td>
        <td><?php echo $row['phong'] ?></td>
        <td><?php echo $row['the_nv'] ?></td>
        <td><?php echo number_format($row['tien'],0,',','.'); ?></td>
        <td><?php echo $row['giamsat'] ?></td>
    </tr>
    <?php
    }
  ?>
</table>

<?php
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinkh GROUP BY id_nv");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count/10);
?>
  <ul class="list_trang">
      <?php
      for($j=1;$j<=$trang;$j++){
      ?>
          <li><a href="index.php?quanly=thanhtichnhanvien&trang=<?php echo $_GET['trang'] ?>&so=<?php echo $j ?>"><?php echo $j ?></a></li>
      <?php
      }
      ?>
  </ul>
</div>



