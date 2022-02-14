<div class="menu_dask">
<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_thongtinkh = "SELECT * FROM proj_thongtinkh WHERE id_kh LIKE '%".$tukhoa."%' 
    OR id_nv LIKE '%".$tukhoa."%' OR ma_gd LIKE '%".$tukhoa."%' ORDER BY id_kh ASC";
    $query_lietke_thongtinkh = mysqli_query($mysqli,$sql_lietke_thongtinkh);
?>
<h3>DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>

<div class="tiemkiem">
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinkhachhang"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
    <div class ="quaylai">
        <a href="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
</div>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:10%">Mã khách hàng</th>
    <th style="width:13%">Loại giao dịch</th>
    <th style="width:10%">Mã giao dịch</th>
    <th style="width:10%">Số lượng</th>
    <th style="width:10%">Nhân viên phụ trách</th>
    <th style="width:19%">Thời gian</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_thongtinkh)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['id_kh'] ?></td>
        <td><?php if($row['giaodich'] == 0){
            echo 'Thẻ';
        }else{
            echo 'Tiết kiệm';
        }
        ?></td>
        <td><?php echo $row['ma_gd'] ?></td>
        <td><?php echo $row['amount_gd'] ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><?php echo $row['tg'] ?></td>
    </tr>
    <?php
    }
  ?>
</table>
</div>