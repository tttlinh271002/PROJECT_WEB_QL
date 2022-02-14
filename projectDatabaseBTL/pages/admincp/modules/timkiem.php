<div class="menu_dask">
<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_danhsachnv = "SELECT * FROM proj_thongtinnv WHERE name_nv LIKE '%".$tukhoa."%' OR id_nv LIKE '%".$tukhoa."%' ORDER BY id_nv ASC";
    $query_lietke_danhsachnv = mysqli_query($mysqli,$sql_lietke_danhsachnv);
?>

<h3>DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="tiemkiem">
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinnhanvien"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
</div>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:13%">Tên nhân viên</th>
    <th style="width:10%">Mã nhân viên</th>
    <th style="width:10%">Ngày sinh</th>
    <th style="width:10%">Số điện thoại</th>
    <th style="width:10%">CMND</th>
    <th style="width:19%">Địa chỉ</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhsachnv)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['name_nv'] ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><?php echo $row['birth_nv'] ?></td>
        <td><?php echo $row['sdt_nv'] ?></td>
        <td><?php echo $row['cmnd_nv'] ?></td>
        <td><?php echo $row['address_nv'] ?></td>
    </tr>
    <?php
    }
  ?>
</table>
</div>

