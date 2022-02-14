<div class="menu_dask">
<h3>THÔNG TIN PHÒNG BAN</h3>
<div class="bao_dask">
    <div class ="chinhsua">
      <a href="index.php?quanly=thongtinphongban&action=quanlyphongban&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
    <div class ="dask_tk">
        <form action="index.php?quanly=thongtinphongban&action=quanlyphongban&query=timkiem" method="POST">
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
    if($page =='' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page-1)*10;
    }
    $sql_lietke_phongban = "SELECT *, (SELECT  COUNT(id_nv) FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong) AS amount_nv,
    (SELECT MAX(chucvu) FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong) as cv,
    (SELECT id_nv FROM proj_danhsachnv WHERE chucvu = cv AND phong = proj_phongban.id_phong) AS nv 
    FROM proj_phongban ORDER BY tg_phong ASC LIMIT $begin,10";
    $query_lietke_phongban = mysqli_query($mysqli,$sql_lietke_phongban);
?>
<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:10%">Mã phòng</th>
    <th style="width:15%">Tên phòng</th>
    <th style="width:10%">Số nhân viên</th>
    <th style="width:15%">Địa chỉ</th>
    <th style="width:14%">Ngày thành lập</th>
    <th style="width:12%">Người quản lý</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_phongban)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['id_phong'] ?></td>
        <td><?php echo $row['name_phong'] ?></td>
        <td><?php echo $row['amount_nv'] ?></td>
        <td><?php echo $row['address_phong'] ?></td>
        <td><?php echo $row['tg_phong'] ?></td>
        <td><?php echo $row['nv'] ?></td>
    </tr>
    <?php
    }
  ?>
</table>

  <?php
      $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_phongban");
      $row_count = mysqli_num_rows($sql_trang);
      $trang = ceil($row_count/10);
  ?>
  <ul class="list_trang">
      <?php
      for($i=1;$i<=$trang;$i++){
      ?>
          <li><a href="index.php?quanly=thongtinphongban&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
      <?php
      }
      ?>
  </ul>
</div>