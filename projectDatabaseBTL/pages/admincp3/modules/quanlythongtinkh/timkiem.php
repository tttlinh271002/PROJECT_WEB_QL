<div class="menu_dask">
<?php
    if(isset($_POST['timkiem1'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_thongtinkh = "SELECT * FROM proj_thongtinkh WHERE id_kh LIKE '%".$tukhoa."%' 
      OR id_nv LIKE '%".$tukhoa."%' OR ma_gd LIKE '%".$tukhoa."%' ORDER BY id_kh ASC";
    $query_lietke_thongtinkh = mysqli_query($mysqli,$sql_lietke_thongtinkh);
?>

<h3>LIỆT KÊ DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="them_timkiem">
    <div class ="them">
        <a href="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
</div>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:13%">Mã khách hàng</th>
    <th style="width:10%">Loại giao dịch</th>
    <th style="width:10%">Mã giao dịch</th>
    <th style="width:10%">Số lượng</th>
    <th style="width:10%">Nhân viên phụ trách</th>
    <th style="width:10%">Thời gian</th>
    <th class ="thaydoi" style="width:8%">Thay đổi</th>
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
        <td class ="thaydoi">
            <a href ="pages/admincp3/modules/quanlythongtinkh/xuly.php?magiaodich=<?php echo $row['ma_gd']?>">
            <i class="fas fa-eraser" onclick="alert('Xóa thông tin thành công')"></i></a> | 
            <a href ="?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=sua&magiaodich=<?php echo $row['ma_gd']?>">
            <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
</div>