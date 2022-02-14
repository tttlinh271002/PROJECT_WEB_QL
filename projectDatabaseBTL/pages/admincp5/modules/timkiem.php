<div class="menu_dask">
<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_phongban = "SELECT *, (SELECT  COUNT(id_nv) FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong) AS amount_nv,
    (SELECT MAX(chucvu) FROM proj_danhsachnv WHERE phong = proj_phongban.id_phong) as cv,
    (SELECT id_nv FROM proj_danhsachnv WHERE chucvu = cv AND phong = proj_phongban.id_phong) AS nv 
    FROM proj_phongban WHERE name_phong LIKE '%".$tukhoa."%' OR id_phong LIKE '%".$tukhoa."%' ORDER BY tg_phong ASC";
    $query_lietke_phongban = mysqli_query($mysqli,$sql_lietke_phongban);
?>

<h3>DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="tiemkiem">
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinphongban"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinphongban&action=quanlyphongban&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
</div>

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
</div>