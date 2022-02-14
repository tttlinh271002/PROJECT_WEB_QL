<div class="menu_dask">
<?php
    if(isset($_POST['timkiem1'])){
      $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_phongban = "SELECT *, (SELECT  COUNT(id_nv) FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong) AS amount_nv, 
    (SELECT id_nv FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong AND chucvu='2') AS nv
    FROM proj_phongban WHERE name_phong LIKE '%".$tukhoa."%' OR id_phong LIKE '%".$tukhoa."%' ORDER BY tg_phong ASC";
    $query_lietke_phongban = mysqli_query($mysqli,$sql_lietke_phongban);
?>

<h3>LIỆT KÊ DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="them_timkiem">
    <div class ="them">
        <a href="index.php?quanly=thongtinphongban&action=quanlyphongban&query=them">
          <i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
</div>
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
            <i class="fas fa-eraser"></i></a> | 
            <a href ="?quanly=thongtinphongban&action=quanlyphongban&query=sua&idphongban=<?php echo $row['id_phong']?>">
            <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
</div>