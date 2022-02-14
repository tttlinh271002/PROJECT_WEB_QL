<div class="menu_lietke">
<h3>LIỆT KÊ THÔNG TIN PHÒNG BAN</h3>
<p>
    <form action="index.php?quanly=thongtinphongban&action=quanlyphongban&query=timkiem1" method="POST">
        <input type="text" placeholder= "Tìm kiếm" name="tukhoa">
        <input type="submit" name="timkiem1" value="Tìm kiếm">
    </form>
</p>

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
    (SELECT id_nv FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong AND chucvu='2') AS nv
    FROM proj_phongban ORDER BY tg_phong ASC LIMIT $begin,10";
    $query_lietke_phongban = mysqli_query($mysqli,$sql_lietke_phongban);
?>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:13%">Mã phòng</th>
    <th style="width:10%">Tên phòng</th>
    <th style="width:10%">Số nhân viên</th>
    <th style="width:10%">Địa chỉ</th>
    <th style="width:10%">Ngày thành lập</th>
    <th style="width:10%">Người quản lý</th>
    <th class ="thaydoi" style="width:8%">Thay đổi</th>
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
        <td class ="thaydoi">
          <a href ="pages/admincp5/modules/quanlyphongban/xuly.php?idphongban=<?php echo $row['id_phong']?>">
            <i class="fas fa-eraser" onclick="alert('Xóa thông tin thành công')"></i></a> | 
          <a href ="?quanly=thongtinphongban&action=quanlyphongban&query=sua&idphongban=<?php echo $row['id_phong']?>">
            <i class="fas fa-edit"></i></a>
        </td>
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